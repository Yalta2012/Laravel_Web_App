<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Property extends Model
{
    use HasFactory;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function property_type(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class, 'type_id');
    }

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'leases', 'property_id' , 'tenant_id')->withPivot(['start_date', 'end_date']);
    }
}
