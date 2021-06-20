<?php

namespace App\Http\Controllers;

use App\Models\Patientdetail;
use App\Models\User;
use Illuminate\Encryption\Encrypter;
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

        $NIF = $this->decrypt($details->NIF,$key);
        $fullName = $this->decrypt($details->fullName,$key);
        $age = $this->decrypt($details->age,$key);
        $sex = $this->decrypt($details->sex,$key);

        return view('view')
            ->with('NIF',$NIF)
            ->with('fullName',$fullName)
            ->with('age',$age)
            ->with('sex',$sex);

    }


    public function decrypt($string,$key){
        return exec('echo "'.$string.'"|openssl base64 -d|openssl enc -d -aes-256-cbc -k "'.$key.'"');
    }



}
