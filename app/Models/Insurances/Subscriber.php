<?php

namespace App\Models\Insurances;

use App\Models\Common\Persona;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'subID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_type',
        'owner_id',
        'level',
        'company',
        'policy_number',
        'group_number',
        'plan_name',
        'patient_copay',
        'accept_assignment',
        'secondary_medical_type',
        'effective_date',
        'termination_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'subID',
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
        'effective_date',
        'termination_date',
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
     * Subscriber - Patient relationship
     * Many subscriber models allowed per patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'owner_id', 'patID')->withDefault();
    }


    /**
     * Subscriber - Persona relationship
     * Only 1 persona model allowed per subscriber.
     */
    public function persona()
    {
        return $this->hasOne(Persona::class, 'owner_id', 'subID')->where('owner_type', 'subscriber');
    }
}
