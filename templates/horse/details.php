<div class="hr-inner d-none">
  <?php 
    include dirname( __FILE__ ) . '/info/trait_details.php';
    include dirname( __FILE__ ) . '/info/racing_ability.php';
    if($row['m_id'] != '' && $row['f_id'] != ''){
      include dirname( __FILE__ ) . '/info/parents.php';
    }
    
    include dirname( __FILE__ ) . '/info/breeding_ability.php';
    include dirname( __FILE__ ) . '/info/offspring.php';
    //include dirname( __FILE__ ) . '/horse_finishes_pattern.php';
  ?>

</div>