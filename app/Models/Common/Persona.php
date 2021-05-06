<?php

namespace App\Models\Common;

use App\Models\Common\Address;
use App\Models\Common\Phone;
use App\Models\Insurances\Subscriber;
use App\Models\Patients\Patient;
use Carbon\Carbon;
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
        'decease_date',
        'decease_reason',
        'contact_type',
        'company',
        'occupation',
        'financial_review',
        'monthly_income',
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
        'patient',
        'address',
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
        'decease_date',
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
     * Return created_at formated
     * when calling created_at_language
     *
     * @return string
     */
    public function getCreatedAtLanguageAttribute()
    {
        return ucfirst($this->created_at->translatedFormat('M d, Y - H:i'));
    }


    /**
     * Return updated_at formated
     * when calling updated_at_language
     *
     * @return string
     */
    public function getUpdatedAtLanguageAttribute()
    {
        return ucfirst($this->updated_at->translatedFormat('M d, Y'));
    }


    /**
     * Return date_of_birth formated
     * when calling date_of_birth_language
     *
     * @return string
     */
    public function getDateOfBirthLanguageAttribute()
    {
        return ucfirst($this->date_of_birth->translatedFormat('M d, Y'));
    }


    /**
     * Return the formated name of the persona
     *
     * @return string
     */
    public function getFormatedNameAttribute()
    {
        if (!empty($this->middle_name)) {
            $formated = $this->last_name . ', ' . $this->first_name . ' ' . strtoupper(substr($this->middle_name, 0, 1)) . '.';
        } else {
            $formated = $this->last_name . ', ' . $this->first_name;
        }
        return $formated;
    }


    /**
     * Return the curren age of the persona
     *
     * @return int
     */
    public function getCurrentAgeAttribute()
    {
        return __(':AGE yrs.', ['AGE' => Carbon::parse($this->date_of_birth)->diff(Carbon::now())->format('%y')]);
    }


    /**
     * Persona - Patient relationship
     * Only 1 persona model allowed per patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'owner_id', 'patID')->withDefault();
    }


    /**
     * Persona - Subscriber relationship
     * Only 1 persona model allowed per subscriber.
     */
    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'owner_id', 'subID')->withDefault();
    }


    /**
     * Persona - Address relationship
     * Only 1 address model allowed per persona.
     */
    public function address()
    {
        return $this->hasOne(Address::class, 'owner_id', 'id')->where('owner_type', 'persona');
    }


    /**
     * Persona - Phone relationship
     * Only 2 phone models allowed per persona.
     */
    public function phone()
    {
        return $this->hasMany(Phone::class, 'owner_id', 'id')->where('owner_type', 'persona');
    }
}
