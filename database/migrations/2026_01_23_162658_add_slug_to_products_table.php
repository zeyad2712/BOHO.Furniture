<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name_ar')->nullable();
        });

        // Generate slugs for existing products
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $product->slug = \Illuminate\Support\Str::slug($product->name_en);
            $product->save();
        }

        // After generating slugs, we can make it non-nullable if desired, 
        // but keeping it nullable for now to avoid issues during migration if any name_en is empty.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
