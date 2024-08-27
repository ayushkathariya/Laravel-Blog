<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardControlller;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\BlogTagController as AdminBlogTagController;

Route::middleware(['auth', 'verified', 'can:isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardControlller::class, 'index'])
            ->name('admin.dashboard');


        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('admin.users');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])
            ->name('admin.user-update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
            ->name('admin.user-destroy');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])
            ->name('admin.user-edit');



        Route::get('/tags', [AdminTagController::class, 'index'])
            ->name('admin.tags');
        Route::post('/tags', [AdminTagController::class, 'store'])
            ->name('admin.tag-store');
        Route::put('/tags/{tag}', [AdminTagController::class, 'update'])
            ->name('admin.tag-update');
        Route::delete('/tags/{tag}', [AdminTagController::class, 'destroy'])
            ->name('admin.tag-destroy');
        Route::get('/tags/create', [AdminTagController::class, 'create'])
            ->name('admin.tag-create');
        Route::get('/tags/{tag}/edit', [AdminTagController::class, 'edit'])
            ->name('admin.tag-edit');


        Route::get('/blogs', [AdminBlogController::class, 'index'])
            ->name('admin.blogs');
        Route::post('/blogs', [AdminBlogController::class, 'storeImage'])
            ->name('admin.blog-store');
        Route::post('/blogs/store', [AdminBlogController::class, 'store'])
            ->name('admin.blog-storeFile');
        Route::put('/blogs/{blog}', [AdminBlogController::class, 'update'])
            ->name('admin.blog-update');
        Route::post('/blogs/updateImage', [AdminBlogController::class, 'updateImage'])
            ->name('admin.blog-updateImg');
        Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])
            ->name('admin.blog-destroy');
        Route::get('/blogs/create', [AdminBlogController::class, 'create'])
            ->name('admin.blog-create');
        Route::get('/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])
            ->name('admin.blog-edit');


        Route::get('/blogtags', [AdminBlogTagController::class, 'index'])
            ->name('admin.blogtags');


        Route::get('/comments', [AdminCommentController::class, 'index'])
            ->name('admin.comments');
        Route::get('/comments/{comment}/edit', [AdminCommentController::class, 'edit'])
            ->name('admin.comment-edit');


        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('admin.categories');
        Route::post('/categories', [AdminCategoryController::class, 'store'])
            ->name('admin.category-store');
        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])
            ->name('admin.category-update');
        Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])
            ->name('admin.category-destroy');
        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])
            ->name('admin.category-edit');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])
            ->name('admin.category-create');
    });
});

