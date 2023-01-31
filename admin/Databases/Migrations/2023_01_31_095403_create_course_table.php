<?php

use Admin\Configs\Config;
use Admin\Models\Course;
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
        Schema::create(Course::$Name, function (Blueprint $table) {
            $table->uuid(Course::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->tinyInteger(Course::$Status)->default(Config::ACTIVE);
            $table->string(Course::$DisplayName, 64);
            $table->string(Course::$Remark, 512)->nullable();
            $table->string(Course::$ImagePath, 128)->nullable();
            $table->timestamp(Course::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(Course::$ChangedDate)->nullable();
            $table->uuid(Course::$CreatedBy)->nullable();
            $table->uuid(Course::$ChangedBy)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
};
