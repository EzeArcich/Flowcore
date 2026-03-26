<?php

namespace App\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    /** @use HasFactory<CompanyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'website',
        'industry',
        'country',
        'city',
        'company_size_min',
        'company_size_max',
        'notes',
        'status',
        'first_contact_at',
        'last_contact_at',
        'next_follow_up_at',
        'is_priority',
        'is_active',
    ];

    protected $casts = [
        'first_contact_at' => 'date',
        'last_contact_at' => 'date',
        'next_follow_up_at' => 'date',
        'is_priority' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function channels(): HasMany
    {
        return $this->hasMany(ContactChannel::class);
    }

    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class);
    }

    public function followUps(): HasMany
    {
        return $this->hasMany(FollowUp::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(CompanyTag::class);
    }
}
