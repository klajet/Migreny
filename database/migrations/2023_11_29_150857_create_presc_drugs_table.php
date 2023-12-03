<?php

use App\Models\drugs;
use App\Models\prescriptions;
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
        Schema::create('presc_drugs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('drug_id')->nullable();
            $table->foreignId('presc_id')->nullable();
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('presc_id')->references('id')->on('prescriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presc_drugs');
    }
};
