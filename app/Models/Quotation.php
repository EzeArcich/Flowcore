<?php

namespace App\Models;

use Database\Factories\QuotationFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quotation extends Model
{
    /** @use HasFactory<QuotationFactory> */
    use HasFactory;

    protected $fillable = [
        'company_id',
        'contact_id',
        'title',
        'pricing_type',
        'amount',
        'currency',
        'estimated_hours',
        'sent_at',
        'valid_until',
        'status',
        'scope_summary',
        'notes',
    ];

    protected $casts = [
        'sent_at' => 'date',
        'valid_until' => 'date',
        'amount' => 'decimal:2',
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
