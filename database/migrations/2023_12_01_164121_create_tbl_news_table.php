<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('admin_id');
            $table->string('name');
            $table->text('desc');
            $table->mediumText('content');
            $table->string('image');
            $table->integer('display_order');
            $table->smallInteger('status');
            $table->string('options');
            $table->integer('count_view');
            $table->integer('date_created');
            $table->integer('date_updated');
            $table->string('seo_name');
            $table->string('tags');
            $table->string('meta_title');
            $table->text('meta_desc');
            $table->text('meta_keyword');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
