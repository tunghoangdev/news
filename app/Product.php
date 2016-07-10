<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['pro_name','pro_alias','pro_price','pro_intro','pro_content','pro_images','pro_keywords','pro_descriptions','pro_userid','pro_catid'];
    public  $timestamps = false;
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function pimage(){
        return $this->hasMany('App\Product_imgages');
    }
}
