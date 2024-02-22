@extends('layouts.app')
@section('title', 'บทความ')
@section('content')
    @if (count($blogs) > 0)
        <h2 class="text-center py-2">บทความทั้งหมด</h2>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">ชื่อบทความ</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">แก้ไขบทความ</th>
                    <th scope="col">ลบบทความ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    <tr>
                        <th>{{ $item->title }}</th>
                        @if ($item->status == true)
                            <td>
                                <a href="{{ route('change', $item->id) }}" class="btn btn-success">เผยแพร่</a>
                            </td>
                        @else
                            <td>
                                <a href="{{ route('change', $item->id) }}" class="btn btn-warning">ฉบับร่าง</a>
                            </td>
                        @endif
                        <td>
                            <a href="{{ route('edit', $item->id) }}" class="btn btn-primary">
                                แก้ไข</a>
                        </td>
                        <td>
                            <a href="{{ route('delete', $item->id) }}" class="btn btn-danger"
                                onclick="return confirm('คุณต้องการลบ บทความ : {{ $item->title }} หรือไม่ ?')">
                                ลบ</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}
    @else
        <h2 class="text text-center py-2">ไม่มีบทความในระบบ</h2>
    @endif
@endsection
