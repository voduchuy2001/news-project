<div class="col-md-10 col-lg-4">
    <div class="p-l-10 p-rl-0-sr991 p-b-20">
        <!-- Category -->
        <div class="p-b-60">
            <div class="how2 how2-cl4 flex-s-c">
                <h3 class="f1-m-2 cl3 tab01-title">
                    Danh mục
                </h3>
            </div>

            <ul class="p-t-35">
                @if ($categories->count() > 0)
                @foreach ($categories as $category)
                <li class="how-bor3 p-rl-4">
                    <a href="{{route('category.single', ['slug' => $category->slug])}}"
                        class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <!-- Tag -->
        <div class="p-b-55">
            <div class="how2 how2-cl4 flex-s-c m-b-30">
                <h3 class="f1-m-2 cl3 tab01-title">
                    Thẻ
                </h3>
            </div>

            <div class="flex-wr-s-s m-rl--5">
                @if ($tags->count() > 0)
                @foreach ($tags as $tag)
                <a href="{{route('tag.single', ['id'=>$tag->id])}}"
                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                    {{$tag->tag}}
                </a>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>