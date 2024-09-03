<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static findOrFail($id)
 */
class CV extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function personalDetails(): HasOne
    {
        return $this->hasOne(PersonalDetails::class, 'c_v_id');
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class, 'c_v_id');
    }

    public function workExperience(): HasMany
    {
        return $this->hasMany(WorkExperience::class, 'c_v_id');
    }
}
