@extends('admin.layouts.app')
@section('title', 'Cập nhật thông tin cá nhân')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Cập nhật thông tin cá nhân</li>
                    </ol>
                </div>
                <h4 class="page-title">Cập nhật thông tin cá nhân</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Họ và tên</label>
                            <input required placeholder="Họ và tên" type="text" id="simpleinput" class="form-control"
                                name="name" value="{{$user->name}}">
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Liên kết Facebook</label>
                            <input placeholder="Liên kết Facebook" type="text" id="simpleinput" class="form-control"
                                name="facebook" value="{{$user->facebook}}">
                            @error('facebook')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Liên kết Instagram</label>
                            <input placeholder="Liên kết Instagram" type="text" id="simpleinput" class="form-control"
                                name="instagram" value="{{$user->instagram}}">
                            @error('instagram')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Số điện thoại</label>
                            <input min="10" placeholder="Số điện thoại" type="text" id="simpleinput"
                                class="form-control" name="phone_number" value="{{$user->phone_number}}">
                            @error('phone_number')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Giới thiệu</label>
                            <textarea placeholder="Giới thiệu" type="text" id="simpleinput" rows="5"
                                class="form-control" name="about_user">{{$user->about_user}}</textarea>
                            @error('about_user')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 form-group">
                            <div class="text-center mb-3">
                                <button class="btn btn-success btn-sm">Cập nhật thông tin</button>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
            </div> <!-- end preview-->
        </div>
    </form>
</div>
@endsection
