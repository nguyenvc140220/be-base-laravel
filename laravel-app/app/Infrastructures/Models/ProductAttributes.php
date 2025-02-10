<?php

namespace App\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
  // Define the table associated with the model
  protected $table = 'product_attributes';

  // Specify the primary key of the table
  protected $primaryKey = 'id';

  // Specify the attributes that are mass assignable
  protected $fillable = [
    'product_id', 'attribute_name', 'attribute_type', 'attribute_property', 'attribute_value'
  ];

  // Specify the attributes that should be hidden for arrays
  protected $hidden = [];

  public function values()
  {
    return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id', 'id');
  }


}