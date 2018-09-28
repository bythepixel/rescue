<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $pet
 * @property mixed $user
 * @property mixed $status
 * @property mixed $species
 * @property mixed $organization
 * @property mixed $images
 * @property mixed $files
 * @property array|null|string name
 * @property array|null|string breed
 * @property array|null|string description
 * @property array|null|string birth
 * @property array|null|string age
 * @property array|null|string weight
 * @property array|null|string fee
 * @property array|null|string organization_id
 * @property array|null|string species_id
 * @property array|null|string status_id
 * @property array|null|string user_id
 */
class Pet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'breed',
        'description',
        'age',
        'birth',
        'weight',
        'fee',
        'organization_id',
        'species_id',
        'status_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
