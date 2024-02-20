@extends('layout')
@section('title', 'เกี่ยวกับเรา')
@section('content')
    <h2>เกี่ยวกับเรา</h2>
    <hr>
    <p>ผู้พัฒนาระบบ : {{ $name }}</p>
    <p>วันเริ่มต้นโครงการ : {{ $date }}</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Optio culpa iusto voluptatibus dolores animi exercitationem a
        laudantium quasi fugit! Deleniti.
    </p>
@endsection
