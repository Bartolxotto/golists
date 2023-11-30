<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable();
        });
    
        DB::statement('UPDATE products SET price = (SELECT price FROM items WHERE items.product_id = products.id)');
    
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->decimal('price', 10, 2)->nullable();
    });

    DB::statement('UPDATE items SET price = (SELECT price FROM products WHERE products.id = items.product_id)');

    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('price');
    });
}
};
