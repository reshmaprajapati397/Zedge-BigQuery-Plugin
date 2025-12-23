<div class="top-filters">
  <div class="zr">
    <div class="zc-12 text-center">
      <div class="zform-zbtn-group mb-2">
        <button class="zbtn zbtn-default zbtn-active zform-zbtn" data-value="all" id="ShowListingAll"
          name="showListingAll">All</button>
        <button class="zbtn zbtn-default zform-zbtn" data-value="sales" id="ShowListingSales"
          name="showListingSales">Sales</button>
        <button class="zbtn zbtn-default zform-zbtn" data-value="stud" id="ShowListingStud"
          name="showListingStud">Stud</button>
      </div>
      <input type="hidden" class="listingPrices" name="listingPrices" value="all">
    </div>
    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group zff-stb">
        <label>Stable Search</label>
        <div class="zff-stb-search">
          <input type="text" id="ZHStable" name="zHStable" placeholder="Enter name of Stable" class="zff keep">
          <div class="zff-stb-loader wp-dark-mode-ignore"></div>
          <div class="zff-stb-closer">✕</div>
          <div class="stableSuggestions zff-stb-content"></div>
          <input type="hidden" name="selectedStables" class="selectedStables keep" value="" />
        </div>
      </div>
    </div>
    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group">
        <label>Name Search</label>
        <input type="name" id="ZHName" name="zHName" placeholder="Enter Horse Name" class="zff">
      </div>
    </div>
    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group">
        <label>ID Search</label>
        <input type="text" id="ZHID" name="zHID" placeholder="497688" class="zff" step="1">
      </div>
    </div>

    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group range">
        <label>Sire ID#</label>
        <input type="number" name="PSID" id="FromPSID" class="zff" placeholder="<?= $minMax['maxfid'] ?>" step="any" />
      </div>
    </div>

    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group range">
        <label>Dam ID#</label>
        <input type="number" name="PDID" id="FromPDID" class="zff" placeholder="<?= $minMax['maxmid'] ?>" step="any" />
      </div>
    </div>

    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group">
        <div class="zr align-items-center">
          <div class="zc-12">
            <label>Breeding Change Horse?</label>
          </div>
          <div class="zc-12">
            <select class="zff" id="HBreedingChange" value="" name="hBreedingChange">
              <option value="" selected="">--Select--</option>
              <option value="1">V1.0</option>
              <option value="2">V2.0</option>
              <option value="3">V3.0</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group">
        <div class="zr align-items-center">
          <div class="zc-12">
            <label>Unraced Horse</label>
          </div>
          <div class="zc-12">
            <select class="zff" id="HUnracedChange" value="" name="hUnracedChange">
              <option value="" selected="">--Select--</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>