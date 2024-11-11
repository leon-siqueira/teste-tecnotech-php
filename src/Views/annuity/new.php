<?php
  $title = 'New Annuity';
  use App\Libs\PathsHelper;
  require PathsHelper::layout();
?>
<div class="container-fluid p-4">
  <form action="/annuity/create" method="post">
    <legend>New Annuity</legend>
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
    <a class="btn btn-secondary" href="/annuity">Back</a>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
