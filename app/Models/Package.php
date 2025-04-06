<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => explode('/', $this->identifier)[1]
        );
    }
}
