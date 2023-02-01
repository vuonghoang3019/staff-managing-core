<?php

use Admin\Configs\Config;
use Admin\Models\Slider;
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
        Schema::create(Slider::$Name, function (Blueprint $table) {
            $table->uuid(Slider::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Slider::$DisplayName, 64);
            $table->string(Slider::$Remark, 512)->nullable();
            $table->string(Slider::$ImagePath, 128)->nullable();
            $table->tinyInteger(Slider::$Status)->default(Config::ACTIVE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider');
    }
};
