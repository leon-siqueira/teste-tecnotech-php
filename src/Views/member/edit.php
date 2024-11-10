<?php
  $title = 'Edit member';
  use App\Libs\PathsHelper;
  require PathsHelper::layout();
?>
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
