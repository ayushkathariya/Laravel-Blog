<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $blogs_count = Blog::count();
        $categories_count = Category::count();
        $comments_count = Comment::count();
        $tags_count = Tag::count();
        $blogtags_count = BlogTag::count();

        return view(
            'admin.dashboard',
            compact([
                'users_count',
                'blogs_count',
                'categories_count',
                'comments_count',
                'tags_count',
                'blogtags_count'
            ])
        );

    }
}
