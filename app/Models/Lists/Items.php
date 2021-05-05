<?php

namespace App\Models\Lists;

use App\Models\Lists\Items;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'list_item_type',
        'list_item_master',
        'list_item_name',
        'list_item_value',
        'list_item_title',
        'list_item_default',
        'list_item_order',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'list_item_master',
        'list_item_order',
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
     * Returns the list of items required for the
     * edit / creation forms
     *
     * @param Patient $patient
     *
     * @return array
     */
    public function getSelectListsItems(Patient $patient)
    {
        $country = (empty($patient->persona->address->country)) ? 'US' : $patient->persona->address->country;

        $titles = $this->select('list_item_value', 'list_item_title')
            ->Where('list_item_type', 'child')
            ->where('list_item_name', 'title')
            ->orderBy('list_item_title')
            ->get();

        $states = $this->select('list_item_value', 'list_item_title')
            ->Where('list_item_type', 'sub_child')
            ->where('list_item_master', 'countries')
            ->where('list_item_name', $country)
            ->orderBy('list_item_title')
            ->get();

        $countries = $this->select('list_item_value', 'list_item_title')
            ->Where('list_item_type', 'child')
            ->where('list_item_name', 'countries')
            ->orderBy('list_item_title')
            ->get();

        $contacttypes = $this->select('list_item_value', 'list_item_title')
            ->Where('list_item_type', 'child')
            ->where('list_item_name', 'contacttype')
            ->orderBy('list_item_title')
            ->get();

        $genders = $this->select('list_item_value', 'list_item_title')
            ->Where('list_item_type', 'child')
            ->where('list_item_name', 'gender')
            ->orderBy('list_item_title')
            ->get();

        $phonetypes = $this->select('list_item_value', 'list_item_title')
            ->Where('list_item_type', 'child')
            ->where('list_item_name', 'phonetype')
            ->orderBy('list_item_title')
            ->get();

        return compact('titles', 'states', 'countries', 'contacttypes', 'genders', 'phonetypes');
    }


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
}
