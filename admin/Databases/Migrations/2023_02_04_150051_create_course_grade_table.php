<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbCourseGrade', function (Blueprint $table) {
            $table->uuid('Id')->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->uuid('CourseId');
            $table->uuid('GradeId');
            $table->timestamp('CreatedDate')->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp('UpdatedDate')->nullable();
            $table->uuid('CreatedBy')->nullable();
            $table->uuid('ChangedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbCourseGrade');
    }
};
