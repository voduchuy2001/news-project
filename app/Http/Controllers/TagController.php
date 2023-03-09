<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(10);

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag' => 'required|unique:tags',
        ], [
            'tag.required' => 'Vui lòng nhập tên thẻ.',
            'tag.unique' => 'Tên thẻ đã tồn tại. Vui lòng chọn một tên khác.',
        ]);

        $tag =  new Tag();
        $tag->tag = $request->tag;
        $tag->save();

        Session::flash('success', 'Thêm mới thẻ ' . $tag->tag . ' thành công.');
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
        $tag = Tag::findOrFail($id);

        return view('admin.tags.edit', compact('tag'));
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
            'tag' => 'required|unique:tags',
        ], [
            'tag.required' => 'Vui lòng nhập tên thẻ.',
            'tag.unique' => 'Tên thẻ đã tồn tại. Vui lòng chọn một tên khác.',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->tag = $request->tag;
        $tag->save();

        Session::flash('success', 'Cập nhật thẻ ' . $tag->tag . ' thành công.');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        if ($tag->posts->count() > 0) {
            Session::flash('error', 'Đã tồn tại bài viết liên quan đến thẻ. Vui lòng xóa các bài viết có liên quan trước.');

            return redirect()->back();
        } else {
            $tag->delete();

            Session::flash('success', 'Xóa thẻ ' . $tag->tag . ' thành công.');
            return redirect()->route('tag.index');
        }
    }
}
