<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $organization
 */
class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'pet_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pet()
    {
        return $this->hasOne(Pet::class);
    }

}
