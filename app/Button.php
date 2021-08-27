<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($key)
 * @method static firstOrCreate(array $all)
 * @method static find($id)
 * @method static where(string $string, $key)
 * @method static create(array $all)
 * @method static firstOrUpdate(array $all)
 * @method isEmpty()
 * @property mixed key
 * @property mixed value
 * @property mixed created_at
 * @property mixed updated_at
 */
class Button extends Model
{
    protected $fillable = [
        'key',
        'value'
    ];

    protected $primaryKey = 'key';

    public $incrementing = false;

    public function getRouteKeyName(): string
    {
        return 'key';
    }
}
