<?php

use Admin\Models\Payment;
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
        Schema::create(Payment::$Name, function (Blueprint $table) {
            $table->uuid(Payment::$Id)->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->uuid(Payment::$UserId);
            $table->uuid(Payment::$CourseId);
            $table->double(Payment::$Total, 256);
            $table->string(Payment::$TransactionCode, 256);
            $table->string(Payment::$Remark, 512)->nullable();
            $table->string(Payment::$VnResponseCode, 256);
            $table->string(Payment::$CodeVnPay, 256);
            $table->string(Payment::$CodeBank, 256);
            $table->timestamp(Payment::$Time)->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Payment::$Name);
    }
};
