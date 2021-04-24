<?php

namespace App\Models\Patients;

use App\Models\Common\Persona;
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
}
