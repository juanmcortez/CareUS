<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        /* ****************** */
        /* ***** CUSTOM ***** */
        'patient.externalID'                            => '<strong>External ID</strong>',
        'patient.patient_level_accession'               => '<strong>Accession #</strong>',
        /* ***** NAME ***** */
        'patient.persona.title'                         => '<strong>Title</strong>',
        'patient.persona.last_name'                     => '<strong>Last name</strong>',
        'patient.persona.first_name'                    => '<strong>First name</strong>',
        'patient.persona.middle_name'                   => '<strong>Middle name</strong>',
        /* ***** PHONE ***** */
        'patient.persona.phone.0.type'                  => '<strong>Phone #1 - type</strong>',
        'patient.persona.phone.0.international_code'    => '<strong>Phone #1 - international code</strong>',
        'patient.persona.phone.0.area_code'             => '<strong>Phone #1 - area code</strong>',
        'patient.persona.phone.0.initial_digits'        => '<strong>Phone #1 - number</strong>',
        'patient.persona.phone.0.last_digits'           => '<strong>Phone #1 - number</strong>',
        'patient.persona.phone.0.extension'             => '<strong>Phone #1 - extension</strong>',
        'patient.persona.phone.1.type'                  => '<strong>Phone #2 - type</strong>',
        'patient.persona.phone.1.international_code'    => '<strong>Phone #2 - internationl code</strong>',
        'patient.persona.phone.1.area_code'             => '<strong>Phone #2 - area code</strong>',
        'patient.persona.phone.1.initial_digits'        => '<strong>Phone #2 - number</strong>',
        'patient.persona.phone.1.last_digits'           => '<strong>Phone #2 - number</strong>',
        'patient.persona.phone.1.extension'             => '<strong>Phone #2 - extension</strong>',
        /* ***** EMAIL ***** */
        'patient.persona.email'                         => '<strong>E-mail</strong>',
        /* ***** ADDRESS ***** */
        'patient.persona.address.street'                => '<strong>Address</strong>',
        'patient.persona.address.street_extended'       => '<strong>Extended address</strong>',
        'patient.persona.address.city'                  => '<strong>City</strong>',
        'patient.persona.address.state'                 => '<strong>State</strong>',
        'patient.persona.address.zip'                   => '<strong>Zip</strong>',
        'patient.persona.address.country'               => '<strong>Country</strong>',
        /* ***** DEMOGRAPHICS ***** */
        'patient.persona.gender'                        => '<strong>Gender</strong>',
        'patient.persona.date_of_birth.month'           => '<strong>Birthday month</strong>',
        'patient.persona.date_of_birth.day'             => '<strong>Birthday day</strong>',
        'patient.persona.date_of_birth.year'            => '<strong>Birthday year</strong>',
        /* ***** SSN ***** */
        'patient.persona.social_security'               => '<strong>Social Security</strong>',
        /* ***** OTHERS ***** */
        'patient.persona.driver_license'                => '<strong>Driver license</strong>',
        'patient.persona.family_size'                   => '<strong>Family size</strong>',
        'patient.persona.marital'                       => '<strong>Marital status</strong>',
        'patient.persona.marital_details'               => '<strong>Marital details</strong>',
        'patient.persona.language'                      => '<strong>Language</strong>',
        'patient.persona.ethnicity'                     => '<strong>Ethnicity</strong>',
        'patient.persona.race'                          => '<strong>Race</strong>',
        'patient.persona.migrant_seasonal'              => '<strong>Migrant / seasonal</strong>',
        'patient.persona.interpreter'                   => '<strong>Interpreter</strong>',
        'patient.persona.homeless'                      => '<strong>Homeless</strong>',
        'patient.persona.referral'                      => '<strong>Referral</strong>',
        'patient.persona.vfc'                           => '<strong>VFC</strong>',
        /* ***** DECEASE ***** */
        'patient.persona.decease_date.month'            => '<strong>Decease month</strong>',
        'patient.persona.decease_date.day'              => '<strong>Decease day</strong>',
        'patient.persona.decease_date.year'             => '<strong>Decease year</strong>',
        'patient.persona.decease_reason'                => '<strong>Decease reason</strong>',
        /* ***** CONTACTS ***** */
        'patient.contact.*.contact_type'                => '<strong>Contact type</strong>',
        // Name
        'patient.contact.*.title'                       => '<strong>Title</strong>',
        'patient.contact.*.last_name'                   => '<strong>Last name</strong>',
        'patient.contact.*.first_name'                  => '<strong>First name</strong>',
        'patient.contact.*.middle_name'                 => '<strong>Middle name</strong>',
        // Phone
        'patient.contact.*.phone.type'                  => '<strong>Phone - type</strong>',
        'patient.contact.*.phone.international_code'    => '<strong>Phone - international code</strong>',
        'patient.contact.*.phone.area_code'             => '<strong>Phone - area code</strong>',
        'patient.contact.*.phone.initial_digits'        => '<strong>Phone - number</strong>',
        'patient.contact.*.phone.last_digits'           => '<strong>Phone - number</strong>',
        'patient.contact.*.phone.extension'             => '<strong>Phone - extension</strong>',
        // Email
        'patient.contact.*.email'                       => '<strong>E-mail</strong>',
        // Address
        'patient.contact.*.address.street'              => '<strong>Address</strong>',
        'patient.contact.*.address.street_extended'     => '<strong>Extended address</strong>',
        'patient.contact.*.address.city'                => '<strong>City</strong>',
        'patient.contact.*.address.state'               => '<strong>State</strong>',
        'patient.contact.*.address.zip'                 => '<strong>Zip</strong>',
        'patient.contact.*.address.country'             => '<strong>Country</strong>',
        /* ***** EMPLOYMENT ***** */
        'patient.employer.company'                      => '<strong>Company</strong>',
        'patient.employer.occupation'                   => '<strong>Occupation</strong>',
        'patient.employer.monthly_income'               => '<strong>Monthly income</strong>',
        'patient.employer.financial_review'             => '<strong>Financial review</strong>',
        // Name
        'patient.employer.title'                        => '<strong>Title</strong>',
        'patient.employer.last_name'                    => '<strong>Last name</strong>',
        'patient.employer.first_name'                   => '<strong>First name</strong>',
        'patient.employer.middle_name'                  => '<strong>Middle name</strong>',
        // Phone
        'patient.employer.phone.type'                   => '<strong>Phone - type</strong>',
        'patient.employer.phone.international_code'     => '<strong>Phone - international code</strong>',
        'patient.employer.phone.area_code'              => '<strong>Phone - area code</strong>',
        'patient.employer.phone.initial_digits'         => '<strong>Phone - number</strong>',
        'patient.employer.phone.last_digits'            => '<strong>Phone - number</strong>',
        'patient.employer.phone.extension'              => '<strong>Phone - extension</strong>',
        // Email
        'patient.employer.email'                        => '<strong>E-mail</strong>',
        // Address
        'patient.employer.address.street'               => '<strong>Address</strong>',
        'patient.employer.address.street_extended'      => '<strong>Extended address</strong>',
        'patient.employer.address.city'                 => '<strong>City</strong>',
        'patient.employer.address.state'                => '<strong>State</strong>',
        'patient.employer.address.zip'                  => '<strong>Zip</strong>',
        'patient.employer.address.country'              => '<strong>Country</strong>',
    ],

];
