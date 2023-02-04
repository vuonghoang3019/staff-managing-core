<?php

use Admin\Models\Role;
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
        Schema::create(Role::$Name, function (Blueprint $table) {
            $table->uuid(Role::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Role::$DisplayName, 64);
            $table->string(Role::$Code, 64);
            $table->string(Role::$Remark, 512)->nullable();
            $table->integer(Role::$SortOrder)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Role::$Name);
    }
};
