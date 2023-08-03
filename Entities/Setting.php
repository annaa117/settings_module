<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Settings\Traits\UuidTrait;

class Setting extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Settings\Database\factories\SettingFactory::new();
    }
}
