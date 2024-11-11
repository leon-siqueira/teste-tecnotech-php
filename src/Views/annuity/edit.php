<?php
  $title = 'Edit Annuity';
  use App\Libs\PathsHelper;
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <div class="row">
    <form action="/annuity/update/<?= $data['annuity']['year'] ?>" method="POST">
      <div class="row justify-content-between">
        <div class="col-4">
          <legend>Edit Annuity</legend>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="btn btn-danger" href="/annuity/destroy/<?= $data['annuity']['year'] ?>">Delete</a>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-sm-6">
          <label for="year" class="form-label">Year</label>
          <input type="text" class="form-control" id="year" name="year" value="<?= $data['annuity']['year'] ?>">
        </div>
        <div class="mb-3 col-sm-6">
          <label for="value" class="form-label">Value</label>
          <input type="text" class="form-control" id="value" name="value" value="<?= $data['annuity']['value'] ?>">
        </div>
      </div>
      <a class="btn btn-secondary" href="/annuity/show/<?= $data['annuity']['year'] ?>">Back</a>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
