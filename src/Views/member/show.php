<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member - <?= $data['member']['name'] ?></title>
</head>
<body>
  <?php use App\Libs\StringHelper; ?>
  <h1>Member - <?= $data['member']['name'] ?></h1>
  <ul>
    <li>
      <a href="/member/edit/<?= $data['member']['cpf'] ?>">Edit</a>
    </li>
    <li>
      <a href="/member/destroy/<?= $data['member']['cpf'] ?>">Delete</a>
    </li>
  </ul>
  <p>
    <strong>Name:</strong> <?= $data['member']['name'] ?>
  </p>
  <p>
    <strong>Email:</strong> <?= $data['member']['email'] ?>
  </p>
  <p>
    <strong>CPF:</strong> <?= StringHelper::mask_cpf($data['member']['cpf']) ?>
  </p>
  <p>
    <strong>Filiation date:</strong> <?= date('d/m/Y', strtotime($data['member']['filiation_date'])) ?>
  </p>
</body>
</html>
