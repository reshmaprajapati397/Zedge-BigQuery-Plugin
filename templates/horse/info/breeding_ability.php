<!-- Breeding Ability -->
<div class="tl tl-breeding-ability">
  <div class="tl-header">
    <h3 class="tl-header-title">Breeding Ability</h3>
  </div>

  <div class="tl-tabs-wrap">
    <ul class="tl-tabs">
      <li class="tl-tab current" data-tab="tl_ba_tab-1"><a>Details</a></li>
      <li class="tl-tab empty" data-tab="tl_ba_tab-2"><a>Second Tab</a></li>
      <li class="tl-tab empty" data-tab="tl_ba_tab-3"><a>Third Tab</a></li>
    </ul>

    <div class="tl_ba_tab-1 tl-tab-content current">
      <div class="tl-body">
        <div class="zr mb-0">
          <div class="zc">
            <div class="dl-wrap">
              <h5>Decay Level: <?= isset($row['decay_level']) ? intval($row['decay_level']) : 0 ?></h5>
            </div>
          </div>
        </div>
        <div class="zr">
          <div class="zc zc-md-6 zc-sm-12">
            <div class="ifb ifb-card breeding">
              <div class="ifb-header">
                <h5 class="ifb-header-title">Offspring BA</h5>
                <div class="ifb-header-sub">
                  <div class="zr">
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <span class="ifb-lbl">#OS: </span>
                        <span
                          class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['Off_BA']) ?>"><?= isset($row['Off_BA']) ? $row['Off_BA'] : 'N/A' ?></span>
                      </div>
                    </div>
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <span class="ifb-lbl">O zBA: </span>
                        <span class="ifb-vl"><?= isset($row['O_zBA']) ? number_format($row['O_zBA'],2) : 'N/A' ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ifb-body ifb-box-content">
                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat s-m-b-p">
                      <span class="ifb-lbl">O eBA: </span>
                      <span class="ifb-vl"><span
                          class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['O_eBA_100']) ?>"><?= isset($row['O_eBA_100']) ? $row['O_eBA_100'] : 'N/A' ?></span></span>

                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat s-m-b-p">
                      <span class="ifb-lbl">O BA: </span>
                      <span class="ifb-vl"><span
                          class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['O_BA_100']) ?>"><?= isset($row['O_BA_100']) ? $row['O_BA_100'] : 'N/A' ?></span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="zc zc-md-6 zc-sm-12">
            <div class="ifb ifb-card breeding">
              <div class="ifb-header">
                <h5 class="ifb-header-title">Offspring DP</h5>
                <div class="ifb-header-sub">
                  <div class="zr">
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <span class="ifb-lbl">#OS: </span>
                        <span
                          class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['Off_DP']) ?>"><?= isset($row['Off_DP']) ? $row['Off_DP'] : 'N/A' ?></span>
                      </div>
                    </div>
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <span class="ifb-lbl">O zDP: </span>
                        <span class="ifb-vl"><?= isset($row['O_zDP']) ? number_format($row['O_zDP'],2) : 'N/A' ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ifb-body ifb-box-content">
                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat s-m-b-p">
                      <span class="ifb-lbl">O eDP: </span>
                      <span class="ifb-vl"><span
                          class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['O_eDP_100']) ?>"><?= isset($row['O_eDP_100']) ? $row['O_eDP_100'] : 'N/A' ?></span></span>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat s-m-b-p">
                      <span class="ifb-lbl">O DP: </span>
                      <span class="ifb-vl"><span
                          class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['O_DP_100']) ?>"><?= isset($row['O_DP_100']) ? $row['O_DP_100'] : 'N/A' ?></span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="zc zc-md-6 zc-sm-12">
            <div class="ifb ifb-card breeding">
              <div class="ifb-header">
                <h5 class="ifb-header-title">Offspring VAR</h5>
                <div class="ifb-header-sub">
                  <div class="zr">
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <span class="ifb-lbl">#OS: </span>
                        <span
                          class="ifb-vl trait-var-<?= getClosestDecimalTraitVar($row['Off_VAR']) ?>"><?= isset($row['Off_VAR']) ? $row['Off_VAR'] : 'N/A' ?></span>
                      </div>
                    </div>
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <span class="ifb-lbl">O zVAR: </span>
                        <span
                          class="ifb-vl"><?= isset($row['O_zVAR']) ? number_format($row['O_zVAR'],2) : 'N/A' ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ifb-body ifb-box-content">
                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat s-m-b-p">
                      <span class="ifb-lbl">O eVAR: </span>
                      <span class="ifb-vl"><span
                          class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['O_eVAR_100']) ?>"><?= isset($row['O_eVAR_100']) ? $row['O_eVAR_100'] : 'N/A' ?></span></span>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat s-m-b-p">
                      <span class="ifb-lbl">O VAR: </span>
                      <span class="ifb-vl"><span
                          class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['O_VAR_100']) ?>"><?= isset($row['O_VAR_100']) ? $row['O_VAR_100'] : 'N/A' ?></span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="zc-auto zc-md zc-sm-12">
            <div class="ifb ifb-card breeding-trait zedge">
              <span class="z-text">Zedge</span>
              <div class="breeding-z-vl"><?= isset($row['Real_Zedge']) ? number_format($row['Real_Zedge'],2) : 'N/A'  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tl_ba_tab-2 tl-tab-content">
      <div class="dummy-content ifb">
        Second Tab Content
      </div>
    </div>
    <div class="tl_ba_tab-3 tl-tab-content">
      <div class="dummy-content ifb">
        Third Tab Content
      </div>
    </div>
  </div>
</div>