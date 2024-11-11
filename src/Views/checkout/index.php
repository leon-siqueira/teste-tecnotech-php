<?php
  use App\Libs\PathsHelper;
  use App\Libs\StringHelper;
  $title = 'Checkouts';
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <div class="row justify-content-between">
    <div class="col-2">
      <h2>Checkouts</h2>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a href="/checkout/new" class="btn btn-primary">
        <i class="bi bi-plus"></i>
        <span>
          Add
        </span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center pt-4">
    <div class="col-md-10 table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Is Paid?</th>
            <th scope="col">Member</th>
            <th scope="col">Annuity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['checkouts'] as $checkout): ?>
            <tr>
              <td><?= $checkout['id'] ?></td>
              <td>
                <?= $checkout['is_paid'] ? 'Yes' : 'No' ?>
              </td>
              <td>
                <a href="/member/show/<?= $checkout['member_cpf'] ?>">
                  <?= StringHelper::mask_cpf($checkout['member_cpf']) ?>
                </a>
              </td>
              <td>
                <a href="/annuity/show/<?= $checkout['annuity_year'] ?>">
                  <?= $checkout['annuity_year'] ?>
                </a>
              </td>
              <td class="justify-content-end button-column" >
                <a href="/checkout/show/<?= $checkout['id'] ?>" class="btn btn-sm btn-secondary">
                  <i class="bi bi-eye"></i>
                  Show
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
