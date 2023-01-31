<?php

use Admin\Models\Schedule;
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
        Schema::create(Schedule::$Name, function (Blueprint $table) {
            $table->uuid(Schedule::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Schedule::$Weekday, 256);
            $table->uuid(Schedule::$ClassRoomId);
            $table->uuid(Schedule::$UserId);
            $table->uuid(Schedule::$RoomId);
            $table->timestamp(Schedule::$StartTime)->nullable();
            $table->timestamp(Schedule::$EndTime)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
};
