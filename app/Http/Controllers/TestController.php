<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(){
        return response()->json(['message'=>'Hello World','data'=>'test']);
    }

    public function index(){
        $user = "admin@examplemail.com";
        return view("test",['user'=>$user]);
    }
}
