<?php

use App\Infrastructures\Models\Suppliers;
use App\Infrastructures\Models\User;
use App\Infrastructures\Models\Products;
use App\Infrastructures\Models\Invoices;
use App\Infrastructures\Models\ProductAttributes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create product management table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_barcode');
            $table->string('product_sku');
            $table->string('description');
            $table->bigInteger('sell_price');
            $table->bigInteger('purchase_price');
            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained('users');
            $table->datetimes();
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Products::class, 'product_id')->nullable()->constrained('products');
            $table->string('attribute_name');
            $table->enum('attribute_type', ['text', 'number', 'date', 'boolean', 'select', 'multiselect']);
            $table->string('attribute_property');
            $table->string('attribute_value');
            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained('users');
            $table->datetimes();
        });

        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductAttributes::class, 'product_attribute_id')->nullable()->constrained('users');
            $table->string('value');
            $table->datetimes();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('address');
            $table->string('phone');
            $table->string('description');
            $table->datetimes();
        });

        Schema::create('supplier_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Products::class, 'product_id')->nullable()->constrained('products');
            $table->foreignIdFor(Suppliers::class, 'supplier_id')->nullable()->constrained('suppliers');
            $table->integer('price');
            $table->integer('quantity');
            $table->datetimes();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Products::class, 'product_id')->nullable()->constrained('products');
            $table->integer('number_of_products');
            $table->string('description');
            $table->datetimes();
        });

        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->enum('media_type', ['image', 'video', 'audio', 'document', 'link', 'other']);
            $table->string('media_name');
            $table->string('media_description');
            $table->string('media_size');
            $table->string('media');
            $table->integer('object_id');
            $table->enum('object_type', ['product', 'supplier', 'category']);
            $table->datetimes();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->nullable()->constrained('users');
            $table->bigInteger('total_amount');
            $table->bigInteger('discount_amount');
            $table->unsignedInteger('discount_percentage')->default(0);
            $table->datetimes();
        });

        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Products::class, 'product_id')->nullable()->constrained('products');
            $table->foreignIdFor(Invoices::class, 'invoice_id')->nullable()->constrained('invoices');
            $table->integer('quantity');
            $table->datetimes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
