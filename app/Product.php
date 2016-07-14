<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','alias','price','intro','content','images','keywords','descriptions','userid','catid'];
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
