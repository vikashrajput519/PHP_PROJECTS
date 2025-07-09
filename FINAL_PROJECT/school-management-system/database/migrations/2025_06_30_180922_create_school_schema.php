<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('programs', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();              // Unique and NOT NULL by default
            $table->text('description')->nullable();       // Optional description

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps(); // Includes both created_at and updated_at
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('title')->unique();             // Unique course title
            $table->string('code')->unique();              // Unique course code (e.g., CS101)
            $table->text('description')->nullable();       // Optional description

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps(); // created_at and updated_at
        });

        Schema::create('course_program', function (Blueprint $table) {
            $table->id();

            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('program_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });


        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('program_id')->nullable()->constrained('programs')->onDelete('set null');

            // Personal info
            $table->string('roll_number')->unique();
            $table->string('email')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mothers_name')->nullable();

            // Identification
            $table->string('aadhar_number', 12)->nullable();
            $table->string('passport_number')->nullable();
            $table->string('voter_id')->nullable();

            // Contact
            $table->string('phone_number')->nullable();

            // Address
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('landmark')->nullable();

            $table->timestamps();
        });


        Schema::create('staff', function (Blueprint $table) {
            $table->id();

            // Foreign key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal info
            $table->string('email')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mothers_name')->nullable();

            // Identification
            $table->string('aadhar_number', 12)->nullable();
            $table->string('passport_number')->nullable();
            $table->string('voter_id')->nullable();

            // Contact
            $table->string('phone_number')->nullable();

            // Address
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('landmark')->nullable();

            // Job-specific
            $table->string('position')->nullable();

            $table->timestamps();
        });
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_program');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('students');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('staff');
        
    }
};
