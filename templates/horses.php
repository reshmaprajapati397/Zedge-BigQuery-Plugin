<div class='bigquery-data hrs'>
  <div class='hrs-table <?= $page ?>'>
    <!-- Horse table head ( + ) -->
    <?php if($page == 1){ ?>
    <div class='hrs-table-head'>
      <div class='hr'>
        <?php include dirname(__FILE__) . '/table-headings.php'; ?>
      </div>
    </div>

    <?php } ?>
    <!-- Horse table head ( - ) -->
    <!-- Horse Loader ( + ) -->
    <div id="loading" class="zload" style="display: none;">
      <span class="zload-text">Loading Records...</span>
      <div class="zload-bar">Loading Records...</div>
    </div>
    <!-- Horse Loader ( - ) -->
    <!-- Horses ( + ) -->
    <div class='hrs-table-body'>
     
      <?php include dirname(__FILE__) . '/horse/index.php'; ?>
      
      <!-- Horses ( - ) -->
    </div>
  </div>
  <br />
  <div class="login-button-container text-center">
    <input type="hidden" name="totalPages" value="<?= ceil($totalPages) ?>" class="totalPages" />
    <button class="zbtn zbtn-primary loadMoreButton login-button">Load More</button>
    <div id="loadingLoadMore" class="zload" style="display: none;">
      <div class="zload-bar wp-dark-mode-ignore">Loading Records...</div>
    </div>
  </div>
</div>