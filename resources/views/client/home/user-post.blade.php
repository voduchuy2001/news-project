@extends('client.layouts.app')
@section('title', $user->name)
@section('content')
<!-- Breadcrumb -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{route('client.home')}}" class="breadcrumb-item f1-s-3 cl9">
                Trang chủ
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                {{$user->name}}
            </span>
        </div>

        @include('client.home.search')
    </div>
</div>
<!-- Content -->
<section class="bg0 p-b-140 p-t-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-70">
                        <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                            Người dùng: {{$user->name}}
                        </h3>

                        <div class="flex-wr-s-s p-b-40">
                            <span class="f1-s-3 cl8 m-r-15">
                                <span>
                                    Tham gia: {{$user->created_at->diffforhumans()}}
                                </span>
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">-
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">
                                Số bài viết: {{$user->posts()->count()}}
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">-
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">
                                Số điện thoại:
                            </span>
                        </div>

                        <p class="f1-s-11 cl6 p-b-25">
                            {{$user->about_user}}
                        </p>
                        <!-- Social media -->
                        <div class="flex-s-s">
                            <div class="flex-wr-s-s size-w-0">
                                <a href="{{$user->facebook}}" target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-facebook-f m-r-7"></i>
                                    Facebook
                                </a>

                                <a href="mailto:{{$user->email}}"
                                    class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-google-plus-g m-r-7"></i>
                                    Google+
                                </a>

                                <a href="{{$user->instagram}}" target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-instagram m-r-7"></i>
                                    Instargram
                                </a>
                            </div>
                        </div>

                        <!-- Life Style  -->
                        <div class="p-b-25 m-r--10 m-r-0-sr991">
                            <div class="row p-t-35">
                                <div class="col-sm-12 p-r-50 p-r-15-sr991">
                                    <!-- Item post -->
                                    @if ($listPosts->count() > 0)
                                    @foreach ($listPosts as $listPost)
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="{{route('post.single',['slug' => $listPost->slug])}}"
                                            class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{$listPost->featured_image}}" alt="IMG">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="{{route('post.single',['slug' => $listPost->slug])}}"
                                                    class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{$listPost->title}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                                <a href="{{route('category.single',['slug' => $listPost->category->slug])}}"
                                                    class="f1-s-6 cl8 hov-cl10 trans-03">
                                                    {{$listPost->category->name}}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    {{$listPost->created_at->diffforhumans()}}
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="flex-wr-sb-s m-b-30">
                                        Không có bài viết nào
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$listPosts->links('client.layouts.pagination')}}
            </div>

            <!-- Sidebar -->
            @include('client.layouts.right-sidebar')
        </div>
    </div>
</section>
@endsection