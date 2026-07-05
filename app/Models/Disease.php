<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Disease extends Model
{
    protected $fillable = ['name', 'description', 'weight', 'diet_type_id'];

    public function dietType(): BelongsTo
    {
        return $this->belongsTo(DietType::class);
    }

    public function diagnoses(): BelongsToMany
    {
        return $this->belongsToMany(Diagnosis::class, 'diagnosis_disease');
    }
}
