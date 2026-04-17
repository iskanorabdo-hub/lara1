<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('voitures', function (Blueprint $table) {
            if (!Schema::hasColumn('voitures', 'Km')) {
                $table->integer('Km')->default(25000);
            }
        });
    }

    public function down()
    {
        Schema::table('voitures', function (Blueprint $table) {
            if (Schema::hasColumn('voitures', 'Km')) {
                $table->dropColumn('Km');
            }
        });
    }
};