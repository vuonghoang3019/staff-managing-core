<?php

use Admin\Configs\Config;
use Admin\Models\Grade;
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
        Schema::create(Grade::$Name, function (Blueprint $table) {
            $table->uuid(Grade::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Grade::$DisplayName, 64);
            $table->tinyInteger(Grade::$Status)->default(Config::ACTIVE);
            $table->string(Grade::$Remark, 512)->nullable();
            $table->timestamp(Grade::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(Grade::$ChangedDate)->nullable();
            $table->uuid(Grade::$CreatedBy)->nullable();
            $table->uuid(Grade::$ChangedBy)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Grade::$Name);
    }
};
