<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = ['id'];

    public function formattedDate() : Attribute {
        return Attribute::make(
            get: fn () => Carbon::parse($this->created_at)->format('Y-m-d')
        );
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
