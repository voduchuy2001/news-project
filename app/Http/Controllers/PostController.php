<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function listNoPublished()
    {
        $listPostNoPublished = Post::orderBy('id', 'desc')->where('status', 'no_published')->paginate(10);

        return view("admin.posts.list-post-nopublished", compact('listPostNoPublished'));
    }

    public function userPost()
    {
        $user_id = Auth::user()->id;
        $posts = Post::orderBy('id', 'desc')->where('user_id', $user_id)->paginate(10);

        return view('admin.posts.user-post', compact('posts'));
    }

    public function published($id)
    {
        $post = Post::findOrFail($id);

        $post->status = 'published';
        $post->save();

        Session::flash('success', 'Cho phép bài viết ' . $post->title . ' xuất bản.');
        return redirect()->back();
    }

    public function noPublished($id)
    {
        $post = Post::findOrFail($id);

        $post->status = 'no_published';
        $post->save();

        Session::flash('success', 'Không cho phép bài viết ' . $post->title . ' xuất bản.');
        return redirect()->back();
    }

    public function featuredPost($id)
    {
        $post = Post::findOrFail($id);
        $post->featured_post = 'yes';
        $post->save();

        Session::flash('success', 'Đặt bài viết ' . $post->title . ' làm nổi bật.');
        return redirect()->back();
    }

    public function normalPost($id)
    {
        $post = Post::findOrFail($id);

        $post->featured_post = 'no';
        $post->save();

        Session::flash('success', 'Thu hồi bài viết ' . $post->title . ' không làm nổi bật.');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->count() == 0 || $tags->count() == 0) {
            Session::flash('info', 'Vui lòng thêm DANH MỤC và THẺ trước khi thêm bài viết.');

            return redirect()->back();
        }

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'required|image',
            'category_id' => 'required',
            'tags' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'tags.required' => 'Vui lòng chọn các thẻ.',
            'featured_image.image' => 'Ảnh được chấp nhận dạng jpeg,jpg,png,gif.',
            'featured_image.required' => 'Vui lòng chọn ảnh nổi bật.',
            'category_id.required' => 'Vui lòng chọn 1 danh mục cho bài viết.',
        ]);

        $featured_image = $request->featured_image;
        $featured_image_new_name = time() . $featured_image->getClientOriginalName();
        $featured_image->move('uploads/posts/', $featured_image_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => 'uploads/posts/' . $featured_image_new_name,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title) . '-' . Str::random(40),
        ]);

        if ($request->status == 'published') {
            $post->status = 'published';
        } else {
            $post->status = 'no_published';
        }

        if ($request->featured_post == 'yes') {
            $post->featured_post = 'yes';
        } else {
            $post->featured_post = 'no';
        }

        $post->tags()->attach($request->tags);
        $post->save();

        Session::flash('success', 'Thêm bài viết ' . $post->title . ' mới thành công.');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        $this->authorize('edit', $post);

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'image',
            'category_id' => 'required',
            'tags' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'tags.required' => 'Vui lòng chọn các thẻ.',
            'featured_image.image' => 'Ảnh được chấp nhận dạng jpeg,jpg,png,gif.',
            'category_id.required' => 'Vui lòng chọn 1 danh mục cho bài viết.',
        ]);

        $post = Post::findOrFail($id);

        $oldFeatured = $post->featured_image;
        // Update new image path
        if ($request->featured_image != '') {
            File::delete($post->featured_image);
            $featured_image = $request->featured_image;
            $featured_image_new_name = time() . $featured_image->getClientOriginalName();
            $featured_image->move('uploads/posts/', $featured_image_new_name);

            $post->featured_image = 'uploads/posts/' . $featured_image_new_name;
        } else {
            $post->featured_image = $oldFeatured;
        }

        if ($request->status == 'published') {
            $post->status = 'published';
        } else {
            $post->status = 'no_published';
        }

        if ($request->featured_post == 'yes') {
            $post->featured_post = 'yes';
        } else {
            $post->featured_post = 'no';
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($request->title) . '-' . Str::random(40);
        
        $post->tags()->sync($request->tags);

        $post->save();
        Session::flash('success', 'Cập nhật bài viết ' . $post->title . ' thành công.');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        File::delete($post->featured_image);
        $post->delete();

        Session::flash('success', 'Xóa bài viết ' . $post->title . ' thành công.');
        return redirect()->back();
    }

    public function uploadPhoto(Request $request)
    {
        $original_name = $request->upload->getClientOriginalName();
        $filename_org = pathinfo($original_name, PATHINFO_FILENAME);
        $ext = $request->upload->getClientOriginalExtension();
        $filename = $filename_org . '_' . time() . '.' . $ext;
        $request->upload->move(('uploads/posts/'), $filename);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('uploads/posts/' . $filename);
        $message = "Ảnh của bạn đã được tải lên server thành công!";

        $response = "<script>
                        window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, `$url`, `$message`)
                    </script>";
        @header("Content-Type: text/html; charset=utf-8");

        echo $response;
    }
}
