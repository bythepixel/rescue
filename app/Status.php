<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $status
 * @property mixed $organization
 * @property array|null|string organization_id
 * @property array|null|string name
 */
class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'organization_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
