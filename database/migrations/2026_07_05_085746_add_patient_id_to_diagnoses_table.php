<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('diagnoses', function (Blueprint $table) {
            $table->foreignId('patient_id')->after('user_id')->constrained()->onDelete('cascade');
            $table->text('secondary_diet_instructions')->nullable()->after('result_explanation');
        });
    }

    public function down(): void
    {
        Schema::table('diagnoses', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropColumn(['patient_id', 'secondary_diet_instructions']);
        });
    }
};
