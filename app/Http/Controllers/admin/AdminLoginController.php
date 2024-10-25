<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'passwork' => 'required'
        ]);
        if ($validator->passes()){
            Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

        }else{
            return redirect()->route('admin.login')->winthErrors(validator)
            ->withInput($validator)
            ->withInput($request->omly('email'));


        }
    }
}
