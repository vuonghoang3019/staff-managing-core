<?php

use Admin\Models\Price;
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
        Schema::create(Price::$Name, function (Blueprint $table) {
            $table->uuid(Price::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Price::$DisplayName, 64);
            $table->uuid(Price::$CourseId);
            $table->double(Price::$UnitPrice);
            $table->string(Price::$Lesson, 256)->nullable();
            $table->integer(Price::$Discount)->nullable();
            $table->string(Price::$Remark, 512)->nullable();
            $table->timestamp(Price::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(Price::$ChangedDate)->nullable();
            $table->uuid(Price::$CreatedBy)->nullable();
            $table->uuid(Price::$ChangedBy)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Price::$Name);
    }
};
