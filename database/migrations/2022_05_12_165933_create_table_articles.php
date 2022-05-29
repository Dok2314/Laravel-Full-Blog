<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = 'articles';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function(Blueprint $table){
               $table->id();
               $table->string('title');
               $table->string('image');
               $table->text('article');
               $table->foreignId('category_id')->constrained('articles_categories')->cascadeOnUpdate()->cascadeOnDelete();
               $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
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
