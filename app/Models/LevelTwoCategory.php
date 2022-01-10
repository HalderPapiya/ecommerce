<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelTwoCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'level_two_categories';

   protected $fillable = [
      'name', 'status', 'parent_id'
   ];
   public function levelOneCategory()
   {
       return $this->belongsTo('App\Models\LevelOneCategory', 'parent_id', 'id');
   }
}
