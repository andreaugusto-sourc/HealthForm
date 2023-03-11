<?php

namespace App\Enums;

enum TiposPergunta: String
{
    case NUMBER = "number";
    case TEXT = "text";
    case CHECKBOX = "checkbox";
    case RANGE = "range";
    case RADIO = "radio";
    case DATE = "date";
    case TIME = "time";
    case EMAIL = "email";
    case PASSWORD = "password";
    case FILE = "file";
    case TEL = "tel";
    case URL = "url";
}

?>