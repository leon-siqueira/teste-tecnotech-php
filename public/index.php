<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Simple Framework</title>
  </head>
  <body>
  <ul>
    <li>
      <a href="/annuity/new">New Annuity</a>
    </li>
    <li>
      <a href="/annuity/index">List Annuities</a>
    </li>
    <li>
      <a href="/member/new">New Member</a>
    </li>
    <li>
      <a href="/member/index">List Members</a>
    </li>
  </ul>
  <?php
    require '../vendor/autoload.php';

    use App\Core\Router;

    $router = new Router();


  ?>
  </body>
</html>
