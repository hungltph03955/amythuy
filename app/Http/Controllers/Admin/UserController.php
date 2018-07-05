<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersList(Request $request)
    {
        if (Auth::user()->roles != 1) {
            return redirect()->back()->with('mess', 'Bạn không có quyền truy cập vào mục này');
        }
        $search = $request->input('search');
        $userList = $this->userRepository->getSearch($search);
        return view('admin.user.index',
            [
                'userList' => $userList,
                'search' => $search
            ]);
    }

    public function getUsersAdd()
    {
        if (Auth::user()->roles != 1) {
            return redirect()->back();
        }
        return view('admin.user.create');
    }

    public function postUsersAdd(UserRequest $request)
    {
        if (Auth::user()->roles != 1) {
            return redirect()->back()->with('mess', 'Bạn không có quyền truy cập vào mục này');
        }
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['roles'] = isset($data['roles']) ? $data['roles'] : 2;
        $store = $this->userRepository->store($data);
        $user = $store->id;
        if (empty($user)) {
            return redirect()->back()->with('mess', 'Thêm quản trị không thành công');
        } else {
            return redirect()->action('Admin\UserController@getUsersList')->with('mess', 'Thêm quản trị viên thành công');
        }
    }

    public function getUsersEdit($id)
    {
        $check = $this->userRepository->show($id);
        if (!isset($check)) {
            return redirect()->back()->with('mess', 'Tài khoản không tồn tại');
        }
        return view('admin.user.edit', [
            'user' => $check,
        ]);
    }

    public function postUsersEdit(UserRequest $request, $id)
    {
        $check = $this->userRepository->show($id);
        if (!isset($check)) {
            return redirect()->back()->with('mess', 'Tài khoản không tồn tại');
        }
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        if ($check->roles == 1) {
            $data['roles'] = 1;
        } else {
            $data['roles'] = isset($data['roles']) ? $data['roles'] : 2;
        }
        $update = $this->userRepository->update($data, $id);
        if ($update == false) {
            return redirect()->back()->with('mess', 'chỉnh sửa tài khoản không thành công');
        } else {
            return redirect()->action('Admin\UserController@getUsersList')->with('mess', 'Chỉnh sửa quản trị viên thành công');
        }
    }


    public function getUsersDel($id)
    {
        $check = $this->userRepository->show($id);
        if (!isset($check) && $check->roles == 1) {
            return redirect()->back()->with('mess', 'Bạn không thể xóa tài khoản này');
        }
        $user = $this->userRepository->destroy($check->id);
        if (empty($user)) {
            abort(404);
        }
        return redirect()->action('Admin\UserController@getUsersList')->with('mess', 'Xóa quản trị viên thành công');
    }
}
