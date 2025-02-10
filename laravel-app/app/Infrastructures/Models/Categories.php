<?php

namespace App\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  // Define the table associated with the model
  protected $table = 'categories';

  // Define the attributes that are mass assignable
  protected $fillable = ['product_id', 'number_of_products', 'description'];

  // Define any relationships with other models
  public function products()
  {
    return $this->hasMany(Products::class);
  }
}