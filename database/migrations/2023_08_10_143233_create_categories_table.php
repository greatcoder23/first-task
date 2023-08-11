<?php

use App\Http\Common\DataConstant;
use Database\Migrations\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id_uuid')->primary();
            $table->string('title', DataConstant::LENGTH_M);
            $table->uuid('parent_category_id_uuid')->nullable();

            $this->addCommonColumns($table);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_category_id_uuid')->references('id_uuid')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
