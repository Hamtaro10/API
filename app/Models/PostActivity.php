<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostActivity extends Model
{
    protected $table = 'post_activities';


    protected $fillable = ['post_id','ip','userAgent','created_at','updated_at'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
