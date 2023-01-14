<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Indexing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->index(['movieid', 'genres', 'title']);
        });
        
        Schema::table('ratings', function (Blueprint $table) {
            $table->index(['movieid', 'rating', 'userid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropIndex(['movieid', 'genres', 'title']);
        });
        
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropIndex(['movieid', 'rating', 'userid']);
        });
    }
}
