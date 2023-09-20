<?php

namespace Modules\Sms\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'module_settings';
    protected $fillable = ['default','password','sender','username'];

    protected static function newFactory()
    {
        return \Modules\Sms\Database\factories\SettingFactory::new();
    }
}
