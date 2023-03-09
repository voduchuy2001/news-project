@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa danh mục ' . $category->name)
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Danh mục</a></li>
                        <li class="breadcrumb-item active">Cập nhật danh mục</li>
                    </ol>
                </div>
                <h4 class="page-title">Danh mục: {{ $category->name }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Tên danh mục</label>
                            <input type="text" id="simpleinput" class="form-control" name="name"
                                value="{{ $category->name }}">
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="text-center mb-3">
                                <button class="btn btn-success btn-sm">Cập nhật danh mục</button>
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