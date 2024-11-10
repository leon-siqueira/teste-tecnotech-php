<?php
namespace App\Libs;

class PathsHelper
{
  static function root()
  {
    return substr($_SERVER['DOCUMENT_ROOT'], 0, -7);
  }

  static function layout()
  {
    return self::root().'/src/Views/layout.php';
  }
}
