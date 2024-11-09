<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Annuity</title>
</head>
<body>
  <h1>New Annuity</h1>
  <form action="/annuity/create" method="post">
    <label for="year">Year</label>
    <input type="text" name="year" id="year" value="<?= $data['annuity']['year'] ?>" >
    <label for="value">Value</label>
    <input type="text" name="value" id="value" value="<?= $data['annuity']['value']?>" >
    <button type="submit">Create</button>
  </form>
</body>
</html>
