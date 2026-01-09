@extends('layouts.app')

@section('content')
    <h1>Danh sách học sinh</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Thêm học sinh mới</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Mã học sinh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tên trường học</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->school->name }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links('pagination::bootstrap-5') }}
@endsection