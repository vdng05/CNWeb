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
        //
        Schema::create("medicines", function (Blueprint $table)
        {
            $table->id("medicine_id");
            $table->string("name", 255);
            $table->string("brand", 100)->nullable();
            $table->string("dosage", 50)->nullable();
            $table->string("form", 50)->nullable();
            $table->decimal("price", 10, 2);
            $table->integer("stock");
            $table->timestamp("created_at")->nullable();
            $table->timestamp("updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("medicines");
    }
};
