<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'integer|required',
        'title' => 'required',
        'content' => 'required'
    );

    public function getData()
    {
        return $this->id . ': ' . $this->title;
    }
}
