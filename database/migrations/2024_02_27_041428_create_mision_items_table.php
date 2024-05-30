<?php

use App\Enums\VisionAndMisionEnum;
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
        Schema::create('mision_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vision_and_mission_id')->nullable()->constrained('vision_and_misions')->onDelete('cascade');
            $table->enum('status', [VisionAndMisionEnum::OFFICE->value , VisionAndMisionEnum::SERVICE->value]);
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
            $table->string('mission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mision_items');
    }
};
