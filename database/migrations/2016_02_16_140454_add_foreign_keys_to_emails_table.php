<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->foreign('department',
                'emails_ibfk_1')->references('id')->on('department')->onUpdate('NO ACTION')->onDelete('RESTRICT');
            $table->foreign('priority',
                'emails_ibfk_2')->references('priority_id')->on('ticket_priority')->onUpdate('NO ACTION')->onDelete('RESTRICT');
            $table->foreign('help_topic',
                'emails_ibfk_3')->references('id')->on('help_topic')->onUpdate('NO ACTION')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->dropForeign('emails_ibfk_1');
            $table->dropForeign('emails_ibfk_2');
            $table->dropForeign('emails_ibfk_3');
        });
    }
}
