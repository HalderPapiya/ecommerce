<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saller extends Model
{
    use HasFactory,SoftDeletes;

     protected $table = 'saller_managementes';

	protected $fillable = [
	   'name', 'email','phone','status'
	];
}