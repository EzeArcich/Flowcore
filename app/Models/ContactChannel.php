<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactChannel extends Model
{
    protected $fillable = [
        'company_id',
        'contact_id',
        'channel_type',
        'value',
        'label',
        'is_verified',
        'is_used',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_used' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}