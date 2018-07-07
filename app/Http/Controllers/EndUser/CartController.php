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
        //
        $cates = $this->cates->gets();
        $carts = \Cart::content();
        return view('endUser.cart.index', compact('cates', 'carts'));

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
        // dd($product->id);
        $cartItem = \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => array('image' => $product->img),

        ]);
        \Cart::associate($cartItem->rowId, \App\Models\Admin\Products::class);

        return response()->json([
            'count' => count(\Cart::content()->groupBy('id'))
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $qty = $request->input('qty');
        \Cart::update($id, [
            'qty' => $qty
        ]);
        $product = \Cart::get($id);
        $subtotalID = $product->subtotal();
        $subtotal = \Cart::subtotal();
        return response()->json([
            'product' => $product,
            'subtotalID' => $subtotalID,
            'subtotal' => $subtotal
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rowId = $id;
        \Cart::remove($rowId);
        return response()->json([
            'success' => 'ok'
        ]);
    }
}
