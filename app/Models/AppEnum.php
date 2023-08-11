<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\AppEnum
 *
 * @property int $id_int
 * @property string $enum_type
 * @property string $enum_label
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @method static Builder|AppEnum newModelQuery()
 * @method static Builder|AppEnum newQuery()
 * @method static Builder|AppEnum query()
 * @method static Builder|AppEnum whereCreatedAt($value)
 * @method static Builder|AppEnum whereCreatedBy($value)
 * @method static Builder|AppEnum whereDeletedAt($value)
 * @method static Builder|AppEnum whereDeletedBy($value)
 * @method static Builder|AppEnum whereEnumLabel($value)
 * @method static Builder|AppEnum whereEnumType($value)
 * @method static Builder|AppEnum whereIdInt($value)
 * @method static Builder|AppEnum whereUpdatedAt($value)
 * @method static Builder|AppEnum whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class AppEnum extends BaseModel
{
    public const TABLE_NAME = 'app_enums';
    public const ID = 'id_int';
    public const ENUM_TYPE = 'enum_type';
    public const ENUM_LABEL = 'enum_label';

    protected $table = self::TABLE_NAME;

    protected $primaryKey = self::ID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::ENUM_TYPE,
        self::ENUM_LABEL,
    ];
}
