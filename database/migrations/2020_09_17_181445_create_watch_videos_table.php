<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_videos', function (Blueprint $table) {
            $table->id();
            //$table->string('raw_url_video')->nullable();
            $table->string('url_video')->nullable();
            $table->string('title')->nullable();
            $table->string('series')->nullable();
            $table->string('url_web')->nullable()->unique();
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
        Schema::dropIfExists('watch_videos');
    }
}
