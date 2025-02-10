<?php

namespace App\Infrastructures\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  use HasFactory, Notifiable;

  // Define the table associated with the model
  protected $table = 'products';

  // Specify the primary key of the table
  protected $primaryKey = 'id';

  // Specify the attributes that are mass assignable
  protected $fillable = [
    'product_name', 'product_barcode', 'product_sku', 'description', 'created_by'
  ];

  // Specify the attributes that should be hidden for arrays
  protected $hidden = [];

  public function supplier()
  {
    return $this->belongsTo(Suppliers::class, 'supplier_id', 'id');
  }

  public function productAttributes()
  {
    return $this->hasMany(ProductAttributes::class, 'product_id', 'id');
  }

  public function category()
  {
    return $this->belongsTo(Categories::class, 'category_id', 'id');
  }
}