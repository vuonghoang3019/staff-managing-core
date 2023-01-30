<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Admin\Models\About;
use Illuminate\Support\Facades\DB;
use Admin\Configs\Config;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->uuid(About::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->tinyInteger(About::$Status)->default(Config::ACTIVE);
            $table->tinyInteger(About::$Publish)->default(Config::FALSE);
            $table->integer(About::$SortOrder)->nullable();
            $table->string(About::$Title, 256)->unique();
            $table->string(About::$Slug, 256)->unique();
            $table->text(About::$Content)->nullable();
            $table->string(About::$ShortContent, 512)->nullable();
            $table->string(About::$ImagePath, 128)->nullable();
            $table->string(About::$Remark, 512)->nullable();
            $table->timestamp(About::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(About::$ChangedDate)->nullable();
            $table->uuid(About::$CreatedBy)->nullable();
            $table->uuid(About::$ChangedBy)->nullable();
            $table->jsonb(About::$Seo)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
};
