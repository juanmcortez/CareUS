<?php

namespace App\Models\Insurances;

use App\Models\Common\Address;
use App\Models\Common\Phone;
use App\Models\Insurances\Subscriber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'insID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'insID',
        'company_name',
        'group_name',
        'attention',
        'effective_date',
        'termination_date',
        'participating',
        'do_not_bill',
        'do_not_import',
        'payerID',
        'payer_type',
        'financial_class',
        'payment_code',
        'x12_partner_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
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
     * Insurance company - Address relationship
     * Only 1 address model allowed per insurance company.
     */
    public function address()
    {
        return $this->hasOne(Address::class, 'owner_id', 'insID')->where('owner_type', 'insurance');
    }


    /**
     * Subscriber - Insurance company relationship
     * Many subscriber models allowed per insurance company.
     */
    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'company_id', 'insID')->withDefault();
    }


    /**
     * Insurance company - Phone relationship
     * Only 1 phone model allowed per insurance company.
     */
    public function phone()
    {
        return $this->hasOne(Phone::class, 'owner_id', 'insID')->where('owner_type', 'insurance');
    }
}
