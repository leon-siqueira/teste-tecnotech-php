<?php
  use App\Libs\PathsHelper;
  $title = 'Annuities';
  require PathsHelper::layout();
?>
<h1>Annuities</h1>
<ul>
  <?php foreach ($data['annuities'] as $annuity): ?>
    <li>
      <a href="/annuity/show/<?= $annuity['year'] ?>">
        Annuity - Year <?= $annuity['year'] ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
