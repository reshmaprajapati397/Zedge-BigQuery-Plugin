<?php
                  
                  foreach ($queryResults as $row) { 
                    $horse_url  = "https://www.hawku.com/horse/".$row['ID']."?ref=zedge";
                    $sale_price_url  = "https://www.hawku.com/horse/".$row['ID']."?ref=zedge";
                    $stud_price_url  = "https://zed.run/".$row['ID']."/select-mate"; ?>
                    <div class='hr'>
  <?php include dirname(__FILE__) . '/front.php'; ?>
  <?php //include dirname(__FILE__) . '/details.php'; ?>
</div>
<?php }
                  ?>