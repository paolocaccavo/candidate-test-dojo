<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        factory(Tag::class, 10)->create();

        // ***** In alternativa si potrebbe creare una tabella di relazione molti a molti polimorfica 'taggables'
        Schema::create('order_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->unique(['tag_id', 'order_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
