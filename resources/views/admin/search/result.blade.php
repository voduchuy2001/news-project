@extends('admin.layouts.app')
@section('title', 'Kết quả tìm kiếm')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">Bài viết</a></li>
                        <li class="breadcrumb-item active">Kết quả tìm kiếm: {{$query}}</li>
                    </ol>
                </div>
                <h4 class="page-title">Kết quả tìm kiếm: {{$query}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row mb-2">
        <div class="col-xl-8">
            <form action="admin/search/results"
                class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                <div class="col-auto">
                    <input type="search" class="form-control" name="query" placeholder="Tìm kiếm bài viết...">
                </div>
            </form>
        </div>
        <div class="col-xl-4">
            <div class="text-xl-end mt-xl-0 mt-2">
                <a href="{{ route('post.create') }}" class="text-white"><button class="btn btn-success sm"><i
                            class="uil-plus"></i> Thêm bài viết mới</button></a>
            </div>
        </div><!-- end col-->
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-centered mb-3 text-center">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Thẻ</th>
                    <th>Lượt xem</th>
                    <th>Trạng thái</th>
                    <th>Nổi bật</th>
                    <th>Tác giả</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count() > 0)
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{substr($post->title, 0, 25) }} ...</td>
                    <td>
                        <a class="badge bg-light text-dark rounded-pill"
                            href="{{ route('category.edit', $post->category->id) }}">{{$post->category->name}}
                        </a>
                    </td>
                    <td>
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tag.edit', ['id' => $tag->id]) }}"><span
                                class="badge badge-success-lighten rounded-pill">{{ $tag->tag }}</span></a>
                        @endforeach
                    </td>
                    <td class="text-center">{{$post->count_view}}</td>
                    <td>
                        @if ($post->status == 'published')
                        <a href="{{route('post.noPublished', ['id' => $post->id])}}"
                            class="btn btn-warning btn-sm badge badge-warning-lighten rounded-pill">Thu hồi</a>
                        @else
                        <a href="{{route('post.published', ['id' => $post->id])}}"
                            class="btn btn-success btn-sm badge badge-success-lighten rounded-pill">Duyệt</a>
                        @endif
                    </td>
                    <td>
                        @if ($post->featured_post == 'yes')
                        <a href="{{route('post.normalPost', ['id' => $post->id])}}"
                            class="btn btn-warning btn-sm badge badge-warning-lighten rounded-pill">Thu hồi</a>
                        @else
                        <a href="{{route('post.featuredPost', ['id' => $post->id])}}"
                            class="btn btn-success btn-sm badge badge-success-lighten rounded-pill">Duyệt</a>
                        @endif
                    </td>
                    <td>{{$post->user->name}}</td>
                    <td class="table-action">
                        @can('edit', $post)
                        <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="action-icon"><button
                                class="btn btn-warning btn-sm"><i class="uil-edit-alt"></i></button></a>
                        @endcan
                        @can('delete', $post)
                        <button class="btn btn-danger btn-sm" onclick="handleDeletePost({{$post->id}})"><i
                                class="uil-trash-alt"></i></button>
                        @endcan
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th class="text-center" colspan="10">Không tìm thấy kết quả của từ khóa "{{$query}}"</th>
                </tr>
                @endif
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletePostForm">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">Xác nhận xóa</h5>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <h5>Hãy chắc rằng bạn muốn xóa bài viết này? Dữ liệu sẽ không được khôi phục</h5>
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

    {{$posts->links('admin.layouts.pagination')}}
</div>
@endsection