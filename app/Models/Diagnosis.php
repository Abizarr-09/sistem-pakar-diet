<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Diagnosis extends Model
{
    protected $fillable = [
        'user_id', 'result_diet_id', 'result_diet_name',
        'result_description', 'result_pantangan', 'result_explanation'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resultDiet(): BelongsTo
    {
        return $this->belongsTo(DietType::class, 'result_diet_id');
    }

    public function diseases(): BelongsToMany
    {
        return $this->belongsToMany(Disease::class, 'diagnosis_disease');
    }
}
