<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalbeAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->comment('小程序的名字');
            $table->string('app_key')->index()->comment('小程序的APP key');
            $table->string('app_secret')->comment('小程序的密钥');
            $table->string('alliance_key')->index()->comment('联盟给的身份标识，接口需要传递这个key');

            $table->string('college_id')->index()->nullable()->comment('学校');

            $table->tinyInteger('status')->default(1)->comment('小程序的状态，1=正常，2=非法');

            $table->timestamp('created_at')->nullable()->index();
            $table->timestamp('updated_at')->nullable()->index();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
}