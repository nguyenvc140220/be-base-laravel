<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Infrastructures\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'test@admin.com',
            'role' => UserRoleEnum::Admin->value,
            'password' => bcrypt('password')
        ]);
        User::factory()->create([
            'email' => 'test@example.com',
            'role' => UserRoleEnum::User->value,
            'password' => bcrypt('password')
        ]);


        DB::table('products')->insert([
            'product_name' => 'Sample Product',
            'product_barcode' => '123456789',
            'product_sku' => 'SKU123',
            'description' => 'This is a sample product.',
            'sell_price' => 1000,
            'purchase_price' => 800,
            'created_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_attributes')->insert([
            'product_id' => 1,
            'attribute_name' => 'Color',
            'attribute_type' => 'text',
            'attribute_property' => 'color',
            'attribute_value' => 'Red',
            'created_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_attribute_values')->insert([
            'product_attribute_id' => 1,
            'value' => 'Red',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('suppliers')->insert([
            'supplier_name' => 'Sample Supplier',
            'address' => '123 Supplier St.',
            'phone' => '123-456-7890',
            'description' => 'This is a sample supplier.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('supplier_products')->insert([
            'product_id' => 1,
            'supplier_id' => 1,
            'price' => 900,
            'quantity' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'product_id' => 1,
            'number_of_products' => 10,
            'description' => 'Sample category description.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('invoices')->insert([
            'user_id' => 1,
            'total_amount' => 10000,
            'discount_amount' => 500,
            'discount_percentage' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('invoice_details')->insert([
            'product_id' => 1,
            'invoice_id' => 1,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
