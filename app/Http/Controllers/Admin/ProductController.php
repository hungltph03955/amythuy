<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\RatingRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\SalesRepositoryInterface;
use App\Repositories\ColorRepositoryInterface;
use App\Repositories\SizeRepositoryInterface;
use App\Repositories\CollectionRepositoryInterface;
use App\Repositories\MaterialRepositoryInterface;
use App\Repositories\Dtb_product_categoryRepositoryInterface;
use App\Repositories\Dtb_product_colorRepositoryInterface;
use App\Repositories\Dtb_product_sizeRepositoryInterface;
use App\Repositories\Dtb_product_matterialRepositoryInterface;
use App\Repositories\Dtb_product_collectionRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Exception\Exception;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $ratingRepository;
    protected $commentRepository;
    protected $saleRepository;
    protected $colorRepository;
    protected $sizeRepository;
    protected $collectionRepository;
    protected $materialRepository;
    protected $dtb_product_categoryRepository;
    protected $dtb_product_colorRepository;
    protected $dtb_product_sizeRepository;
    protected $dtb_product_materialRepository;
    protected $dtb_product_collectionRepository;
    protected $imagesRepository;

    public function __construct(
        ProductsRepositoryInterface $productsRepository,
        CategoriesRepositoryInterface $categoriesRepository,
        RatingRepositoryInterface $ratingRepository,
        CommentRepositoryInterface $commentRepository,
        SalesRepositoryInterface $salesRepository,
        ColorRepositoryInterface $colorRepository,
        SizeRepositoryInterface $sizeRepository,
        CollectionRepositoryInterface $collectionRepository,
        MaterialRepositoryInterface $materialRepository,
        Dtb_product_categoryRepositoryInterface $dtb_product_categoryRepository,
        Dtb_product_colorRepositoryInterface $dtb_product_colorRepository,
        Dtb_product_sizeRepositoryInterface $dtb_product_sizeRepository,
        Dtb_product_matterialRepositoryInterface $dtb_product_materialRepository,
        Dtb_product_collectionRepositoryInterface $dtb_product_collectionRepository,
        ImagesRepositoryInterface $imagesRepository
    )
    {
        $this->productRepository = $productsRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->ratingRepository = $ratingRepository;
        $this->commentRepository = $commentRepository;
        $this->saleRepository = $salesRepository;
        $this->colorRepository = $colorRepository;
        $this->sizeRepository = $sizeRepository;
        $this->collectionRepository = $collectionRepository;
        $this->materialRepository = $materialRepository;
        $this->dtb_product_categoryRepository = $dtb_product_categoryRepository;
        $this->dtb_product_colorRepository = $dtb_product_colorRepository;
        $this->dtb_product_sizeRepository = $dtb_product_sizeRepository;
        $this->dtb_product_materialRepository = $dtb_product_materialRepository;
        $this->dtb_product_collectionRepository = $dtb_product_collectionRepository;
        $this->imagesRepository = $imagesRepository;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->getAll();
        $searchCategory = $request->input('searchCategory');
        $searchNameProduct = $request->input('searchNameProduct');
        $searchColorProduct = $request->input('search_color_id');
        $searchSizeProduct = $request->input('size_id');
        $searchMaterialProduct = $request->input('material_id');
        $searchCollectionProduct = $request->input('collection_id');
        $products = $this->productRepository->searchCategory($searchCategory, $searchNameProduct, $searchColorProduct, $searchSizeProduct, $searchMaterialProduct, $searchCollectionProduct);
        $color = $this->colorRepository->getColorToAddProduct();
        $size = $this->sizeRepository->getSizeToAddProduct();
        $collection = $this->collectionRepository->getCollectionToAddProduct();
        $material = $this->materialRepository->getMaterialToAddProduct();
        return view('admin.product.index', [
            'searchNameProduct' => $searchNameProduct,
            'searchCategory' => $searchCategory,
            'searchColorProduct' => $searchColorProduct,
            'searchSizeProduct' => $searchSizeProduct,
            'searchMaterialProduct' => $searchMaterialProduct,
            'searchCollectionProduct' => $searchCollectionProduct,
            'products' => $products,
            'categories' => $categories,
            'color' => $color,
            'size' => $size,
            'collection' => $collection,
            'material' => $material
        ]);
    }

    public function create(Request $request)
    {
        $product = $this->productRepository->getBlankModel();
        $color = $this->colorRepository->getColorToAddProduct();
        $size = $this->sizeRepository->getSizeToAddProduct();
        $collection = $this->collectionRepository->getCollectionToAddProduct();
        $material = $this->materialRepository->getMaterialToAddProduct();
        $categories = $this->categoryRepository->getAll();
        return view('admin.product.create', [
            'product' => $product,
            'categories' => $categories,
            'color' => $color,
            'size' => $size,
            'collection' => $collection,
            'material' => $material
        ]);
    }

    public function store(ProductRequest $request)
    {
        $requestDatatas = $request->all();
        $requestDataColorId = isset($requestDatatas['color_id']) ? $requestDatatas['color_id'] : null;
        $requestDataSizeId = isset($requestDatatas['size_id']) ? $requestDatatas['size_id'] : null;
        $requestDataMaterialId = isset($requestDatatas['material_id']) ? $requestDatatas['material_id'] : null;
        $requestDataCollectionId = isset($requestDatatas['collection_id']) ? $requestDatatas['collection_id'] : null;
        $requestDataCategoryId = isset($requestDatatas['category_id']) ? $requestDatatas['category_id'] : null;
        if ($request->file('imageMater')) {
            $fileExtension = $request->file('imageMater')->getClientOriginalExtension(); // Lấy . của file
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            $uploadPath = public_path(PATH_IMAGE_MASTER);
            $request->file('imageMater')->move($uploadPath, $fileName);
        }
        $data = $request->only(
            'name',
            'code',
            'category_id',
            'description',
            'price',
            'status');
        $data['img'] = isset($fileName) ? $fileName : 'No Image';;
        $data['author'] = Auth::user()->id;
        $data['name'] = $data['name'];
        $data['code'] = $data['code'];
        $data['slug'] = str_slug($data['name']);
        $data['category_id'] = isset($data['category_id']) ? $data['category_id'][0] : null;
        $store = $this->productRepository->store($data);
        $productId = $store->id;
        if (empty($store)) {
            return redirect()->back();
        } else {
            if (isset($productId) && $productId != '') {
                if (!empty($request->file('imageDetail'))) {
                    $imageDetail = $request->file('imageDetail');
                    foreach ($imageDetail as $key => $imageDetailValue) {
                        if (isset($imageDetailValue)) {
                            $fileExtensionImageDeatil = $imageDetailValue->getClientOriginalExtension();
                            $fileNameImageDetail = $productId . "_" . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtensionImageDeatil;
                            $uploadPathImageDetail = public_path(PATH_IMAGE_DETAIL);
                            $imageDetailValue->move($uploadPathImageDetail, $fileNameImageDetail);
                            $this->imagesRepository->saveImageDetailAndProductId($productId, $fileNameImageDetail);
                        }
                    }
                }
                try {
                    DB::beginTransaction();
                    //insert Category
                    if ($requestDataCategoryId != null) {
                        $this->dtb_product_categoryRepository->saveCategoryIdAndProductId($productId, $requestDataCategoryId);
                    }
                    //insert collor
                    if ($requestDataColorId != null) {
                        $imageColor = $request->file('imageColor');
                        foreach ($requestDataColorId as $keyColorIdValue => $requestDataColorIdValue) {
                            if ($requestDataColorIdValue != 0) {
                                if (isset($imageColor[$keyColorIdValue])) {
                                    $imageColorImageData = $imageColor[$keyColorIdValue];
                                    $fileExtensionImageColor = $imageColorImageData->getClientOriginalExtension();
                                    $fileNameImageColor = $productId . "_" . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtensionImageColor;
                                    $uploadPathImageColor = public_path(PATH_IMAGE_COLOR);
                                    $imageColorImageData->move($uploadPathImageColor, $fileNameImageColor);
                                } else {
                                    $fileNameImageColor = '';
                                }
                                $this->dtb_product_colorRepository->saveColorIdAndProductId($productId, $requestDataColorIdValue, $fileNameImageColor);
                            }
                        }
                    }
                    //insert size
                    if ($requestDataSizeId != null) {
                        foreach ($requestDataSizeId as $key => $requestDataSizeIdValue) {
                            if ($requestDataSizeIdValue != 0) {
                                $this->dtb_product_sizeRepository->saveSizeIdAndProductId($productId, $requestDataSizeIdValue);
                            }
                        }
                    }
                    //insert material
                    if ($requestDataMaterialId != null) {
                        foreach ($requestDataMaterialId as $key => $requestDataMaterialIdValue) {
                            if ($requestDataMaterialIdValue != 0) {
                                $this->dtb_product_materialRepository->saveMaterialAndProductId($productId, $requestDataMaterialIdValue);
                            }
                        }
                    }
                    //insert collection
                    if ($requestDataCollectionId != null) {
                        foreach ($requestDataCollectionId as $key => $requestDataCollectionIdValue) {
                            if ($requestDataCollectionIdValue != 0) {
                                $this->dtb_product_collectionRepository->saveCollectionIdAndProductId($productId, $requestDataMaterialIdValue);
                            }
                        }
                    }

                    DB::commit();
                } catch
                (Exception $e) {
                    DB::rollBack();
                    return redirect()->action('Admin\ProductController@index')->with('mess', 'Thêm sản phẩm không thành công');
                }
            }
            return redirect()->action('Admin\ProductController@index')->with('mess', 'Thêm sản phẩm thành công');
        }
    }

    public function show($id)
    {
        if (empty($id)) {
            abort(404);
        }

        $categories = $this->categoryRepository->getAll();
        $product = $this->productRepository->show($id);
        $rating = $this->ratingRepository->getRating($id);

        if (empty($product)) {
            abort(404);
        }
        return view('admin.product.show', [
            'product' => $product,
            'categories' => $categories,
            'rating' => $rating
        ]);
    }

    public function edit(Request $request, $id)
    {
        $categories = $this->categoryRepository->getAll();
        $product = $this->productRepository->show($id);
        $imageDetail = $this->imagesRepository->getFileName($id);
        $categoryCurrent = $this->dtb_product_categoryRepository->getCategoryToEditProduct($id);
        $colorCurrent = $this->dtb_product_colorRepository->getColorToEditProduct($id);
        $sizeCurrent = $this->dtb_product_sizeRepository->getSizeToEditProduct($id);
        $materialCurrent = $this->dtb_product_materialRepository->getMaterialToEditProduct($id);
        $collectionCurrent = $this->dtb_product_collectionRepository->getCollectionToEditProduct($id);
        $color = $this->colorRepository->getColorToAddProduct();
        $size = $this->sizeRepository->getSizeToAddProduct();
        $collection = $this->collectionRepository->getCollectionToAddProduct();
        $material = $this->materialRepository->getMaterialToAddProduct();
        if (empty($product)) {
            abort(404);
        }
        return view('admin.product.edit', compact('product', 'categories', 'imageDetail', 'categoryCurrent', 'colorCurrent',
                'color', 'size', 'collection', 'material', 'sizeCurrent', 'materialCurrent', 'collectionCurrent')
        );
    }

    public function update(EditProductRequest $request, $id)
    {
        $check = $this->productRepository->show($id);
        if (is_null($check)) {
            return redirect()->back()->with('mess', 'Sản phẩm không tồn tại');
        } else {
            $requestDatatas = $request->all();
            $requestDataColorId = isset($requestDatatas['color_id']) ? $requestDatatas['color_id'] : null;
            $requestDataSizeId = isset($requestDatatas['size_id']) ? $requestDatatas['size_id'] : null;
            $requestDataMaterialId = isset($requestDatatas['material_id']) ? $requestDatatas['material_id'] : null;
            $requestDataCollectionId = isset($requestDatatas['collection_id']) ? $requestDatatas['collection_id'] : null;
            $requestDataCategoryId = isset($requestDatatas['category_id']) ? $requestDatatas['category_id'] : null;
            if ($request->file('imageMater')) {
                $fileExtension = $request->file('imageMater')->getClientOriginalExtension(); // Lấy . của file
                $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                $uploadPath = public_path(PATH_IMAGE_MASTER);
                $request->file('imageMater')->move($uploadPath, $fileName);
                $imageMasterPath = PATH_IMAGE_MASTER . $check->img;
                if (file_exists(public_path() . $imageMasterPath)) {
                    File::delete(public_path() . $imageMasterPath);
                }
            }
            $data = $request->only(
                'name',
                'code',
                'category_id',
                'description',
                'price',
                'status');
            $data['img'] = isset($fileName) ? $fileName : $check->img;
            $data['author'] = Auth::user()->id;
            $data['name'] = $data['name'];
            $data['code'] = $data['code'];
            $data['slug'] = str_slug($data['name']);
            $data['category_id'] = isset($data['category_id']) ? $data['category_id'][0] : null;
            $update = $this->productRepository->update($data, $id);
            if ($update == false) {
                return redirect()->back();
            } else {
                $productId = $check->id;
                if (isset($productId) && $productId != '') {
                    if (!empty($request->file('imageDetail'))) {
                        $imageDetail = $request->file('imageDetail');
                        foreach ($imageDetail as $key => $imageDetailValue) {
                            if (isset($imageDetailValue)) {
                                $fileExtensionImageDeatil = $imageDetailValue->getClientOriginalExtension();
                                $fileNameImageDetail = $productId . "_" . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtensionImageDeatil;
                                $uploadPathImageDetail = public_path(PATH_IMAGE_DETAIL);
                                $imageDetailValue->move($uploadPathImageDetail, $fileNameImageDetail);
                                $this->imagesRepository->saveImageDetailAndProductId($productId, $fileNameImageDetail);
                            }
                        }
                    }
                }
            }
            try {
                DB::beginTransaction();
                if ($requestDataColorId != null) {
                    $imageColor = $request->file('imageColor');
                    foreach ($requestDataColorId as $keyColorIdValue => $requestDataColorIdValue) {
                        if ($requestDataColorIdValue != 0) {
                            if (isset($imageColor[$keyColorIdValue])) {
                                $imageColorImageData = $imageColor[$keyColorIdValue];
                                $fileExtensionImageColor = $imageColorImageData->getClientOriginalExtension();
                                $fileNameImageColor = $productId . "_" . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtensionImageColor;
                                $uploadPathImageColor = public_path(PATH_IMAGE_COLOR);
                                $imageColorImageData->move($uploadPathImageColor, $fileNameImageColor);
                            } else {
                                $fileNameImageColor = '';
                            }
                            $this->dtb_product_colorRepository->saveColorIdAndProductId($productId, $requestDataColorIdValue, $fileNameImageColor);
                        }
                    }
                }
                //insert Category
                if ($requestDataCategoryId != null) {
                    $this->dtb_product_categoryRepository->deleteCategoryIdEditProduct($productId);
                    $this->dtb_product_categoryRepository->saveCategoryIdAndProductId($productId, $requestDataCategoryId);
                }
                //insert size
                if ($requestDataSizeId != null) {
                    $this->dtb_product_sizeRepository->deleteSizeIdEditProduct($productId);
                    foreach ($requestDataSizeId as $key => $requestDataSizeIdValue) {
                        if ($requestDataSizeIdValue != 0) {
                            $this->dtb_product_sizeRepository->saveSizeIdAndProductId($productId, $requestDataSizeIdValue);
                        }
                    }
                }
                //insert material
                if ($requestDataMaterialId != null) {
                    $this->dtb_product_materialRepository->deleteMaterialIdEditProduct($productId);
                    foreach ($requestDataMaterialId as $key => $requestDataMaterialIdValue) {
                        if ($requestDataMaterialIdValue != 0) {
                            $this->dtb_product_materialRepository->saveMaterialAndProductId($productId, $requestDataMaterialIdValue);
                        }
                    }
                }
                //insert collection
                if ($requestDataCollectionId != null) {
                    $this->dtb_product_collectionRepository->deleteCollectionIdEditProduct($productId);
                    foreach ($requestDataCollectionId as $key => $requestDataCollectionIdValue) {
                        if ($requestDataCollectionIdValue != 0) {
                            $this->dtb_product_collectionRepository->saveCollectionIdAndProductId($productId, $requestDataMaterialIdValue);
                        }
                    }
                }
                DB::commit();
            } catch
            (Exception $e) {
                DB::rollBack();
                return redirect()->action('Admin\ProductController@index')->with('mess', 'Thêm sản phẩm không thành công');
            }
        }
        return redirect()->action('Admin\ProductController@index')->with('mess', 'Chỉnh sửa sản phẩm thành công ');
    }

    public function deleteProduct($id)
    {
        if (isset($id)) {
            $check = $this->productRepository->show($id);
            if (isset($check)) {
                $imageMasterPath = PATH_IMAGE_MASTER . $check->img;
                if (file_exists(public_path() . $imageMasterPath)) {
                    File::delete(public_path() . $imageMasterPath);
                }
                $product = $this->productRepository->destroy($id);
                if (empty($product)) {
                    abort(404);
                }
                return redirect('admin/product')->with('mess', 'Xóa sản phẩm thành công');
            } else {
                return redirect()->back()->with('mess', 'Sản phẩm này đã không tồn tại');
            }
        } else {
            return redirect()->back()->with('mess', 'Sản phẩm này đã không tồn tại');
        }
    }

//    delete image
    public function getDelImg($id)
    {
        if (isset($id) && $id != '') {
            $idHinh = (int)$id;
            $image_detail = $this->imagesRepository->show($idHinh);
            if (!empty($image_detail)) {
                $img = PATH_IMAGE_DETAIL . $image_detail->name;
                if (file_exists(public_path() . $img)) {
                    File::delete(public_path() . $img);
                }
                $this->imagesRepository->destroy($image_detail->id);
            }
            return "Oke";
        }
    }

    public function getDelColor($id)
    {
        if (isset($id) && $id != '') {
            $colorId = (int)$id;
            $color_detail = $this->dtb_product_colorRepository->show($colorId);
            if (!empty($color_detail)) {
                $colorPath = PATH_IMAGE_COLOR . $color_detail->img;
                if (file_exists(public_path() . $colorPath)) {
                    File::delete(public_path() . $colorPath);
                }
                $this->dtb_product_colorRepository->destroy($color_detail->id);
            }
        }
        return "Oke";
    }


}
