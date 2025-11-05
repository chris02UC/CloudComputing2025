<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_form_submissions', function (Blueprint $table) {
            // Add the new date column, make it nullable if it's optional
            $table->date('appointment_date')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('contact_form_submissions', function (Blueprint $table) {
            $table->dropColumn('appointment_date');
        });
    }
};