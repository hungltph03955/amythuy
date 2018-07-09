<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InformationRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Session;

class ContactController extends Controller {

    protected $informationRepository;

    public function __construct(
    InformationRepositoryInterface $informationRepository
    ) {
        $this->informationRepository = $informationRepository;
    }

    public function index() {
        return view('endUser.contact.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required',
                    'email' => 'required|email',
                    'message' => 'required'
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();
        if ($this->validator($data)->fails()) {
            return redirect()->route('endUser.contact.index')
                            ->withErrors($this->validator($data))
                            ->withInput();
        }
        try {
            $this->informationRepository->store($data);
            Session::flash('message.level', 'success');
            Session::flash('message.content', 'Thank for contacting us!');
            return redirect()->route('endUser.contact.index');
        } catch (Exception $e) {
            Session::flash('message.level', 'error');
            Session::flash('message.content', 'Error!');
            return redirect()->route('endUser.contact.index');
            // echo $e->getMessage();
        }
    }

}
