@extends('admin.layouts.app')
@section('title', 'Đổi mật khẩu')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Cập nhật mật khẩu</li>
                    </ol>
                </div>
                <h4 class="page-title">Cập nhật mật khẩu</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('user.updatePassword') }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu cũ</label>
            <input required placeholder="Mật khẩu cũ" type="password" id="password" class="form-control"
                name="old_password">
            @error('old_password')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới</label>
            <input required placeholder="Mật khẩu mới" type="password" id="password" class="form-control"
                name="password">
            @error('password')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận lại mât khẩu</label>
            <input required placeholder="Xác nhận mật khẩu" type="password" id="password_confirmation"
                class="form-control" name="password_confirmation">
        </div>

        <div class="mb-3 form-group">
            <div class="text-center mb-3">
                <button class="btn btn-success btn-sm">Cập nhật mật khẩu</button>
            </div>
        </div>
    </form>
</div>
@endsection