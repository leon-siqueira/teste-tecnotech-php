<?php
  use App\Libs\StringHelper;
  use App\Libs\PathsHelper;
  $title = 'Member - '.$data['member']['name'];
  require PathsHelper::layout();
?>
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
