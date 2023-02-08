<?php

use Admin\Configs\Config;
use Admin\Models\Post;
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
        Schema::create(Post::$Name, function (Blueprint $table) {
            $table->uuid(Post::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->tinyInteger(Post::$Status)->default(Config::ACTIVE);
            $table->tinyInteger(Post::$Publish)->default(Config::FALSE);
            $table->integer(Post::$SortOrder)->nullable();
            $table->uuid(Post::$AuthorId)->nullable();
            $table->string(Post::$Title, 256)->unique();
            $table->string(Post::$Slug, 256)->unique();
            $table->text(Post::$Content)->nullable();
            $table->string(Post::$ShortContent, 512)->nullable();
            $table->string(Post::$ImagePath, 128)->nullable();
            $table->string(Post::$Remark, 512)->nullable();
            $table->timestamp(Post::$CreatedDate)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
            $table->timestamp(Post::$ChangedDate)->nullable();
            $table->uuid(Post::$CreatedBy)->nullable();
            $table->uuid(Post::$ChangedBy)->nullable();
            $table->jsonb(Post::$Seo)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Post::$Name);
    }
};
