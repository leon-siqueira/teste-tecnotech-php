<?php

namespace App\Helpers;

class StringHelper
{
  static function sanitize_cpf($string)
  {
    return str_replace(['.', '-'], '', $string);
  }
}
