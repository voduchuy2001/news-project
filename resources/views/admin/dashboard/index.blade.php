@extends('admin.layouts.app')
@section('title', 'Trang thống kê')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Trang thống kê</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- start row -->
    <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="uil-users-alt" style="font-size: 24px;"></i>
                                    <h3><span>{{$users->count()}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số tài khoản</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="uil-user-check" style="font-size: 24px;"></i>
                                    <h3><span>{{$users->where('admin', '=', '1')->count()}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số tài khoản quản trị</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="uil-user" style="font-size: 24px;"></i>
                                    <h3><span>{{$users->where('admin', '0')->count()}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số tài khoản bình thường</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="uil-eye" style="font-size: 24px;"></i>
                                    <h3><span>{{$posts->sum('count_view')}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số lượt xem bài viết</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-box-->

            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="row g-0">


                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="uil-bookmark" style="font-size: 24px;"></i>
                                    <h3><span>{{$categories->count()}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số danh mục</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="uil-tag-alt" style="font-size: 24px;"></i>
                                    <h3><span>{{$tags->count()}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số thẻ</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="uil-book" style="font-size: 24px;"></i>
                                    <h3><span>{{$posts->count()}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số bài viết</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="uil-file-times" style="font-size: 24px;"></i>
                                    <h3><span>{{$posts->where('status', 'no_published')->count()}}</span></h3>
                                    <p class="text-muted font-15 mb-0">Tổng số bài viết chưa duyệt</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
</div>
@endsection