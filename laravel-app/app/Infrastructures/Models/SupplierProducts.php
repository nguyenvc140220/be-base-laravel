<?php

namespace App\Infrastructures\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SupplierProducts extends Model
{
  use HasFactory, Notifiable;

  // Define the table associated with the model
  protected $table = 'supplier_products';

  // Specify the primary key of the table
  protected $primaryKey = 'id';

  // Specify the attributes that are mass assignable
  protected $fillable = [
    'product_id', 'supplier_id', 'price', 'quantity'
  ];

  // Specify the attributes that should be hidden for arrays
  protected $hidden = [];

  public function products()
  {
    return $this->hasMany(Products::class, 'supplier_id', 'id');
  }
}