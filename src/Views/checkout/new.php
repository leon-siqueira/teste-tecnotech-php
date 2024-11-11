<?php
  $title = 'New Checkout';

  use App\Libs\PathsHelper;
  use App\Libs\StringHelper;
  use App\Models\Member;
  use App\Models\Annuity;

  require PathsHelper::layout();

  $members = Member::all();
  $annuities = Annuity::all();
?>
<div class="container-fluid p-4">
  <form action="/checkout/create" method="post">
    <legend>New Checkout</legend>
    <div class="row">
      <div class="mb-3 col-sm-6">
        <label for="member_cpf" class="form-label">Member</label>
        <select class="form-select" id="member_cpf" name="member_cpf" aria-label="Member Select">
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
        <select class="form-select" id="annuity_year" name="annuity_year" aria-label="Annuity Select">
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
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
