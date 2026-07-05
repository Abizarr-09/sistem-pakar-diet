<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = ['rm_number', 'name', 'age', 'gender'];

    public function diagnoses(): HasMany
    {
        return $this->hasMany(Diagnosis::class);
    }
}
