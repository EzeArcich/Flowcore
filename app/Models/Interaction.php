<?php

namespace App\Models;

use Database\Factories\InteractionFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interaction extends Model
{
    /** @use HasFactory<InteractionFactory> */
    use HasFactory;

    protected $fillable = [
        'company_id',
        'contact_id',
        'direction',
        'channel',
        'subject',
        'message',
        'response',
        'interacted_at',
        'requires_follow_up',
        'follow_up_due_at',
        'outcome',
        'notes',
    ];

    protected $casts = [
        'interacted_at' => 'datetime',
        'requires_follow_up' => 'boolean',
        'follow_up_due_at' => 'date',
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
