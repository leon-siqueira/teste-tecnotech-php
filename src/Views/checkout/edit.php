<?php
  $title = 'Edit Checkout';

  use App\Libs\PathsHelper;
  use App\Libs\StringHelper;
  use App\Models\Member;
  use App\Models\Annuity;

  require PathsHelper::layout();

  $members = Member::all();
  $annuities = Annuity::all();
?>
<div class="container-fluid p-4">
  <form action="/checkout/update/<?= $data['checkout']['id'] ?>" method="post">
    <div class="row justify-content-between">
      <div class="col-4">
        <legend>Edit Checkout</legend>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-danger" href="/checkout/destroy/<?= $data['checkout']['id'] ?>">Delete</a>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col-sm-6">
        <label for="member_cpf" class="form-label">Member</label>
        <select class="form-select" id="member_cpf" name="member_cpf" aria-label="Member Select" required>
          <option value="">Select Member</option>
          <?php foreach ($members as $member): ?>
            <option value="<?= $member['cpf'] ?>" <?= $member['cpf'] == $data['checkout']['member_cpf'] ? 'selected' : '' ?>>
              <?= $member['name'] ?> - <?= StringHelper::mask_cpf($member['cpf']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3 col-sm-6">
        <label for="annuity_year" class="form-label">Annuity</label>
        <select class="form-select" id="annuity_year" name="annuity_year" aria-label="Annuity Select" required>
          <option value="">Select Annuity</option>
          <?php foreach ($annuities as $annuity): ?>
            <option value="<?= $annuity['year'] ?>" <?= $annuity['year'] == $data['checkout']['annuity_year'] ? 'selected' : '' ?>>
              <?= $annuity['year'] ?> - <?= $annuity['value'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <a class="btn btn-secondary" href="/checkout">Back</a>
    <button type="submit" class="btn btn-primary">Update</button>
