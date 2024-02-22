@extends('layouts.app')
@section('title', 'แก้ไขบทความ')
@section('content')
    <h2 class="text-center py-2">แบบฟอร์มแก้ไขบทความ</h2>
    <form method="POST" action="{{ route('update', $blog->id) }}">
        @csrf
        <div class="form-group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
        </div>
        @error('title')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="content">เนื้อหาบทความ</label>
            <textarea type="text" id="content" name="content" cols="30" rows="5" class="form-control">{{ $blog->content }}</textarea>
        </div>
        @error('content')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <button type="submit" class="my-3 btn btn-primary">แก้ไข</button>
        <a href="{{ route('blog') }}" class="btn btn-secondary my-3">กลับสู่บทความทั้งหมด</a>
    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
