<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image_name')->nullable();
            $table->text('description');
            $table->boolean('is_published')->default(1);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();        });
    }

    /**
     * Reverse the migrations.
     *
     *  @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
