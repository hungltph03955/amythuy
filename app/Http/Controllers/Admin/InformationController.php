<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InformationRepositoryInterface;

class InformationController extends Controller
{
    protected $informationRepository;
    public function __construct(InformationRepositoryInterface $informationRepository)
    {
        $this->informationRepository = $informationRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $information = $this->informationRepository->getSearch($search);
        return view('admin.information.index',[
            'search' => $search,
            'information' => $information
        ]);
    }

    public function show($id)
    {
        $information = $this->informationRepository->show($id);
        if(empty($information))
        {
            abort(404);
        }
        return view('admin.information.show',[
            'information' => $information
        ]);
    }
}
