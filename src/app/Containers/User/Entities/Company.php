<?php

namespace App\Containers\User\Entities;

use App\Containers\User\Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'title', 'phone', 'description'];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    protected static function newFactory(): CompanyFactory
    {
        return CompanyFactory::new();
    }
}
