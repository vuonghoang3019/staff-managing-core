<?php

use Admin\Models\Login;
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
        Schema::create(Login::$Name, function (Blueprint $table) {
            $table->uuid(Login::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->uuid(Login::$SiteId)->nullable();
            $table->uuid(Login::$UserId);
            $table->string(Login::$Token, 256);
            $table->timestamp(Login::$ValidFrom)->nullable();
            $table->timestamp(Login::$ValidTo)->nullable();
            $table->string(Login::$IP, 32)->nullable();
            $table->string(Login::$Agent, 256)->nullable();
            $table->string(Login::$Value, 256)->nullable()->comment('Current login site id');
            $table->string(Login::$Value1, 256)->nullable();
            $table->string(Login::$Value2, 256)->nullable();
            $table->string(Login::$Value3, 256)->nullable();
            $table->string(Login::$Value4, 256)->nullable();
            $table->string(Login::$Value5, 256)->nullable()->comment('Current login platform');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Login::$Name);
    }
};
