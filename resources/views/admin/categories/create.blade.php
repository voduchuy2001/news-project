@extends('admin.layouts.app')
@section('title','Thêm danh mục')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Danh mục</a></li>
                        <li class="breadcrumb-item active">Thêm danh mục</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm danh mục</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Tên danh mục</label>
                            <p class="text-muted font-13">
                                Tên danh mục phải là duy nhất và không được vượt quá 32 kí tự.
                            </p>
                            <input type="text" id="simpleinput" class="form-control" name="name"
                                placeholder="Tên danh mục" maxlength="32" required>
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="text-center mb-3">
                                <button class="btn btn-success btn-sm">Thêm danh mục mới</button>
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