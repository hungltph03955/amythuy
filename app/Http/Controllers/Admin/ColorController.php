<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ColorRepositoryInterface;
use App\Models\Admin\Color;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    protected $colorRepository;

    public function __construct(
        ColorRepositoryInterface $colorRepository
    )
    {
        $this->colorRepository = $colorRepository;
    }

    public function getColorList()
    {
        $data = $this->colorRepository->selectToArray();
        return view('admin.color.index', ['ColorListData' => $data]);
    }

    public function getColorAdd()
    {
        return view('admin.color.create');
    }

    public function postColorAdd(ColorRequest $request)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        if (empty($data)) {
            return redirect()->back();
        }
        $color = $this->colorRepository->store($data);
        if (empty($color)) {
            abort(404);
        }
        return redirect('admin/color/list')->with('mess', 'Thêm màu sắc sản phẩm thành công');
    }

    public function getColorEdit($id)
    {
        $color = $this->colorRepository->show($id);
        $data = $color->toArray();
        if (isset($data)) {
            return view('admin.color.edit', ['colorData' => $data]);
        } else return redirect()->back();
    }

    public function postColorEdit(ColorRequest $request, $id)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        $color = $this->colorRepository->update($data, $id);
        if (empty($color)) {
            return redirect()->back();
        }
        return redirect('admin/color/list')->with('mess', 'Sửa màu sắc sản phẩm thành công');
    }

    public function getColorDel($id)
    {
        $color = $this->colorRepository->destroy($id);
        if (empty($color)) {
            abort(404);
        }
        return redirect('admin/color/list')->with('mess', 'Xóa màu sắc thành công');
    }
}
