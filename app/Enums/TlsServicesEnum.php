<?php

namespace App\Enums;

enum TlsServicesEnum: string
{
    case TOKEN = 'Token';
    case SHAHKAR = 'Shahkar';
    case CARD = 'Card';
    case IBAN = 'Iban';
    case IDIMAGE = 'Id Image';
    case IDINFORMATION = 'Id Information';
    case IDSIMILARITY = 'Id Similarity';
    case POSTAlCODE = 'Postal Code';
    case MATCHCARDID = 'Match Card Id';
    case MATCHCARDNAME = 'Match Card Name';
    case MATCHIBANID = 'Match Iban Id';
    case MATCHIBANNAME = 'Match Iban Name';
    case MATCHDEPOSITID = 'Match Deposit Id';
    case MATCHDEPOSITNAME = 'Match Deposit Name';
    case CARDTOIBAN = 'Card To Iban';
    case CARDTODEPOSIT = 'Card To Deposit';
    case DEPOSITTOIBAN = 'Deposit To Iban';
    case MILITARYSERVICE = 'Military Service';
    case COMPANYINFORMATION = 'Company Information';

}
