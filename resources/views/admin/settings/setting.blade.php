@extends('admin.layouts.app')
@section('title', 'Cài đặt trang')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa thông tin trang</li>
                    </ol>
                </div>
                <h4 class="page-title">Chỉnh sửa thông tin trang</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="editor" class="form-label">Logo website</label>
            <p class="text-muted font-13">
                Ảnh được chọn phải có dạng jpeg,jpg,png,gif.
            </p>
            <div class="form-file-group">
                <input type="file" name="logo" value="{{$settings->logo}}" style="display: none" id="file-upload"
                    onchange="previewFile(this)">
                <p onclick="document.querySelector('#file-upload').click()">
                    Nhấn vào đây để chọn ảnh tải lên.
                </p>
            </div>
            <div id="previewBox" style="display: none" class="text-center">
                <img src="{{$settings->logo}}" id="previewImg" class="img-fluid rounded">
                <i class="uil-trash-alt text-danger" style="cursor: pointer" onclick="removePreview()">Xóa ảnh</i>
            </div>

            @error('logo')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Liên kết Facebook</label>
            <input placeholder="Liên kết Facebook" type="text" id="simpleinput" class="form-control"
                name="facebook_contact" value="{{$settings->facebook_contact}}">
            @error('facebook_contact')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Liên kết Instagram</label>
            <input placeholder="Liên kết Instagram" type="text" id="simpleinput" class="form-control"
                name="instagram_contact" value="{{$settings->instagram_contact}}">
            @error('instagram_contact')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Liên kết Youtube</label>
            <input placeholder="Liên kết Youtube" type="text" id="simpleinput" class="form-control"
                name="youtube_channel" value="{{$settings->youtube_channel}}">
            @error('youtube_channel')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Số điện thoại</label>
            <p class="text-muted font-13">
                Số điện thoại bắt đầu bằng 0 bao gồm 10 chữ số.
            </p>
            <input placeholder="Số điện thoại bắt đầu bằng 0 bao gồm 10 chữ số" pattern="(\+84|0)\d{9}" type="text"
                id="simpleinput" class="form-control" name="phone" value="{{$settings->phone}}">
            @error('phone')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Địa chỉ email</label>
            <input placeholder="Địa chỉ email" type="email" id="simpleinput" class="form-control" name="email"
                value="{{$settings->email}}">
            @error('email')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="about" class="form-label">Địa chỉ liên hệ - Thông tin liên quan</label>
            <p class="text-muted font-13">
                Mô tả ngắn về địa chỉ, khu vực, xã/phường/thị trấn, quận/huyện, tỉnh/thành phố.
            </p>
            <textarea type="text" id="about" class="form-control" name="about">{{$settings->about}}</textarea>
            @error('about')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <div class="text-center mb-3">
                <button class="btn btn-success btn-sm">Cập nhật thông tin</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<!-- CKEditor-->
<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('about');

    $(document).ready(function () {
        let url = "{{$settings->logo}}";
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