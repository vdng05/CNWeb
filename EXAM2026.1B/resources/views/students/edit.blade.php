@extends('layouts.app')

@section('content')
    <h1>Sửa thông tin học sinh</h1>
    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="full_name">Họ và tên</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $student->full_name }}" required>
            @error('full_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="student_id">Mã học sinh</label>
            <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $student->student_id }}" required>
            @error('student_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $student->phone }}" required >
            @error('phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="school_id">Tên trường học</label>
            <select name="school_id" id="school_id" class="form-control" required>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ $student->school_id == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection