<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::orderBy('created_at', 'desc')
            ->where('status', 'published')
            ->where('featured_post', 'yes')->take(3)->get();

        $postsCol1 = Post::orderBy('created_at', 'desc')
            ->where('status', 'published')->take(5)->get();

        $postsCol2 = Post::orderBy('created_at', 'desc')
            ->where('status', 'published')->skip(5)->take(5)->get();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $settings = Setting::first();

        return view('client.home.index', compact('featuredPosts', 'postsCol1', 'postsCol2', 'tags', 'categories', 'settings'));
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('count_view');
        $settings = Setting::first();
        $relatedPosts = Post::orderBy('created_at', 'desc')
            ->where('category_id', '=', $post->category->id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->take(8)
            ->get();

        return view('client.home.single-post', compact('post', 'settings', 'relatedPosts'));
    }

    public function category($slug)
    {
        $settings = Setting::first();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('created_at', 'desc')->where('status', 'published')->paginate(10);

        return view('client.home.category', compact('category', 'categories', 'tags', 'settings', 'posts'));
    }

    public function tag($id)
    {
        $settings = Setting::first();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $tag = Tag::findOrFail($id);
        $posts = $tag->posts()->orderBy('created_at', 'desc')->where('status', 'published')->paginate(10);

        return view('client.home.tag', compact('tag', 'categories', 'tags', 'settings', 'posts'));
    }

    public function userPost($id)
    {
        $settings = Setting::first();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $user = User::findOrFail($id);
        $listPosts = $user->posts()->orderBy('created_at', 'desc')->where('user_id', $id)->where('status', 'published')->paginate(10);

        return view('client.home.user-post', compact('settings', 'tags', 'categories', 'user', 'listPosts'));
    }
}
