<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = 'comment_id';
    public $timestamps = false;
    protected $connection = '';
    protected $fillable = [
        'comment_id',
        'post_id',
        'user_id',
        'url_img',
        'content'
    ];
    public function post(){
        return $this->belongsTo('App\Post','post_id');
    }
}
