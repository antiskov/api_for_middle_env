<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($key)
 * @method static firstOrCreate(array $all)
 */
class Button extends Model
{
    protected $fillable = [
        'key',
        'value'
    ];

    protected $primaryKey = 'key';

    public function getRouteKeyName(): string
    {
        return 'key';
    }
}
