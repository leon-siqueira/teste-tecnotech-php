<?php
  $title = 'Annuity - Year ' . $data['annuity']['year'];
  use App\Libs\PathsHelper;
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <div class="row">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th scope="col" colspan=2 class="fs-3">Annuity</th>
          </tr>
        </thead>
        <tr>
          <th class="property-name">Year</th>
          <td><?= $data['annuity']['year'] ?></td>
        </tr>
        <tr>
          <th class="property-name">Value</th>
          <td><?= $data['annuity']['value'] ?></td>
        </tr>
      </table>
    </div>
  </div>

  <a class="btn btn-secondary" href="/annuity">Back</a>
  <a class="btn btn-primary" href=<?= "/annuity/edit/" . $data['annuity']['year'] ?>>Edit</a>
</div>
