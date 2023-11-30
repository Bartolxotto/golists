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
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->string('name')->nullable(false)->change();
        });

        Schema::table('lists', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->string('name')->nullable(false)->change();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->integer('quantity')->nullable(false)->change();
            $table->boolean('checked')->nullable(false)->change();
            $table->foreignId('list_id')->nullable(false)->change();
            $table->foreignId('product_id')->nullable(false)->change();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string("name")->nullable(false)->change();
            $table->string("order")->nullable(false)->change();
            $table->string("icon")->nullable(false)->change();
        });

        Schema::table('product_aliases', function (Blueprint $table) {
            $table->string("name")->nullable(false)->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->change();
        });
    }
};
