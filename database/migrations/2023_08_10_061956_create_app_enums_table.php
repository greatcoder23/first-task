<?php

use App\Http\Common\DataConstant;
use Database\Migrations\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppEnumsTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_enums', function (Blueprint $table) {
            $table->integerIncrements('id_int');
            $table->string('enum_type', DataConstant::LENGTH_M);
            $table->string('enum_label', DataConstant::LENGTH_M);

            $table->unique(['enum_type','enum_label']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_enums');
    }
}
