<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
    ];

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function phone(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (! is_null($value)) {
                    $sub1 = substr($value, 0, 4);
                    $sub2 = substr($value, 4, 3);
                    $sub3 = substr($value, 7);

                    return '+'.$sub1.' - '.$sub2.' '.$sub3;
                } else {
                    return null;
                }
            },
            set: fn ($value) => (! is_null($value) && $value != '') ? '60'.str($value)->replace(' ', '')->replace('-', '')->replace('+', '') : null
        );
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
