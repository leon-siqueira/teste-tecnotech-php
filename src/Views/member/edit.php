<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Member</title>
</head>
<body>
  <form action="/member/update/<?= $data['member']['cpf'] ?>" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?= $data['member']['name'] ?>">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= $data['member']['email'] ?>">
    <label for="cpf">CPF</label>
    <input type="text" name="cpf" id="cpf" value="<?= $data['member']['cpf'] ?>">
    <label for="filiation_date">Filiation date</label>
    <input type="date" name="filiation_date" id="filiation_date" value="<?= $data['member']['filiation_date'] ?>">
    <button type="submit">Update</button>
  </form>
</body>
</html>
