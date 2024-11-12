<?php
  use App\Libs\StringHelper;
  use App\Libs\PathsHelper;
  $title = 'Checkout - '.$data['checkout']['id'];
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <div class="row">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th scope="col" colspan=2 class="fs-3">Checkout</th>
          </tr>
        </thead>
        <tr>
          <th class="property-name">ID</th>
          <td><?= $data['checkout']['id'] ?></td>
        </tr>
        <tr>
          <th class="property-name">Is Paid?</th>
          <td>
            <div class="d-flex justify-content-between align-items-center">
              <?= $data['checkout']['is_paid'] ? 'Yes' : 'No' ?>
              <?php if (!$data['checkout']['is_paid']): ?>
                <a class="btn btn-sm btn-success" href=<?= "/checkout/pay/" . $data['checkout']['id'] ?>>Pay</a>
              <?php endif; ?>
            </div>
          </td>
        </tr>
        <tr>
          <th class="property-name">Annuity</th>
          <td>
            <a href="/annuity/show/<?= $data['checkout']['annuity_year'] ?>">
              <?= $data['checkout']['annuity_year'] ?>
            </a>
          </td>
        </tr>
        <tr>
          <th class="property-name">Member</th>
          <td>
            <a href="/member/show/<?= $data['checkout']['member_cpf'] ?>">
              <?= StringHelper::mask_cpf($data['checkout']['member_cpf']) ?>
            </a>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <a class="btn btn-secondary" href="/checkout">Back</a>
  <a class="btn btn-primary" href=<?= "/checkout/edit/" . $data['checkout']['id'] ?>>Edit</a>
</div>
