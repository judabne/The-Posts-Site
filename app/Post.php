<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }

    public function firstCharacters(){
        $text = $this->description;
        $text= Str::limit($text, 160, ' ...');
        return $text;
    }
}

