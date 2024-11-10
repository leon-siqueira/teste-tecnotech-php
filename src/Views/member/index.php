<?php
  $title = 'Members';
  use App\Libs\PathsHelper;
  require PathsHelper::layout();
?>
<h1>Members</h1>
<ul>
  <?php foreach ($data['members'] as $member): ?>
    <li>
      <a href="/member/show/<?= $member['cpf'] ?>"><!-- TODO: This would definetly be a problem with LGPD, add an ID -->
        Member - <?= $member['name'] ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
