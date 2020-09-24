<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function(Blueprint $table) {
            $table->unsignedBigInteger('owner_id')->nullable()->after('id');
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')->constrained()
                ->onDelete('cascade');;
        });
        Schema::table('playlists', function(Blueprint $table) {
            $table->unsignedBigInteger('owner_playlist_id')->nullable()->after('id');
            $table->foreign('owner_playlist_id')->references('id')->on('users');
        });
        Schema::table('song_in_playlist', function(Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('song_in_playlist', function(Blueprint $table) {
            $table->unsignedBigInteger('playlist_id')->after('id');
            $table->foreign('playlist_id')->references('id')->on('playlists');
        });
        Schema::table('song_in_playlist', function(Blueprint $table) {
            $table->unsignedBigInteger('song_id')->after('id');
            $table->foreign('song_id')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relationship', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['owner_playlist_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['playlist_id']);
            $table->dropForeign(['song_id']);
        });
    }
}
