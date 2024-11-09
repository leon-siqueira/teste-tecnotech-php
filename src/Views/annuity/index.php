<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Annuities</title>
</head>
<body>
  <h1>Annuities</h1>
  <ul>
    <?php foreach ($data['annuities'] as $annuity): ?>
      <li>
        <a href="/annuity/show/<?= $annuity['year'] ?>">
          Annuity - Year <?= $annuity['year'] ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
