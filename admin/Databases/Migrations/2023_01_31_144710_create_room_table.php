<?php

use Admin\Configs\Config;
use Admin\Models\Room;
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
        Schema::create(Room::$Name, function (Blueprint $table) {
            $table->uuid(Room::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->tinyInteger(Room::$Status)->default(Config::ACTIVE);
            $table->tinyInteger(Room::$Publish)->default(Config::FALSE);
            $table->integer(Room::$SortOrder)->nullable();
            $table->string(Room::$Code, 64);
            $table->string(Room::$DisplayName, 64);
            $table->string(Room::$Remark, 512)->nullable();
            $table->timestamp(Room::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(Room::$ChangedDate)->nullable();
            $table->uuid(Room::$CreatedBy)->nullable();
            $table->uuid(Room::$ChangedBy)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Room::$Name);
    }
};
