<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Annuity - Year <?= $data['annuity']['year'] ?></title>
</head>
<body>
  <h1>Annuity - Year <?= $data['annuity']['year'] ?></h1>
  <p>Value: <?= $data['annuity']['value'] ?></p>
  <a href=<?= "/annuity/edit/" . $data['annuity']['year'] ?>>Edit</a>
  <a href="/annuity">Back</a>
  <a href="/annuity/destroy/<?= $data['annuity']['year'] ?>">Delete</a>
</body>
</html>
