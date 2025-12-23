<main class='main'>
  <div class='container'>
    <div class='row'>
      <div id='site-content' class='col-12'>
        <div class='entry-content'>
          <!-- Bigquery content markup start here -->
          <section id='bigquery-wrapper' class='bigquery'>
            <div class="bigquery-breed-filters">
              <form class="zform filter-actions" action="javascript:void(0);" method="GET" id="BreedFilterForm">
                <?php
                  include dirname( __FILE__ ) . '/breed-filters.php';
              ?>
              </form>
            </div>
          </section>
<!-- Bigquery content markup ends here -->
        </div>
      </div>
    </div>
  </div>
</main>