<?php

namespace App\Http\Controllers;

use App\Models\Patientdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function view($key,$id){
        $user = User::find($id);

        $details = $user->patientdetail;

        $decrypted = openssl_decrypt($details->NIF, 'aes-256-cbc', $key, 0);

        dd($decrypted);
    }


}
