<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  const TABLE_NAME = 'posts';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table){
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('post');
                $table->date('published_at')->nullable();
                $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
