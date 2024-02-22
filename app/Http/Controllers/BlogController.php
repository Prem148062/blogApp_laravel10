<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::orderByDesc('id')->where('status', true)->get();
        return view('welcome', compact('blogs'));
    }
    public function details($id){
        $blog = Blog::find($id);
        return view("details",compact('blog'));
    }
}
