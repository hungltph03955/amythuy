<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    protected $commentRepository;
    protected $productRepository;
    public function __construct(
        CommentRepositoryInterface $commentRepository,
        ProductsRepositoryInterface $productsRepository
    )
    {
        $this->commentRepository = $commentRepository;
        $this->productRepository = $productsRepository;
    }

    public function create()
    {
        $comment = $this->commentRepository->getBlankModel();
        $products = $this->productRepository->gets();
        return view('admin.comment.create',[
            'comment' => $comment,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->only('product_id','content');
        $data['admin_id'] = Auth::user()->id;
        $store = $this->commentRepository->store($data);
        if(empty($store))
        {
            return redirect()->back();
        }
        return redirect()->action('Admin\ProductController@index')->with('mess','Thêm thành công');
    }

    public function destroy($id)
    {
        $comment = $this->commentRepository->destroy($id);
        if (empty($comment)) {
            abort(404);
        }
        return redirect()->action('Admin\ProductController@index')->with('mess','Thêm thành công');

    }
}
