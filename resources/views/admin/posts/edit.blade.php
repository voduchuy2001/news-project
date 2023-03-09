@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa bài viết: ' . $post->title)
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">Bài viết</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                    </ol>
                </div>
                <h4 class="page-title">Bài viết: {{ $post->title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Tiêu đề</label>
                            <input type="text" id="simpleinput" class="form-control" name="title"
                                value="{{ $post->title }}">
                            @error('title')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="editor" class="form-label">Chọn ảnh nổi bật</label>
                            <p class="text-muted font-13">
                                Ảnh được chọn phải có dạng jpeg,jpg,png,gif.
                            </p>
                            <div class="form-file-group">
                                <input type="file" name="featured_image" value="{{$post->featured_image}}"
                                    style="display: none" id="file-upload" onchange="previewFile(this)">
                                <p onclick="document.querySelector('#file-upload').click()">
                                    Nhấn vào đây để chọn ảnh tải lên.
                                </p>
                            </div>
                            <div id="previewBox" style="display: none" class="text-center">
                                <img src="{{$post->featured_image}}" id="previewImg" class="img-fluid rounded">
                                <i class="uil-trash-alt text-danger" style="cursor: pointer"
                                    onclick="removePreview()">Xóa ảnh</i>
                            </div>

                            @error('featured_image')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="editor" class="form-label">Nội dung bài viết</label>
                            <textarea class="form-control" id="editor" rows="5"
                                name="content">{{ $post->content }}</textarea>
                            @error('content')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="form-select" class="form-label">Chọn danh mục bài viết</label>
                            <select class="form-select selecte2 mb-3" data-toggle="select2" name="category_id"
                                id="category">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($post->category->id == $category->id)
                                    selected
                                    @endif
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 form-group">
                            <label for="tags">Danh sách thẻ</label>
                            <select name="tags[]" id="tags" class="form-control select2 select2-multiple"
                                data-toggle="select2" multiple="multiple">
                                @foreach ($tags as $tag)
                                <option value="{{$tag->id}}" @foreach ($post->tags as $t)
                                    @if ($tag->id == $t->id)
                                    selected
                                    @endif
                                    @endforeach

                                    >{{$tag->tag}}</option>
                                @endforeach
                            </select>

                            @error('tags')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        @if (Auth::user()->admin == 1)
                        <div class="mb-3">
                            <label for="form-check" class="form-label">Chọn trạng thái cho bài viết</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="satus_yes" name="status"
                                    value="published" @if ($post->status === 'published')
                                checked
                                @endif>
                                <label class="form-check-label" for="satus_yes">Công bố</label>
                            </div>
                        </div>
                        @endif

                        @if (Auth::user()->admin == 1)
                        <div class="mb-3">
                            <label for="form-check" class="form-label">Bài viết nổi bật</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="satus_yess" name="featured_post"
                                    value="yes" @if ($post->featured_post === 'yes')
                                checked
                                @endif>
                                <label class="form-check-label" for="satus_yess">Chọn làm nổi bật</label>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="text-center mb-3">
                                <button class="btn btn-success btn-sm">Cập nhật bài viết</button>
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

@section('scripts')
<!-- CKEditor-->
<script src="ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('content', {
            filebrowserUploadUrl:"{{route('post.upload', ['_token'=>csrf_token()])}}",
            filebrowserUploadMethod:"form"
        });

    $(document).ready(function () {
        let url = "{{$post->featured_image}}";
        if (url !== "") {
            $("#previewBox").css('display', 'block');
            $(".form-file-group").css('display', 'none');
        }
    });

    function previewFile(input){
        let file = $("input[type=file]").get(0).files[0];
        if(file){
            let reader = new FileReader();
            reader.onload = function (){
                $("#previewImg").attr('src', reader.result);
                $("#previewBox").css('display', 'block');
            }
            $(".form-file-group").css('display', 'none');
            reader.readAsDataURL(file);
        }
    }
    function removePreview(){
        $("#previewImg").attr('src',"");
        $("#previewBox").css('display', 'none');
        $(".form-file-group").css('display', 'block');
    }
</script>
@endsection