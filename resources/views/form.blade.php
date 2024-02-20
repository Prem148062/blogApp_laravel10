@extends('layout')
@section('title', 'เขียนบทความ')
@section('content')
    <h2 class="text-center py-2">แบบฟอร์มเขียนบทความ</h2>
    <form method="POST" action="/insert">
        @csrf
        <div class="form-group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" name="title" class="form-control">
        </div>
        @error('title')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="content">เนื้อหาบทความ</label>
            <textarea type="text" name="content" cols="30" rows="5" class="form-control"></textarea>
        </div>
        @error('content')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <button type="submit" class="my-3 btn btn-primary">บันทึก</button>
        <a href="{{ route('blog') }}" class="btn btn-secondary my-3">กลับสู่บทความทั้งหมด</a>
    </form>
@endsection
