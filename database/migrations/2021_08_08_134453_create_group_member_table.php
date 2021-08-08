<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_member', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('mem_id');
            $table->unsignedInteger('state')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('accepted_at')->useCurrent();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('mem_id')->references('id')->on('members');
            $table->primary(['group_id', 'mem_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_member');
    }
}
