<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\InformationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\InformationRepositoryInterface;

class AboutMeController extends Controller
{
    protected $categoryRepository;
    protected $informationRepository;
    public function __construct(
        CategoriesRepositoryInterface $categoriesRepository,
        InformationRepositoryInterface $informationRepository
    )
    {
        $this->categoryRepository = $categoriesRepository;
        $this->informationRepository = $informationRepository;
    }
    public function aboutMe()
    {
        $cates = $this->categoryRepository->gets();
        return view('aboutme',[
            'cates' => $cates
        ]);
    }

    public function getContact()
    {
        $information = $this->informationRepository->getBlankModel();
        $cates = $this->categoryRepository->gets();
        return view('contact',[
            'cates' => $cates,
            'information' => $information
        ]);
    }

    public function postContact(InformationRequest $request)
    {
        $data = $request->all();
        $store = $this->informationRepository->store($data);
        if(empty($store))
        {
            return redirect()->back()->withErrors('Có lỗi khi thực hiện');
        }
        return redirect()->action('Customer\AboutMeController@getContact')->with('mess','Cảm ơn ý kiến phản hồi của bạn');

    }
}
