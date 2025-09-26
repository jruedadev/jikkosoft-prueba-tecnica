<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('library_id')->nullable()->after('isbn')->constrained()->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['library_id']);
            $table->dropColumn('library_id');
        });
    }

};
