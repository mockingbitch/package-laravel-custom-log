<?php

use phongtran\Logger\app\Services\Models\Log;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        $logTable = new Log();
        $connection = $logTable->getConnectionName();
        $table = $logTable->getTableName();
        $tableCheck = Schema::connection($connection)->hasTable($table);

        if (!$tableCheck) {
            Schema::connection($connection)->create($table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('channel', 10);
                $table->string('level', 10);
                $table->longText('message')->nullable();
                $table->integer('user_id')->nullable();
                $table->ipAddress('ipAddress')->nullable();
                $table->text('userAgent')->nullable();
                $table->string('locale')->nullable();
                $table->integer('activity_id')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $logTable = new Log();
        $connection = $logTable->getConnectionName();
        $table = $logTable->getTableName();

        Schema::connection($connection)->dropIfExists($table);
    }
};
