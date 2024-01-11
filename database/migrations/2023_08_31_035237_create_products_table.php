<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subcategory_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->Text('description');
           
            $table->decimal('original_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
          
            $table->string('image')->nullable();
            $table->decimal('tax', 8, 2);
            $table->integer('qty');
                        
            // $table->boolean('status')->default(1);
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            // $table->mediumText('meta_title')->nullable();
            // $table->mediumText('meta_keywords')->nullable();
            // $table->mediumText('meta_description')->nullable();
            $table->timestamps();
            $table->foreign('subcategory_id')
            ->references('id')->on('subcategories')
            ->onDelete('cascade');
        });
    }

      
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
