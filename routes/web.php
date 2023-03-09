<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Client 
Route::get('/', [ClientHomeController::class, 'index'])->name('client.home');
Route::get('/bai-viet/{slug}', [ClientHomeController::class, 'singlePost'])->name('post.single');
Route::get('/danh-muc/{slug}', [ClientHomeController::class, 'category'])->name('category.single');
Route::get('/the/{id}', [ClientHomeController::class, 'tag'])->name('tag.single');
Route::get('/nguoi-dung/{id}', [ClientHomeController::class, 'userPost'])->name('userPost.single');
Route::get('/ket-qua', function () {
    $settings = Setting::first();
    $categories = Category::all();
    $tags = Tag::all();
    $posts = Post::orderBy('created_at', 'desc')->where('title', 'like', '%' . request('query') . '%')
        ->where('status', 'published')->paginate(10);

    return view('client.home.result', compact('settings', 'posts', 'categories', 'tags'))->with('query', request('query'));
});


// Auth
Auth::routes();

// Admin 
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');

    // Post 
    Route::prefix('post')->controller(PostController::class)->name('post.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('admin');
        Route::get('/user-post', 'userPost')->name('userPost');

        Route::post('/store', 'store')->name('store');
        Route::post('/upload', 'uploadPhoto')->name('upload');
        Route::get('/create', 'create')->name('create');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');

        Route::get('/published/{id}', 'published')->name('published')->middleware('admin');
        Route::get('/no-published/{id}', 'noPublished')->name('noPublished')->middleware('admin');
        Route::get('/list-nopublished', 'listNoPublished')->name('listNoPublished')->middleware('admin');

        Route::get('/featured-post/{id}', 'featuredPost')->name('featuredPost')->middleware('admin');
        Route::get('/normal-post/{id}', 'normalPost')->name('normalPost')->middleware('admin');

        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    // Category
    Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');

        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    // Tag
    Route::prefix('tag')->controller(TagController::class)->name('tag.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');

        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    // User
    Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('admin');

        Route::get('/admin/{id}', 'admin')->name('admin')->middleware('admin');
        Route::get('/not-admin/{id}', 'notAdmin')->name('notAdmin')->middleware('admin');

        Route::get('/change-profile', 'changeProfile')->name('changeProfile');
        Route::put('/change-profile/update-profile', 'updateProfile')->name('updateProfile');

        Route::get('/change-password', 'changePassword')->name('changePassword');
        Route::put('/change-profile/update-password', 'updatePassword')->name('updatePassword');
    });

    // Setting
    Route::prefix('setting')->controller(SettingController::class)->name('setting.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update', 'update')->name('update');
    });

    // Search
    Route::get('/search/results', function () {
        $posts = Post::orderBy('created_at', 'desc')->where('title', 'like', '%' . request('query') . '%')
            ->paginate(10);

        return view('admin.search.result', compact('posts'))->with('query', request('query'));
    });

    Route::get('/search/results-user', function () {
        $userId = Auth::user()->id;

        $posts = Post::orderBy('created_at', 'desc')->where('title', 'like', '%' . request('query') . '%')
            ->where('user_id', '=', $userId)
            ->paginate(10);

        return view('admin.search.result-user', compact('posts'))->with('query', request('query'));
    });
});
