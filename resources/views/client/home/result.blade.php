@extends('client.layouts.app')
@section('title', 'Kết quả tìm kiếm: '.$query)
@section('content')
<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{route('client.home')}}" class="breadcrumb-item f1-s-3 cl9">
                Trang chủ
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                Kết quả tìm kiếm: {{$query}}
            </span>
        </div>

        @include('client.home.search')
    </div>
</div>

<!-- Post -->
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-80">
                @if ($posts->count() > 0)
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                        <!-- Item latest -->
                        <div class="m-b-45">
                            <a href="{{route('post.single', ['slug' => $post->slug])}}"
                                class="wrap-pic-w hov1 trans-03">
                                <img src="{{$post->featured_image}}" alt="IMG">
                            </a>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="{{route('post.single', ['slug' => $post->slug])}}"
                                        class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{$post->title}}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    <a href="{{route('userPost.single', ['id' => $post->user->id])}}"
                                        class="f1-s-4 cl8 hov-cl10 trans-03">
                                        Được viết bởi: {{$post->user->name}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="row">
                    <h3 class="f1-m-2 cl3 tab01-title">Không tìm thấy kết quả nào chứa từ khóa "{{$query}}"</h3>
                </div>
                @endif
                {{$posts->links('client.layouts.pagination')}}
            </div>
            @include('client.layouts.right-sidebar')
        </div>
    </div>
</section>
@endsection