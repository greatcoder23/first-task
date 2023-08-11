<?php

namespace App\Models;

use App\Http\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use HasUuid, SoftDeletes;

    public const TABLE_NAME = 'categories';
    public const ID = 'id_uuid';
    public const TITLE = 'title';
    public const PARENT_CATEGORY_ID_UUID = 'parent_category_id_uuid';

    protected $table = self::TABLE_NAME;

    protected $primaryKey = self::ID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::TITLE,
        self::PARENT_CATEGORY_ID_UUID,
    ];

    public function parentCategory()
    {
        return $this->belongsTo(
            Category::class,
            Category::PARENT_CATEGORY_ID_UUID,
            Category::ID,
        );
    }

    public function subAllCategories(): HasMany
    {
        return $this->hasMany(
            Category::class,
            Category::PARENT_CATEGORY_ID_UUID,
            Category::ID,
        );
    }

    public function subCategories(): HasMany
    {
        return $this->subAllCategories()->with('subCategories');
    }
}
