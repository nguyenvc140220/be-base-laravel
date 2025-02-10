<?php

namespace App\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
  // Define the table associated with the model
  protected $table = 'product_attribute_values';

  // Specify the primary key of the table
  protected $primaryKey = 'id';

  // Specify the attributes that are mass assignable
  protected $fillable = [
    'product_attribute_id', 'value'
  ];

  // Specify the attributes that should be hidden for arrays
  protected $hidden = [];
}