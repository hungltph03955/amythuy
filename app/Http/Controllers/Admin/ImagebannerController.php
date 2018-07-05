<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImagesBannerRepositoryInterface;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ImageBannerRequest;
use Illuminate\Support\Facades\Auth;

class ImagebannerController extends Controller
{
    protected $imageBannerRepository;

    public function __construct(ImagesBannerRepositoryInterface $imagesBannerRepository)
    {
        $this->imageBannerRepository = $imagesBannerRepository;
    }

    public function index()
    {
        $imagesBanner = $this->imageBannerRepository->gets();
        return view('admin.imagebanner.index', [
            'imagesBanner' => $imagesBanner
        ]);
    }

    public function create()
    {
        $imageBanner = $this->imageBannerRepository->getBlankModel();
        return view('admin.imagebanner.create',
            [
                'imageBanner' => $imageBanner
            ]);
    }

    public function store(ImageBannerRequest $request)
    {

        if ($request->file('imageBanner')) {
            $fileExtension = $request->file('imageBanner')->getClientOriginalExtension();
            $fileName = 'Banner' . '_' . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            $uploadPath = public_path(PATH_IMAGE_BANNER);
            $request->file('imageBanner')->move($uploadPath, $fileName);
        }

        $data = $request->only(
            'name',
            'status');
        $data['img'] = isset($fileName) ? $fileName : 'No Image';
        $data['author'] = Auth::user()->id;

        $store = $this->imageBannerRepository->store($data);
        if (empty($store)) {
            return redirect()->back();
        } else {
            return redirect()->action('Admin\ImagebannerController@index')->with('mess', 'Thêm ảnh banner thành công');
        }
    }

    public function destroy($id)
    {
        if (isset($id)) {
            $check = $this->imageBannerRepository->show($id);
            if (isset($check)) {
                $imageMasterPath = PATH_IMAGE_BANNER . $check->img;
                if (file_exists(public_path() . $imageMasterPath)) {
                    File::delete(public_path() . $imageMasterPath);
                }
                $imageBanner = $this->imageBannerRepository->destroy($id);
                if (empty($imageBanner)) {
                    abort(404);
                }
                return redirect()->action('Admin\ImagebannerController@index')->with('mess', 'Xóa ảnh banner thành công');
            } else {
                return redirect()->back()->with('mess', 'Ảnh banner đã không tồn tại');
            }
        } else {
            return redirect()->back()->with('mess', 'Ảnh banner đã không tồn tại');
        }
    }
}
