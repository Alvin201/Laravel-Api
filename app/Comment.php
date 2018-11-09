<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array('author','text');
    public $timestamps  = false;
    public $table = 'comments';
    protected $primaryKey = 'id';
}
