<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('job_title_id')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('set null');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['job_title_id']);
            $table->dropForeign(['subscription_id']);
            $table->dropColumn('job_title_id');
            $table->dropColumn('subscription_id');
            });
    }
};
