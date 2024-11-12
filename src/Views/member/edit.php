<?php
  $title = 'Edit Member';
  use App\Libs\PathsHelper;
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <form action="/member/update/<?= $data['member']['cpf'] ?>" method="post">
    <div class="row justify-content-between">
      <div class="col-4">
        <legend>Edit Member</legend>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-danger" href="/member/destroy/<?= $data['member']['cpf'] ?>">Delete</a>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col-sm-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $data['member']['name'] ?>" required>
      </div>
      <div class="mb-3 col-sm-6">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $data['member']['email'] ?>" required>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col-sm-6">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $data['member']['cpf'] ?>" required>
      </div>
      <div class="mb-3 col-sm-6">
        <label for="filiation_date" class="form-label">Filiation Date</label>
        <input type="date" class="form-control" id="filiation_date" name="filiation_date" value="<?= $data['member']['filiation_date'] ?>" required>
      </div>
    </div>
    <a class="btn btn-secondary" href="/member">Back</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
