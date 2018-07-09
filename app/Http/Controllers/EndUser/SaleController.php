<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;

class SaleController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        return view('endUser.sale.index');
    }

}
