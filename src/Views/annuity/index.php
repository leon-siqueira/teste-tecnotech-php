<?php
  use App\Libs\PathsHelper;
  $title = 'Annuities';
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <div class="row justify-content-between">
    <div class="col-2">
      <h2>Annuities</h2>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a href="/annuity/new" class="btn btn-primary">
        <i class="bi bi-plus"></i>
        <span>
          Add
        </span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center pt-4">
    <div class="col-md-8 table-responsive">
      <table class="table table-dark table-striped align-middle">
        <thead>
          <tr>
            <th scope="col">Year</th>
            <th scope="col">Value</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['annuities'] as $annuity): ?>
            <tr>
              <td><?= $annuity['year'] ?></td>
              <td><?= $annuity['value'] ?></td>
              <td class="d-flex justify-content-end" >
                <a href="/annuity/show/<?= $annuity['year'] ?>" class="btn btn-sm btn-secondary">
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
