@extends('admin.layouts.app')
@section('title','Thêm thẻ')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Thẻ</a></li>
                        <li class="breadcrumb-item active">Thêm thẻ</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm thẻ</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Tên thẻ</label>
                            <p class="text-muted font-13">
                                Tên thẻ phải là duy nhất và không được vượt quá 32 kí tự.
                            </p>
                            <input required type="text" id="simpleinput" class="form-control" name="tag"
                                placeholder="Tên thẻ" maxlength="32">
                            @error('tag')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="text-center mb-3">
                                <button class="btn btn-success btn-sm">Thêm thẻ mới</button>
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