<?php

namespace App\Libs;

class StringHelper
{
  static function sanitize_cpf($string)
  {
    return str_replace(['.', '-'], '', $string);
  }

  static function mask_cpf($string)
  {
    return substr($string, 0, 3) . '.' . substr($string, 3, 3) . '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);
  }
}
