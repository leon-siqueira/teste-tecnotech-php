<?php
  use App\Libs\PathsHelper;
  use App\Libs\StringHelper;
  $title = 'Members';
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <div class="row justify-content-between">
    <div class="col-2">
      <h2>Members</h2>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a href="/member/new" class="btn btn-primary">
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
            <th scope="col">CPF</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Filiation Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['members'] as $member): ?>
            <tr>
              <td><?= StringHelper::mask_cpf($member['cpf']) ?></td>
              <td><?= $member['name'] ?></td>
              <td><?= $member['email'] ?></td>
              <td><?= date('d/m/Y', strtotime($member['filiation_date'])) ?></td>
              <td class="justify-content-end button-column" >
                <a href="/member/show/<?= $member['cpf'] ?>" class="btn btn-sm btn-secondary">
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
