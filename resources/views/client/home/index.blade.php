@extends('client.layouts.app')
@section('title', 'Trang chủ')
@section('content')
<!-- Breadcrumb -->
<div class="container">
	<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
		<div class="f2-s-1 p-r-30 m-tb-6">
			<a href="{{route('client.home')}}" class="breadcrumb-item f1-s-3 cl9">
				Trang chủ
			</a>
		</div>

		@include('client.home.search')
	</div>
</div>

<!-- Feature post -->
<section class="bg0 p-t-10">
	<div class="row m-rl-0 justify-content-center">
		@if ($featuredPosts->count() > 0)
		@foreach ($featuredPosts as $featuredPost)
		<div class="col-md-4 p-rl-1 p-b-2">
			<div class="bg-img1 size-a-11 how1 pos-relative"
				style="background-image: url({{$featuredPost->featured_image}});">
				<a href="{{route('post.single',['slug' => $featuredPost->slug])}}"
					class="dis-block how1-child1 trans-03"></a>

				<div class="flex-col-e-s s-full p-rl-25 p-tb-18">
					<a href="{{route('category.single',['slug' => $featuredPost->category->slug])}}"
						class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
						{{$featuredPost->category->name}}
					</a>

					<h3 class="how1-child2 m-t-14 m-b-10">
						<a href="{{route('post.single',['slug' => $featuredPost->slug])}}"
							class="f1-l-1 cl0 hov-cl10 trans-03 respon1">
							{{$featuredPost->title}}
						</a>
					</h3>
				</div>
			</div>
		</div>
		@endforeach
		@else
		@endif
	</div>
</section>

<!-- Post -->
<section class="bg0 p-t-50 p-b-25">
	<div class="container">
		<h2 class="f1-l-1 cl2 mb-5 mt-0">
			Bài viết mới nhất
		</h2>
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-8 p-b-80">
				<div class="row">
					<div class="col-sm-6 p-r-25 p-r-15-sr991">
						<!-- Item -->
						@if ($postsCol1->count() > 0)
						@foreach ($postsCol1 as $postCol1)
						<div class="p-b-53">
							<a href="{{route('post.single',['slug' => $postCol1->slug])}}"
								class="wrap-pic-w hov1 trans-03">
								<img src="{{$postCol1->featured_image}}" alt="IMG">
							</a>

							<div class="flex-col-s-c p-t-16">
								<h5 class="p-b-5 txt-center">
									<a href="{{route('post.single',['slug' => $postCol1->slug])}}"
										class="f1-m-3 cl2 hov-cl10 trans-03">
										{{$postCol1->title}}
									</a>
								</h5>

								<div class="cl8 txt-center p-b-17">
									<a href="{{route('userPost.single', ['id' => $postCol1->user->id])}}"
										class="f1-s-4 cl8 hov-cl10 trans-03">
										Được viết bởi: {{$postCol1->user->name}}
									</a>

									<span class="f1-s-3 m-rl-3">
										-
									</span>

									<span class="f1-s-3">
										{{$postCol1->created_at->diffForHumans()}}
									</span>
								</div>

								<a href="{{route('post.single',['slug' => $postCol1->slug])}}"
									class="f1-s-1 cl9 hov-cl10 trans-03">
									Đọc thêm
									<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
								</a>
							</div>
						</div>
						@endforeach
						@endif
					</div>

					<div class="col-sm-6 p-r-25 p-r-15-sr991">
						<!-- Item -->
						@if ($postsCol2->count() > 0)
						@foreach ($postsCol2 as $postCol2)
						<div class="p-b-53">
							<a href="{{route('post.single',['slug' => $postCol2->slug])}}"
								class="wrap-pic-w hov1 trans-03">
								<img src="{{$postCol2->featured_image}}" alt="IMG">
							</a>

							<div class="flex-col-s-c p-t-16">
								<h5 class="p-b-5 txt-center">
									<a href="{{route('post.single',['slug' => $postCol2->slug])}}"
										class="f1-m-3 cl2 hov-cl10 trans-03">
										{{$postCol2->title}}
									</a>
								</h5>

								<div class="cl8 txt-center p-b-17">
									<a href="{{route('userPost.single', ['id' => $postCol2->user->id])}}"
										class="f1-s-4 cl8 hov-cl10 trans-03">
										Được viết bởi: {{$postCol2->user->name}}
									</a>

									<span class="f1-s-3 m-rl-3">
										-
									</span>

									<span class="f1-s-3">
										{{$postCol2->created_at->diffForHumans()}}
									</span>
								</div>

								<a href="{{route('post.single',['slug' => $postCol2->slug])}}"
									class="f1-s-1 cl9 hov-cl10 trans-03">
									Đọc thêm
									<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
								</a>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>

			@include('client.layouts.right-sidebar')
		</div>
	</div>
</section>
@endsection