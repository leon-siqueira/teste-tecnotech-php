<?php
  use App\Libs\StringHelper;
  use App\Libs\PathsHelper;
  use App\Models\Member;

  $title = 'Member - '.$data['member']['name'];
  require PathsHelper::layout();
  $member = Member::find($data['member']['cpf']);
  $pending_checkouts = $member->pending_checkouts();
  $owed_total = $member->owed_total();

?>
<div class="container-fluid p-4">
  <div class="row">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th scope="col" colspan=2 class="fs-3">Member</th>
          </tr>
        </thead>
        <tr>
          <th class="property-name">CPF</th>
          <td><?= StringHelper::mask_cpf($data['member']['cpf']) ?></td>
        </tr>
        <tr>
          <th class="property-name">Name</th>
          <td><?= $data['member']['name'] ?></td>
        </tr>
        <tr>
          <th class="property-name">Email</th>
          <td><?= $data['member']['email'] ?></td>
        </tr>
        <tr>
          <th class="property-name">Filiation date</th>
          <td><?= date('d/m/Y', strtotime($data['member']['filiation_date'])) ?></td>
        </tr>
      </table>
    </div>
  </div>
  <?php if (count($pending_checkouts) > 0): ?>
  <div class="row">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th scope="col" colspan=2 class="fs-3">Pending Checkouts</th>
          </tr>
        </thead>
        <tr>
          <th class="property-name">ID</th>
          <th>Annuity</th>
        </tr>
        <?php foreach ($pending_checkouts as $checkout): ?>
          <tr>
            <td class="property-name"><?= $checkout->get_id() ?></td>
            <td class="d-flex justify-content-between align-items-center">
              <a href="/annuity/show/<?= $checkout->get_annuity_year() ?>">
                <?= $checkout->get_annuity_year() ?>
              </a>
              <a class="btn btn-sm btn-success" href="/checkout/pay/<?= $checkout->get_id() ?>">Pay</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    Total owed: <?= number_format($owed_total, 2) ?>
  </div>
  <?php endif; ?>

  <a class="btn btn-secondary" href="/member">Back</a>
  <a class="btn btn-primary" href=<?= "/member/edit/" . $data['member']['cpf'] ?>>Edit</a>
</div>
