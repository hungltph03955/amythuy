<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SizeRepositoryInterface;
use App\Models\Admin\Sizes;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    protected $sizeRepository;

    public function __construct(
        SizeRepositoryInterface $sizeRepository
    )
    {
        $this->sizeRepository = $sizeRepository;
    }

    public function getSizesList()
    {
        $data = $this->sizeRepository->selectToArray();
        return view('admin.size.index', ['sizeListData' => $data]);
    }

    public function getSizesAdd()
    {
        return view('admin.size.create');
    }

    public function postSizesAdd(SizeRequest $request)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        if (empty($data)) {
            return redirect()->back();
        }
        $size = $this->sizeRepository->store($data);
        if (empty($size)) {
            abort(404);
        }
        return redirect('admin/sizes/list')->with('mess', 'Thêm kích cỡ sản phẩm thành công');
    }

    public function getSizesEdit($id)
    {
        $size = $this->sizeRepository->show($id);
        $data = $size->toArray();
        if (isset($data)) {
            return view('admin.size.edit', ['sizeData' => $data]);
        } else return redirect()->back();
    }

    public function postSizesEdit(SizeRequest $request, $id)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        $size = $this->sizeRepository->update($data, $id);
        if (empty($size)) {
            return redirect()->back();
        }
        return redirect('admin/sizes/list')->with('mess', 'Sửa kích cỡ sản phẩm thành công');
    }

    public function getSizesDel($id)
    {
        $size = $this->sizeRepository->destroy($id);
        if (empty($size)) {
            abort(404);
        }
        return redirect('admin/sizes/list')->with('mess', 'Xóa kích cỡ thành công');
    }
}
