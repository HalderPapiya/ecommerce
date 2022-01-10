<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelFiveCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'level_five_categories';

    protected $fillable = [
        'name', 'status', 'parent_id'
     ];
     public function levelFourCategory()
     {
         return $this->belongsTo('App\Models\LevelFourCategory', 'parent_id', 'id');
     }
}