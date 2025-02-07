<?php

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
            $table->string('created_by');
            $table->datetimes();
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('attribute_name');
            $table->string('attribute_type');
            $table->string('attribute_property');
            $table->string('attribute_value');
            $table->datetimes();
        });

        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->string('product_attribute_id');
            $table->string('attribute_value');
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
            $table->integer('product_id');
            $table->integer('supplier_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->datetimes();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('supplier_id');
            $table->integer('number_of_products');
            $table->string('description');
            $table->datetimes();
        });

        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('media_type');
            $table->string('media_name');
            $table->string('media_description');
            $table->string('media_url');
            $table->string('media_size');
            $table->string('media');
            $table->integer('object_id');
            $table->string('object_type');
            $table->datetimes();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('supplier_id');
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
