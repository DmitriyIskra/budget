<?php

namespace App\Enums\Enums;

enum AuthFormCategory: string
{
    case Login = 'login';
    case Register = 'register';
    case Recover = 'recover';
}
