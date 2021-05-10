<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient.externalID'                            => 'required|string|min:1|max:16',
            'patient.patient_level_accession'               => 'nullable|string|min:1|max:16',
            /* ***** NAME ***** */
            'patient.persona.title'                         => 'string|min:1|max:8',
            'patient.persona.last_name'                     => 'required|string|min:1|max:32',
            'patient.persona.first_name'                    => 'required|string|min:1|max:32',
            'patient.persona.middle_name'                   => 'nullable|string|min:1|max:32',
            /* ***** PHONE ***** */
            'patient.persona.phone.0.type'                  => 'required|string|min:1|max:10|in:home,cellphone,work,emergency,family,relative',
            'patient.persona.phone.0.international_code'    => 'required|digits_between:1,3',
            'patient.persona.phone.0.area_code'             => 'required|digits_between:1,3',
            'patient.persona.phone.0.initial_digits'        => 'required|digits_between:1,3',
            'patient.persona.phone.0.last_digits'           => 'required|digits_between:1,4',
            'patient.persona.phone.0.extension'             => 'nullable|digits_between:1,4',
            'patient.persona.phone.1.type'                  => 'nullable|string|min:1|max:10|in:home,cellphone,work,emergency,family,relative',
            'patient.persona.phone.1.international_code'    => 'nullable|digits_between:1,3',
            'patient.persona.phone.1.area_code'             => 'nullable|digits_between:1,3',
            'patient.persona.phone.1.initial_digits'        => 'nullable|digits_between:1,3',
            'patient.persona.phone.1.last_digits'           => 'nullable|digits_between:1,4',
            'patient.persona.phone.1.extension'             => 'nullable|digits_between:1,4',
            /* ***** EMAIL ***** */
            'patient.persona.email'                         => 'required|email|string|min:1|max:64',
            /* ***** ADDRESS ***** */
            'patient.persona.address.street'                => 'required|string|min:1|max:64',
            'patient.persona.address.street_extended'       => 'nullable|string|min:1|max:64',
            'patient.persona.address.city'                  => 'required|string|min:1|max:32',
            'patient.persona.address.state'                 => 'required|string|min:1|max:4',
            'patient.persona.address.zip'                   => 'required|string|min:1|max:12',
            'patient.persona.address.country'               => 'nullable|string|min:1|max:4',
            /* ***** DEMOGRAPHICS ***** */
            'patient.persona.gender'                        => 'required|string|min:1|max:12',
            'patient.persona.date_of_birth.month'           => 'required|digits_between:1,2',
            'patient.persona.date_of_birth.day'             => 'required|digits_between:1,2',
            'patient.persona.date_of_birth.year'            => 'required|digits_between:1,4',
            /* ***** SSN ***** */
            'patient.persona.social_security'               => 'nullable|string|min:1|max:16',
            /* ***** OTHERS ***** */
            'patient.persona.driver_license'                => 'nullable|string|min:1|max:16',
            'patient.persona.family_size'                   => 'nullable|string|min:1|max:16',
            'patient.persona.marital'                       => 'nullable|string|min:1|max:32',
            'patient.persona.marital_details'               => 'nullable|string|min:1|max:128',
            'patient.persona.language'                      => 'required|string|min:1|max:5',
            'patient.persona.ethnicity'                     => 'nullable|string|min:1|max:16',
            'patient.persona.race'                          => 'nullable|string|min:1|max:16',
            'patient.persona.migrant_seasonal'              => 'nullable|string|min:1|max:64',
            'patient.persona.interpreter'                   => 'nullable|string|min:1|max:64',
            'patient.persona.homeless'                      => 'nullable|string|min:1|max:64',
            'patient.persona.referral'                      => 'nullable|string|min:1|max:16',
            'patient.persona.vfc'                           => 'nullable|string|min:1|max:16',
            /* ***** DECEASE ***** */
            'patient.persona.decease_date.month'            => 'nullable|digits_between:1,2',
            'patient.persona.decease_date.day'              => 'nullable|digits_between:1,2',
            'patient.persona.decease_date.year'             => 'nullable|digits_between:1,4',
            'patient.persona.decease_reason'                => 'nullable|string|min:1|max:128',
            /* ***** CONTACTS ***** */
            'patient.contact.*.contact_type'                => 'nullable|string|min:1|max:10|in:mother,father,guardian,relative,other',
            // Name
            'patient.contact.*.title'                       => 'string|min:1|max:8',
            'patient.contact.*.last_name'                   => 'nullable|string|min:1|max:32',
            'patient.contact.*.first_name'                  => 'nullable|string|min:1|max:32',
            'patient.contact.*.middle_name'                 => 'nullable|string|min:1|max:32',
            // Phone
            'patient.contact.*.phone.type'                  => 'nullable|string|min:1|max:10|in:home,cellphone,work,emergency,family,relative',
            'patient.contact.*.phone.international_code'    => 'nullable|digits_between:1,3',
            'patient.contact.*.phone.area_code'             => 'nullable|digits_between:1,3',
            'patient.contact.*.phone.initial_digits'        => 'nullable|digits_between:1,3',
            'patient.contact.*.phone.last_digits'           => 'nullable|digits_between:1,4',
            'patient.contact.*.phone.extension'             => 'nullable|digits_between:1,4',
            // Email
            'patient.contact.*.email'                       => 'nullable|email|string|min:1|max:64',
            // Address
            'patient.contact.*.address.street'              => 'nullable|string|min:1|max:64',
            'patient.contact.*.address.street_extended'     => 'nullable|string|min:1|max:64',
            'patient.contact.*.address.city'                => 'nullable|string|min:1|max:32',
            'patient.contact.*.address.state'               => 'nullable|string|min:1|max:4',
            'patient.contact.*.address.zip'                 => 'nullable|string|min:1|max:12',
            'patient.contact.*.address.country'             => 'nullable|string|min:1|max:4',
            /* ***** EMPLOYMENT ***** */
            'patient.employer.company'                      => 'nullable|string|min:1|max:64',
            'patient.employer.occupation'                   => 'nullable|string|min:1|max:96',
            'patient.employer.monthly_income'               => 'nullable|string|min:1|max:64',
            'patient.employer.financial_review'             => 'nullable|string|min:1|max:64',
            // Name
            'patient.employer.title'                        => 'string|min:1|max:8',
            'patient.employer.last_name'                    => 'nullable|string|min:1|max:32',
            'patient.employer.first_name'                   => 'nullable|string|min:1|max:32',
            'patient.employer.middle_name'                  => 'nullable|string|min:1|max:32',
            // Phone
            'patient.employer.phone.type'                   => 'nullable|string|min:1|max:10|in:home,cellphone,work,emergency,family,relative',
            'patient.employer.phone.international_code'     => 'nullable|digits_between:1,3',
            'patient.employer.phone.area_code'              => 'nullable|digits_between:1,3',
            'patient.employer.phone.initial_digits'         => 'nullable|digits_between:1,3',
            'patient.employer.phone.last_digits'            => 'nullable|digits_between:1,4',
            'patient.employer.phone.extension'              => 'nullable|digits_between:1,4',
            // Email
            'patient.employer.email'                        => 'nullable|email|string|min:1|max:64',
            // Address
            'patient.employer.address.street'               => 'nullable|string|min:1|max:64',
            'patient.employer.address.street_extended'      => 'nullable|string|min:1|max:64',
            'patient.employer.address.city'                 => 'nullable|string|min:1|max:32',
            'patient.employer.address.state'                => 'nullable|string|min:1|max:4',
            'patient.employer.address.zip'                  => 'nullable|string|min:1|max:12',
            'patient.employer.address.country'              => 'nullable|string|min:1|max:4',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // Attributes are on validation.php file! (translation)
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // Attributes are on validation.php file! (translation)
        ];
    }
}
