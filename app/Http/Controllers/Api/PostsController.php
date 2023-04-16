<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;

class PostsController extends Controller
{
    use DisablePagination,DisableAuthorization;
    protected $model = Post::class; // or "App\Models\Post"


}
