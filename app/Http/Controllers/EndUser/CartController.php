<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;
use \App\Models\Admin\Products;

class CartController extends Controller
{
    protected $cates;

    public function __construct(CategoriesRepositoryInterface $cates)
    {
        $this->cates = $cates;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all carts
        $cates = $this->cates->gets();
        $carts = \Cart::content();
        $total = \Cart::total(0);
        return view('endUser.cart.index', compact('cates', 'carts', 'total'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $product = Products::find($data['id']);
        $cartItem = \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => isset($data['options']['quantity'])? $data['options']['quantity']: 1,
            'price' => $product->price,
            'options' => array(
                'image' => $product->img,
                'size' => $data['options']['size'], 
                'color'=> $data['options']['size'],
                'material'=> $data['options']['material']
            ),

        ]);
        \Cart::associate($cartItem->rowId, \App\Models\Admin\Products::class);
        return response()->json([
            'carts' => $cartOb = \Cart::content(),
            'count' => $cartOb->count(),
            'total' => \Cart::total(0)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        \Cart::update($request->input('rowId'), [
            'qty' => $request->input('quantity')
        ]);
        $subtotalId = \Cart::get($request->input('rowId'))->subtotal(0);
        $total = \Cart::total(0);
        return response()->json([
            'carts' => $cartOb = \Cart::content(),
            'count' => $cartOb->count(),
            'subtotalId' => $subtotalId,
            'total' => $total
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Remove cart
        \Cart::remove($request->input('rowId'));
        return response()->json([
            'carts' => $cartOb = \Cart::content(),
            'count' => $cartOb->count(),
            'total' => \Cart::total(0)
        ]);
    }
}
