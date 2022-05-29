<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('accountOther', 100)->nullable()->comment('Información de usuario otra red social.')->after('accountLinkedin');
            $table->string('accountYouTube', 100)->nullable()->comment('Información de usuario en YouTube.')->after('accountLinkedin');
            $table->string('accountTiktok', 100)->nullable()->comment('Información de usuario en Tiktok.')->after('accountLinkedin');
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
            $table->dropColumn('accountTiktok');
            $table->dropColumn('accountYouTube');
            $table->dropColumn('accountOther');
        });
    }
}
