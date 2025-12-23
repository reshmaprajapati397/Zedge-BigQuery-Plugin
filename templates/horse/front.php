<div class='hr-outer zr'>
  <div class='mt mt-id zc-1 text-center'>
    <span class='vl hr-id' data-zfield="<?= $row['Z'] ?>" title="<?= $row['ID'] ?>">
      <?= $row['ID'] ?>
    </span>
  </div>
  <div class='mt mt-name zc-3 text-left'>
    <a href="<?= $horse_url .$row['ID'] ?>" target='_blank' class='vl hr-name' title="<?= $row['name'] ?>">
      <?= $row['name'] ?>
    </a>
    <div class='text-small mt-vls-grouped'
      title="<?= $row['Z'] ?> <?= $row['Bloodline'] ?> <?= $row['Breed'] ?> <?= $row['Type'] ?> | <?= $row['stable_name'] ?>">
      <span class='vl vl-inline hr-z'>
        <?= $row['Z'] ?>
      </span>
      <span class='vl vl-inline hr-blood'>
        <?= $row['Bloodline'] ?>
      </span>
      <span class='vl vl-inline hr-breed'>
        <?= $row['Breed'] ?>
      </span>
      <span class='vl vl-inline hr-type'>
        <?= $row['Type'] ?>
      </span>
      <span class='vl vl-inline hr-stable'><strong>|
          <?= $row['stable_name'] ?>
        </strong></span>
    </div>
  </div>

  <div class="mt-group zc-auto mt-group-races-win">
    <div class="mt mt-level text-center">
      <span class="vl hr-level" title="<?= $row['startingClassLevel'] ?>">
        <?= $row['startingClassLevel'] ?></span>
    </div>

    <div class="mt mt-evo text-center">
      <span class="vl hr-evo" title="<?= $row['evo'] ?>">
        <?= $row['evo'] ?></span>
    </div>
    <div class='mt mt-races text-left'>
      <span class='vl hr-races icon-mt' title="<?= $row[
                              'race_count'
                          ] ?>">
        <?= $row['race_count'] != '' ? "<i class='fa-solid fa-flag-checkered'></i> ".$row['race_count'] : 'N/A' ?>
      </span>
    </div>
    <div class='mt mt-win text-left'>
      <span class='vl hr-win icon-mt <?= $row['Wins'] ?>' title="<?= intval(
                              $row['Win_pc']
                          ) ?>">
        <?= $row['Win_pc'] != '' ? "<i class='fa-solid fa-ribbon fa-fw'></i>".intval( $row['Win_pc'] )."%" : 'N/A' ?>
      </span>
    </div>
  </div>


  <div class='mt-group zc-auto mt-group-eba-ba-dp-var-z text-center'>
    <div class='mt mt-eba text-center'>
      <span class='vl hr-eba icon-mt' title="<?= $row['logic_eBA_100'] ?>">
        <?= isset($row['logic_eBA_100']) ? $row['logic_eBA_100'] : 'N/A' ?>
      </span>
    </div>
    <div class='mt mt-ba'>
      <?php $colorCode = getClosestDecimal(
                              $row['logic_BA_100']
                          ); ?>
      <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= $colorCode ?>" title="<?= $row['logic_BA_100'] ?>">
        <?= isset($row['logic_BA_100']) ? $row['logic_BA_100'] : 'N/A' ?>
      </span>
    </div>
    <div class='mt mt-dp'>
      <?php $colorCode = getClosestDecimal(
                              $row['logic_DP_100']
                          ); ?>
      <span class="zbtn zbtn-mt vl hr-dp mt-vl-<?= $colorCode ?>" title="<?= $row['logic_DP_100'] ?>">
        <?= isset($row['logic_DP_100']) ? $row['logic_DP_100'] : 'N/A' ?>
      </span>
    </div>
    <div class='mt mt-var'>
      <?php $colorCode = getClosestDecimal(
                              $row['logic_VAR_100']
                          ); ?>
      <span class="zbtn zbtn-mt vl hr-var mt-vl-<?= $colorCode ?>" title="<?= $row['logic_VAR_100'] ?>">
        <?= isset($row['logic_VAR_100']) ? $row['logic_VAR_100'] : 'N/A' ?>
      </span>
    </div>
    <div class='mt mt-zedge text-center'>
      <span class='vl hr-zedge icon-mt' title="<?= number_format($row['Real_Zedge'],2) ?>">
        <strong class='text-light'>
          <?= isset($row['Real_Zedge']) ?  number_format($row['Real_Zedge'],2) : 'N/A' ?>
        </strong></span>
    </div>
  </div>

  <div class='mt-group mt-parents zc text-left'>
    <div class='zr mt-parent-father'>
      <span class='icon-mt'><i class='fa-solid fa-mars-stroke-up'></i></span>
      <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal(
                              $row['father_ba']) ?>">
        <?= isset($row['father_ba']) ? $row['father_ba'] : 'N/A' ?>
      </span>
      <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal(
                              $row['father_dp']
                          ) ?>">
        <?= isset($row['father_dp']) ? $row['father_dp'] : 'N/A' ?>
      </span>
      <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal(
                              $row['father_var']
                          ) ?>">
        <?= isset($row['father_var']) ? $row['father_var'] : 'N/A' ?>
      </span>
    </div>
    <div class='zr mt-parent-mother'>
      <span class='icon-mt'><i class='fa-solid fa-venus'></i></span>
      <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal(
                              $row['mother_ba']
                          ) ?>">
        <?= isset($row['mother_ba']) ? $row['mother_ba'] : 'N/A' ?>
      </span>
      <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal(
                              $row['mother_dp']
                          ) ?>">
        <?= isset($row['mother_dp']) ? $row['mother_dp'] : 'N/A' ?>
      </span>
      <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal(
                              $row['mother_var']
                          ) ?>">
        <?= isset($row['mother_var']) ? $row['mother_var'] : 'N/A' ?>
      </span>
    </div>
  </div>
  <div class='mt mt-price zc text-left'>
    <div class='mt-price-sale icon-mt'><i class='fa-brands fa-ethereum'></i> Sale:
      <a <?= getdecaylevel($row['decay_level']) ?> href="<?= $sale_price_url ?>" target="_blank">
        <strong>
          <?= $row['salePrice'] ?>
        </strong>
      </a>
    </div>
    <div class='mt-price-stud icon-mt'><i class='fa-brands fa-ethereum'></i> Stud
      <a <?= getdecaylevel($row['decay_level']) ?> href="<?= $stud_price_url ?>" target="_blank">
        <strong>
          <?= $row['studPrice'] ?>
        </strong>
      </a>
    </div>
  </div>
  <div class='mt mt-action zc-auto'>
    <button class='zbtn zbtn-primary icon-mt button-view-more button-rounded' data-id="<?= $row[
                            'ID'
                        ]; ?>"><i class='fa-solid fa-caret-down'></i></button>
  </div>
</div>

<div class='detailsContainer' style='display: none;'>
  <?php //include dirname(__FILE__) . '/horse_details.php'; ?>
</div>