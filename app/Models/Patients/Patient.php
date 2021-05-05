<?php

namespace App\Models\Patients;

use App\Models\Common\Persona;
use App\Models\Insurances\Subscriber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'patID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'external_id',
        'patient_level_accession',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'persona',
        'deleted_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
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
        return ucfirst($this->updated_at->translatedFormat('M d, Y - H:i'));
    }


    /**
     * Patient - Persona relationship
     * Only 1 persona model allowed per patient.
     */
    public function persona()
    {
        return $this->hasOne(Persona::class, 'owner_id', 'patID')->where('owner_type', 'patient');
    }


    /**
     * Patient - Contact relationship
     * Only 3 contact models allowed per patient.
     */
    public function contact()
    {
        return $this->hasMany(Persona::class, 'owner_id', 'patID')->where('owner_type', 'contact');
    }


    /**
     * Patient - Employment relationship
     * Only 1 employment models allowed per patient.
     */
    public function employment()
    {
        return $this->hasMany(Persona::class, 'owner_id', 'patID')->where('owner_type', 'employment');
    }


    /**
     * Patient - Subscriber relationship
     * Many subscriber models allowed per patient.
     */
    public function subscriber()
    {
        return $this->hasMany(Subscriber::class, 'owner_id', 'patID')->where('owner_type', 'patient');
    }
}
