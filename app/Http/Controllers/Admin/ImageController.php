<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImagesRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;
use App\Http\Requests\ImageRequest;
use App\Models\Admin\Images;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    protected $imageRepository;
    protected $productRepository;

    public function __construct(
        ImagesRepositoryInterface $imagesRepository,
        ProductsRepositoryInterface $productsRepository
    )
    {
        $this->imageRepository = $imagesRepository;
        $this->productRepository = $productsRepository;
    }

    public function index()
    {
        $images = $this->imageRepository->gets();
        return view('admin.image.index',
            [
                'images' => $images
            ]);
    }

    public function create($id)
    {
        $this->productRepository->show($id);
        $image = $this->imageRepository->getBlankModel();
        $products = $this->productRepository->getAll();
        return view('admin.image.create', [
            'image' => $image,
            'products' => $products,
            'id' => $id
        ]);
    }

    public function store(ImageRequest $request, $id)
    {
        $this->productRepository->show($id);
        $fileExtension = $request->file->getClientOriginalExtension(); // Lấy . của file
        $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
        $uploadPath = public_path('/upload');
        $request->file->move($uploadPath, $fileName);
        $data['name'] = ENV('PATH_URL') . $fileName;
        $data['product_id'] = $id;
        $this->imageRepository->store($data);
        return response()->json(['success' => $fileName]);
    }

    public function show($id)
    {
        $image = $this->imageRepository->show($id);
        $products = $this->productRepository->getAll();
        if (isset($image)) {
            return view('admin.image.edit', [
                'image' => $image,
                'products' => $products
            ]);
        } else return redirect()->back();
    }

    public function destroy($id)
    {
        $url = $this->imageRepository->getFileName($id);
        $fileName = trim($url, '/');
        $image = $this->imageRepository->destroy($id);
        if (empty($image)) {
            abort(404);
        }
        File::delete($fileName);
        return redirect('admin/image')->with('mess', 'Xóa thành công');

    }
}
