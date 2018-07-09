<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewRepositoryInterface;
use App\Models\Admin\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewRequest;
use App\Http\Requests\NewEditRequest;
use Illuminate\Support\Facades\File;

class NewController extends Controller
{
    protected $newRepository;

    public function __construct(
        NewRepositoryInterface $newRepository
    )
    {
        $this->newRepository = $newRepository;
    }

    public function getNewsList()
    {
        $listNews = $this->newRepository->getAllNews();
        if (empty($listNews)) {
            return redirect()->back();
        } else {
            return view('admin.new.index', [
                'listNews' => $listNews
            ]);
        }

    }

    public function getNewsAdd()
    {
        return view('admin.new.create');
    }

    public function postNewsAdd(NewRequest $request)
    {
        if ($request->file('imageNews')) {
            $fileExtension = $request->file('imageNews')->getClientOriginalExtension();
            $fileName = 'News' . '_' . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            $uploadPath = public_path(PATH_IMAGE_NEWS);
            $request->file('imageNews')->move($uploadPath, $fileName);
        }

        $data = $request->only(
            'name',
            'description',
            'status');
        $data['img'] = isset($fileName) ? $fileName : 'No Image';
        $data['slug'] = str_slug($data['name']);
        $data['author'] = Auth::user()->id;
        $store = $this->newRepository->store($data);
        if (empty($store)) {
            return redirect()->back();
        } else {
            return redirect()->action('Admin\NewController@getNewsList')->with('mess', 'Thêm tin tức thành công');
        }
    }

    public function getNewsEdit($id)
    {
        $newsDetail = $this->newRepository->show($id);
        if (empty($newsDetail)) {
            return redirect()->back();
        } else {
            return view('admin.new.edit', [
                'newsDetail' => $newsDetail
            ]);
        }
    }

    public function postNewsEdit(NewEditRequest $request, $id)
    {
        $newsDetail = $this->newRepository->show($id);
        if (is_null($newsDetail)) {
            return redirect()->back()->with('mess', 'Tin tức không tồn tại');
        } else {
            if ($request->file('imageNews')) {
                $fileExtension = $request->file('imageNews')->getClientOriginalExtension(); // Lấy . của file
                $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                $uploadPath = public_path(PATH_IMAGE_NEWS);
                $request->file('imageNews')->move($uploadPath, $fileName);
                $imageNewPath = PATH_IMAGE_NEWS . $newsDetail->img;
                if (file_exists(public_path() . $imageNewPath)) {
                    File::delete(public_path() . $imageNewPath);
                }
            }
            $data = $request->only(
                'name',
                'description',
                'status');
            $data['img'] = isset($fileName) ? $fileName : $newsDetail->img;
            $data['slug'] = str_slug($data['name']);
            $data['author'] = Auth::user()->id;
            $update = $this->newRepository->update($data, $id);
            if ($update == false) {
                return redirect()->back();
            } else {
                return redirect()->action('Admin\NewController@getNewsList')->with('mess', 'Chỉnh sửa tin tức thành công ');
            }
        }
    }

    public function getNewsDel($id)
    {
        if (isset($id)) {
            $check = $this->newRepository->show($id);
            if (isset($check)) {
                $imageMasterPath = PATH_IMAGE_NEWS . $check->img;
                if (file_exists(public_path() . $imageMasterPath)) {
                    File::delete(public_path() . $imageMasterPath);
                }
                $news = $this->newRepository->destroy($id);
                if (empty($news)) {
                    abort(404);
                }
                return redirect('admin/news/list')->with('mess', 'Xóa tin tức thành công');
            } else {
                return redirect()->back()->with('mess', 'Tin tức này đã không tồn tại');
            }
        } else {
            return redirect()->back()->with('mess', 'Tin tức này đã không tồn tại');
        }
    }

}