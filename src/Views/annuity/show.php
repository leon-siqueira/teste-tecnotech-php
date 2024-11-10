<?php
  $title = 'Annuity - Year ' . $data['annuity']['year'];
  use App\Libs\PathsHelper;
  require PathsHelper::layout();
?>
<h1>Annuity - Year <?= $data['annuity']['year'] ?></h1>
<p>Value: <?= $data['annuity']['value'] ?></p>
<a href=<?= "/annuity/edit/" . $data['annuity']['year'] ?>>Edit</a>
<a href="/annuity">Back</a>
<a href="/annuity/destroy/<?= $data['annuity']['year'] ?>">Delete</a>
