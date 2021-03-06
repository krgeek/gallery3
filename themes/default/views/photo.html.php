<?php defined("SYSPATH") or die("No direct script access.") ?>
<div id="gItem">
  <?= $theme->photo_top() ?>

  <ul class="gPager">
    <li>
      <? if ($previous_item): ?>
      <a href="<?= $previous_item->url() ?>" class="gButtonLink ui-icon-left ui-state-default ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-w"></span><?= t("previous") ?></a>
      <? else: ?>
      <a class="gButtonLink ui-icon-left ui-state-disabled ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-w"></span><?= t("previous") ?></a>
      <? endif; ?>
    </li>
    <li class="gInfo"><?= t("%position of %total", array("position" => $position, "total" => $sibling_count)) ?></li>
    <li class="txtright">
      <? if ($next_item): ?>
      <a href="<?= $next_item->url() ?>" class="gButtonLink ui-icon-right ui-state-default ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-e"></span><?= t("next") ?></a>
      <? else: ?>
      <a class="gButtonLink ui-icon-right ui-state-disabled ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-e"></span><?= t("next") ?></a>
      <? endif ?>
    </li>
  </ul>

  <div id="gPhoto">
    <?= $theme->resize_top($item) ?>
    <? if (access::can("view_full", $item)): ?>
    <a href="#" class="gFullSizeLink" title="<?= t("View full size") ?>">
      <? endif ?>
      <?= $item->resize_img(array("id" => "gPhotoId-{$item->id}", "class" => "gResize")) ?>
      <? if (access::can("view_full", $item)): ?>
    </a>
    <? endif ?>
    <?= $theme->resize_bottom($item) ?>
  </div>

  <div id="gInfo">
    <h1><?= p::clean($item->title) ?></h1>
    <div><?= p::clean($item->description) ?></div>
  </div>

  <script type="text/javascript">
    var ADD_A_COMMENT = "<?= t("Add a comment") ?>";
  </script>
  <?= $theme->photo_bottom() ?>
</div>
