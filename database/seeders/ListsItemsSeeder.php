<?php

namespace Database\Seeders;

use App\Models\Lists\Items;
use Database\Factories\Lists\ItemsFactory;
use Illuminate\Database\Seeder;

class ListsItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createContactType();
        $this->createCountries();
        $this->createEthnic();
        $this->createGender();
        $this->createInsuranceFinancialClass();
        $this->createInsurancePayerType();
        $this->createInsurancePaymentCode();
        $this->createInsuranceRelationship();
        $this->createInsuranceType();
        $this->createLanguage();
        $this->createMarital();
        $this->createPhoneType();
        $this->createRace();
        $this->createReferral();
        $this->createSecondaryMedicalType();
        $this->createTitle();
        $this->createVFC();
        $this->createYesNo();
    }


    /**
     * Countries lists
     *
     * @return void
     */
    private function createCountries()
    {
        $data_array = [
            ['list_item_title' => 'Afghanistan', 'list_item_value' => 'AF'],
            ['list_item_title' => 'Åland Islands', 'list_item_value' => 'AX'],
            ['list_item_title' => 'Albania', 'list_item_value' => 'AL'],
            ['list_item_title' => 'Algeria', 'list_item_value' => 'DZ'],
            ['list_item_title' => 'American Samoa', 'list_item_value' => 'AS'],
            ['list_item_title' => 'Andorra', 'list_item_value' => 'AD'],
            ['list_item_title' => 'Angola', 'list_item_value' => 'AO'],
            ['list_item_title' => 'Anguilla', 'list_item_value' => 'AI'],
            ['list_item_title' => 'Antarctica', 'list_item_value' => 'AQ'],
            ['list_item_title' => 'Antigua and Barbuda', 'list_item_value' => 'AG'],
            ['list_item_title' => 'Argentina', 'list_item_value' => 'AR'],
            ['list_item_title' => 'Armenia', 'list_item_value' => 'AM'],
            ['list_item_title' => 'Aruba', 'list_item_value' => 'AW'],
            ['list_item_title' => 'Australia', 'list_item_value' => 'AU'],
            ['list_item_title' => 'Austria', 'list_item_value' => 'AT'],
            ['list_item_title' => 'Azerbaijan', 'list_item_value' => 'AZ'],
            ['list_item_title' => 'Bahamas', 'list_item_value' => 'BS'],
            ['list_item_title' => 'Bahrain', 'list_item_value' => 'BH'],
            ['list_item_title' => 'Bangladesh', 'list_item_value' => 'BD'],
            ['list_item_title' => 'Barbados', 'list_item_value' => 'BB'],
            ['list_item_title' => 'Belarus', 'list_item_value' => 'BY'],
            ['list_item_title' => 'Belgium', 'list_item_value' => 'BE'],
            ['list_item_title' => 'Belize', 'list_item_value' => 'BZ'],
            ['list_item_title' => 'Benin', 'list_item_value' => 'BJ'],
            ['list_item_title' => 'Bermuda', 'list_item_value' => 'BM'],
            ['list_item_title' => 'Bhutan', 'list_item_value' => 'BT'],
            ['list_item_title' => 'Bolivia, Plurinational State of', 'list_item_value' => 'BO'],
            ['list_item_title' => 'Bonaire, Sint Eustatius and Saba', 'list_item_value' => 'BQ'],
            ['list_item_title' => 'Bosnia and Herzegovina', 'list_item_value' => 'BA'],
            ['list_item_title' => 'Botswana', 'list_item_value' => 'BW'],
            ['list_item_title' => 'Bouvet Island', 'list_item_value' => 'BV'],
            ['list_item_title' => 'Brazil', 'list_item_value' => 'BR'],
            ['list_item_title' => 'British Indian Ocean Territory', 'list_item_value' => 'IO'],
            ['list_item_title' => 'Brunei Darussalam', 'list_item_value' => 'BN'],
            ['list_item_title' => 'Bulgaria', 'list_item_value' => 'BG'],
            ['list_item_title' => 'Burkina Faso', 'list_item_value' => 'BF'],
            ['list_item_title' => 'Burundi', 'list_item_value' => 'BI'],
            ['list_item_title' => 'Cambodia', 'list_item_value' => 'KH'],
            ['list_item_title' => 'Cameroon', 'list_item_value' => 'CM'],
            ['list_item_title' => 'Canada', 'list_item_value' => 'CA'],
            ['list_item_title' => 'Cape Verde', 'list_item_value' => 'CV'],
            ['list_item_title' => 'Cayman Islands', 'list_item_value' => 'KY'],
            ['list_item_title' => 'Central African Republic', 'list_item_value' => 'CF'],
            ['list_item_title' => 'Chad', 'list_item_value' => 'TD'],
            ['list_item_title' => 'Chile', 'list_item_value' => 'CL'],
            ['list_item_title' => 'China', 'list_item_value' => 'CN'],
            ['list_item_title' => 'Christmas Island', 'list_item_value' => 'CX'],
            ['list_item_title' => 'Cocos (Keeling) Islands', 'list_item_value' => 'CC'],
            ['list_item_title' => 'Colombia', 'list_item_value' => 'CO'],
            ['list_item_title' => 'Comoros', 'list_item_value' => 'KM'],
            ['list_item_title' => 'Congo', 'list_item_value' => 'CG'],
            ['list_item_title' => 'Congo, the Democratic Republic of the', 'list_item_value' => 'CD'],
            ['list_item_title' => 'Cook Islands', 'list_item_value' => 'CK'],
            ['list_item_title' => 'Costa Rica', 'list_item_value' => 'CR'],
            ['list_item_title' => 'Côte d\'Ivoire', 'list_item_value' => 'CI'],
            ['list_item_title' => 'Croatia', 'list_item_value' => 'HR'],
            ['list_item_title' => 'Cuba', 'list_item_value' => 'CU'],
            ['list_item_title' => 'Curaçao', 'list_item_value' => 'CW'],
            ['list_item_title' => 'Cyprus', 'list_item_value' => 'CY'],
            ['list_item_title' => 'Czech Republic', 'list_item_value' => 'CZ'],
            ['list_item_title' => 'Denmark', 'list_item_value' => 'DK'],
            ['list_item_title' => 'Djibouti', 'list_item_value' => 'DJ'],
            ['list_item_title' => 'Dominica', 'list_item_value' => 'DM'],
            ['list_item_title' => 'Dominican Republic', 'list_item_value' => 'DO'],
            ['list_item_title' => 'Ecuador', 'list_item_value' => 'EC'],
            ['list_item_title' => 'Egypt', 'list_item_value' => 'EG'],
            ['list_item_title' => 'El Salvador', 'list_item_value' => 'SV'],
            ['list_item_title' => 'Equatorial Guinea', 'list_item_value' => 'GQ'],
            ['list_item_title' => 'Eritrea', 'list_item_value' => 'ER'],
            ['list_item_title' => 'Estonia', 'list_item_value' => 'EE'],
            ['list_item_title' => 'Ethiopia', 'list_item_value' => 'ET'],
            ['list_item_title' => 'Falkland Islands (Malvinas)', 'list_item_value' => 'FK'],
            ['list_item_title' => 'Faroe Islands', 'list_item_value' => 'FO'],
            ['list_item_title' => 'Fiji', 'list_item_value' => 'FJ'],
            ['list_item_title' => 'Finland', 'list_item_value' => 'FI'],
            ['list_item_title' => 'France', 'list_item_value' => 'FR'],
            ['list_item_title' => 'French Guiana', 'list_item_value' => 'GF'],
            ['list_item_title' => 'French Polynesia', 'list_item_value' => 'PF'],
            ['list_item_title' => 'French Southern Territories', 'list_item_value' => 'TF'],
            ['list_item_title' => 'Gabon', 'list_item_value' => 'GA'],
            ['list_item_title' => 'Gambia', 'list_item_value' => 'GM'],
            ['list_item_title' => 'Georgia', 'list_item_value' => 'GE'],
            ['list_item_title' => 'Germany', 'list_item_value' => 'DE'],
            ['list_item_title' => 'Ghana', 'list_item_value' => 'GH'],
            ['list_item_title' => 'Gibraltar', 'list_item_value' => 'GI'],
            ['list_item_title' => 'Greece', 'list_item_value' => 'GR'],
            ['list_item_title' => 'Greenland', 'list_item_value' => 'GL'],
            ['list_item_title' => 'Grenada', 'list_item_value' => 'GD'],
            ['list_item_title' => 'Guadeloupe', 'list_item_value' => 'GP'],
            ['list_item_title' => 'Guam', 'list_item_value' => 'GU'],
            ['list_item_title' => 'Guatemala', 'list_item_value' => 'GT'],
            ['list_item_title' => 'Guernsey', 'list_item_value' => 'GG'],
            ['list_item_title' => 'Guinea', 'list_item_value' => 'GN'],
            ['list_item_title' => 'Guinea-Bissau', 'list_item_value' => 'GW'],
            ['list_item_title' => 'Guyana', 'list_item_value' => 'GY'],
            ['list_item_title' => 'Haiti', 'list_item_value' => 'HT'],
            ['list_item_title' => 'Heard Island and McDonald Mcdonald Islands', 'list_item_value' => 'HM'],
            ['list_item_title' => 'Holy See (Vatican City State)', 'list_item_value' => 'VA'],
            ['list_item_title' => 'Honduras', 'list_item_value' => 'HN'],
            ['list_item_title' => 'Hong Kong', 'list_item_value' => 'HK'],
            ['list_item_title' => 'Hungary', 'list_item_value' => 'HU'],
            ['list_item_title' => 'Iceland', 'list_item_value' => 'IS'],
            ['list_item_title' => 'India', 'list_item_value' => 'IN'],
            ['list_item_title' => 'Indonesia', 'list_item_value' => 'ID'],
            ['list_item_title' => 'Iran, Islamic Republic of', 'list_item_value' => 'IR'],
            ['list_item_title' => 'Iraq', 'list_item_value' => 'IQ'],
            ['list_item_title' => 'Ireland', 'list_item_value' => 'IE'],
            ['list_item_title' => 'Isle of Man', 'list_item_value' => 'IM'],
            ['list_item_title' => 'Israel', 'list_item_value' => 'IL'],
            ['list_item_title' => 'Italy', 'list_item_value' => 'IT'],
            ['list_item_title' => 'Jamaica', 'list_item_value' => 'JM'],
            ['list_item_title' => 'Japan', 'list_item_value' => 'JP'],
            ['list_item_title' => 'Jersey', 'list_item_value' => 'JE'],
            ['list_item_title' => 'Jordan', 'list_item_value' => 'JO'],
            ['list_item_title' => 'Kazakhstan', 'list_item_value' => 'KZ'],
            ['list_item_title' => 'Kenya', 'list_item_value' => 'KE'],
            ['list_item_title' => 'Kiribati', 'list_item_value' => 'KI'],
            ['list_item_title' => 'Korea, Democratic People\'s Republic of', 'list_item_value' => 'KP'],
            ['list_item_title' => 'Korea, Republic of', 'list_item_value' => 'KR'],
            ['list_item_title' => 'Kuwait', 'list_item_value' => 'KW'],
            ['list_item_title' => 'Kyrgyzstan', 'list_item_value' => 'KG'],
            ['list_item_title' => 'Lao People\'s Democratic Republic', 'list_item_value' => 'LA'],
            ['list_item_title' => 'Latvia', 'list_item_value' => 'LV'],
            ['list_item_title' => 'Lebanon', 'list_item_value' => 'LB'],
            ['list_item_title' => 'Lesotho', 'list_item_value' => 'LS'],
            ['list_item_title' => 'Liberia', 'list_item_value' => 'LR'],
            ['list_item_title' => 'Libya', 'list_item_value' => 'LY'],
            ['list_item_title' => 'Liechtenstein', 'list_item_value' => 'LI'],
            ['list_item_title' => 'Lithuania', 'list_item_value' => 'LT'],
            ['list_item_title' => 'Luxembourg', 'list_item_value' => 'LU'],
            ['list_item_title' => 'Macao', 'list_item_value' => 'MO'],
            ['list_item_title' => 'Macedonia, the Former Yugoslav Republic of', 'list_item_value' => 'MK'],
            ['list_item_title' => 'Madagascar', 'list_item_value' => 'MG'],
            ['list_item_title' => 'Malawi', 'list_item_value' => 'MW'],
            ['list_item_title' => 'Malaysia', 'list_item_value' => 'MY'],
            ['list_item_title' => 'Maldives', 'list_item_value' => 'MV'],
            ['list_item_title' => 'Mali', 'list_item_value' => 'ML'],
            ['list_item_title' => 'Malta', 'list_item_value' => 'MT'],
            ['list_item_title' => 'Marshall Islands', 'list_item_value' => 'MH'],
            ['list_item_title' => 'Martinique', 'list_item_value' => 'MQ'],
            ['list_item_title' => 'Mauritania', 'list_item_value' => 'MR'],
            ['list_item_title' => 'Mauritius', 'list_item_value' => 'MU'],
            ['list_item_title' => 'Mayotte', 'list_item_value' => 'YT'],
            ['list_item_title' => 'Mexico', 'list_item_value' => 'MX'],
            ['list_item_title' => 'Micronesia, Federated States of', 'list_item_value' => 'FM'],
            ['list_item_title' => 'Moldova, Republic of', 'list_item_value' => 'MD'],
            ['list_item_title' => 'Monaco', 'list_item_value' => 'MC'],
            ['list_item_title' => 'Mongolia', 'list_item_value' => 'MN'],
            ['list_item_title' => 'Montenegro', 'list_item_value' => 'ME'],
            ['list_item_title' => 'Montserrat', 'list_item_value' => 'MS'],
            ['list_item_title' => 'Morocco', 'list_item_value' => 'MA'],
            ['list_item_title' => 'Mozambique', 'list_item_value' => 'MZ'],
            ['list_item_title' => 'Myanmar', 'list_item_value' => 'MM'],
            ['list_item_title' => 'Namibia', 'list_item_value' => 'NA'],
            ['list_item_title' => 'Nauru', 'list_item_value' => 'NR'],
            ['list_item_title' => 'Nepal', 'list_item_value' => 'NP'],
            ['list_item_title' => 'Netherlands', 'list_item_value' => 'NL'],
            ['list_item_title' => 'New Caledonia', 'list_item_value' => 'NC'],
            ['list_item_title' => 'New Zealand', 'list_item_value' => 'NZ'],
            ['list_item_title' => 'Nicaragua', 'list_item_value' => 'NI'],
            ['list_item_title' => 'Niger', 'list_item_value' => 'NE'],
            ['list_item_title' => 'Nigeria', 'list_item_value' => 'NG'],
            ['list_item_title' => 'Niue', 'list_item_value' => 'NU'],
            ['list_item_title' => 'Norfolk Island', 'list_item_value' => 'NF'],
            ['list_item_title' => 'Northern Mariana Islands', 'list_item_value' => 'MP'],
            ['list_item_title' => 'Norway', 'list_item_value' => 'NO'],
            ['list_item_title' => 'Oman', 'list_item_value' => 'OM'],
            ['list_item_title' => 'Pakistan', 'list_item_value' => 'PK'],
            ['list_item_title' => 'Palau', 'list_item_value' => 'PW'],
            ['list_item_title' => 'Palestine, State of', 'list_item_value' => 'PS'],
            ['list_item_title' => 'Panama', 'list_item_value' => 'PA'],
            ['list_item_title' => 'Papua New Guinea', 'list_item_value' => 'PG'],
            ['list_item_title' => 'Paraguay', 'list_item_value' => 'PY'],
            ['list_item_title' => 'Peru', 'list_item_value' => 'PE'],
            ['list_item_title' => 'Philippines', 'list_item_value' => 'PH'],
            ['list_item_title' => 'Pitcairn', 'list_item_value' => 'PN'],
            ['list_item_title' => 'Poland', 'list_item_value' => 'PL'],
            ['list_item_title' => 'Portugal', 'list_item_value' => 'PT'],
            ['list_item_title' => 'Puerto Rico', 'list_item_value' => 'PR'],
            ['list_item_title' => 'Qatar', 'list_item_value' => 'QA'],
            ['list_item_title' => 'Réunion', 'list_item_value' => 'RE'],
            ['list_item_title' => 'Romania', 'list_item_value' => 'RO'],
            ['list_item_title' => 'Russian Federation', 'list_item_value' => 'RU'],
            ['list_item_title' => 'Rwanda', 'list_item_value' => 'RW'],
            ['list_item_title' => 'Saint Barthélemy', 'list_item_value' => 'BL'],
            ['list_item_title' => 'Saint Helena, Ascension and Tristan da Cunha', 'list_item_value' => 'SH'],
            ['list_item_title' => 'Saint Kitts and Nevis', 'list_item_value' => 'KN'],
            ['list_item_title' => 'Saint Lucia', 'list_item_value' => 'LC'],
            ['list_item_title' => 'Saint Martin (French part)', 'list_item_value' => 'MF'],
            ['list_item_title' => 'Saint Pierre and Miquelon', 'list_item_value' => 'PM'],
            ['list_item_title' => 'Saint Vincent and the Grenadines', 'list_item_value' => 'VC'],
            ['list_item_title' => 'Samoa', 'list_item_value' => 'WS'],
            ['list_item_title' => 'San Marino', 'list_item_value' => 'SM'],
            ['list_item_title' => 'Sao Tome and Principe', 'list_item_value' => 'ST'],
            ['list_item_title' => 'Saudi Arabia', 'list_item_value' => 'SA'],
            ['list_item_title' => 'Senegal', 'list_item_value' => 'SN'],
            ['list_item_title' => 'Serbia', 'list_item_value' => 'RS'],
            ['list_item_title' => 'Seychelles', 'list_item_value' => 'SC'],
            ['list_item_title' => 'Sierra Leone', 'list_item_value' => 'SL'],
            ['list_item_title' => 'Singapore', 'list_item_value' => 'SG'],
            ['list_item_title' => 'Sint Maarten (Dutch part)', 'list_item_value' => 'SX'],
            ['list_item_title' => 'Slovakia', 'list_item_value' => 'SK'],
            ['list_item_title' => 'Slovenia', 'list_item_value' => 'SI'],
            ['list_item_title' => 'Solomon Islands', 'list_item_value' => 'SB'],
            ['list_item_title' => 'Somalia', 'list_item_value' => 'SO'],
            ['list_item_title' => 'South Africa', 'list_item_value' => 'ZA'],
            ['list_item_title' => 'South Georgia and the South Sandwich Islands', 'list_item_value' => 'GS'],
            ['list_item_title' => 'South Sudan', 'list_item_value' => 'SS'],
            ['list_item_title' => 'Spain', 'list_item_value' => 'ES'],
            ['list_item_title' => 'Sri Lanka', 'list_item_value' => 'LK'],
            ['list_item_title' => 'Sudan', 'list_item_value' => 'SD'],
            ['list_item_title' => 'Suriname', 'list_item_value' => 'SR'],
            ['list_item_title' => 'Svalbard and Jan Mayen', 'list_item_value' => 'SJ'],
            ['list_item_title' => 'Swaziland', 'list_item_value' => 'SZ'],
            ['list_item_title' => 'Sweden', 'list_item_value' => 'SE'],
            ['list_item_title' => 'Switzerland', 'list_item_value' => 'CH'],
            ['list_item_title' => 'Syrian Arab Republic', 'list_item_value' => 'SY'],
            ['list_item_title' => 'Taiwan', 'list_item_value' => 'TW'],
            ['list_item_title' => 'Tajikistan', 'list_item_value' => 'TJ'],
            ['list_item_title' => 'Tanzania, United Republic of', 'list_item_value' => 'TZ'],
            ['list_item_title' => 'Thailand', 'list_item_value' => 'TH'],
            ['list_item_title' => 'Timor-Leste', 'list_item_value' => 'TL'],
            ['list_item_title' => 'Togo', 'list_item_value' => 'TG'],
            ['list_item_title' => 'Tokelau', 'list_item_value' => 'TK'],
            ['list_item_title' => 'Tonga', 'list_item_value' => 'TO'],
            ['list_item_title' => 'Trinidad and Tobago', 'list_item_value' => 'TT'],
            ['list_item_title' => 'Tunisia', 'list_item_value' => 'TN'],
            ['list_item_title' => 'Turkey', 'list_item_value' => 'TR'],
            ['list_item_title' => 'Turkmenistan', 'list_item_value' => 'TM'],
            ['list_item_title' => 'Turks and Caicos Islands', 'list_item_value' => 'TC'],
            ['list_item_title' => 'Tuvalu', 'list_item_value' => 'TV'],
            ['list_item_title' => 'Uganda', 'list_item_value' => 'UG'],
            ['list_item_title' => 'Ukraine', 'list_item_value' => 'UA'],
            ['list_item_title' => 'United Arab Emirates', 'list_item_value' => 'AE'],
            ['list_item_title' => 'United Kingdom', 'list_item_value' => 'GB'],
            ['list_item_title' => 'United States', 'list_item_value' => 'US', 'list_item_default' => true],
            ['list_item_title' => 'United States Minor Outlying Islands', 'list_item_value' => 'UM'],
            ['list_item_title' => 'Uruguay', 'list_item_value' => 'UY'],
            ['list_item_title' => 'Uzbekistan', 'list_item_value' => 'UZ'],
            ['list_item_title' => 'Vanuatu', 'list_item_value' => 'VU'],
            ['list_item_title' => 'Venezuela, Bolivarian Republic of', 'list_item_value' => 'VE'],
            ['list_item_title' => 'Viet Nam', 'list_item_value' => 'VN'],
            ['list_item_title' => 'Virgin Islands, British', 'list_item_value' => 'VG'],
            ['list_item_title' => 'Virgin Islands, U.S.', 'list_item_value' => 'VI'],
            ['list_item_title' => 'Wallis and Futuna', 'list_item_value' => 'WF'],
            ['list_item_title' => 'Western Sahara', 'list_item_value' => 'EH'],
            ['list_item_title' => 'Yemen', 'list_item_value' => 'YE'],
            ['list_item_title' => 'Zambia', 'list_item_value' => 'ZM'],
            ['list_item_title' => 'Zimbabwe', 'list_item_value' => 'ZW'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'countries', 'list_item_name' => 'Countries']);
        // create child items
        $this->createChildItems($data_array, $parent);
        // create subchild items
        $this->createCountriesStates();
    }


    /**
     * Countries States lists
     *
     * @return void
     */
    private function createCountriesStates()
    {
        $data_array = [
            ['list_item_name' => 'US', 'list_item_title' => 'Alabama', 'list_item_value' => 'AL'],
            ['list_item_name' => 'US', 'list_item_title' => 'Alaska', 'list_item_value' => 'AK'],
            ['list_item_name' => 'US', 'list_item_title' => 'Arizona', 'list_item_value' => 'AZ'],
            ['list_item_name' => 'US', 'list_item_title' => 'Arkansas', 'list_item_value' => 'AR'],
            ['list_item_name' => 'US', 'list_item_title' => 'California', 'list_item_value' => 'CA'],
            ['list_item_name' => 'US', 'list_item_title' => 'Colorado', 'list_item_value' => 'CO'],
            ['list_item_name' => 'US', 'list_item_title' => 'Connecticut', 'list_item_value' => 'CT'],
            ['list_item_name' => 'US', 'list_item_title' => 'Delaware', 'list_item_value' => 'DE'],
            ['list_item_name' => 'US', 'list_item_title' => 'District Of Columbia', 'list_item_value' => 'DC'],
            ['list_item_name' => 'US', 'list_item_title' => 'Florida', 'list_item_value' => 'FL'],
            ['list_item_name' => 'US', 'list_item_title' => 'Georgia', 'list_item_value' => 'GA'],
            ['list_item_name' => 'US', 'list_item_title' => 'Hawaii', 'list_item_value' => 'HI'],
            ['list_item_name' => 'US', 'list_item_title' => 'Idaho', 'list_item_value' => 'ID'],
            ['list_item_name' => 'US', 'list_item_title' => 'Illinois', 'list_item_value' => 'IL'],
            ['list_item_name' => 'US', 'list_item_title' => 'Indiana', 'list_item_value' => 'IN'],
            ['list_item_name' => 'US', 'list_item_title' => 'Iowa', 'list_item_value' => 'IA'],
            ['list_item_name' => 'US', 'list_item_title' => 'Kansas', 'list_item_value' => 'KS'],
            ['list_item_name' => 'US', 'list_item_title' => 'Kentucky', 'list_item_value' => 'KY'],
            ['list_item_name' => 'US', 'list_item_title' => 'Louisiana', 'list_item_value' => 'LA'],
            ['list_item_name' => 'US', 'list_item_title' => 'Maine', 'list_item_value' => 'ME'],
            ['list_item_name' => 'US', 'list_item_title' => 'Maryland', 'list_item_value' => 'MD'],
            ['list_item_name' => 'US', 'list_item_title' => 'Massachusetts', 'list_item_value' => 'MA'],
            ['list_item_name' => 'US', 'list_item_title' => 'Michigan', 'list_item_value' => 'MI'],
            ['list_item_name' => 'US', 'list_item_title' => 'Minnesota', 'list_item_value' => 'MN'],
            ['list_item_name' => 'US', 'list_item_title' => 'Mississippi', 'list_item_value' => 'MS'],
            ['list_item_name' => 'US', 'list_item_title' => 'Missouri', 'list_item_value' => 'MO'],
            ['list_item_name' => 'US', 'list_item_title' => 'Montana', 'list_item_value' => 'MT'],
            ['list_item_name' => 'US', 'list_item_title' => 'Nebraska', 'list_item_value' => 'NE'],
            ['list_item_name' => 'US', 'list_item_title' => 'Nevada', 'list_item_value' => 'NV'],
            ['list_item_name' => 'US', 'list_item_title' => 'New Hampshire', 'list_item_value' => 'NH'],
            ['list_item_name' => 'US', 'list_item_title' => 'New Jersey', 'list_item_value' => 'NJ'],
            ['list_item_name' => 'US', 'list_item_title' => 'New Mexico', 'list_item_value' => 'NM'],
            ['list_item_name' => 'US', 'list_item_title' => 'New York', 'list_item_value' => 'NY'],
            ['list_item_name' => 'US', 'list_item_title' => 'North Carolina', 'list_item_value' => 'NC'],
            ['list_item_name' => 'US', 'list_item_title' => 'North Dakota', 'list_item_value' => 'ND'],
            ['list_item_name' => 'US', 'list_item_title' => 'Ohio', 'list_item_value' => 'OH'],
            ['list_item_name' => 'US', 'list_item_title' => 'Oklahoma', 'list_item_value' => 'OK'],
            ['list_item_name' => 'US', 'list_item_title' => 'Oregon', 'list_item_value' => 'OR'],
            ['list_item_name' => 'US', 'list_item_title' => 'Pennsylvania', 'list_item_value' => 'PA'],
            ['list_item_name' => 'US', 'list_item_title' => 'Rhode Island', 'list_item_value' => 'RI'],
            ['list_item_name' => 'US', 'list_item_title' => 'South Carolina', 'list_item_value' => 'SC'],
            ['list_item_name' => 'US', 'list_item_title' => 'South Dakota', 'list_item_value' => 'SD'],
            ['list_item_name' => 'US', 'list_item_title' => 'Tennessee', 'list_item_value' => 'TN'],
            ['list_item_name' => 'US', 'list_item_title' => 'Texas', 'list_item_value' => 'TX'],
            ['list_item_name' => 'US', 'list_item_title' => 'Utah', 'list_item_value' => 'UT'],
            ['list_item_name' => 'US', 'list_item_title' => 'Vermont', 'list_item_value' => 'VT'],
            ['list_item_name' => 'US', 'list_item_title' => 'Virginia', 'list_item_value' => 'VA'],
            ['list_item_name' => 'US', 'list_item_title' => 'Washington', 'list_item_value' => 'WA'],
            ['list_item_name' => 'US', 'list_item_title' => 'West Virginia', 'list_item_value' => 'WV'],
            ['list_item_name' => 'US', 'list_item_title' => 'Wisconsin', 'list_item_value' => 'WI'],
            ['list_item_name' => 'US', 'list_item_title' => 'Wyoming', 'list_item_value' => 'WY'],
        ];
        // create subchild items
        $this->createSubChildItems($data_array, 'countries');
    }


    /**
     * Gender lists
     *
     * @return void
     */
    private function createGender()
    {
        $data_array = [
            ['list_item_title' => 'Undisclosed', 'list_item_value' => 'undisclosed'],
            ['list_item_title' => 'Male', 'list_item_value' => 'male'],
            ['list_item_title' => 'Female', 'list_item_value' => 'female'],
            ['list_item_title' => 'Agender', 'list_item_value' => 'agender'],
            ['list_item_title' => 'Non-Conforming', 'list_item_value' => 'nononforming'],
            ['list_item_title' => 'Cisgender', 'list_item_value' => 'cisgender'],
            ['list_item_title' => 'Cishet', 'list_item_value' => 'cishet'],
            ['list_item_title' => 'Transgender', 'list_item_value' => 'transgender'],
            ['list_item_title' => 'Genderqueer', 'list_item_value' => 'genderqueer'],
            ['list_item_title' => 'Gender fluid', 'list_item_value' => 'genderfluid'],
            ['list_item_title' => 'Non-binary', 'list_item_value' => 'nonbinary'],
            ['list_item_title' => 'Intersex', 'list_item_value' => 'intersex'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'gender', 'list_item_name' => 'Gender']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Yes/No lists
     *
     * @return void
     */
    private function createYesNo()
    {
        $data_array = [
            ['list_item_title' => 'Yes', 'list_item_value' => true],
            ['list_item_title' => 'No', 'list_item_value' => false],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'yesno', 'list_item_name' => 'Yes/No']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Title lists
     *
     * @return void
     */
    private function createTitle()
    {
        $data_array = [
            ['list_item_title' => 'Mr.', 'list_item_value' => 'Mr.'],
            ['list_item_title' => 'Mrs.', 'list_item_value' => 'Mrs.'],
            ['list_item_title' => 'Ms.', 'list_item_value' => 'Ms.'],
            ['list_item_title' => 'Dr.', 'list_item_value' => 'Dr.'],
            ['list_item_title' => 'Prof.', 'list_item_value' => 'Prof.'],
            ['list_item_title' => 'Miss', 'list_item_value' => 'Miss'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'title', 'list_item_name' => 'Patient Title']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Marital lists
     *
     * @return void
     */
    private function createMarital()
    {
        $data_array = [
            ['list_item_title' => 'Unassigned', 'list_item_value' => 'unassigned'],
            ['list_item_title' => 'Single', 'list_item_value' => 'single'],
            ['list_item_title' => 'Married', 'list_item_value' => 'married'],
            ['list_item_title' => 'Significant Other', 'list_item_value' => 'significantother'],
            ['list_item_title' => 'Widowed', 'list_item_value' => 'widowed'],
            ['list_item_title' => 'Divorced', 'list_item_value' => 'divorced'],
            ['list_item_title' => 'Separated', 'list_item_value' => 'separated'],
            ['list_item_title' => 'Domestic Partnership', 'list_item_value' => 'domesticpartnership'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'marital', 'list_item_name' => 'Patient Marital Status']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Language lists
     *
     * @return void
     */
    private function createLanguage()
    {
        $data_array = [
            ['list_item_title' => 'Unassigned', 'list_item_value' => 'en'],
            ['list_item_title' => 'Español', 'list_item_value' => 'es'],
            ['list_item_title' => 'English', 'list_item_value' => 'en'],
            ['list_item_title' => 'Français', 'list_item_value' => 'fr'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'language', 'list_item_name' => 'Patient Language Choice']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Ethnic lists
     *
     * @return void
     */
    private function createEthnic()
    {
        $data_array = [
            ['list_item_title' => 'Unassigned', 'list_item_value' => 'unassigned'],
            ['list_item_title' => 'American Indian', 'list_item_value' => 'americanindian'],
            ['list_item_title' => 'Alaska Native', 'list_item_value' => 'alaskanative'],
            ['list_item_title' => 'Asian', 'list_item_value' => 'asian'],
            ['list_item_title' => 'African American', 'list_item_value' => 'africanamerican'],
            ['list_item_title' => 'Native Hawaiian', 'list_item_value' => 'nativehawaiian'],
            ['list_item_title' => 'Other Pacific Islander', 'list_item_value' => 'otherpacificislander'],
            ['list_item_title' => 'White', 'list_item_value' => 'white'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'ethnicity', 'list_item_name' => 'Patient Ethnicity']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Race lists
     *
     * @return void
     */
    private function createRace()
    {
        $data_array = [
            ['list_item_title' => 'Unassigned', 'list_item_value' => 'unassigned'],
            ['list_item_title' => 'Hispanic', 'list_item_value' => 'hispanic'],
            ['list_item_title' => 'Latino', 'list_item_value' => 'latino'],
            ['list_item_title' => 'Not Hispanic', 'list_item_value' => 'nothispanic'],
            ['list_item_title' => 'Not Latino', 'list_item_value' => 'notlatino'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'race', 'list_item_name' => 'Patient Race']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Referral lists
     *
     * @return void
     */
    private function createReferral()
    {
        $data_array = [
            ['list_item_title' => 'Unassigned', 'list_item_value' => 'unassigned'],
            ['list_item_title' => 'Patient', 'list_item_value' => 'patient'],
            ['list_item_title' => 'Employee', 'list_item_value' => 'employee'],
            ['list_item_title' => 'Walk-In', 'list_item_value' => 'walkin'],
            ['list_item_title' => 'Newspaper', 'list_item_value' => 'newspaper'],
            ['list_item_title' => 'Radio', 'list_item_value' => 'radio'],
            ['list_item_title' => 'T.V.', 'list_item_value' => 'tv'],
            ['list_item_title' => 'Direct Mail', 'list_item_value' => 'directmail'],
            ['list_item_title' => 'Coupon', 'list_item_value' => 'coupon'],
            ['list_item_title' => 'Referral Card', 'list_item_value' => 'referralcard'],
            ['list_item_title' => 'Other', 'list_item_value' => 'other'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'referrals', 'list_item_name' => 'Patient Referral']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * VFC lists
     *
     * @return void
     */
    private function createVFC()
    {
        $data_array = [
            ['list_item_title' => 'Unassigned', 'list_item_value' => 'unassigned'],
            ['list_item_title' => 'Eligible', 'list_item_value' => 'eligible'],
            ['list_item_title' => 'Ineligible', 'list_item_value' => 'ineligible'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'vfc', 'list_item_name' => 'Patient VFC']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Contact type lists
     *
     * @return void
     */
    private function createContactType()
    {
        $data_array = [
            ['list_item_title' => 'Mother', 'list_item_value' => 'mother'],
            ['list_item_title' => 'Father', 'list_item_value' => 'father'],
            ['list_item_title' => 'Guardian', 'list_item_value' => 'guardian'],
            ['list_item_title' => 'Relative', 'list_item_value' => 'relative'],
            ['list_item_title' => 'Other', 'list_item_value' => 'other'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'contacttype', 'list_item_name' => 'Patient Contact Type']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Insurance type lists
     *
     * @return void
     */
    private function createInsuranceType()
    {
        $data_array = [
            ['list_item_title' => 'Primary', 'list_item_value' => 'primary'],
            ['list_item_title' => 'Secondary', 'list_item_value' => 'secondary'],
            ['list_item_title' => 'Tertiary', 'list_item_value' => 'tertiary'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'insurancetype', 'list_item_name' => 'Patient Insurance Type']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Insurance relationship lists
     *
     * @return void
     */
    private function createInsuranceRelationship()
    {
        $data_array = [
            ['list_item_title' => 'Self', 'list_item_value' => 'self'],
            ['list_item_title' => 'Spouse', 'list_item_value' => 'spouse'],
            ['list_item_title' => 'Child', 'list_item_value' => 'child'],
            ['list_item_title' => 'Other', 'list_item_value' => 'other'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'insurancerelationship', 'list_item_name' => 'Patient Insurance Relationship']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Secondary medical type lists
     *
     * @return void
     */
    private function createSecondaryMedicalType()
    {
        $data_array = [
            ['list_item_title' => 'N/A', 'list_item_value' => ''],
            ['list_item_title' => 'Working Aged Beneficiary or Spouse with Employer Group Health Plan', 'list_item_value' => 12],
            ['list_item_title' => 'End-Stage Renal Disease Beneficiary in MCP with Employer`s Group Plan', 'list_item_value' => 13],
            ['list_item_title' => 'No-fault Insurance including Auto is Primary', 'list_item_value' => 14],
            ['list_item_title' => 'Worker\'s Compensation', 'list_item_value' => 15],
            ['list_item_title' => 'Public Health Service (PHS) or Other Federal Agency', 'list_item_value' => 16],
            ['list_item_title' => 'Black Lung', 'list_item_value' => 41],
            ['list_item_title' => 'Veteran\'s Administration', 'list_item_value' => 42],
            ['list_item_title' => 'Disabled Beneficiary Under Age 65 with Large Group Health Plan (LGHP)', 'list_item_value' => 43],
            ['list_item_title' => 'Other Liability Insurance is Primary', 'list_item_value' => 47],
            ['list_item_title' => 'Tertiary', 'list_item_value' => 'tertiary'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'secondarymedicaltype', 'list_item_name' => 'Insurance Secondary Medical Type']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Insurance payer type lists
     *
     * @return void
     */
    private function createInsurancePayerType()
    {
        $data_array = [
            ['list_item_title' => 'Other HCFA', 'list_item_value' => 1],
            ['list_item_title' => 'Medicare Part B', 'list_item_value' => 2],
            ['list_item_title' => 'Medicaid', 'list_item_value' => 3],
            ['list_item_title' => 'ChampUSVA', 'list_item_value' => 4],
            ['list_item_title' => 'ChampUS', 'list_item_value' => 5],
            ['list_item_title' => 'Blue Cross Blue Shield', 'list_item_value' => 6],
            ['list_item_title' => 'FECA', 'list_item_value' => 7],
            ['list_item_title' => 'Self Pay', 'list_item_value' => 8],
            ['list_item_title' => 'Central Certification', 'list_item_value' => 9],
            ['list_item_title' => 'Other Non-Federal Programs', 'list_item_value' => 10],
            ['list_item_title' => 'Preferred Provider Organization (PPO)', 'list_item_value' => 11],
            ['list_item_title' => 'Point of Service (POS)', 'list_item_value' => 12],
            ['list_item_title' => 'Exclusive Provider Organization (EPO)', 'list_item_value' => 13],
            ['list_item_title' => 'Indemnity Insurance', 'list_item_value' => 14],
            ['list_item_title' => 'Health Maintenance Organization (HMO) Medicare Risk', 'list_item_value' => 15],
            ['list_item_title' => 'Automobile Medical', 'list_item_value' => 16],
            ['list_item_title' => 'Commercial Insurance Co.', 'list_item_value' => 17],
            ['list_item_title' => 'Disability', 'list_item_value' => 18],
            ['list_item_title' => 'Health Maintenance Organization', 'list_item_value' => 19],
            ['list_item_title' => 'Liability', 'list_item_value' => 20],
            ['list_item_title' => 'Liability Medical', 'list_item_value' => 21],
            ['list_item_title' => 'Other Federal Program', 'list_item_value' => 22],
            ['list_item_title' => 'Title V', 'list_item_value' => 23],
            ['list_item_title' => 'Veterans Administration Plan', 'list_item_value' => 24],
            ['list_item_title' => 'Workers Compensation Health Plan', 'list_item_value' => 25],
            ['list_item_title' => 'Mutually Defined', 'list_item_value' => 26],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'insurancepayertype', 'list_item_name' => 'Insurance Payer Type']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Insurance financial class lists
     *
     * @return void
     */
    private function createInsuranceFinancialClass()
    {
        $data_array = [
            ['list_item_title' => 'Blue Shield', 'list_item_value' => 'blueshield'],
            ['list_item_title' => 'Commercial', 'list_item_value' => 'commercial'],
            ['list_item_title' => 'Medicaid', 'list_item_value' => 'medicaid'],
            ['list_item_title' => 'Medicare', 'list_item_value' => 'medicare'],
            ['list_item_title' => 'Self Pay', 'list_item_value' => 'selfpay'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'insurancefinancialclass', 'list_item_name' => 'Insurance Financial Class']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Insurance Payment Code lists
     *
     * @return void
     */
    private function createInsurancePaymentCode()
    {
        $data_array = [
            ['list_item_title' => 'AETPAY', 'list_item_value' => 'AETPAY'],
            ['list_item_title' => 'BCPAY', 'list_item_value' => 'BCPAY'],
            ['list_item_title' => 'CIGPAY', 'list_item_value' => 'CIGPAY'],
            ['list_item_title' => 'COPAY', 'list_item_value' => 'COPAY'],
            ['list_item_title' => 'HUMPAY', 'list_item_value' => 'HUMPAY'],
            ['list_item_title' => 'INSPAY', 'list_item_value' => 'INSPAY'],
            ['list_item_title' => 'MCDPAY', 'list_item_value' => 'primary'],
            ['list_item_title' => 'MCRPAY', 'list_item_value' => 'MCRPAY'],
            ['list_item_title' => 'PATPAY', 'list_item_value' => 'PATPAY'],
            ['list_item_title' => 'SLFPAY', 'list_item_value' => 'SLFPAY'],
            ['list_item_title' => 'TRIPAY', 'list_item_value' => 'TRIPAY'],
            ['list_item_title' => 'UHCPAY', 'list_item_value' => 'UHCPAY'],
            ['list_item_title' => 'VALPAY', 'list_item_value' => 'VALPAY'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'insurancepaymentcode', 'list_item_name' => 'Insurance Payment Code']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * Phone Type lists
     *
     * @return void
     */
    private function createPhoneType()
    {
        $data_array = [
            ['list_item_title' => 'Home', 'list_item_value' => 'home'],
            ['list_item_title' => 'Cellphone', 'list_item_value' => 'cellphone'],
            ['list_item_title' => 'Work', 'list_item_value' => 'work'],
            ['list_item_title' => 'Emergency', 'list_item_value' => 'emergency'],
            ['list_item_title' => 'Family', 'list_item_value' => 'family'],
            ['list_item_title' => 'Relative', 'list_item_value' => 'relative'],
        ];
        $parent = ItemsFactory::new()->create(['list_item_master' => 'phonetype', 'list_item_name' => 'Phone Type']);
        // create child items
        $this->createChildItems($data_array, $parent);
    }


    /**
     * This function creates the child items for the parent lists.
     *
     * @param array $data_array
     * @param object $parent
     *
     * @return void
     */
    private function createChildItems($data_array, $parent)
    {
        foreach ($data_array as $item => $value) {
            ItemsFactory::new()->create([
                //'list_item_master'  => $parent->id,
                'list_item_master'  => '',
                'list_item_type'    => 'child',
                'list_item_name'    => $parent->list_item_master,
                'list_item_title'   => $value['list_item_title'],
                'list_item_value'   => $value['list_item_value'],
                'list_item_default' => (!empty($value['list_item_default'])) ? $value['list_item_default'] : false,
                'list_item_order'   => $item,
            ]);
        }
    }

    /**
     * This function creates the subchild items for the parent lists.
     *
     *
     * @return void
     */
    private function createSubChildItems($data_array, $parent)
    {
        foreach ($data_array as $item => $value) {
            ItemsFactory::new()->create([
                'list_item_master'  => $parent,
                'list_item_type'    => 'sub_child',
                'list_item_name'    => $value['list_item_name'],
                'list_item_title'   => $value['list_item_title'],
                'list_item_value'   => $value['list_item_value'],
                'list_item_default' => (!empty($value['list_item_default'])) ? $value['list_item_default'] : false,
                'list_item_order'   => $item,
            ]);
        }
    }
}
