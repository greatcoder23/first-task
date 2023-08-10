<?php

//if ()
use App\Models\AppEnum;
use Illuminate\Support\Facades\DB;

function getUuid(string $model): string
{
    return Str::uuid()->toString();
}

function getAppEnumId(string $enumType, string $enumLabel)
{
    $appEnum = DB::table(AppEnum::TABLE_NAME)
        ->where(AppEnum::ENUM_TYPE, $enumType)
        ->where(AppEnum::ENUM_LABEL, $enumLabel)
        ->first();
    return !is_null($appEnum) ? $appEnum->id_int : null;
}

function getAppEnumIds(string $enumType)
{
    $appEnum = DB::table(AppEnum::TABLE_NAME)
        ->where(AppEnum::ENUM_TYPE, $enumType)
        ->get();
    return !empty($appEnum) ? $appEnum->pluck(AppEnum::ID) : [];
}

function getAppEnumObject(string $enumId)
{
    return DB::table(AppEnum::TABLE_NAME)
        ->where(AppEnum::ID, $enumId)
        ->first();
}
