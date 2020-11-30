<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddNicknameToUsers extends Migration
{
    public function up()
    {
        $rows = DB::table('users')->get(['id']);
        foreach ($rows as $row) {
            DB::table('users')->where('id', $row->id)->update(['nickname' => 'nn' . ((int)$row->id + 1)]);
        }
        Schema::table('users', function (Blueprint $table) {
            $table->unique('nickname');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('nickname');
            $table->dropColumn('nickname');
        });
    }

}
