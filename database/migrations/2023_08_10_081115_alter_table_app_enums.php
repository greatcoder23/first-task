<?php

use App\Models\BaseModel;
use Database\Migrations\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAppEnums extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_enums', function (Blueprint $table) {
            $this->addCommonColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_enums', function (Blueprint $table) {
            $table->dropColumn([
                BaseModel::CREATED_AT,
                BaseModel::UPDATED_AT,
                BaseModel::DELETED_AT,
                BaseModel::CREATED_BY,
                BaseModel::UPDATED_BY,
                BaseModel::DELETED_BY,
            ]);
        });
    }
}
