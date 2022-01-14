<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'products';

   protected $fillable = [
    'category_level_one_id', 'category_level_two_id', 'category_level_three_id','category_level_four_id','category_level_five_id','brand_id','seller_id','name','description','status'
   ];
   public function levelOneCategory()
   {
       return $this->belongsTo('App\Models\LevelOneCategory', 'category_level_one_id', 'id');
   }
   public function levelTwoCategory()
   {
       return $this->belongsTo('App\Models\LevelTwoCategory', 'category_level_two_id', 'id');
   }
   public function levelThreeCategory()
   {
       return $this->belongsTo('App\Models\LevelThreeCategory', 'category_level_three_id', 'id');
   }
   public function levelFourCategory()
   {
       return $this->belongsTo('App\Models\LevelFourCategory', 'category_level_four_id', 'id');
   }
   public function levelFiveCategory()
   {
       return $this->belongsTo('App\Models\LevelFiveCategory', 'category_level_five_id', 'id');
   }
   public function brand()
   {
       return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
   }
   public function seller()
   {
       return $this->belongsTo('App\Models\Saller', 'seller_id', 'id');
   }
}