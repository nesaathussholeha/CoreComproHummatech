<?php

use App\Enums\PageEnum;
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
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->enum('show_in', [
                PageEnum::TENTANG->value, 
                PageEnum::LAYANAN->value, 
                PageEnum::MITRA->value, 
                PageEnum::PORTOFOLIO->value, 
                PageEnum::BERITA->value, 
                PageEnum::HUBUNGI->value, 
                PageEnum::LOWONGAN->value]);
            $table->string('image');
            $table->enum('about_in', [
                PageEnum::PROFILE->value,
                PageEnum::VISIMISI->value,
                PageEnum::ORGANISASI->value,
                PageEnum::USAHA->value,
                PageEnum::LOGO->value,
                PageEnum::TIM->value,
            ])->nullable();
            $table->foreignId('service_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backgrounds');
    }
};
