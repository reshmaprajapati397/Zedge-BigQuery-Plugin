<!-- Offspring -->
<?php 
if(isset($row['offsprings'])){ 
$offSpringHorsesIds = implode(',', explode(',', rtrim(ltrim($row['offsprings'], '['), ']')));
$horses = getOffSprintHorses($offSpringHorsesIds);
 
?>
<div class="tl tl-offspring">
  <div class="tl-header">
    <h3 class="tl-header-title">Offspring</h3>
  </div>

  <div class="tl-body">
    <div class="zr mb-0">
      <div class="zc-auto">
        <div class="dl-wrap">
          <h5>Total OS: <?= isset($row['Total_OS']) ? $row['Total_OS'] : 'N/A' ?></h5>
        </div>
      </div>

    </div>
    <?php foreach ($horses as $horseData) {
        $horse_url  = "https://www.hawku.com/horse/".$horseData['ID']."?ref=zedge";
        //$sale_price_url  = "https://www.hawku.com/horse/".$horseData['ID']."?ref=zedge";
        //$stud_price_url  = "https://zed.run/".$horseData['ID']."/select-mate";  ?>
    <div class="ifb ifb-box ifb-offspring">
      <div class="offspring-data">
        <div class="zr align-items-center justify-content-between">
          <div class="mt mt-id zc-1 text-center">
            <span class="vl hr-id" title="<?= $horseData['ID'] ?>">
              <?= $horseData['ID'] ?> </span>
          </div>
          <div class="zc zc-name">
            <div class="mt mt-name">
              <a href="<?= $horse_url ?>" target="_blank" class="vl hr-name"
                title="<?= $horseData['name'] ?>"><?= $horseData['name'] ?></a>
              <div class="text-small mt-vls-grouped"
                title="<?= $horseData['Z'] ?> <?= $horseData['Bloodline'] ?> <?= $horseData['Breed'] ?> <?= $horseData['Type'] ?> | <?= $horseData['stable_name'] ?>">
                <span class="vl vl-inline hr-z"><?= $horseData['Z'] ?></span>
                <span class="vl vl-inline hr-blood"><?= $horseData['Bloodline'] ?></span>
                <span class="vl vl-inline hr-breed"><?= $horseData['Breed'] ?></span>
                <span class="vl vl-inline hr-type"><?= $horseData['Type'] ?></span>
                <span class="vl vl-inline hr-stable"><strong>| <?= $horseData['stable_name'] ?></strong></span>
              </div>
            </div>
          </div>

          <div class="zc-auto zc-mts">
            <div class="zr align-items-center">
              <div class="zc-auto">
                <div class="mt mt-level text-center">
                  <span class="vl hr-level" title="<?= $horseData['startingClassLevel'] ?>">
                    <?= isset($horseData['startingClassLevel']) ? $horseData['startingClassLevel'] : 'N/A' ?></span>
                </div>
              </div>

              <div class="zc-auto">
                <div class="mt mt-evo text-center">
                  <span class="vl hr-evo" title="<?= $horseData['evo'] ?>">
                    <?= isset($horseData['evo']) ? $horseData['evo'] : 'N/A' ?></span>
                </div>
              </div>


              <div class="zc-auto">
                <div class="zr align-items-center">
                  <div class="mt mt-designation">
                    <span class="vl hr-designation icon-mt">
                      <strong class="text-light">
                        <?php if (isset($horseData['breed_version'])) {
                          echo $horseData['breed_version'].".0";
                        } ?>
                      </strong>
                    </span>
                  </div>
                </div>
              </div>


              <div class="zc-auto">
                <div class="zr align-items-center">
                  <div class="mt mt-races">
                    <span class="vl hr-races icon-mt">
                      <?= isset($horseData['race_count']) ?  "<i class='fa-solid fa-flag-checkered'></i> ".$horseData['race_count'] : 'N/A'  ?></span>
                  </div>

                  <div class="mt mt-win">
                    <span class="vl hr-win icon-mt">
                      <?= isset($horseData['Win_pc']) ? "<i class='fa-solid fa-ribbon fa-fw'></i>".intval( $horseData['Win_pc'] )."%" : 'N/A' ?></span>
                  </div>

                  <div class="mt-group zc-auto mt-group-eba-ba-dp-var-z text-center">
                    <div class="mt zc mt-eba">
                      <span class="vl hr-eba icon-mt" title="<?= $horseData['logic_eBA_100'] ?>">
                        <?= isset($horseData['logic_eBA_100']) ? $horseData['logic_eBA_100'] : 'N/A' ?></span>
                    </div>

                    <div class="mt mt-ba">
                      <span
                        class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($horseData['logic_BA_100']) ?>"><?= isset($horseData['logic_BA_100']) ? $horseData['logic_BA_100'] : 'N/A' ?></span>
                    </div>

                    <div class="mt mt-dp">
                      <span
                        class="zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal($horseData['logic_DP_100']) ?>"><?= isset($horseData['logic_DP_100']) ? $horseData['logic_DP_100'] : 'N/A' ?></span>
                    </div>

                    <div class="mt mt-var">
                      <span
                        class="zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal($horseData['logic_VAR_100']) ?>"><?= isset($horseData['logic_VAR_100']) ? $horseData['logic_VAR_100'] : 'N/A' ?></span>
                    </div>

                    <div class="mt zc mt-zedge">
                      <span class="vl hr-zedge icon-mt"><strong class="text-light">
                          <?= isset($horseData['Real_Zedge']) ?  intval($horseData['Real_Zedge']) : 'N/A' ?></strong></span>
                    </div>
                  </div>

                  <div class='mt-group mt-parents zc text-left'>
                    <div class='zr mt-parent-father'>
                      <span class='icon-mt'><i class='fa-solid fa-mars-stroke-up'></i></span>
                      <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal(
                              $horseData['D_BA']) ?>">
                        <?= isset($horseData['D_BA'] ) ?  intval($horseData['D_BA']) : 'N/A' ?>
                      </span>
                      <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal(
                              $horseData['D_DP']
                          ) ?>">
                        <?= isset($horseData['D_DP'] ) ?  intval($horseData['D_DP']) : 'N/A' ?>
                      </span>
                      <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal(
                              $horseData['D_VAR']
                          ) ?>">
                        <?= isset($horseData['D_VAR'] ) ?  intval($horseData['D_VAR']) : 'N/A' ?>
                      </span>
                    </div>
                    <div class='zr mt-parent-mother'>
                      <span class='icon-mt'><i class='fa-solid fa-venus'></i></span>
                      <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal(
                              $horseData['M_BA']
                          ) ?>">
                        <?= isset($horseData['M_BA'] ) ?  intval($horseData['M_BA']) : 'N/A' ?>
                      </span>
                      <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal(
                              $horseData['M_DP']
                          ) ?>">
                        <?= isset($horseData['M_DP'] ) ?  intval($horseData['M_DP']) : 'N/A' ?>
                      </span>
                      <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal(
                              $horseData['M_VAR']
                          ) ?>">
                        <?= isset($horseData['M_VAR'] ) ?  intval($horseData['M_VAR']) : 'N/A' ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

  </div>
</div>
<?php } ?>