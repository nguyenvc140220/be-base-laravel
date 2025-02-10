<?php

namespace App\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
  // Define the table associated with the model
  protected $table = 'invoices';

  // Define the attributes that are mass assignable
  protected $fillable = ['user_id', 'total_amount', 'discount_amount', 'discount_percentage'];

  // Define any relationships with other models
  public function products()
  {
    return $this->hasMany(Products::class);
  }

  public function invoice_details()
  {
    return $this->hasMany(InvoiceDetails::class);
  }
}