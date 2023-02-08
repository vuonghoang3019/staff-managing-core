<?php

use Admin\Models\Permission;
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
        Schema::create(Permission::$Name, function (Blueprint $table) {
            $table->uuid(Permission::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Permission::$DisplayName, 64);
            $table->string(Permission::$Remark, 512)->nullable();
            $table->uuid(Permission::$ParentId);
            $table->string(Permission::$Value, 64);
            $table->integer(Permission::$SortOrder);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Permission::$Name);
    }
};
