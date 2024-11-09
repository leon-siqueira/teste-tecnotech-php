<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Member</title>
</head>
<body>
  <form action="/member/create/<?= $data['member']['cpf'] ?>" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?= $data['member']['name'] ?>">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= $data['member']['email'] ?>">
    <label for="cpf">CPF</label>
    <input type="text" name="cpf" id="cpf" value="<?= $data['member']['cpf'] ?>">
    <button type="submit">Create</button>
  </form>
</body>
</html>
