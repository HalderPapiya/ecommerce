<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelOneCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'level_one_categories';

   protected $fillable = [
      'name', 'status'
   ];
}
