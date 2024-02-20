<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        $blogs = DB::table("blogs")->get();
        return view("blog", compact('blogs'));
    }

    public function about()
    {
        $name = "WitthawasDev";
        $date = "20/02/2024";
        return view("about", compact('name', 'date'));
    }

    public function create()
    {
        return view("form");
    }

    public function insert(Request $req)
    {
        $req->validate([
            'title' => 'required|max:50',
            'content' => 'required',
        ], [
            'title.required' => 'กรุณาป้อนชื่อบทความ',
            'content.required' => 'กรุณาป้อนเนื้อหาบทความ',
            'title.max' => 'ชื่อ บทความ ห้ามเกิน 50 ตัวอักษร'
        ]);
    }
    public function delete($id)
    {
        DB::table("blogs")->where('id',$id)->delete();
        return redirect(route("blog"));
    }
}
