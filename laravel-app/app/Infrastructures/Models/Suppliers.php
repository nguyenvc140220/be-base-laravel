<?php

namespace App\Infrastructures\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
  use HasFactory, Notifiable;

  // Define the table associated with the model
  protected $table = 'suppliers';

  // Specify the primary key of the table
  protected $primaryKey = 'id';

  // Specify the attributes that are mass assignable
  protected $fillable = [
    'supplier_name', 'address', 'phone', 'description', 'created_at', 'updated_at'
  ];

  // Specify the attributes that should be hidden for arrays
  protected $hidden = [];

  public function products()
  {
    return $this->hasMany(Products::class, 'supplier_id', 'id');
  }
}