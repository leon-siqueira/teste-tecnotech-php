<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'default title' ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
  <nav class="navbar navbar-expand navbar-light bg-light p-2">
    <div class="container-fluid flex-wrap">
      <a class="navbar-brand fs-2 fw-bold" href="/">Home</a>
      <ul class="navbar-nav my-1 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/annuity">Annuities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/member">Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/payments">Payments</a>
        </li>
      </ul>
    </div>
  </nav>
  <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
