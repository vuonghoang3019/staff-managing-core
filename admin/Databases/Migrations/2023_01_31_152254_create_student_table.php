<?php

use Admin\Configs\Config;
use Admin\Models\Student;
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
        Schema::create(Student::$Name, function (Blueprint $table) {
            $table->uuid(Student::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Student::$Code, 64);
            $table->string(Student::$DisplayName, 64);
            $table->string(Student::$Email, 256)->nullable();
            $table->string(Student::$Password, 64)->nullable();
            $table->string(Student::$Birthday, 32)->nullable();
            $table->tinyInteger(Student::$Gender)->nullable();
            $table->string(Student::$Value1, 512)->nullable();
            $table->string(Student::$Value2, 512)->nullable();
            $table->string(Student::$Value3, 512)->nullable();
            $table->string(Student::$Value4, 512)->nullable();
            $table->string(Student::$Value5, 512)->nullable();
            $table->string(Student::$ImagePath, 128)->nullable();
            $table->uuid(Student::$ClassroomId);
            $table->boolean(Student::$Deleted)->default(Config::FALSE);
            $table->string(Student::$CodeReset)->nullable();
            $table->timestamp(Student::$CodeTime)->nullable();
            $table->string(Student::$CodeActive)->nullable();
            $table->timestamp(Student::$TimeActive)->nullable();
            $table->timestamp(Student::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(Student::$ChangedDate)->nullable();
            $table->uuid(Student::$CreatedBy)->nullable();
            $table->uuid(Student::$ChangedBy)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Student::$Name);
    }
};
