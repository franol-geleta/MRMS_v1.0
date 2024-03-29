<?php
// ======================================================================
//             Designed by:    Eyasu Girma [Kiya]
//                 Mobile:     +251-913-078-029
//                 Email:      sendtokiya@gmail.com
//                 Facebook:   https://facebook.com/JoshKiyakoo
//                 LinkedIn:   https://linkedin.com/in/JoshKiyakoo
//                 Twitter:    https://twitter.com/JoshKiyakoo
//                 GitHub:     https://github.com/JoshKiyakoo
//                 Telegram:   https://t.me/JoshKiyakoo
// ======================================================================
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemCountryDataSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        DB::table('sfgbc_Setting_CountryList')
            ->insert(array (
                array ('list_CountryName'=>'Afghanistan','list_CountryNationality'=>'Afghan'),
                array ('list_CountryName'=>'Alaska','list_CountryNationality'=>'American'),
                array ('list_CountryName'=>'Albania','list_CountryNationality'=>'Alban'),
                array ('list_CountryName'=>'Algeria','list_CountryNationality'=>'Algerian'),
                array ('list_CountryName'=>'American Samoa','list_CountryNationality'=>'Samoan'),
                array ('list_CountryName'=>'Andorra','list_CountryNationality'=>'Andorran'),
                array ('list_CountryName'=>'Angola','list_CountryNationality'=>'Angolan'),
                array ('list_CountryName'=>'Anguilla','list_CountryNationality'=>'Anguillan'),
                array ('list_CountryName'=>'Antarctica','list_CountryNationality'=>'Antarctican'),
                array ('list_CountryName'=>'Antigua and Barbuda','list_CountryNationality'=>'Antigua and Barbudan'),
                array ('list_CountryName'=>'Argentina','list_CountryNationality'=>'Argentine'),
                array ('list_CountryName'=>'Armenia','list_CountryNationality'=>'Armenian'),
                array ('list_CountryName'=>'Aruba','list_CountryNationality'=>'Aruban'),
                array ('list_CountryName'=>'Australia','list_CountryNationality'=>'Australian'),
                array ('list_CountryName'=>'Austria','list_CountryNationality'=>'Austrian'),
                array ('list_CountryName'=>'Azerbaijan','list_CountryNationality'=>'Azerbaijani'),
                array ('list_CountryName'=>'Bahamas','list_CountryNationality'=>'Bahamian'),
                array ('list_CountryName'=>'Bahrain','list_CountryNationality'=>'Bahraini'),
                array ('list_CountryName'=>'Bangladesh','list_CountryNationality'=>'Bangladeshi'),
                array ('list_CountryName'=>'Barbados','list_CountryNationality'=>'Barbadian'),
                array ('list_CountryName'=>'Belarus','list_CountryNationality'=>'Belarus'),
                array ('list_CountryName'=>'Belgium','list_CountryNationality'=>'Belgian'),
                array ('list_CountryName'=>'Belize','list_CountryNationality'=>'Belizean'),
                array ('list_CountryName'=>'Benin','list_CountryNationality'=>'Benines'),
                array ('list_CountryName'=>'Bermuda','list_CountryNationality'=>'Bermudian'),
                array ('list_CountryName'=>'Bhutan','list_CountryNationality'=>'Bhutan'),
                array ('list_CountryName'=>'Bolivia','list_CountryNationality'=>'Bolivian'),
                array ('list_CountryName'=>'Bosnia and Herzegovina','list_CountryNationality'=>'Bosnia and Herzegovinan'),
                array ('list_CountryName'=>'Botswana','list_CountryNationality'=>'Botswana'),
                array ('list_CountryName'=>'Bouvet Island','list_CountryNationality'=>'Bouvet Islander'),
                array ('list_CountryName'=>'Brazil','list_CountryNationality'=>'Brazilian'),
                array ('list_CountryName'=>'British Indian Ocean Territory','list_CountryNationality'=>'British Indian Ocean Territorian'),
                array ('list_CountryName'=>'Brunei Darussalam','list_CountryNationality'=>'Brunean'),
                array ('list_CountryName'=>'Bulgaria','list_CountryNationality'=>'Bulgarian'),
                array ('list_CountryName'=>'Burkina Faso','list_CountryNationality'=>'Burkinabe'),
                array ('list_CountryName'=>'Burma','list_CountryNationality'=>'Burme'),
                array ('list_CountryName'=>'Burundi','list_CountryNationality'=>'Burundian'),
                array ('list_CountryName'=>'Cambodia','list_CountryNationality'=>'Cambodian'),
                array ('list_CountryName'=>'Cameroon','list_CountryNationality'=>'Cameroonian'),
                array ('list_CountryName'=>'Canada','list_CountryNationality'=>'Canadian'),
                array ('list_CountryName'=>'Cape Verde','list_CountryNationality'=>'Cape Verdean'),
                array ('list_CountryName'=>'Cayman Islands','list_CountryNationality'=>'Cayman Islander'),
                array ('list_CountryName'=>'Central African Republic','list_CountryNationality'=>'Central African Republic'),
                array ('list_CountryName'=>'Chad','list_CountryNationality'=>'Chadian'),
                array ('list_CountryName'=>'Chile','list_CountryNationality'=>'Chilean'),
                array ('list_CountryName'=>'China','list_CountryNationality'=>'Chines'),
                array ('list_CountryName'=>'Christmas Island','list_CountryNationality'=>'Christmas Islander'),
                array ('list_CountryName'=>'Cocos (Keeling) Islands','list_CountryNationality'=>'Cocos (Keeling) Islander'),
                array ('list_CountryName'=>'Colombia','list_CountryNationality'=>'Colombian'),
                array ('list_CountryName'=>'Comoros','list_CountryNationality'=>'Comorian'),
                array ('list_CountryName'=>'Congo, Democratic Republic of','list_CountryNationality'=>'Congoles'),
                array ('list_CountryName'=>'Cook Islands','list_CountryNationality'=>'Cook Islander'),
                array ('list_CountryName'=>'Costa Rica','list_CountryNationality'=>'Costa Rican'),
                array ('list_CountryName'=>'Cote dIvoire','list_CountryNationality'=>'Cote dIvoirean'),
                array ('list_CountryName'=>'Croatia','list_CountryNationality'=>'Croatian'),
                array ('list_CountryName'=>'Cuba','list_CountryNationality'=>'Cuban'),
                array ('list_CountryName'=>'Cyprus','list_CountryNationality'=>'Cypriot'),
                array ('list_CountryName'=>'Czech Republic','list_CountryNationality'=>'Czech'),
                array ('list_CountryName'=>'Denmark','list_CountryNationality'=>'Dene'),
                array ('list_CountryName'=>'Djibouti','list_CountryNationality'=>'Djiboutian'),
                array ('list_CountryName'=>'Dominican Republic','list_CountryNationality'=>'Dominican'),
                array ('list_CountryName'=>'East Timor','list_CountryNationality'=>'East Timores'),
                array ('list_CountryName'=>'Ecuador','list_CountryNationality'=>'Ecuadorian'),
                array ('list_CountryName'=>'Egypt','list_CountryNationality'=>'Egyptian'),
                array ('list_CountryName'=>'Ireland (Eire)','list_CountryNationality'=>'Irish'),
                array ('list_CountryName'=>'El-Salvador','list_CountryNationality'=>'El-Salvadorian'),
                array ('list_CountryName'=>'Emerald Isle','list_CountryNationality'=>'Emerald Islean'),
                array ('list_CountryName'=>'England','list_CountryNationality'=>'English'),
                array ('list_CountryName'=>'Equatorial Guinea','list_CountryNationality'=>'Equatoguinean'),
                array ('list_CountryName'=>'Eritrea','list_CountryNationality'=>'Eritrean'),
                array ('list_CountryName'=>'Estonia','list_CountryNationality'=>'Estonian'),
                array ('list_CountryName'=>'Ethiopia','list_CountryNationality'=>'Ethiopian'),
                array ('list_CountryName'=>'Falkland Islands (Malvinas)','list_CountryNationality'=>'Falkland Islander'),
                array ('list_CountryName'=>'Fiji','list_CountryNationality'=>'Fijian'),
                array ('list_CountryName'=>'Finland','list_CountryNationality'=>'Finnish'),
                array ('list_CountryName'=>'France','list_CountryNationality'=>'French Citizen'),
                array ('list_CountryName'=>'French Guiana','list_CountryNationality'=>'Guiane'),
                array ('list_CountryName'=>'French Polynesia','list_CountryNationality'=>'Polynesia'),
                array ('list_CountryName'=>'French Southern Territories','list_CountryNationality'=>'French Territorian'),
                array ('list_CountryName'=>'Gabon','list_CountryNationality'=>'Gabones'),
                array ('list_CountryName'=>'Gambia','list_CountryNationality'=>'Gambian'),
                array ('list_CountryName'=>'Georgia','list_CountryNationality'=>'Georgian'),
                array ('list_CountryName'=>'Germany','list_CountryNationality'=>'Dutch'),
                array ('list_CountryName'=>'Ghana','list_CountryNationality'=>'Ghanaian'),
                array ('list_CountryName'=>'Gibraltar','list_CountryNationality'=>'Gibraltarian'),
                array ('list_CountryName'=>'Greece','list_CountryNationality'=>'Greek'),
                array ('list_CountryName'=>'Greenland','list_CountryNationality'=>'Greenlander'),
                array ('list_CountryName'=>'Grenada','list_CountryNationality'=>'Grenadian'),
                array ('list_CountryName'=>'Guadeloupe','list_CountryNationality'=>'Guadeloupean'),
                array ('list_CountryName'=>'Guatemala','list_CountryNationality'=>'Guatemalan'),
                array ('list_CountryName'=>'Guinea','list_CountryNationality'=>'Guinean'),
                array ('list_CountryName'=>'Guinea-Bissau','list_CountryNationality'=>'Guinea-Bissau National'),
                array ('list_CountryName'=>'Guyana','list_CountryNationality'=>'Guyanes'),
                array ('list_CountryName'=>'Haiti','list_CountryNationality'=>'Haitian'),
                array ('list_CountryName'=>'Heard Island and Mcdonald Islands','list_CountryNationality'=>'Heard and Mcdonald Islander'),
                array ('list_CountryName'=>'Holland','list_CountryNationality'=>'Holland'),
                array ('list_CountryName'=>'Honduras','list_CountryNationality'=>'Honduran'),
                array ('list_CountryName'=>'Hong Kong','list_CountryNationality'=>'Hong Kong'),
                array ('list_CountryName'=>'Hungary','list_CountryNationality'=>'Hungarian'),
                array ('list_CountryName'=>'Iceland','list_CountryNationality'=>'Icelander'),
                array ('list_CountryName'=>'India','list_CountryNationality'=>'Indian'),
                array ('list_CountryName'=>'Indonesian','list_CountryNationality'=>'Indonesian'),
                array ('list_CountryName'=>'Iran, Islamic Republic of','list_CountryNationality'=>'Iranian'),
                array ('list_CountryName'=>'Iraq','list_CountryNationality'=>'Iraqi'),
                array ('list_CountryName'=>'Ireland, Irish Republic','list_CountryNationality'=>'Irish'),
                array ('list_CountryName'=>'Israel','list_CountryNationality'=>'Israeli'),
                array ('list_CountryName'=>'Italy','list_CountryNationality'=>'Italian'),
                array ('list_CountryName'=>'Ivory Coast','list_CountryNationality'=>'Ivoirian'),
                array ('list_CountryName'=>'Jamaica','list_CountryNationality'=>'Jamaican'),
                array ('list_CountryName'=>'Japan','list_CountryNationality'=>'Japanes'),
                array ('list_CountryName'=>'Jordan','list_CountryNationality'=>'Jordanian'),
                array ('list_CountryName'=>'Kazakhstan','list_CountryNationality'=>'Kazakh'),
                array ('list_CountryName'=>'Kenya','list_CountryNationality'=>'Kenyan'),
                array ('list_CountryName'=>'Kiribati','list_CountryNationality'=>'Kiribatian'),
                array ('list_CountryName'=>'Korea, Democratic Peoples Republic of','list_CountryNationality'=>'Korean'),
                array ('list_CountryName'=>'Korea, Republic of','list_CountryNationality'=>'Korean'),
                array ('list_CountryName'=>'Kuwait','list_CountryNationality'=>'Kuwaiti'),
                array ('list_CountryName'=>'Kyrgyzstan','list_CountryNationality'=>'Kyrgyz'),
                array ('list_CountryName'=>'Lao Peoples Democratic Republic','list_CountryNationality'=>'Lao'),
                array ('list_CountryName'=>'Latvia','list_CountryNationality'=>'Lativian'),
                array ('list_CountryName'=>'Lebanon','list_CountryNationality'=>'Lebanes'),
                array ('list_CountryName'=>'Lesotho','list_CountryNationality'=>'Lesothe'),
                array ('list_CountryName'=>'Liberia','list_CountryNationality'=>'Liberian'),
                array ('list_CountryName'=>'Libya','list_CountryNationality'=>'Libyan'),
                array ('list_CountryName'=>'Liechtenstein','list_CountryNationality'=>'Liechtensteiner'),
                array ('list_CountryName'=>'Lithuania','list_CountryNationality'=>'Lithuanian'),
                array ('list_CountryName'=>'Luxembourg','list_CountryNationality'=>'Luxembourger'),
                array ('list_CountryName'=>'Macao','list_CountryNationality'=>'Macao'),
                array ('list_CountryName'=>'Macedonia, Former Yugoslav Republic of','list_CountryNationality'=>'Macedonian'),
                array ('list_CountryName'=>'Madagascar','list_CountryNationality'=>'Malagasy'),
                array ('list_CountryName'=>'Malawi','list_CountryNationality'=>'Malawian'),
                array ('list_CountryName'=>'Malaysia','list_CountryNationality'=>'Malaysian'),
                array ('list_CountryName'=>'Maldives','list_CountryNationality'=>'Maldivian'),
                array ('list_CountryName'=>'Mali','list_CountryNationality'=>'Malian'),
                array ('list_CountryName'=>'Malta','list_CountryNationality'=>'Maltes'),
                array ('list_CountryName'=>'Marshall Islands','list_CountryNationality'=>'Marshalles'),
                array ('list_CountryName'=>'Martinique','list_CountryNationality'=>'Martiniques'),
                array ('list_CountryName'=>'Mauritania','list_CountryNationality'=>'Mauritanian'),
                array ('list_CountryName'=>'Mauritius','list_CountryNationality'=>'Mauritian'),
                array ('list_CountryName'=>'Mayotte','list_CountryNationality'=>'Mayotte'),
                array ('list_CountryName'=>'Melanesia','list_CountryNationality'=>'Melanesian'),
                array ('list_CountryName'=>'Mexico','list_CountryNationality'=>'Mexican'),
                array ('list_CountryName'=>'Micronesia, Federated States of','list_CountryNationality'=>'Micronesian'),
                array ('list_CountryName'=>'Moldova, Republic of','list_CountryNationality'=>'Moldovan'),
                array ('list_CountryName'=>'Monaco','list_CountryNationality'=>'Monacan'),
                array ('list_CountryName'=>'Mongolia','list_CountryNationality'=>'Mongolian'),
                array ('list_CountryName'=>'Montserrat','list_CountryNationality'=>'Montserrat'),
                array ('list_CountryName'=>'Morocco','list_CountryNationality'=>'Moroccan'),
                array ('list_CountryName'=>'Mozambique','list_CountryNationality'=>'Mozambican'),
                array ('list_CountryName'=>'Myanmar','list_CountryNationality'=>'Myanmaran'),
                array ('list_CountryName'=>'Namibia','list_CountryNationality'=>'Namibian'),
                array ('list_CountryName'=>'Nauru','list_CountryNationality'=>'Nauran'),
                array ('list_CountryName'=>'Nepal','list_CountryNationality'=>'Nepale'),
                array ('list_CountryName'=>'Netherlands','list_CountryNationality'=>'Netherlander'),
                array ('list_CountryName'=>'New Caledonia','list_CountryNationality'=>'Caledonian'),
                array ('list_CountryName'=>'New Zealand','list_CountryNationality'=>'New Zealander'),
                array ('list_CountryName'=>'Nicaragua','list_CountryNationality'=>'Nicaraguan'),
                array ('list_CountryName'=>'Niger','list_CountryNationality'=>'Nigerien'),
                array ('list_CountryName'=>'Nigeria','list_CountryNationality'=>'Nigerian'),
                array ('list_CountryName'=>'Niue','list_CountryNationality'=>'Niuean'),
                array ('list_CountryName'=>'Norfolk Island','list_CountryNationality'=>'Norfolk Islander'),
                array ('list_CountryName'=>'North Sudan','list_CountryNationality'=>'Sudanes'),
                array ('list_CountryName'=>'Northern Mariana Islands','list_CountryNationality'=>'Mariana Islander'),
                array ('list_CountryName'=>'Norway','list_CountryNationality'=>'Norwegian'),
                array ('list_CountryName'=>'Oman','list_CountryNationality'=>'Omani'),
                array ('list_CountryName'=>'Pakistan','list_CountryNationality'=>'Pakistani'),
                array ('list_CountryName'=>'Palau','list_CountryNationality'=>'Palauan'),
                array ('list_CountryName'=>'Palestine Territory','list_CountryNationality'=>'Palestinian'),
                array ('list_CountryName'=>'Panama','list_CountryNationality'=>'Panamanian'),
                array ('list_CountryName'=>'Papua New Guinea','list_CountryNationality'=>'Papua New Guinean'),
                array ('list_CountryName'=>'Paraguay','list_CountryNationality'=>'Paraguayan'),
                array ('list_CountryName'=>'Peru','list_CountryNationality'=>'Peruvian'),
                array ('list_CountryName'=>'Philippines, Republic of','list_CountryNationality'=>'Philippinian'),
                array ('list_CountryName'=>'Pitcairn','list_CountryNationality'=>'Pitcairn'),
                array ('list_CountryName'=>'Poland','list_CountryNationality'=>'Polish'),
                array ('list_CountryName'=>'Polynesia','list_CountryNationality'=>'Pole'),
                array ('list_CountryName'=>'Portugal','list_CountryNationality'=>'Portugues'),
                array ('list_CountryName'=>'Puerto Rico','list_CountryNationality'=>'Puerto Rican'),
                array ('list_CountryName'=>'Qatar','list_CountryNationality'=>'Qatari'),
                array ('list_CountryName'=>'Reunion','list_CountryNationality'=>'Reunionian'),
                array ('list_CountryName'=>'Romania','list_CountryNationality'=>'Romanian'),
                array ('list_CountryName'=>'Russian Federation','list_CountryNationality'=>'Russian'),
                array ('list_CountryName'=>'Rwanda','list_CountryNationality'=>'Rwandan'),
                array ('list_CountryName'=>'Saint Helena','list_CountryNationality'=>'Saint Helenian'),
                array ('list_CountryName'=>'Saint Kitts and Nevis','list_CountryNationality'=>'Saint Kitts and Nevis'),
                array ('list_CountryName'=>'Saint Lucia','list_CountryNationality'=>'Saint Lucian'),
                array ('list_CountryName'=>'Saint Pierre and Miquelon','list_CountryNationality'=>'Saint Pierre and Miquelon'),
                array ('list_CountryName'=>'Saint Vincent and The Grenadines','list_CountryNationality'=>'Saint Vincent and The Grenadines'),
                array ('list_CountryName'=>'Samoa','list_CountryNationality'=>'Samoan'),
                array ('list_CountryName'=>'San Marino','list_CountryNationality'=>'San Marino'),
                array ('list_CountryName'=>'Sao Tome and Principe','list_CountryNationality'=>'Sao Tome and Principe'),
                array ('list_CountryName'=>'Saudi Arabia','list_CountryNationality'=>'Saudi'),
                array ('list_CountryName'=>'Scotland','list_CountryNationality'=>'Scot'),
                array ('list_CountryName'=>'Senegal','list_CountryNationality'=>'Senegales'),
                array ('list_CountryName'=>'Serbia and Montenegro','list_CountryNationality'=>'Serb and Montenegrin'),
                array ('list_CountryName'=>'Seychelles','list_CountryNationality'=>'Seychelloi'),
                array ('list_CountryName'=>'Siberia','list_CountryNationality'=>'Siberian'),
                array ('list_CountryName'=>'Sierra Leone','list_CountryNationality'=>'Sierra Leonean'),
                array ('list_CountryName'=>'Singapore','list_CountryNationality'=>'Singaporean'),
                array ('list_CountryName'=>'Slovakia','list_CountryNationality'=>'Slovak'),
                array ('list_CountryName'=>'Slovenia','list_CountryNationality'=>'Slovene'),
                array ('list_CountryName'=>'Solomon Islands','list_CountryNationality'=>'Solomon Islander'),
                array ('list_CountryName'=>'Somalia','list_CountryNationality'=>'Somali'),
                array ('list_CountryName'=>'South Africa','list_CountryNationality'=>'South African'),
                array ('list_CountryName'=>'South Georgia and The South Sandwich Islands','list_CountryNationality'=>'Georgia and Sandwich Islander'),
                array ('list_CountryName'=>'South Sudan','list_CountryNationality'=>'Sudanes'),
                array ('list_CountryName'=>'Spain','list_CountryNationality'=>'Spaniard'),
                array ('list_CountryName'=>'Sri Lanka','list_CountryNationality'=>'Sri Lankan'),
                array ('list_CountryName'=>'St. Kitts and Nevis','list_CountryNationality'=>'St. Kitts and Nevis'),
                array ('list_CountryName'=>'St. Lucia','list_CountryNationality'=>'St. Lucian'),
                array ('list_CountryName'=>'St. Vincent and the Grenadines','list_CountryNationality'=>'St. Vincentian and Grenadines'),
                array ('list_CountryName'=>'Suriname','list_CountryNationality'=>'Surinames'),
                array ('list_CountryName'=>'Svalbard and Jan Mayen','list_CountryNationality'=>'Svalbard and Jan Mayen'),
                array ('list_CountryName'=>'Swaziland','list_CountryNationality'=>'Swazi'),
                array ('list_CountryName'=>'Sweden','list_CountryNationality'=>'Swede'),
                array ('list_CountryName'=>'Switzerland','list_CountryNationality'=>'Swiss'),
                array ('list_CountryName'=>'Syria, Arab Republic','list_CountryNationality'=>'Syrian'),
                array ('list_CountryName'=>'Tahiti','list_CountryNationality'=>'Tahiti'),
                array ('list_CountryName'=>'Taiwan, Province of China','list_CountryNationality'=>'Taiwanes'),
                array ('list_CountryName'=>'Tajikistan','list_CountryNationality'=>'Tajik'),
                array ('list_CountryName'=>'Tanzania, United Republic of','list_CountryNationality'=>'Tanzanian'),
                array ('list_CountryName'=>'Thailand','list_CountryNationality'=>'Thai'),
                array ('list_CountryName'=>'Tibet','list_CountryNationality'=>'Tibetan'),
                array ('list_CountryName'=>'Timor-Leste','list_CountryNationality'=>'Timor-Lestean'),
                array ('list_CountryName'=>'Togo','list_CountryNationality'=>'Togoles'),
                array ('list_CountryName'=>'Tokelau','list_CountryNationality'=>'Tokelauan'),
                array ('list_CountryName'=>'Tonga','list_CountryNationality'=>'Tongan'),
                array ('list_CountryName'=>'Trinidad and Tobago','list_CountryNationality'=>'Trinidadian'),
                array ('list_CountryName'=>'Tunisia','list_CountryNationality'=>'Tunisian'),
                array ('list_CountryName'=>'Turkey','list_CountryNationality'=>'Turk'),
                array ('list_CountryName'=>'Turkmenistan','list_CountryNationality'=>'Turkmenistanes'),
                array ('list_CountryName'=>'Turks and Caicos Islands','list_CountryNationality'=>'Turk Islander'),
                array ('list_CountryName'=>'Tuvalu','list_CountryNationality'=>'Tuvaluan'),
                array ('list_CountryName'=>'Uganda','list_CountryNationality'=>'Ugandan'),
                array ('list_CountryName'=>'Ukraine','list_CountryNationality'=>'Ukrainian'),
                array ('list_CountryName'=>'United Arab Emirates, UAE','list_CountryNationality'=>'Emirates'),
                array ('list_CountryName'=>'United Kingdom, UK','list_CountryNationality'=>'British'),
                array ('list_CountryName'=>'United States Minor Outlying Islands','list_CountryNationality'=>'United States Minor Islander'),
                array ('list_CountryName'=>'United States of America, USA','list_CountryNationality'=>'American'),
                array ('list_CountryName'=>'Uruguay','list_CountryNationality'=>'Uruguayan'),
                array ('list_CountryName'=>'Uzbekistan','list_CountryNationality'=>'Uzbek'),
                array ('list_CountryName'=>'Vanuatu','list_CountryNationality'=>'Vanuatuan'),
                array ('list_CountryName'=>'Vatican City State (Holy See)','list_CountryNationality'=>'Vatican'),
                array ('list_CountryName'=>'Venezuela','list_CountryNationality'=>'Venezuelan'),
                array ('list_CountryName'=>'Vietnam','list_CountryNationality'=>'Vietnames'),
                array ('list_CountryName'=>'Virgin Islands, British','list_CountryNationality'=>'British'),
                array ('list_CountryName'=>'Virgin Islands, U.S.','list_CountryNationality'=>'American'),
                array ('list_CountryName'=>'Wales','list_CountryNationality'=>'Welsh'),
                array ('list_CountryName'=>'Wallis and Futuna','list_CountryNationality'=>'Wallis and Futunan'),
                array ('list_CountryName'=>'Western Sahara','list_CountryNationality'=>'Saharan'),
                array ('list_CountryName'=>'Yemen','list_CountryNationality'=>'Yemeni'),
                array ('list_CountryName'=>'Yugoslavia','list_CountryNationality'=>'Yugoslavian'),
                array ('list_CountryName'=>'Zaire','list_CountryNationality'=>'Zairean'),
                array ('list_CountryName'=>'Zambia','list_CountryNationality'=>'Zambian'),
                array ('list_CountryName'=>'Zimbabwe','list_CountryNationality'=>'Zimbabwean')
            )
        );
    }
}
