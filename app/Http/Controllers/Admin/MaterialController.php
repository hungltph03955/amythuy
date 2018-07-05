<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MaterialRepositoryInterface;
use App\Models\Admin\Materials;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MaterialRequest;

class MaterialController extends Controller
{
    protected $materialRepository;

    public function __construct(
        MaterialRepositoryInterface $materialRepository
    )
    {
        $this->materialRepository = $materialRepository;
    }

    public function getMaterialsList()
    {
        $data = $this->materialRepository->selectToArray();
        return view('admin.material.index', ['materialListData' => $data]);
    }

    public function getMaterialsAdd()
    {
        return view('admin.material.create');
    }

    public function postMaterialsAdd(MaterialRequest $request)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        if (empty($data)) {
            return redirect()->back();
        }
        $material = $this->materialRepository->store($data);
        if (empty($material)) {
            abort(404);
        }
        return redirect('admin/materials/list')->with('mess', 'Thêm chất liệu sản phẩm thành công');
    }

    public function getMaterialsEdit($id)
    {
        $material = $this->materialRepository->show($id);
        $data = $material->toArray();
        if (isset($data)) {
            return view('admin.material.edit', ['materialData' => $data]);
        } else return redirect()->back();
    }

    public function postMaterialsEdit(MaterialRequest $request, $id)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        $material = $this->materialRepository->update($data, $id);
        if (empty($material)) {
            return redirect()->back();
        }
        return redirect('admin/materials/list')->with('mess', 'Sửa chất liệu sản phẩm thành công');
    }

    public function getMaterialsDel($id)
    {
        if (isset($id)) {
            $material = $this->materialRepository->destroy($id);
            if (empty($material)) {
                abort(404);
            }
            return redirect('admin/materials/list')->with('mess', 'Xóa chất liệu thành công');
        } else return redirect()->back();

    }
}
