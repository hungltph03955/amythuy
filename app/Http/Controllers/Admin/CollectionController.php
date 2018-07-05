<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CollectionRepositoryInterface;
use App\Models\Admin\Collections;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CollectionRequest;

class CollectionController extends Controller
{
    protected $collectionRepository;

    public function __construct(
        CollectionRepositoryInterface $collectionRepository
    )
    {
        $this->collectionRepository = $collectionRepository;
    }

    public function getCollectionsList()
    {
        $data = $this->collectionRepository->selectToArray();
        return view('admin.collection.index', ['collectionListData' => $data]);
    }

    public function getCollectionsAdd()
    {
        return view('admin.collection.create');
    }

    public function postCollectionsAdd(CollectionRequest $request)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        if (empty($data)) {
            return redirect()->back();
        }
        $collection = $this->collectionRepository->store($data);
        if (empty($collection)) {
            abort(404);
        }
        return redirect('admin/collections/list')->with('mess', 'Thêm bộ sưu tập thành công thành công');
    }

    public function getCollectionsEdit($id)
    {
        $collection = $this->collectionRepository->show($id);
        $data = $collection->toArray();
        if (isset($data)) {
            return view('admin.collection.edit', ['collectionData' => $collection]);
        } else return redirect()->back();
    }

    public function postCollectionsEdit(CollectionRequest $request, $id)
    {
        $data = $request->only('name', 'description', 'status');
        $data['author'] = Auth::user()->id;
        $collection = $this->collectionRepository->update($data, $id);
        if (empty($collection)) {
            return redirect()->back();
        }
        return redirect('admin/collections/list')->with('mess', 'Sửa bộ sưu tập thành công thành công');
    }

    public function getCollectionsDel($id)
    {
        if (isset($id)) {
            $collection = $this->collectionRepository->destroy($id);
            if (empty($collection)) {
                abort(404);
            }
            return redirect('admin/collections/list')->with('mess', 'Xóa bộ sưu tập thành công thành công');
        } else return redirect()->back();


    }
}
