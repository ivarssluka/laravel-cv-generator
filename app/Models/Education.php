<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_v_id',
        'institution',
        'degree',
        'start_date',
        'end_date'
    ];

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class, 'c_v_id');
    }
}
