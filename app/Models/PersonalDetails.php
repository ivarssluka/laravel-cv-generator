<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_v_id',
        'name',
        'surname',
        'phone_number',
        'email',
        'address',
        'description',
        'linkedin',
        'github'
    ];

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class, 'c_v_id');
    }
}
