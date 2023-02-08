<?php

use Admin\Configs\Config;
use Admin\Models\Classroom;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Classroom::$Name, function (Blueprint $table) {
            $table->uuid(Classroom::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Classroom::$Code, 64);
            $table->string(Classroom::$DisplayName, 64);
            $table->uuid(Classroom::$CourseId);
            $table->tinyInteger(Classroom::$Status)->default(Config::ACTIVE);
            $table->tinyInteger(Classroom::$Publish)->default(Config::FALSE);
            $table->integer(Classroom::$MinStudent)->nullable();
            $table->integer(Classroom::$MaxStudent)->nullable();
            $table->integer(Classroom::$SortOrder)->nullable();
            $table->timestamp(Classroom::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(Classroom::$ChangedDate)->nullable();
            $table->uuid(Classroom::$CreatedBy)->nullable();
            $table->uuid(Classroom::$ChangedBy)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Classroom::$Name);
    }
};
