@extends('admin.layouts.app')
@section('title','Danh sách thẻ')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Thẻ</a></li>
                        <li class="breadcrumb-item active">Danh sách thẻ</li>
                    </ol>
                </div>
                <h4 class="page-title">Danh sách thẻ</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row mb-2">
        <div class="col-xl-12">
            <div class="text-xl-end mt-xl-0 mt-2">
                <a href="{{ route('tag.create') }}" class="text-white"><button class="btn btn-success sm"><i
                            class="uil-plus"></i> Thêm thẻ mới</button></a>
            </div>
        </div><!-- end col-->
    </div>

    <div class="table-responsive mb-3">
        <table class="table table-hover table-centered mb-0 text-center">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên thẻ</th>
                    <th>Số bài viết</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                @if ($tags->count()>0)
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->tag }}</td>
                    <td>{{ $tag->posts->count()}}</td>
                    <td class="table-action">
                        <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="action-icon"><button
                                class="btn btn-warning btn-sm"><i class="uil-edit-alt"></i></button></a>

                        <button class="btn btn-danger btn-sm" onclick="handleDeleteTag({{$tag->id}})"><i
                                class="uil-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th class="text-center" colspan="4">Chưa có thẻ nào được thêm</th>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{$tags->links('admin.layouts.pagination')}}

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" id="deleteTagForm">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">Xác nhận xóa</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <h5>Hãy chắc rằng bạn muốn xóa thẻ này?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger">Có, tôi muốn xóa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection