<?php

namespace App\Models\Common;

use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_type',
        'owner_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'date_of_birth',
        'gender',
        'social_security',
        'driver_license',
        'ethnicity',
        'race',
        'referral',
        'vfc',
        'family_size',
        'financial_review',
        'migrant_seasonal',
        'interpreter',
        'homeless',
        'desease_date',
        'desease_reason',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'owner_type',
        'owner_id',
        'deleted_at',
        'created_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'date_of_birth',
        'desease_date',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_time' => 'date',
    ];


    /**
     * Persona - Patient relationship
     * Only 1 persona model allowed per patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'owner_id', 'patID')->withDefault();
    }
}
