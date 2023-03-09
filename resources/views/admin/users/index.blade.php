@extends('admin.layouts.app')
@section('title', 'Danh sách người dùng')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Danh mục</a></li>
                    <li class="breadcrumb-item active">Danh sách danh mục</li>
                </ol>
            </div>
            <h4 class="page-title">Danh sách danh mục</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="table-responsive mb-3">
    <table class="table table-hover table-centered mb-0 text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Địa chỉ email</th>
                <th>Số bài viết</th>
                <th>Cập nhật quyền truy cập</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count()>0)
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td class="table-user">
                    <img src="{{ $user->profile->avatar ?? 'uploads/users/avt.png' }}" alt="table-user"
                        class="me-2 rounded-circle" />
                    {{$user->name}}
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->posts()->count()}}</td>
                <td>
                    @if ($user->admin)
                    @if (Auth::id() !== $user->id)
                    <a href="{{route('user.notAdmin', ['id' => $user->id])}}"
                        class="btn btn-danger btn-sm badge badge-danger-lighten rounded-pill">Thu hồi
                        quyền ADMIN</a>
                    @endif
                    @else
                    <a href="{{route('user.admin', ['id' => $user->id])}}"
                        class="btn btn-success btn-sm badge badge-success-lighten rounded-pill">Cấp quyền
                        ADMIN</a>
                    @endif
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th class="text-center" colspan="10">Chưa có người dùng nào</th>
            </tr>
            @endif
        </tbody>
    </table>
</div>
{{$users->links('admin.layouts.pagination')}}
@endsection