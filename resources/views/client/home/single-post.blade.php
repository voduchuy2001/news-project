@extends('client.layouts.app')
@section('title', 'Chi tiết bài viết: ' .$post->title)
@section('content')
<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{route('client.home')}}" class="breadcrumb-item f1-s-3 cl9">
                Trang chủ
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                {{$post->title}}
            </span>
        </div>

        @include('client.home.search')
    </div>
</div>

<!-- Content -->
<section class="bg0 p-b-70 p-t-5">
    <!-- Title -->
    <div class="bg-img1 size-a-18 how-overlay1" style="background-image: url({{$post->featured_image}});">
        <div class="container h-full flex-col-e-c p-b-58">
            <a href="{{route('category.single',['slug' => $post->category->slug])}}"
                class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
                {{$post->category->name}}
            </a>

            <h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
                {{$post->title}}
            </h3>

            <div class="flex-wr-c-s">
                <span class="f1-s-3 cl8 m-rl-7 txt-center">
                    <a href="{{route('userPost.single', ['id' => $post->user->id])}}"
                        class="f1-s-4 cl8 hov-cl10 trans-03">
                        Được viết bởi: {{$post->user->name}}
                    </a>

                    <span class="m-rl-3"></span>

                    <span>
                        {{$post->created_at->diffForHumans()}}
                    </span>
                </span>

                <span class="f1-s-3 cl8 m-rl-7 txt-center">
                    Số lượt xem: {{$post->count_view}}
                </span>
            </div>
        </div>
    </div>

    <!-- Detail -->
    <div class="container p-t-82">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-50">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-70">
                        {!!$post->content!!}

                        <!-- Tag -->
                        <div class="flex-s-s p-t-12 p-b-15">
                            <span class="f1-s-12 cl5 m-r-8">
                                Thẻ:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                @foreach ($post->tags as $tag)
                                <a href="{{route('tag.single', ['id' => $tag->id])}}"
                                    class="f1-s-12 cl8 hov-link1 m-r-15">
                                    {{$tag->tag}}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-4 p-b-100">
                <div class="p-l-10 p-rl-0-sr991">
                    <!-- Related Post -->
                    <div class="size-h-3">
                        <h5 class="f1-m-7 cl0 text-dark">
                            Bài viết liên quan
                        </h5>
                    </div>

                    <ul>
                        @foreach ($relatedPosts as $relatedPost)
                        <li class="flex-wr-sb-s p-b-20">
                            <a href="{{route('post.single',['slug' => $relatedPost->slug])}}"
                                class="size-w-4 wrap-pic-w hov1 trans-03">
                                <img src="{{$relatedPost->featured_image}}" alt="IMG">
                            </a>

                            <div class="size-w-5">
                                <h6 class="p-b-5">
                                    <a href="{{route('post.single',['slug' => $relatedPost->slug])}}"
                                        class="f1-s-5 cl11 hov-cl10 trans-03">
                                        {{$relatedPost->title}}
                                    </a>
                                </h6>

                                <span class="f1-s-3 cl6">
                                    {{$relatedPost->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection