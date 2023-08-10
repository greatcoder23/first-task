<?php

namespace Database\Migrations;

use App\Http\Common\DataConstant;
use App\Models\BaseModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BaseMigration extends Migration
{
    public function addCommonColumns(Blueprint $table, bool $softDeletes = true)
    {
        $table->timestamps();
        if ($softDeletes === true) {
            $table->softDeletes();
        }
        $table->string(BaseModel::CREATED_BY, DataConstant::LENGTH_UUID)->nullable();
        $table->foreign(BaseModel::CREATED_BY)->references('id_uuid')->on('users');

        $table->string(BaseModel::UPDATED_BY,DataConstant::LENGTH_UUID)->nullable();
        $table->foreign(BaseModel::UPDATED_BY)->references('id_uuid')->on('users');

        if ($softDeletes === true) {
            $table->string(BaseModel::DELETED_BY,DataConstant::LENGTH_UUID)->nullable();
            $table->foreign(BaseModel::DELETED_BY)->references('id_uuid')->on('users');
        }
    }
}
