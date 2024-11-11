<?php
  use App\Libs\StringHelper;
  use App\Libs\PathsHelper;
  $title = 'Member - '.$data['member']['name'];
  require PathsHelper::layout();
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

  <a class="btn btn-secondary" href="/member">Back</a>
  <a class="btn btn-primary" href=<?= "/member/edit/" . $data['member']['cpf'] ?>>Edit</a>
</div>
