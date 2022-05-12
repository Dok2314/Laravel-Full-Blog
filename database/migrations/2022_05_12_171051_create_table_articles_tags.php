<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = 'articles_tags';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table){
                $table->id();
                $table->foreignId('article_id')->constrained('articles')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('tag_id')->constrained('tags')->cascadeOnUpdate()->cascadeOnDelete();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    public function down()
    {

    }
};
