<?php

use Admin\Configs\Config;
use Admin\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::$Name, function (Blueprint $table) {
            $table->uuid(User::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(User::$Code, 64);
            $table->string(User::$DisplayName, 64);
            $table->string(User::$Email, 256)->nullable();
            $table->string(User::$Password, 64)->nullable();
            $table->string(User::$ImagePath, 128)->nullable();
            $table->tinyInteger(User::$Status)->default(Config::ACTIVE);
            $table->string(User::$CodeReset)->nullable();
            $table->timestamp(User::$CodeTime)->nullable();
            $table->timestamp(User::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(User::$ChangedDate)->nullable();
            $table->uuid(User::$CreatedBy)->nullable();
            $table->uuid(User::$ChangedBy)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
