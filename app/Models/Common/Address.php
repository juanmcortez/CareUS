<?php

namespace App\Models\Common;

use App\Models\Common\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
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
        'street',
        'street_extended',
        'city',
        'state',
        'zip',
        'country',
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
        return $this->created_at->translatedFormat('M d, Y - H:i');
    }


    /**
     * Return updated_at formated
     * when calling updated_at_language
     *
     * @return string
     */
    public function getUpdatedAtLanguageAttribute()
    {
        return $this->updated_at->translatedFormat('M d, Y');
    }


    /**
     * Address - Persona relationship
     * Only 1 address model allowed per persona.
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'owner_id', 'id')->withDefault();
    }
}
