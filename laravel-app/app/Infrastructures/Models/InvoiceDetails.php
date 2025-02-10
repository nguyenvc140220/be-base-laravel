<?php

namespace App\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
  // Define the table associated with the model
  protected $table = 'invoice_details';

  // Define the attributes that are mass assignable
  protected $fillable = [
    'invoice_id',
    'product_id',
    'quantity',
    'price',
    'total'
  ];

  // Define any relationships with other models
  public function invoice()
  {
    return $this->belongsTo(Invoices::class);
  }

  public function product()
  {
    return $this->belongsTo(Products::class);
  }
}