<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AboutRepositoryInterface;
use App\Models\Admin\About;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddAbountRequest;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    protected $aboutRepository;

    public function __construct(
        AboutRepositoryInterface $aboutRepository
    )
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function getAboutAdd()
    {
        $getAbout = $this->aboutRepository->getAbout();
        if ($getAbout != null) {
            return view('admin.about.edit', ['getAbout' => $getAbout]);
        } else {
            return view('admin.about.create');
        }
    }

    public function postAboutAdd(AddAbountRequest $request)
    {
        if ($request->file('imageNews')) {
            $fileExtension = $request->file('imageNews')->getClientOriginalExtension();
            $fileName = 'About' . '_' . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            $uploadPath = public_path(PATH_IMAGE_ABOUT);
            $request->file('imageNews')->move($uploadPath, $fileName);
        }
        $data = $request->only(
            'name',
            'description',
            'status');
        $data['img'] = isset($fileName) ? $fileName : 'No Image';
        $data['slug'] = str_slug($data['name']);
        $data['author'] = Auth::user()->id;
        $store = $this->aboutRepository->store($data);
        if (empty($store)) {
            return redirect()->back();
        } else {
            return redirect()->action('Admin\AboutController@getAboutAdd');
        }

    }

    public function postAboutEdit(AddAbountRequest $request, $id)
    {
        $about = $this->aboutRepository->show($id);
        if (is_null($about)) {
            return redirect()->back()->with('mess', 'Giới thiệu không tồn tại');
        } else {
            if ($request->file('imageNews')) {
                $fileExtension = $request->file('imageNews')->getClientOriginalExtension(); // Lấy . của file
                $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                $uploadPath = public_path(PATH_IMAGE_ABOUT);
                $request->file('imageNews')->move($uploadPath, $fileName);
                $imageNewPath = PATH_IMAGE_ABOUT . $about->img;
                if (file_exists(public_path() . $imageNewPath)) {
                    File::delete(public_path() . $imageNewPath);
                }
            }
            $data = $request->only(
                'name',
                'description',
                'status');
            $data['img'] = isset($fileName) ? $fileName : $about->img;
            $data['slug'] = str_slug($data['name']);
            $data['author'] = Auth::user()->id;
            $update = $this->aboutRepository->update($data, $id);
            if ($update == false) {
                return redirect()->back();
            } else {
                return redirect()->action('Admin\AboutController@getAboutAdd');
            }
        }
    }


}
