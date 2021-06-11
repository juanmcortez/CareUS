<?php

namespace App\Models\Common;

use App\Models\Common\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
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
        'type',
        'international_code',
        'area_code',
        'initial_digits',
        'last_digits',
        'extension',
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
     * This touches parent models when updated.
     *
     * @var array
     */
    protected $touches = [
        'persona'
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
     * Return the formated phone of the persona
     *
     * @return string
     */
    public function getFormatedPhoneAttribute()
    {
        $formated = '+' . $this->international_code . ' (' . $this->area_code . ') ' . $this->initial_digits . '-' . $this->last_digits;
        if (!empty($this->extension)) {
            $formated .= ' ' . __('Ext.') . ' ' . $this->extension;
        }
        return $formated;
    }


    /**
     * Phone - Persona relationship
     * Only 2 phone models allowed per persona.
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'owner_id', 'id')->withDefault();
    }
}
