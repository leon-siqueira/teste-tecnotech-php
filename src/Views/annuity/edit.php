<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Annuity - <?= $data['annuity']['year'] ?></title>
</head>
<body>
  <h1>Edit Annuity - <?= $data['annuity']['year'] ?></h1>
  <form action="/annuity/update/<?= $data['annuity']['year'] ?>" method="POST">
    <input type="hidden" name="year" value="<?= $data['annuity']['year'] ?>">
    <label for="value">Value</label>
    <input type="text" name="value" id="value" value="<?= $data['annuity']['value'] ?>">
    <button type="submit">Update</button>
  </form>
  <a href="/annuity/show/<?= $data['annuity']['year'] ?>">Back</a>
</body>
</html>
