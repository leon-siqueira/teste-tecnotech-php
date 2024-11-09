<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Members</title>
</head>
<body>
  <h1>Members</h1>
  <ul>
    <?php foreach ($data['members'] as $member): ?>
      <li>
        <a href="/member/show/<?= $member['cpf'] ?>"><!-- TODO: This would definetly be a problem with LGPD, add an ID -->
          Member - <?= $member['name'] ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
