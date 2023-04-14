<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'body', 'user_id',
    ];

    // Add this method to retrieve the user associated with the post
    public function users(){
        return $this->hasOne(User::class);
    }

    public function getUsers(){
        return $this->users()->get();
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
