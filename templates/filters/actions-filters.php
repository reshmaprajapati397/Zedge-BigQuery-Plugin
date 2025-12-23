<div class="bigquery-filters-actions">
  <div class="zr justify-content-between">
    <div class="zc-auto">
      <button class="zbtn zbtn-primary icon-mt" id="ZFilters">Advance Filters
        <i class="fa-solid fa-caret-down"></i></button>
    </div>
    <div class="zc-4 zc-md-6 zc-sm-12">
      <div class="zff-group">
        <div class="zr align-items-center">
          <div class="zc-auto">
            <label>Sort By:</label>
          </div>
          <div class="zc zc-md-12 zc-sm-12">
            <select class="zff" id="zSortBy" value="" name="zsort_by">
              <option value="" selected="">--Select--</option>
              <option value="li.ListPrice|desc">Sale Price (high to low)</option>
              <option value="li.ListPrice|asc">Sale Price (low to high)</option>
              <option value="st.mating_price|desc">Stud Fee (high to low)</option>
              <option value="st.mating_price|asc">Stud Fee (low to high)</option>
              <option value="v3.Z|desc">Genotype (Z#) (high to low)</option>
              <option value="v3.Z|asc">Genotype (Z#) (low to high)</option>
            
              <option value="v3.startingClassLevel|desc">S Level (high to low)</option>
              <option value=" v3.evo|desc">Evo (high to low)</option>

              <option value="v3.logic_BA_100|desc">BA (high to low)</option>
              <option value="v3.logic_DP_100|desc">DP (high to low)</option>
              <option value="v3.logic_DP_100|asc">DP (low to high)</option>
              <option value="v3.logic_VAR_100|desc">VAR (high to low)</option>

              <option value="v3.SA|desc">sAB (high to low)</option>
              <option value="v3.LA|desc">IAB (high to low)</option>

              <option value="v3.MoVav|desc">Ave Mov (high to low)</option>
              <option value="v3.MoVmax|desc">Max MoV (high to low)</option>
              <option value="v3.O_zBA|desc">O zBA (high to low)</option>
              <option value="v3.O_eBA_100|desc">O eBA (high to low)</option>
              <option value="v3.O_BA_100|desc">O BA (high to low)</option>
              <option value="v3.O_zDP|desc">O zDP (high to low)</option>
              <option value="v3.O_zDP|asc">O zDP (low to high)</option>
              <option value="v3.O_eDP_100|desc">O eDP (high to low)</option>
              <option value="v3.O_eDP_100|asc">O eDP (low to high)</option>
              <option value="v3.O_DP_100|desc">O DP (high to low)</option>
              <option value="v3.O_DP_100|asc">O DP (low to high)</option>
              <option value="v3.O_zVAR|desc">O zVAR (high to low)</option>
              <option value="v3.O_eVAR_100|desc">O eVAR (high to low)</option>
              <option value="v3.O_VAR_100|desc">O VAR (high to low)</option>
              <option value="v3.Real_Zedge|desc">Zedge (high to low)</option> 
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="zc-auto text-right">
      <button type="button" class="zbtn zbtn-default resetFormBtn">Clear Values</button>
      <button type="button" class="zbtn zbtn-primary btnApplyFilter">Apply</button>
    </div>
  </div>
</div>