<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelFourCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'level_four_categories';

    protected $fillable = [
        'name', 'status', 'parent_id'
     ];
     public function levelThreeCategory()
     {
         return $this->belongsTo('App\Models\LevelThreeCategory', 'parent_id', 'id');
     }
}