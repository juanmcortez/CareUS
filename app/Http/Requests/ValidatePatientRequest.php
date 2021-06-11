<?php

namespace App\Http\Requests;

use App\Models\Insurances\Subscriber;
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
            'patient.externalID'                            => 'required|string|between:1,16',
            'patient.patient_level_accession'               => 'nullable|string|between:1,16',
            /* ***** PROFILE ****- */
            'patient.persona.profile_photo'                 => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            /* ***** NAME ***** */
            'patient.persona.title'                         => 'nullable|between:1,8',
            'patient.persona.last_name'                     => 'required|string|between:3,32',
            'patient.persona.first_name'                    => 'required|string|between:3,32',
            'patient.persona.middle_name'                   => 'nullable|string|between:3,32',
            /* ***** PHONE ***** */
            'patient.persona.phone.0.type'                  => 'required',
            'patient.persona.phone.0.international_code'    => 'required',
            'patient.persona.phone.0.area_code'             => 'required',
            'patient.persona.phone.0.initial_digits'        => 'required',
            'patient.persona.phone.0.last_digits'           => 'required',
            'patient.persona.phone.*.type'                  => 'nullable|string|between:1,10|in:home,cellphone,work,emergency,family,relative',
            'patient.persona.phone.*.international_code'    => 'nullable|digits_between:1,3',
            'patient.persona.phone.*.area_code'             => 'nullable|digits_between:1,3',
            'patient.persona.phone.*.initial_digits'        => 'nullable|digits_between:1,3',
            'patient.persona.phone.*.last_digits'           => 'nullable|digits_between:1,4',
            'patient.persona.phone.*.extension'             => 'nullable|digits_between:1,4',
            /* ***** EMAIL ***** */
            'patient.persona.email'                         => 'required|email|string|between:1,64',
            /* ***** ADDRESS ***** */
            'patient.persona.address.street'                => 'required|string|between:1,64',
            'patient.persona.address.street_extended'       => 'nullable|string|between:1,64',
            'patient.persona.address.city'                  => 'required|string|between:1,32',
            'patient.persona.address.state'                 => 'required|string|between:1,4',
            'patient.persona.address.zip'                   => 'required|string|between:1,12',
            'patient.persona.address.country'               => 'required|string|between:1,4',
            /* ***** DEMOGRAPHICS ***** */
            'patient.persona.gender'                        => 'nullable|string|between:1,12',
            'patient.persona.date_of_birth.month'           => 'required|digits_between:1,2',
            'patient.persona.date_of_birth.day'             => 'required|digits_between:1,2',
            'patient.persona.date_of_birth.year'            => 'required|digits_between:1,4',
            /* ***** SSN ***** */
            'patient.persona.social_security'               => 'required|string|between:1,16',
            /* ***** OTHERS ***** */
            'patient.persona.driver_license'                => 'nullable|string|between:1,16',
            'patient.persona.family_size'                   => 'nullable|string|between:1,16',
            'patient.persona.marital'                       => 'nullable|string|between:1,32',
            'patient.persona.marital_details'               => 'nullable|string|between:1,128',
            'patient.persona.language'                      => 'required|string|between:1,5',
            'patient.persona.ethnicity'                     => 'nullable|string|between:1,16',
            'patient.persona.race'                          => 'nullable|string|between:1,16',
            'patient.persona.migrant_seasonal'              => 'nullable|string|between:1,64',
            'patient.persona.interpreter'                   => 'nullable|string|between:1,64',
            'patient.persona.homeless'                      => 'nullable|string|between:1,64',
            'patient.persona.referral'                      => 'nullable|string|between:1,16',
            'patient.persona.vfc'                           => 'nullable|string|between:1,16',
            /* ***** DECEASE ***** */
            'patient.persona.decease_date.month'            => 'nullable|digits_between:1,2',
            'patient.persona.decease_date.day'              => 'nullable|digits_between:1,2',
            'patient.persona.decease_date.year'             => 'nullable|digits_between:1,4',
            'patient.persona.decease_reason'                => 'nullable|string|between:1,128',
            /* ***** CONTACTS ***** */
            'patient.contact.*.contact_type'                => 'nullable|string|between:1,10|in:mother,father,guardian,relative,other',
            // Name
            'patient.contact.*.title'                       => 'nullable|between:1,8',
            'patient.contact.*.last_name'                   => 'nullable|string|between:3,32',
            'patient.contact.*.first_name'                  => 'nullable|string|between:3,32',
            'patient.contact.*.middle_name'                 => 'nullable|string|between:3,32',
            // Phone
            'patient.contact.*.phone.type'                  => 'nullable|string|between:1,10|in:home,cellphone,work,emergency,family,relative',
            'patient.contact.*.phone.international_code'    => 'nullable|digits_between:1,3',
            'patient.contact.*.phone.area_code'             => 'nullable|digits_between:1,3',
            'patient.contact.*.phone.initial_digits'        => 'nullable|digits_between:1,3',
            'patient.contact.*.phone.last_digits'           => 'nullable|digits_between:1,4',
            'patient.contact.*.phone.extension'             => 'nullable|digits_between:1,4',
            // Email
            'patient.contact.*.email'                       => 'nullable|email|string|between:1,64',
            // Address
            'patient.contact.*.address.street'              => 'nullable|string|between:1,64',
            'patient.contact.*.address.street_extended'     => 'nullable|string|between:1,64',
            'patient.contact.*.address.city'                => 'nullable|string|between:1,32',
            'patient.contact.*.address.state'               => 'nullable|string|between:1,4',
            'patient.contact.*.address.zip'                 => 'nullable|string|between:1,12',
            'patient.contact.*.address.country'             => 'nullable|string|between:1,4',
            /* ***** EMPLOYMENT ***** */
            'patient.employer.company'                      => 'nullable|string|between:1,64',
            'patient.employer.occupation'                   => 'nullable|string|between:1,96',
            'patient.employer.monthly_income'               => 'nullable|numeric|between:1,10000000',
            'patient.employer.financial_review'             => 'nullable|string|between:1,64',
            // Name
            'patient.employer.title'                        => 'nullable|between:1,8',
            'patient.employer.last_name'                    => 'nullable|string|between:3,32',
            'patient.employer.first_name'                   => 'nullable|string|between:3,32',
            'patient.employer.middle_name'                  => 'nullable|string|between:3,32',
            // Phone
            'patient.employer.phone.type'                   => 'nullable|string|between:1,10|in:home,cellphone,work,emergency,family,relative',
            'patient.employer.phone.international_code'     => 'nullable|digits_between:1,3',
            'patient.employer.phone.area_code'              => 'nullable|digits_between:1,3',
            'patient.employer.phone.initial_digits'         => 'nullable|digits_between:1,3',
            'patient.employer.phone.last_digits'            => 'nullable|digits_between:1,4',
            'patient.employer.phone.extension'              => 'nullable|digits_between:1,4',
            // Email
            'patient.employer.email'                        => 'nullable|email|string|between:1,64',
            // Address
            'patient.employer.address.street'               => 'nullable|string|between:1,64',
            'patient.employer.address.street_extended'      => 'nullable|string|between:1,64',
            'patient.employer.address.city'                 => 'nullable|string|between:1,32',
            'patient.employer.address.state'                => 'nullable|string|between:1,4',
            'patient.employer.address.zip'                  => 'nullable|string|between:1,12',
            'patient.employer.address.country'              => 'nullable|string|between:1,4',
            /* ***** SUBSCRIBERS ***** */
            // insurance
            'patient.subscriber.0.company_id'               => 'required',
            'patient.subscriber.0.policy_number'            => 'required',
            'patient.subscriber.*.company_id'               => 'nullable|numeric',
            'patient.subscriber.*.policy_number'            => 'nullable|string|between:3,32',
            'patient.subscriber.*.group_number'             => 'nullable|string|between:3,32',
            'patient.subscriber.*.plan_name'                => 'nullable|string|between:3,32',

            'patient.subscriber.0.effective_date.month'     => 'required',
            'patient.subscriber.0.effective_date.day'       => 'required',
            'patient.subscriber.0.effective_date.year'      => 'required',
            'patient.subscriber.*.effective_date.month'     => 'nullable|digits_between:1,2',
            'patient.subscriber.*.effective_date.day'       => 'nullable|digits_between:1,2',
            'patient.subscriber.*.effective_date.year'      => 'nullable|digits_between:1,4',

            'patient.subscriber.*.termination_date.month'   => 'nullable|digits_between:1,2',
            'patient.subscriber.*.termination_date.day'     => 'nullable|digits_between:1,2',
            'patient.subscriber.*.termination_date.year'    => 'nullable|digits_between:1,4',

            'patient.subscriber.0.ins_relation'             => 'required',
            'patient.subscriber.0.accept_assignment'        => 'required',
            'patient.subscriber.*.ins_relation'             => 'nullable|string|between:1,16',
            'patient.subscriber.*.patient_copay'            => 'nullable|numeric',
            'patient.subscriber.*.accept_assignment'        => 'nullable|string|between:2,3',
            'patient.subscriber.*.secondary_medical_type'   => 'nullable|string|between:3,32',

            'patient.subscriber.0.persona.last_name'                => 'required',
            'patient.subscriber.0.persona.first_name'               => 'required',
            'patient.subscriber.*.persona.title'                    => 'nullable|between:1,8',
            'patient.subscriber.*.persona.last_name'                => 'nullable|string|between:3,32',
            'patient.subscriber.*.persona.first_name'               => 'nullable|string|between:3,32',
            'patient.subscriber.*.persona.middle_name'              => 'nullable|string|between:3,32',

            'patient.subscriber.0.persona.phone.type'                  => 'required',
            'patient.subscriber.0.persona.phone.international_code'    => 'required',
            'patient.subscriber.0.persona.phone.area_code'             => 'required',
            'patient.subscriber.0.persona.phone.initial_digits'        => 'required',
            'patient.subscriber.0.persona.phone.last_digits'           => 'required',
            'patient.subscriber.*.persona.phone.type'                  => 'nullable|string|between:1,10|in:home,cellphone,work,emergency,family,relative',
            'patient.subscriber.*.persona.phone.international_code'    => 'nullable|digits_between:1,3',
            'patient.subscriber.*.persona.phone.area_code'             => 'nullable|digits_between:1,3',
            'patient.subscriber.*.persona.phone.initial_digits'        => 'nullable|digits_between:1,3',
            'patient.subscriber.*.persona.phone.last_digits'           => 'nullable|digits_between:1,4',
            'patient.subscriber.*.persona.phone.extension'             => 'nullable|digits_between:1,4',

            'patient.subscriber.0.persona.email'                    => 'required',
            'patient.subscriber.*.persona.email'                    => 'nullable|email|string|between:1,64',

            'patient.subscriber.0.persona.address.street'           => 'required',
            'patient.subscriber.0.persona.address.city'             => 'required',
            'patient.subscriber.0.persona.address.state'            => 'required',
            'patient.subscriber.0.persona.address.zip'              => 'required',
            'patient.subscriber.0.persona.address.country'          => 'required',
            'patient.subscriber.*.persona.address.street'           => 'nullable|string|between:1,64',
            'patient.subscriber.*.persona.address.street_extended'  => 'nullable|string|between:1,64',
            'patient.subscriber.*.persona.address.city'             => 'nullable|string|between:1,32',
            'patient.subscriber.*.persona.address.state'            => 'nullable|string|between:1,4',
            'patient.subscriber.*.persona.address.zip'              => 'nullable|string|between:1,12',
            'patient.subscriber.*.persona.address.country'          => 'nullable|string|between:1,4',

            'patient.subscriber.0.persona.date_of_birth.month'      => 'required',
            'patient.subscriber.0.persona.date_of_birth.day'        => 'required',
            'patient.subscriber.0.persona.date_of_birth.year'       => 'required',
            'patient.subscriber.*.persona.gender'                   => 'nullable|string|between:1,12',
            'patient.subscriber.*.persona.date_of_birth.month'      => 'nullable|digits_between:1,2',
            'patient.subscriber.*.persona.date_of_birth.day'        => 'nullable|digits_between:1,2',
            'patient.subscriber.*.persona.date_of_birth.year'       => 'nullable|digits_between:1,4',

            'patient.subscriber.0.persona.social_security'          => 'required',
            'patient.subscriber.*.persona.social_security'          => 'nullable|string|between:1,16',
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
