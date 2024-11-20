<?php

namespace App\Enums;

enum ServicesEnum: string
{
    case TOKEN = 'Token';
    case SHAHKAR = 'Shahkar';
    case CARD = 'Card';
    case IBAN = 'Iban';
    case IDIMAGE = 'IdImage';
    case IDINFORMATION = 'IdInformation';
    case IDSIMILARITY = 'IdSimilarity';
    case POSTAlCODE = 'PostalCode';
    case MATCHCARDID = 'MatchCardId';
    case MATCHCARDNAME = 'MatchCardName';
    case MATCHIBANID = 'MatchIbanId';
    case MATCHIBANNAME = 'MatchIbanName';
    case MATCHDEPOSITID = 'MatchDepositId';
    case MATCHDEPOSITNAME = 'MatchDepositName';
    case CARDTOIBAN = 'CardToIban';
    case CARDTODEPOSIT = 'CardToDeposit';
    case DEPOSITTOIBAN = 'DepositToIban';
    case IBANTODEPOSIT = 'IbanToDeposit';
    case MILITARYSERVICE = 'MilitaryService';
    case COMPANYINFORMATION = 'CompanyInformation';

}
