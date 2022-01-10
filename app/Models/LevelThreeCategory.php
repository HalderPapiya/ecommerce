<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LevelThreeCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'level_three_categories';

    protected $fillable = [
        'name', 'status', 'parent_id'
     ];
     public function levelTwoCategory()
     {
         return $this->belongsTo('App\Models\LevelTwoCategory', 'parent_id', 'id');
     }
}