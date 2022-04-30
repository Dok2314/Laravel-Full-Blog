<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  const TABLE_NAME = 'users_permissions';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table){
               $table->id();
               $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnUpdate();
               $table->foreignId('permission_id')->constrained('permissions')->cascadeOnUpdate()->cascadeOnUpdate();
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
