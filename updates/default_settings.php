<?php namespace HendrikErz\Campaignr\Updates;

use Schema;
use HendrikErz\Campaignr\Models\Event;
use October\Rain\Database\Updates\Migration;

class DefaultSettings extends Migration
{
    public function up()
    {
        Schema::table('hendrikerz_campaignr_events', function($table)
        {
            $table->text('gallery')->nullable();
        });
    }

    public function down()
    {
        Schema::table('hendrikerz_campaignr_events', function($table)
        {
            $table->dropColumn(['gallery']);
        });
    }
}