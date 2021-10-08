<?php

namespace App\Models;

use App\Mail\PostCreated;
use App\Mail\PostDeleted;
use App\Mail\PostStored;
use App\Mail\PostUpdated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        // static::created(function ($post) {
        //     Mail::to('alice@gmail.com')->send(new PostStored($post));
        // });
        static::updated(function ($post) {
            Mail::to('alice@gmail.com')->send(new PostUpdated($post));
        });
        static::deleted(function ($post) {
            Mail::to('alice@gmail.com')->send(new PostDeleted($post));
        });
    }
}
