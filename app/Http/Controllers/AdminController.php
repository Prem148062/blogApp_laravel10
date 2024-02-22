<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $blogs = Blog::paginate(5);
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
        $data = [
            'title' => $req->title,
            'content' => $req->content,
        ];
        // DB::table('blogs')->insert($data);
        Blog::insert($data);
        return redirect(route('blog'));
    }
    public function delete($id)
    {
        // DB::table("blogs")->where('id', $id)->delete();
        Blog::find($id)->delete();
        // return redirect(route("blog"));
        return redirect()->back();
    }
    public function change($id)
    {
        // dd($id);
        $blog = Blog::find($id);
        $data = [
            'status' => !$blog->status
        ];
        $blog = Blog::find($id)->update($data);
        return redirect()->back();
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('edit', compact('blog'));
    }
    public function update(Request $req, $id)
    {
        $req->validate([
            'title' => 'required|max:50',
            'content' => 'required',
        ], [
            'title.required' => 'กรุณาป้อนชื่อบทความ',
            'content.required' => 'กรุณาป้อนเนื้อหาบทความ',
            'title.max' => 'ชื่อ บทความ ห้ามเกิน 50 ตัวอักษร'
        ]);
        $data = [
            'title' => $req->title,
            'content' => $req->content,
        ];
        // DB::table('blogs')->where('id', $id)->update($data);
        Blog::find($id)->update($data);
        return redirect(route("blog"));
    }
}
