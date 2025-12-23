<div class="bigquery-filters">
  <form class="zform filter-actions" action="javascript:void(0);" method="GET" id="ZFilterForm">
    <?php
       include dirname( __FILE__ ) . '/top-filters.php';
       include dirname( __FILE__ ) . '/actions-filters.php';
       include dirname( __FILE__ ) . '/advance-filters.php';
  ?>
    <input type="hidden" name="orderBy" id="current_order_by" value="" />
    <input type="hidden" name="order" id="current_order" value="" />
    <input type="hidden" name="paged" id="paged" value="1" />
  </form>
</div>