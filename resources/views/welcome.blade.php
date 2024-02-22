@extends('layouts.app')
@section('title', 'หน้าแรก')
@section('content')
    <h2>บทความล่าสุด</h2>
    <hr />
    @foreach ($blogs as $item)
        <h2>{{$item->title}}</h2>
        <p>{!!Str::limit($item->content,20)!!}</p>
        <a href="{{route("details",$item->id)}}">อ่านเพิ่มเติ่ม</a>
        <hr />
    @endforeach
@endsection
