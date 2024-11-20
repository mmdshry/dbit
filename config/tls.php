<?php

use App\Enums\ServicesEnum;

const BASE_URL = 'https://drapi.ir/rest/api/main/';

return [
    [
        'name'       => ServicesEnum::SHAHKAR,
        'url'        => BASE_URL.'it_org/v1.0/istelamshahkar',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 340,
        'parameters' => ['nationalCode', 'mobileNumber']
    ],
    [
        'name'       => ServicesEnum::CARD,
        'url'        => BASE_URL.'istelamCard/v1.0/istelamcard',
        'method'     => 'GET',
        'is_active'  => true,
        'price'      => 200,
        'parameters' => ['cardNumber']
    ],
    [
        'name'       => ServicesEnum::IBAN,
        'url'        => BASE_URL.'istelamSheba/v1.0/istelamsheba',
        'method'     => 'GET',
        'is_active'  => true,
        'price'      => 220,
        'parameters' => ['shebaNumber']
    ],
    [
        'name'       => ServicesEnum::IDIMAGE,
        'url'        => BASE_URL.'istelamMelliImg/v1.0/istelamimgmelli',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 900,
        'parameters' => ['nationalId', 'birthDate']
    ],
    [
        'name'       => ServicesEnum::IDINFORMATION,
        'url'        => BASE_URL.'per_reg/v1.0/personalinfo',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 750,
        'parameters' => ['nationalCode', 'birthDate']
    ],
    [
        'name'       => ServicesEnum::IDSIMILARITY,
        'url'        => BASE_URL.'thabtAhvalSimilarity/v1.0/thabtahvalsimilarity',
        'method'     => 'POST',
        'is_active'  => false,
        'price'      => 0,
        'parameters' => [
            "nationalCode",
            "birthDate",
            "firstName",
            "lastName",
            "fullName",
            "fatherName"
        ]
    ],
    [
        'name'       => ServicesEnum::POSTAlCODE,
        'url'        => BASE_URL.'post/v1.0/postalcode',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 600,
        'parameters' => ['postalCode']
    ],
    [
        'name'       => ServicesEnum::MATCHCARDID,
        'url'        => BASE_URL.'matchCardANationalCode/v1.0/matchcardanationalcodewithbirthdate',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 700,
        'parameters' => [
            "cardNumber",
            "birthDate",
            "nationalCode"
        ]
    ],
    [
        'name'       => ServicesEnum::MATCHCARDNAME,
        'url'        => BASE_URL.'matchCardWithFirstAndLastName/v1.0/matchcardwithnameafamilyname',
        'method'     => 'POST',
        'is_active'  => false,
        'price'      => 0,
        'parameters' => [
            "cardNumber",
            "firstNameLastName"
        ]
    ],
    [
        'name'       => ServicesEnum::MATCHIBANID,
        'url'        => BASE_URL.'bank_inquiry/v1.0/matchibanbynationalcode',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 600,
        'parameters' => [
            "iban",
            "nationalCode",
            "birthDate"
        ]
    ],
    [
        'name'       => ServicesEnum::MATCHIBANNAME,
        'url'        => BASE_URL.'matchShebaWithFirstAndLastName/v1.0/matchshebawithnameafamilyname',
        'method'     => 'POST',
        'is_active'  => false,
        'price'      => 0,
        'parameters' => [
            "iban",
            "firstNameLastName"
        ]
    ],
    [
        'name'       => ServicesEnum::MATCHDEPOSITID,
        'url'        => BASE_URL.'matchHesabANationalCodeWithBirthdate/v1.0/matchhesabanationalcodewithbirthdate',
        'method'     => 'POST',
        'is_active'  => false,
        'price'      => 0,
        'parameters' => [
            "bank",
            "depositNumber",
            "nationalCode",
            "birthDate"
        ]
    ],
    [
        'name'       => ServicesEnum::MATCHDEPOSITNAME,
        'url'        => BASE_URL.'matchHesabWithFirstAndLastName/v1.0/matchhesabwithnameafamilyname',
        'method'     => 'POST',
        'is_active'  => false,
        'price'      => 0,
        'parameters' => [
            "bank",
            "depositNumber",
            "firstNameLastName"
        ]
    ],
    [
        'name'       => ServicesEnum::CARDTOIBAN,
        'url'        => BASE_URL.'convertCardToSheba/v1.0/convertcardtosheba',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 300,
        'parameters' => ['cardNumber']
    ],
    [
        'name'       => ServicesEnum::CARDTODEPOSIT,
        'url'        => BASE_URL.'convertCardToHesab/v1.0/convertcardtohesab',
        'method'     => 'POST',
        'is_active'  => false,
        'price'      => 0,
        'parameters' => ['cardNumber']
    ],
    [
        'name'       => ServicesEnum::DEPOSITTOIBAN,
        'url'        => BASE_URL.'convertHesabToSheba/v1.0/converthesabtosheba',
        'method'     => 'POST',
        'is_active'  => true,
        'price'      => 300,
        'parameters' => ['bankName', 'depositNumber']
    ],
    [
        'name'       => ServicesEnum::IBANTODEPOSIT,
        'url'        => BASE_URL.'istelamSheba/v1.0/istelamsheba',
        'method'     => 'GET',
        'is_active'  => true,
        'price'      => 220,
        'parameters' => ['bankName', 'depositNumber']
    ],
    [
        'name'       => ServicesEnum::MILITARYSERVICE,
        'url'        => BASE_URL.'istelamWorkSystem/v1.0/istelamworksystem',
        'method'     => 'GET',
        'is_active'  => true,
        'price'      => 1200,
        'parameters' => ['nationalCode']
    ],
    [
        'name'       => ServicesEnum::COMPANYINFORMATION,
        'url'        => BASE_URL.'istelamCompanyInfo/v1.0/istelamcompanyinfo',
        'method'     => 'GET',
        'is_active'  => true,
        'price'      => 2600,
        'parameters' => ['companyNationalCode']
    ],
];