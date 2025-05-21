<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedirectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('redirects', function (Blueprint $table) {
        $table->id();
        $table->string('source_url'); // الرابط القديم
        $table->string('target_url'); // الرابط الجديد
        $table->integer('status_code')->default(301); // نوع التوجيه
        $table->tinyInteger('active')
            ->comment('1 => show the product on the site, 0 => donot show the product on the site')->default('1');
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
        Schema::dropIfExists('redirects');
    }
}
