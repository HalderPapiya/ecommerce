<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory,SoftDeletes;

     protected $table = 'categories';

	protected $fillable = [
	  'coupon_code', 'title', 'status', 'description','expiry_date', 'amount', 'type'
	];
}