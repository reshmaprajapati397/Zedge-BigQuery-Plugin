<div class="bottom-filters" id="ExpandedFilters">
  <div class="bottom-filters-content">

    <div class="filter-group-section">
      <div class="filter-header">
        <div class="zr align-items-center">
          <div class="zc">
            <h5 class="filter-header-title">Horse</h5>
          </div>
        </div>
      </div>
      <div class="filter-content-area">
        <div class="zr">
          <div class="zc-4 zc-sm-12">
            <div class="zff-group range">
              <label>ID#</label>
              <input type="number" name="fromHId" id="FromHId" class="zff if" placeholder="<?= $minMax['minid'] ?>"
                value="" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHId" id="ToHId" class="zff if" placeholder="<?= $minMax['maxid'] ?>" value=""
                step="any" />
            </div>
          </div>
          <div class="zc-4 zc-sm-12">
          </div>
          <div class="zc-4 zc-sm-12">
            <div class="zff-group range">
              <label>Z#</label>
              <input type="number" name="fromHZ" id="FromHZ" class="zff if" placeholder="<?= $minMax['minz'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHZ" id="ToHZ" class="zff if" placeholder="<?= $minMax['maxz'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-4 zc-sm-12">
            <div class="zff-group range">
              <label>Bloodline</label>
              <?php if(count($bloodLines)==1){ ?>
              <select class="zff select-multiple keep" id="FilterHBloodline" name="filterHBloodline[]" multiple="multiple"
                 style="pointer-events:none;">
                 <?php } else { ?>
                  <select class="zff select-multiple" id="FilterHBloodline" name="filterHBloodline[]" multiple="multiple">
                <?php
              }
                foreach ($bloodLines as $bloodLine) { 
                  if(count($bloodLines)==1){ ?>
                <option value="<?= $bloodLine ?>" selected><?= $bloodLine ?></option>
                <?php }else{               ?>
                <option value="<?= $bloodLine ?>"><?= $bloodLine ?></option>
                <?php }
                } ?>
              </select>
            </div>
          </div>
          <div class="zc-4 zc-sm-12">
            <div class="zff-group range">
              <label>Breed</label>
              <select class="zff select-multiple" id="FilterHBreed" name="filterHBreed[]" multiple="multiple">
                <option value="genesis">genesis</option>
                <option value="legendary">legendary</option>
                <option value="exclusive">exclusive</option>
                <option value="elite">elite</option>
                <option value="cross">cross</option>
                <option value="pacer">pacer</option>
              </select>
            </div>
          </div>

          <div class="zc-4 zc-sm-12">
            <div class="zff-group range">
              <label>Sex (Type)</label>
              <select class="zff select-multiple" id="FilterHType" name="filterHType[]" multiple="multiple">
                <option value="Stallion">Stallion</option>
                <option value="Colt">Colt</option>
                <option value="Mare">Mare</option>
                <option value="Filly">Filly</option>
              </select>
            </div>
          </div>
        </div>
        <div class="zr">
          <div class="zc-6">
            <div class="zff-group range">
              <label>Level</label>
              <input type="number" name="fromHLevel" id="FromHLevel" class="zff if" placeholder="<?= $minMax['minstartingClassLevel'] ?>" step="any">
              <span class="it">to</span>
              <input type="number" name="toHLevel" id="ToHLevel" class="zff if" placeholder="<?= $minMax['maxstartingClassLevel'] ?>" step="any">
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Evo</label>
              <input type="number" name="fromHEvo" id="FromHEvo" class="zff if" placeholder="<?= $minMax['minevo'] ?>" step="any">
              <span class="it">to</span>
              <input type="number" name="toHEvo" id="ToHEvo" class="zff if" placeholder="<?= $minMax['maxevo'] ?>" step="any">
            </div>
          </div>

          <div class="zc-6">
            <div class="zff-group range">
              <label>Race Count</label>
              <input type="number" name="fromHRaceCount" id="FromHRaceCount" class="zff if" placeholder="0"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHRaceCount" id="ToHRaceCount" class="zff if"
                placeholder="<?= $minMax['maxrc'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>eBA</label>
              <input type="number" name="fromHeBA" id="FromHeBA" class="zff if" placeholder="<?= $minMax['mineba'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHeBA" id="ToHeBA" class="zff if" placeholder="<?= $minMax['maxeba'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>BA</label>
              <input type="c" name="fromHBA" id="FromHBA" class="zff if" placeholder="<?= $minMax['minba'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHBA" id="ToHBA" class="zff if" placeholder="<?= $minMax['maxba'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>wBA</label>
              <input type="number" name="fromHwBA" id="FromHwBA" class="zff if" placeholder="<?= $minMax['minwba'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHwBA" id="ToHwBA" class="zff if" placeholder="<?= $minMax['maxwba'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>DP</label>
              <input type="number" name="fromHDP" id="FromHDP" class="zff if" placeholder="<?= $minMax['mindp'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHDP" id="ToHDP" class="zff if" placeholder="<?= $minMax['maxdp'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>wDP</label>
              <input type="number" name="fromHwDP" id="FromHwDP" class="zff if" placeholder="<?= $minMax['minwdp'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHwDP" id="ToHwDP" class="zff if" placeholder="<?= $minMax['maxwdp'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>VAR</label>
              <input type="number" name="fromHVAR" id="FromHVAR" class="zff if" placeholder="<?= $minMax['minwvar'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toHVAR" id="ToHVAR" class="zff if" placeholder="<?= $minMax['maxvar'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>wVAR</label>
              <input type="number" name="fromHwVAR" id="FromHwVAR" class="zff if"
                placeholder="<?= $minMax['minwvar'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHwVAR" id="ToHwVAR" class="zff if" placeholder="<?= $minMax['maxwvar'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Sale Price</label>
              <input type="number" name="fromHSalePrice" id="FromHSalePrice" class="zff if-plus"
                placeholder="<?= $minMax['minsaleprice'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHSalePrice" id="ToHSalePrice" class="zff if-plus"
                placeholder="<?= $minMax['maxsaleprice'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Stud Price</label>
              <input type="number" name="fromHStudPrice" id="FromHStudPrice" class="zff if-plus"
                placeholder="<?= $minMax['minstudprice'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHStudPrice" id="ToHStudPrice" class="zff if-plus"
                placeholder="<?= $minMax['maxstudprice'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Ave MoV</label>
              <input type="number" name="fromHaMoV" id="FromHaMoV" class="zff if"
                placeholder="<?= $minMax['minmovav'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHaMoV" id="ToHaMoV" class="zff if" placeholder="<?= $minMax['maxmovav'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Max MoV</label>
              <input type="number" name="fromHmaxMov" id="FromHmaxMov" class="zff if"
                placeholder="<?= $minMax['minmovmax'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHmaxMov" id="ToHmaxMov" class="zff if"
                placeholder="<?= $minMax['maxmovmax'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Wins</label>
              <input type="number" name="fromHWins" id="FromHWins" class="zff if"
                placeholder="<?= $minMax['minwins'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHWins" id="ToHWins" class="zff if" placeholder="<?= $minMax['maxwins'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Win%</label>
              <input type="number" name="fromHWinPercentage" id="FromHWinPercentage" class="zff if"
                placeholder="<?= $minMax['minwinpc'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toHWinPercentage" id="ToHWinPercentage" class="zff if"
                placeholder="<?= $minMax['maxwinpc'] ?>" step="any" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="filter-group-section">
      <div class="filter-header">
        <div class="zr align-items-center">
          <div class="zc">
            <h5 class="filter-header-title">Parents</h5>
          </div>
        </div>
      </div>
      <div class="filter-content-area">
        <div class="zr">
          <div class="zc-6 zc-md-12 zc-sm-12">
            <div class="filter-subheader">
              <h6 class="parent"><span class="parent-type sire"><i class="fa-solid fa-mars-stroke-up"></i>
                  Sire</span>
              </h6>
            </div>
            <!-- <div class="zff-group range">
              <label>ID#</label>
              <input type="number" name="PSID" id="FromPSID" class="zff if-plus" placeholder="<?= $minMax['maxfid'] ?>"
                step="any" />
            </div> -->
            <div class="zff-group range">
              <label>Z# (Genotype)</label>
              <input type="number" name="fromPSZ" id="FromPSZ" class="zff if"
                placeholder="<?= $minMax['minfgenotype'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toPSZ" id="ToPSZ" class="zff if" placeholder="<?= $minMax['maxfgenotype'] ?>"
                step="any" />
            </div>

            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>Bloodline</label>
                  <select class="zff select-multiple" id="FilterPSBloodline" name="filterPSBloodline[]"
                    multiple="multiple">
                    <?php 
                foreach ($bloodLines as $bloodLine) { 
                  if(count($bloodLines)==1){ ?>
                    <option value="<?= $bloodLine ?>"><?= $bloodLine ?></option>
                    <?php }else{               ?>
                    <option value="<?= $bloodLine ?>"><?= $bloodLine ?></option>
                    <?php }
                } ?>
                  </select>
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>Breed</label>
                  <select class="zff select-multiple" id="FilterPSBreed" name="filterPSBreed[]" multiple="multiple">
                    <option value="genesis">genesis</option>
                    <option value="legendary">legendary</option>
                    <option value="exclusive">exclusive</option>
                    <option value="elite">elite</option>
                    <option value="cross">cross</option>
                    <option value="pacer">pacer</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>BA</label>
                  <input type="number" name="fromPSBA" id="FromPSBA" class="zff if"
                    placeholder="<?= $minMax['minfba'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPSBA" id="ToPSBA" class="zff if" placeholder="<?= $minMax['maxfba'] ?>"
                    step="any" />
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>wBA</label>
                  <input type="number" name="fromPSwBA" id="FromPSwBA" class="zff if"
                    placeholder="<?= $minMax['minfwba'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPSwBA" id="ToPSwBA" class="zff if"
                    placeholder="<?= $minMax['maxfwba'] ?>" step="any" />
                </div>
              </div>
            </div>

            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>DP</label>
                  <input type="number" name="fromPSDP" id="FromPSDP" class="zff if"
                    placeholder="<?= $minMax['minfdp'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPSDP" id="ToPSDP" class="zff if" placeholder="<?= $minMax['maxfdp'] ?>"
                    step="any" />
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>wDP</label>
                  <input type="number" name="fromPSwDP" id="FromPSwDP" class="zff if"
                    placeholder="<?= $minMax['minfwdp'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPSwDP" id="ToPSwDP" class="zff if"
                    placeholder="<?= $minMax['maxfwdp'] ?>" step="any" />
                </div>
              </div>
            </div>

            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>VAR</label>
                  <input type="number" name="fromPSVAR" id="FromPSVAR" class="zff if"
                    placeholder="<?= $minMax['minfvar'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPSVAR" id="ToPSVAR" class="zff if"
                    placeholder="<?= $minMax['maxfvar'] ?>" step="any" />
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>wVAR</label>
                  <input type="number" name="fromPSwVAR" id="FromPSwVAR" class="zff if"
                    placeholder="<?= $minMax['minfwvar'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPSwVAR" id="ToPSwVAR" class="zff if"
                    placeholder="<?= $minMax['maxfwvar'] ?>" step="any" />
                </div>
              </div>
            </div>


          </div>
          <div class="zc-6 zc-md-12 zc-sm-12">
            <div class="filter-subheader">
              <h6 class="parent"><span class="parent-type dam"><i class="fa-solid fa-mars-stroke-up"></i> Dam</span>
              </h6>
            </div>
            <!-- <div class="zff-group range">
              <label>ID#</label>
              <input type="number" name="PDID" id="FromPDID" class="zff if-plus" placeholder="<?= $minMax['maxmid'] ?>"
                step="any" />
            </div> -->
            <div class="zff-group range">
              <label>Z# (Genotype)</label>
              <input type="number" name="fromPDZ" id="FromPDZ" class="zff if"
                placeholder="<?= $minMax['minmgenotype'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toPDZ" id="ToPDZ" class="zff if" placeholder="<?= $minMax['maxmgenotype'] ?>"
                step="any" />
            </div>
            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>Bloodline</label>
                  <select class="zff select-multiple" id="FilterPDBloodline" name="filterPDBloodline[]"
                    multiple="multiple">
                    <?php 
                foreach ($bloodLines as $bloodLine) { 
                  if(count($bloodLines)==1){ ?>
                    <option value="<?= $bloodLine ?>"><?= $bloodLine ?></option>
                    <?php }else{               ?>
                    <option value="<?= $bloodLine ?>"><?= $bloodLine ?></option>
                    <?php }
                } ?>
                  </select>
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>Breed</label>
                  <select class="zff select-multiple" id="FilterPDBreed" name="filterPDBreed[]" multiple="multiple">
                    <option value="genesis">genesis</option>
                    <option value="legendary">legendary</option>
                    <option value="exclusive">exclusive</option>
                    <option value="elite">elite</option>
                    <option value="cross">cross</option>
                    <option value="pacer">pacer</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>BA</label>
                  <input type="number" name="fromPDBA" id="FromPDBA" class="zff if"
                    placeholder="<?= $minMax['minmba'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPDBA" id="ToPDBA" class="zff if" placeholder="<?= $minMax['maxmba'] ?>"
                    step="any" />
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>wBA</label>
                  <input type="number" name="fromPDwBA" id="FromPDwBA" class="zff if"
                    placeholder="<?= $minMax['minmwba'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPDwBA" id="ToPDwBA" class="zff if"
                    placeholder="<?= $minMax['maxmwba'] ?>" step="any" />
                </div>
              </div>
            </div>

            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>DP</label>
                  <input type="number" name="fromPDDP" id="FromPDDP" class="zff if"
                    placeholder="<?= $minMax['minmdp'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPDDP" id="ToPDDP" class="zff if" placeholder="<?= $minMax['maxmdp'] ?>"
                    step="any" />
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>wDP</label>
                  <input type="number" name="fromPDwDP" id="FromPDwDP" class="zff if"
                    placeholder="<?= $minMax['minmwdp'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPDwDP" id="ToPDwDP" class="zff if"
                    placeholder="<?= $minMax['maxmwdp'] ?>" step="any" />
                </div>
              </div>
            </div>

            <div class="zr">
              <div class="zc">
                <div class="zff-group range">
                  <label>VAR</label>
                  <input type="number" name="fromPDVAR" id="FromPDVAR" class="zff if"
                    placeholder="<?= $minMax['minmvar'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPDVAR" id="ToPDVAR" class="zff if"
                    placeholder="<?= $minMax['maxmvar'] ?>" step="any" />
                </div>
              </div>
              <div class="zc">
                <div class="zff-group range">
                  <label>wVAR</label>
                  <input type="number" name="fromPDwVAR" id="FromPDwVAR" class="zff if"
                    placeholder="<?= $minMax['minmwvar'] ?>" step="any" />
                  <span class="it">to</span>
                  <input type="number" name="toPDwVAR" id="ToPDwVAR" class="zff if"
                    placeholder="<?= $minMax['maxmwvar'] ?>" step="any" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="filter-group-section">
      <div class="filter-header">
        <div class="zr align-items-center">
          <div class="zc">
            <h5 class="filter-header-title">Breeding Ability</h5>
          </div>
        </div>
      </div>
      <div class="filter-content-area">
        <div class="zr mb-2">
          <div class="zc-6">
            <div class="zff-group range">
              <label>O zBA</label>
              <input type="number" name="fromBAOzBA" id="FromBAOzBA" class="zff if"
                placeholder="<?= number_format($minMax['minozba'],2) ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOzBA" id="ToBAOzBA" class="zff if"
                placeholder="<?= number_format($minMax['maxozba'],2) ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>#OS BA</label>
              <input type="number" name="fromBAOSBA" id="FromBAOSBA" class="zff if"
                placeholder="<?= $minMax['minoffba'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOSBA" id="ToBAOSBA" class="zff if" placeholder="<?= $minMax['maxoffba'] ?>"
                step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>O eBA</label>
              <input type="number" name="fromBAOeBA" id="FromBAOeBA" class="zff if"
                placeholder="<?= $minMax['minoeba100'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOeBA" id="ToBAOeBA" class="zff if"
                placeholder="<?= $minMax['maxoeba100'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>O BA</label>
              <input type="number" name="fromBAOBA" id="FromBAOBA" class="zff if"
                placeholder="<?= $minMax['minoba100'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOBA" id="ToBAOBA" class="zff if" placeholder="<?= $minMax['maxoba100'] ?>"
                step="any" />
            </div>
          </div>
        </div>

        <div class="zr mb-2">
          <div class="zc-6">
            <div class="zff-group range">
              <label>O zDP</label>
              <input type="number" name="fromBAOzDP" id="FromBAOzDP" class="zff if"
                placeholder="<?= number_format($minMax['minozdp'],2) ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOzDP" id="ToBAOzDP" class="zff if"
                placeholder="<?= number_format($minMax['maxozdp'],2) ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>#OS DP</label>
              <input type="number" name="fromBAOSDP" id="FromBAOSDP" class="zff if"
                placeholder="<?= $minMax['minodp100'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOSDP" id="ToBAOSDP" class="zff if"
                placeholder="<?= $minMax['maxodp100'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>O eDP</label>
              <input type="number" name="fromBAOeDP" id="FromBAOeDP" class="zff if"
                placeholder="<?= $minMax['minoedp100'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOeDP" id="ToBAOeDP" class="zff if"
                placeholder="<?= $minMax['minoedp100'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>O DP</label>
              <input type="number" name="fromBAODP" id="FromBAODP" class="zff if"
                placeholder="<?= $minMax['minodp100'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAODP" id="ToBAODP" class="zff if" placeholder="<?= $minMax['maxodp100'] ?>"
                step="any" />
            </div>
          </div>
        </div>

        <div class="zr mb-2">
          <div class="zc-6">
            <div class="zff-group range">
              <label>O zVAR</label>
              <input type="number" name="fromBAOzVAR" id="FromBAOzVAR" class="zff if"
                placeholder="<?= number_format($minMax['minozvar'],2) ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOzVAR" id="ToBAOzVAR" class="zff if"
                placeholder="<?= number_format($minMax['maxozvar'],2) ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>#OS VAR</label>
              <input type="number" name="fromBAOSVAR" id="FromBAOSVAR" class="zff if"
                placeholder="<?= $minMax['minoffvar'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOSVAR" id="ToBAOSVAR" class="zff if"
                placeholder="<?= $minMax['maxoffvar'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>O eVAR</label>
              <input type="number" name="fromBAOeVAR" id="FromBAOeVAR" class="zff if"
                placeholder="<?= $minMax['minoevar100'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOeVAR" id="ToBAOeVAR" class="zff if"
                placeholder="<?= $minMax['maxoevar100'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>O VAR</label>
              <input type="number" name="fromBAOVAR" id="FromBAOVAR" class="zff if"
                placeholder="<?= $minMax['minovar100'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAOVAR" id="ToBAOVAR" class="zff if"
                placeholder="<?= $minMax['maxovar100'] ?>" step="any" />
            </div>
          </div>
        </div>

        <div class="zr  mb-2">
          <div class="zc-6">
            <div class="zff-group range">
              <label>wZedge</label>
              <input type="number" name="fromBAwZedge" id="FromBAwZedge" class="zff if"
                placeholder="<?= $minMax['minwzedge'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAwZedge" id="ToBAwZedge" class="zff if"
                placeholder="<?= $minMax['maxwzedge'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Zedge</label>
              <input type="number" name="fromBAZedge" id="FromBAZedge" class="zff if"
                placeholder="<?= number_format($minMax['minrealzedge'],2) ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toBAZedge" id="ToBAZedge" class="zff if"
                placeholder="<?= number_format($minMax['maxrealzedge'],2) ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>Total OS</label>
              <input type="number" name="fromTotalOS" id="FromTotalOS" class="zff if"
                placeholder="<?= $minMax['mintotalos'] ?>" step="any" />
              <span class="it">to</span>
              <input type="number" name="toTotalOS" id="ToTotalOS" class="zff if"
                placeholder="<?= $minMax['maxtotalos'] ?>" step="any" />
            </div>
          </div>
          <div class="zc-6">
            <div class="zff-group range">
              <label>2.0 OS</label>
              <input type="number" name="fromOSV2" id="FromOSV2" class="zff if" placeholder="<?= $minMax['minosv2'] ?>"
                step="any" />
              <span class="it">to</span>
              <input type="number" name="toOSV2" id="ToOSV2" class="zff if" placeholder="<?= $minMax['maxosv2'] ?>"
                step="any" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>