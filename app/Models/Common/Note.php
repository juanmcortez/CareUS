<?php

namespace App\Models\Common;

use App\Models\Patients\Patient;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
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
        'user_id',
        'category',
        'title',
        'body',
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
        'user_id',
        'deleted_at',
        'created_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
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
     * This touches parent models when updated.
     *
     * @var array
     */
    protected $touches = [
        'patient'
    ];


    /**
     * Change default model ordering.
     */
    protected static function boot()
    {
        parent::boot();

        // Order model results by creation date desc
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }


    /**
     * Return created_at formated
     * when calling created_at_language
     *
     * @return string
     */
    public function getCreatedAtLanguageAttribute()
    {
        return ucfirst($this->created_at->translatedFormat('M d, Y'));
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
     * Notes - Patient relationship
     * Many notes model allowed per patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'owner_id', 'patID')->withDefault();
    }


    /**
     * User - Notes relationship
     * Only 1 user model allowed per note.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }
}
