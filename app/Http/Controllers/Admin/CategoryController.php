<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Admin\Categories;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Products;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        CategoriesRepositoryInterface $categoryRepository,
        ProductsRepositoryInterface $productsRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productsRepository;
    }

    public function index()
    {
        $data = $this->categoryRepository->selectToArray();
        return view('admin.category.index', compact('data', $data));
    }

    public function create()
    {
        $data = $this->categoryRepository->selectToArray();
        return view('admin.category.create', [
            'data' => $data
        ]);
    }

    public function store(CategoryRequest $request)
    {
        if ($request->file('imageCategory')) {
            $fileExtension = $request->file('imageCategory')->getClientOriginalExtension();
            $fileName = 'Category' . '_' . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            $uploadPath = public_path(PATH_IMAGE_CATEGORY);
            $request->file('imageCategory')->move($uploadPath, $fileName);
        }
        $data = $request->only('parent_id', 'name', 'description', 'status');
        $data['slug'] = str_slug($request->input('name'));
        $data['img'] = isset($fileName) ? $fileName : 'No Image';
        $data['author'] = Auth::user()->id;
        if (empty($data)) {
            return redirect()->back();
        }
        $category = $this->categoryRepository->store($data);
        if (empty($category)) {
            abort(404);
        }
        return redirect('admin/category')->with('mess', 'Thêm danh mục sản phẩm thành công');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->show($id);
        $data = $category->toArray();
        $parent = $this->categoryRepository->selectToArray();
        if (isset($category)) {
            return view('admin.category.edit', [
                'parent' => $parent,
                'category' => $category,
                'data' => $data

            ]);
        } else return redirect()->back();
    }

    public function update(CategoryEditRequest $request, $id)
    {
        $categoryDetail = $this->categoryRepository->show($id);
        if (is_null($categoryDetail)) {
            return redirect()->back()->with('mess', 'Danh mục sản phẩm không tồn tại');
        } else {
            if ($request->file('imageCategory')) {
                $fileExtension = $request->file('imageCategory')->getClientOriginalExtension(); // Lấy . của file
                $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                $uploadPath = public_path(PATH_IMAGE_CATEGORY);
                $request->file('imageCategory')->move($uploadPath, $fileName);
                $imageNewPath = PATH_IMAGE_CATEGORY . $categoryDetail->img;
                if (file_exists(public_path() . $imageNewPath)) {
                    File::delete(public_path() . $imageNewPath);
                }
            }
            $data = $request->only('parent_id', 'name', 'description', 'status');
            $data['slug'] = str_slug($request->input('name'));
            $data['img'] = isset($fileName) ? $fileName : $categoryDetail->img;
            $data['author'] = Auth::user()->id;
            $category = $this->categoryRepository->update($data, $id);
            if (empty($category)) {
                return redirect()->back();
            }
            return redirect('admin/category')->with('mess', 'Sửa Danh mục thành công');
        }
    }

    public function destroy($id)
    {
        if (isset($id)) {
            $check = $this->categoryRepository->show($id);
            if (isset($check)) {
                $children = $this->categoryRepository->haveParentId($id);
                $product = $this->productRepository->haveProduct($id);
                if ($product == 0 && $children == 0) {
                    $category = $this->categoryRepository->destroy($id);
                    if (empty($category)) {
                        abort(404);
                    }
                    $imageMasterPath = PATH_IMAGE_CATEGORY . $check->img;
                    if (file_exists(public_path() . $imageMasterPath)) {
                        File::delete(public_path() . $imageMasterPath);
                    }
                    return redirect('admin/category')->with('mess', 'Xóa thành công');
                } else
                    return redirect()->back()->with('mess', 'Bạn không thể xóa danh mục này');
            }
        } else {
            return redirect()->back()->with('mess', 'Danh mục sản phẩm không tồn tại');
        }
    }
}
