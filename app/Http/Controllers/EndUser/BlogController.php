<?php

namespace App\Http\Controllers\EndUser;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewRepositoryInterface;

class BlogController extends Controller
{

    protected $newRepository;

    public function __construct(
        NewRepositoryInterface $newRepository
    )
    {
        $this->newRepository = $newRepository;
    }

    public function index()
    {
        $listNews = $this->newRepository->getNews();
        if (empty($listNews)) {
            return redirect()->back();
        }
        return view('endUser.blog.index', [
            'listNews' => $listNews
        ]);
    }

    public function show($id, $slug)
    {
        $newsDetail = $this->newRepository->show($id);
        if (empty($newsDetail)) {
            return redirect('endUser.blog.index');
        } else {
            return view('endUser.blog.show', [
                'newsDetail' => $newsDetail
            ]);
        }
    }

}
