<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory,SoftDeletes;

     protected $table = 'images';

	protected $fillable = [
	   'image','product_id'
	];
	public function image()
    {
        return $this->hasMany('App\Models\Image','product_id','id');
    }
}