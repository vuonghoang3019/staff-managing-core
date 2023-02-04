<?php

use Admin\Configs\Config;
use Admin\Models\Contact;
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
        Schema::create(Contact::$Name, function (Blueprint $table) {
            $table->uuid(Contact::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string(Contact::$DisplayName, 64);
            $table->string(Contact::$Email, 64);
            $table->string(Contact::$Phone, 32)->nullable();
            $table->string(Contact::$NameStudent, 64);
            $table->string(Contact::$Content, 256);
            $table->tinyInteger(Contact::$Status)->default(Config::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Contact::$Name);
    }
};
