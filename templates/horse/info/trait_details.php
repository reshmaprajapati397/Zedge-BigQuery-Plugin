<!-- Horse Details -->
<div class="tl tl-details">
  <div class="tl-header">
    <h3 class="tl-header-title">Trait:</h3>
  </div>

  <div class="tl-tabs-wrap">
    <ul class="tl-tabs">
      <li class="tl-tab current" data-tab="tl_details_tab-1"><a>Details</a></li>
      <li class="tl-tab empty" data-tab="tl_details_tab-2"><a>Second Tab</a></li>
      <li class="tl-tab empty" data-tab="tl_details_tab-3"><a>Third Tab</a></li>
    </ul>

    <div class="tl_details_tab-1 tl-tab-content current">
      <div class="tl-body">
        <div class="zr">
          <div class="zc zc-4 zc-sm-12">
            <div class="ifb ifb-card">
              <div class="ifb-header">
                <h5 class="ifb-header-title">Base Ability (BA)</h5>
                <div class="ifb-header-sub">
                  <div class="zr">
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <div class="ifb-lbl">wBA: </div>
                        <div class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['wBA']) ?>">
                          <?= isset($row['wBA']) ? $row['wBA'] : 'N/A' ?></div>
                      </div>
                    </div>
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <div class="ifb-lbl">Score: </div>
                        <div class="ifb-vl">
                          <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['logic_BA_100']) ?>">
                            <?= isset($row['logic_BA_100']) ? $row['logic_BA_100'] : 'N/A' ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ifb-body ifb-box-content">
                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">16#: </div>
                      <div class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['distcount_1600']) ?>">
                        <?= isset($row['distcount_1600']) ? $row['distcount_1600'] : 'N/A' ?></div>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">16BA: </div>
                      <div class="ifb-vl">
                        <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['_16BA']) ?>">
                          <?= isset($row['_16BA']) ? $row['_16BA'] : 'N/A' ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">1418#: </div>
                      <div class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['_1418_low_count']) ?>">
                        <?= isset($row['_1418_low_count']) ? $row['_1418_low_count'] : 'N/A' ?>
                      </div>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">1418BA: </div>
                      <div class="ifb-vl">
                        <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['_1418AB_100']) ?>">
                          <?= isset($row['_1418AB_100']) ? $row['_1418AB_100'] : 'N/A' ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">1026#: </div>
                      <div class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['DPBA_low_count']) ?>">
                        <?= isset($row['DPBA_low_count']) ? $row['DPBA_low_count'] : 'N/A' ?></div>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">DPBA: </div>
                      <div class="ifb-vl">
                        <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['DPBA_100']) ?>">
                          <?= isset($row['DPBA_100']) ? $row['DPBA_100'] : 'N/A' ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="zc zc-4 zc-sm-12">
            <div class="ifb ifb-card">
              <div class="ifb-header">
                <h5 class="ifb-header-title">Distance Preference (DP)</h5>
                <div class="ifb-header-sub">
                  <div class="zr">
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <div class="ifb-lbl">wDP: </div>
                        <div class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['wDP']) ?>">
                          <?= isset($row['wDP']) ? $row['wDP'] : 'N/A' ?></div>
                      </div>
                    </div>
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <div class="ifb-lbl">Score: </div>
                        <div class="ifb-vl">
                          <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['logic_DP_100']) ?>">
                            <?= isset($row['logic_DP_100']) ? $row['logic_DP_100'] : 'N/A' ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ifb-body ifb-box-content">
                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">Short#: </div>
                      <div class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['u1400_count']) ?>">
                        <?= isset($row['u1400_count']) ? $row['u1400_count'] : 'N/A' ?></div>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">sAB: </div>
                      <div class="ifb-vl">
                        <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['SA']) ?>">
                          <?= isset($row['SA']) ? $row['SA'] : 'N/A' ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">Long#: </div>
                      <div class="ifb-vl trait-badp-<?= getClosestDecimalTrait($row['o1800_count']) ?>">
                        <?= isset($row['o1800_count']) ? $row['o1800_count'] : 'N/A' ?></div>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">IAB: </div>
                      <div class="ifb-vl">
                        <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['LA']) ?>">
                          <?= isset($row['LA']) ? $row['LA'] : 'N/A' ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="zr">
                  <div class="zc">
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">fDP: </div>
                      <div class="ifb-vl">
                        <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['wF']) ?>">
                          <?= isset($row['wF']) ? intval($row['wF']) : 'N/A' ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="zc zc-4 zc-sm-12">
            <div class="ifb  ifb-card">
              <div class="ifb-header">
                <h5 class="ifb-header-title">Variance (VAR)</h5>
                <div class="ifb-header-sub">
                  <div class="zr">
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <div class="ifb-lbl">wVAR: </div>
                        <div class="ifb-vl trait-var-<?= getClosestDecimalTraitVar($row['wVAR']) ?>">
                          <?= isset($row['wVAR']) ? $row['wVAR'] : 'N/A' ?></div>
                      </div>
                    </div>
                    <div class="zc text-left">
                      <div class="ifb-stat">
                        <div class="ifb-lbl">Score: </div>
                        <div class="ifb-vl">
                          <span class="zbtn zbtn-mt vl hr-ba mt-vl-<?= getClosestDecimal($row['logic_VAR_100']) ?>">
                            <?= isset($row['logic_VAR_100']) ? $row['logic_VAR_100'] : 'N/A' ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ifb-body ifb-box-content">
                <div class="zr">
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">Wins: </div>
                      <div class="ifb-vl"><?= isset($row['Wins']) ? $row['Wins'] : 'N/A' ?></div>
                    </div>
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">Ave MoV:</div>
                      <div class="ifb-vl">
                        <?= isset($row['MoVav']) ? number_format($row['MoVav'], 2) : 'N/A' ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="zr">
                  <div class="zc">
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">Max MoV:</div>
                      <div class="ifb-vl">
                        <?= isset($row['MoVmax']) ? number_format($row['MoVmax'], 2) : 'N/A' ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="zr">
                  <div class="zc">
                  </div>
                  <div class="zc">
                    <div class="ifb-stat">
                      <div class="ifb-lbl">1/12%:</div>
                      <div class="ifb-vl"><?= isset($row['_1_12_pc']) ? intval($row['_1_12_pc']) : 'N/A' ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tl_details_tab-2 tl-tab-content">
      <div class="dummy-content ifb">
        Second Tab Content
      </div>
    </div>
    <div class="tl_details_tab-3 tl-tab-content">
      <div class="dummy-content ifb">
        Third Tab Content
      </div>
    </div>
  </div>
</div>