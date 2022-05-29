<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   const TABLE_NAME = 'comments';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table){
                $table->id();
                $table->string('title');
                $table->string('slug');
                $table->text('comment');
                $table->foreignId('article_id')->constrained('articles')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('parent_id')->nullable()->constrained(self::TABLE_NAME)->cascadeOnUpdate()->cascadeOnDelete();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
