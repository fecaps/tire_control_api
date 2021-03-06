<?php
declare(strict_types=1);

namespace Api\Enum;

class UserMessages
{
    const LESS_THAN             = 'This field must have %s or more characters';
    const MORE_THAN             = 'This field must have %s or less characters';
    const NOT_BLANK             = 'This field cannot be blank';
    const INVALID_NAME          = 'Invalid name';
    const INVALID_USERNAME      = 'Invalid username';
    const INVALID_EMAIL         = 'Invalid email';
    const INVALID_PASSWORD      = 'Invalid password';
    const INVALID_IP_ADDRESS    = 'Invalid IP address';
    const INVALID_DATE_TIME     = 'Invalid date time. Format: %s';
}
