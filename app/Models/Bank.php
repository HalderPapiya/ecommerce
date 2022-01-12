<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bank extends Model
{
   
    use HasFactory,SoftDeletes;

     protected $table = 'bank_details';

	protected $fillable = [
	   'user_id','type','bank_name','beneficiary_name', 'IFSC', 'branch_name', 'acount_no', 'status'
	];
}