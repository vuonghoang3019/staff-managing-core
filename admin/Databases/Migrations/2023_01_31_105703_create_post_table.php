<?php

use Admin\Configs\Config;
use Admin\Models\News;
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
        Schema::create(News::$Name, function (Blueprint $table) {
            $table->uuid(News::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->tinyInteger(News::$Status)->default(Config::ACTIVE);
            $table->tinyInteger(News::$Publish)->default(Config::FALSE);
            $table->integer(News::$SortOrder)->nullable();
            $table->uuid(News::$AuthorId)->nullable();
            $table->string(News::$Title, 256)->unique();
            $table->string(News::$Slug, 256)->unique();
            $table->text(News::$Content)->nullable();
            $table->string(News::$ShortContent, 512)->nullable();
            $table->string(News::$ImagePath, 128)->nullable();
            $table->string(News::$Remark, 512)->nullable();
            $table->timestamp(News::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(News::$ChangedDate)->nullable();
            $table->uuid(News::$CreatedBy)->nullable();
            $table->uuid(News::$ChangedBy)->nullable();
            $table->jsonb(News::$Seo)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(News::$Name);
    }
};
