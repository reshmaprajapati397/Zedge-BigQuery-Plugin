<!-- Parents -->
<div class="tl tl-parents">
  <div class="tl-header">
    <h3 class="tl-header-title">Parents</h3>
  </div>

  <div class="tl-body">
    <div class="zr">
      <div class="zc-6 zc-sm-12">
        <div class="ifb ifb-box parent">
          <div class="ifb-header">
            <div class="parent-header-title">
              <div class="mt mt-name">
                <div class="zr align-items-center">
                  <div class="zc">
                    <?php  $father_horse_url  = "https://www.hawku.com/horse/".$row['f_id']."?ref=zedge"; ?>
                    <div class="mt mt-id">
                      <span class="vl hr-id" title="<?= $row['f_id'] ?>">
                        #<?= $row['f_id'] ?> </span>
                    </div>
                    <h5 class="m-0"><a href="<?= $father_horse_url ?>" target="_blank" class="vl hr-name">
                        <?= $row['father_name'] ?>
                      </a>
                    </h5>
                    <div class="text-small grouped-values">
                      <span class="vl vl-inline hr-z"><?= $row['father_z'] ?></span>
                      <span class="vl vl-inline hr-blood"><?= $row['father_bloodline'] ?></span>
                      <span class="vl vl-inline hr-breed"><?= $row['father_breed'] ?></span>
                      <span class="vl vl-inline hr-type"><?= $row['father_type'] ?></span>
                      <span class="vl vl-inline hr-stable"><strong>|
                          <?= $row['father_stablename'] ?></strong></span>
                    </div>
                    <div class="zr text-small mt-1">
                      <div class="zc-auto">
                        <span class="vl vl-inline hr-level" title="<?= $row['f_start_level'] ?>">Base Level:
                          <strong><?= $row['f_start_level']  ?></strong></span>
                      </div>
                      <div class="zc-auto">
                        <span class="vl vl-inline hr-evo" title="<?= $row['f_evo'] ?>">Evo:
                          <strong><?= $row['f_evo'] ?></strong></span>
                      </div>
                    </div>
                  </div>
                  <div class="zc-auto">
                    <div class="parent-type sire"><span class="icon-mt"><i class="fa-solid fa-mars-stroke-up"></i>
                        Sire</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="ifb-body parent-stats">
            <div class="zr">
              <div class="mt mt-races text-left">
                <span class="vl hr-races icon-mt" title="<?= $row['f_race_count'] ?>">
                  <?= isset($row['f_race_count']) ? "<i class='fa-solid fa-flag-checkered'></i> ".$row['f_race_count'] : 'N/A' ?>
                </span>
              </div>
              <div class='mt mt-win text-left'>
                <span class='vl hr-win icon-mt' title="<?= intval(
                              $row['f_Win_pc']
                          ) ?>">
                  <?= isset($row['f_Win_pc']) ? "<i class='fa-solid fa-ribbon fa-fw'></i>".intval( $row['f_Win_pc'] )."%" : 'N/A' ?>
                </span>
              </div>
              <div class="mt-group zc-auto mt-group-eba-ba-dp-var-z text-center">
                <div class="mt mt-eba text-center">
                  <span class="vl hr-eba icon-mt" title="<?= $row['f_logic_eBA_100'] ?>">
                    <?= isset($row['f_logic_eBA_100']) ? $row['f_logic_eBA_100'] : 'N/A'  ?>
                  </span>
                </div>
                <div class="mt mt-ba">
                  <label>BA</label>
                  <span
                    class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['father_ba']) ?>"><?= isset($row['father_ba']) ? $row['father_ba'] : 'N/A'  ?></span>
                </div>

                <div class="mt mt-dp">
                  <span
                    class="zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal($row['father_dp']) ?>"><?= isset($row['father_dp']) ? $row['father_dp'] : 'N/A' ?></span>
                </div>

                <div class="mt mt-var">
                  <span
                    class="zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal($row['father_var']) ?>"><?= isset($row['father_var']) ? $row['father_var'] : 'N/A' ?></span>
                </div>
                <div class="mt mt-zedge text-center">
                  <span class="vl hr-zedge icon-mt" title="<?= number_format($row['f_real_Zedge'],2) ?>">
                    <strong class="text-light">
                      <?= isset($row['f_real_Zedge']) ? number_format($row['f_real_Zedge'],2) : 'N/A' ?>
                    </strong>
                  </span>
                </div>
              </div>

              <div class="mt-group mt-parents zc text-left">
                <div class="zr mt-parent-father">
                  <span class="icon-mt"><i class="fa-solid fa-mars-stroke-up"></i></span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['ff_ba']) ?>">
                    <?= isset($row['ff_ba']) ? $row['ff_ba'] : 'N/A' ?> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal($row['ff_dp']) ?>">
                    <?= isset($row['ff_dp']) ? $row['ff_dp'] : 'N/A' ?> </span> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal($row['ff_var']) ?>">
                    <?= isset($row['ff_var']) ? $row['ff_var'] : 'N/A' ?> </span>
                </div>
                <div class="zr mt-parent-mother">
                  <span class="icon-mt"><i class="fa-solid fa-venus"></i></span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['fm_ba']) ?>">
                    <?= isset($row['fm_ba']) ? $row['fm_ba'] : 'N/A' ?> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal($row['fm_dp']) ?>">
                    <?= isset($row['fm_dp']) ? $row['fm_dp'] : 'N/A' ?> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal($row['fm_var']) ?>">
                    <?= isset($row['fm_var']) ? $row['fm_var'] : 'N/A' ?> </span>
                </div>
              </div>

            </div>
          </div>

          <div class="ifb-footer pb-0">
            <div class="zr justify-content-center">
              <div class="zc-auto">
                <div class="ifb-stat inline-stat">
                  <span class="ifb-lbl">wBA: </span>
                  <span
                    class="ifb-vl parent-16m-races trait-badp-<?= getClosestDecimalTrait($row['D_wBA']) ?>"><?= isset($row['D_wBA']) ? intval($row['D_wBA']) : 'N/A' ?></span>
                </div>
              </div>

              <div class="zc-auto">
                <div class="ifb-stat inline-stat">
                  <span class="ifb-lbl">wDP: </span>
                  <span
                    class="ifb-vl parent-short-races trait-badp-<?= getClosestDecimalTrait($row['D_wDP']) ?>"><?= isset($row['D_wDP']) ? $row['D_wDP'] : 'N/A' ?></span>
                </div>
              </div>

              <div class="zc-auto">
                <div class="ifb-stat inline-stat">
                  <span class="ifb-lbl">wVAR: </span>
                  <span
                    class="ifb-vl parent-long-races trait-var-<?= getClosestDecimalTraitVar($row['D_wVAR']) ?>"><?= isset($row['D_wVAR'] ) ?  $row['D_wVAR'] : 'N/A' ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="zc-6 zc-sm-12">
        <div class="ifb ifb-box parent">
          <div class="ifb-header">
            <div class="parent-header-title">
              <div class="mt mt-name">
                <div class="zr align-items-center">
                  <div class="zc">
                    <?php  $mother_horse_url  = "https://www.hawku.com/horse/".$row['m_id']."?ref=zedge"; ?>
                    <div class="mt mt-id">
                      <span class="vl hr-id" title="<?= $row['m_id'] ?>">
                        #<?= $row['m_id'] ?> </span>
                    </div>
                    <h5 class="m-0"><a href="<?= $mother_horse_url ?>" target="_blank" class="vl hr-name">
                        <?= $row['mother_name'] ?>
                      </a>
                    </h5>
                    <div class="text-small grouped-values">
                      <span class="vl vl-inline hr-z"><?= $row['mother_z'] ?></span>
                      <span class="vl vl-inline hr-blood"><?= $row['mother_bloodline'] ?></span>
                      <span class="vl vl-inline hr-breed"><?= $row['mother_breed'] ?></span>
                      <span class="vl vl-inline hr-type"><?= $row['mother_type'] ?></span>
                      <span class="vl vl-inline hr-stable"><strong>|
                          <?= $row['mother_stablename'] ?></strong></span>
                    </div>
                    <div class="zr text-small mt-1">
                      <div class="zc-auto">
                        <span class="vl vl-inline hr-level" title="<?= $row['m_start_level'] ?>">Base Level:
                          <strong><?= $row['m_start_level'] ?></strong></span>
                      </div>
                      <div class="zc-auto">
                        <span class="vl vl-inline hr-evo" title="<?= $row['m_evo'] ?>">Evo:
                          <strong><?= $row['m_evo'] ?></strong></span>
                      </div>
                    </div>
                  </div>
                  <div class="zc-auto">
                    <div class="parent-type dam"><span class="icon-mt"><i class='fa-solid fa-venus'></i> Dam</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="ifb-body parent-stats">
            <div class="zr">
              <div class="mt mt-races text-left">
                <span class="vl hr-races icon-mt" title="<?= $row['m_race_count'] ?>">
                  <?= isset($row['m_race_count']) ? "<i class='fa-solid fa-flag-checkered'></i> ".$row['m_race_count'] : 'N/A' ?>
                </span>
              </div>
              <div class='mt mt-win text-left'>
                <span class='vl hr-win icon-mt' title="<?= intval(
                              $row['m_Win_pc']
                          ) ?>">
                  <?= isset($row['m_Win_pc']) ? "<i class='fa-solid fa-ribbon fa-fw'></i>".intval( $row['m_Win_pc'] )."%" : 'N/A' ?>
                </span>
              </div>
              <div class="mt-group zc-auto mt-group-eba-ba-dp-var-z text-center">
                <div class="mt mt-eba text-center">
                  <span class="vl hr-eba icon-mt" title="<?= $row['m_logic_eBA_100'] ?>">
                    <?= isset($row['m_logic_eBA_100']) ? $row['m_logic_eBA_100'] : 'N/A' ?>
                  </span>
                </div>
                <div class="mt mt-ba">
                  <span
                    class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['mother_ba']) ?>"><?= isset($row['mother_ba']) ? $row['mother_ba'] : 'N/A' ?></span>
                </div>

                <div class="mt mt-dp">
                  <span
                    class="zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal($row['mother_dp']) ?>"><?= isset($row['mother_dp']) ? $row['mother_dp'] : 'N/A' ?></span>
                </div>

                <div class="mt mt-var">
                  <span
                    class="zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal($row['mother_var']) ?>"><?= isset($row['mother_var']) ? $row['mother_var'] : 'N/A' ?></span>
                </div>
                <div class="mt mt-zedge text-center">
                  <span class="vl hr-zedge icon-mt" title="<?= number_format($row['m_real_Zedge'],2) ?>"><strong
                      class="text-light">
                      <?= isset($row['m_real_Zedge']) ? number_format($row['m_real_Zedge'],2) : 'N/A'  ?>
                    </strong></span>
                </div>
              </div>

              <div class="mt-group mt-parents zc text-left">
                <div class="zr mt-parent-father">
                  <span class="icon-mt"><i class="fa-solid fa-mars-stroke-up"></i></span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['mf_ba']) ?>">
                    <?= isset($row['mf_ba']) ? $row['mf_ba'] : 'N/A' ?> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal($row['mf_dp']) ?>">
                    <?= isset($row['mf_dp']) ? $row['mf_dp'] : 'N/A' ?> </span> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal($row['mf_var']) ?>">
                    <?= isset($row['mf_var']) ? $row['mf_var'] : 'N/A' ?> </span>
                </div>
                <div class="zr mt-parent-mother">
                  <span class="icon-mt"><i class="fa-solid fa-venus"></i></span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['mm_ba']) ?>">
                    <?= isset($row['mm_ba']) ? $row['mm_ba'] : 'N/A' ?> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-dp mt-vl-<?= getClosestDecimal($row['mm_dp']) ?>">
                    <?= isset($row['mm_dp']) ? $row['mm_dp'] : 'N/A' ?> </span>
                  <span class="zc-auto zbtn zbtn-mt vl hr-var mt-vl-<?= getClosestDecimal($row['mm_var']) ?>">
                    <?= isset($row['mm_var']) ? $row['mm_var'] : 'N/A' ?> </span>
                </div>
              </div>

            </div>
          </div>

          <div class="ifb-footer pb-0">
            <div class="zr justify-content-center">
              <div class="zc-auto">
                <div class="ifb-stat inline-stat">
                  <span class="ifb-lbl">wBA: </span>
                  <span
                    class="ifb-vl parent-16m-races trait-badp-<?= getClosestDecimalTrait($row['M_wBA']) ?>"><?= isset($row['M_wBA'] ) ? intval($row['M_wBA']) : 'N/A'  ?></span>
                </div>
              </div>

              <div class="zc-auto">
                <div class="ifb-stat inline-stat">
                  <span class="ifb-lbl">wDP: </span>
                  <span
                    class="ifb-vl parent-short-races trait-badp-<?= getClosestDecimalTrait($row['M_wDP']) ?>"><?= isset($row['M_wDP'] ) ? $row['M_wDP']  : 'N/A' ?></span>
                </div>
              </div>

              <div class="zc-auto">
                <div class="ifb-stat inline-stat">
                  <span class="ifb-lbl">wVAR: </span>
                  <span
                    class="ifb-vl parent-long-races trait-var-<?= getClosestDecimalTraitVar($row['M_wVAR']) ?>"><?=  isset($row['M_wVAR'] ) ? $row['M_wVAR'] : 'N/A' ?></span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>