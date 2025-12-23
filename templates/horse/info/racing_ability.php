<!-- Racing Ability -->
<div class="tl tl-racing-ablity">
  <div class="tl-header">
    <h3 class="tl-header-title">Racing</h3>
  </div>

  <div class="tl-tabs-wrap">
    <ul class="tl-tabs">
      <li class="tl-tab current" data-tab="tl_rb_tab-1"><a>Ability</a></li>
      <li class="tl-tab" data-tab="tl_rb_tab-2"><a>Speeds</a></li>
      <li class="tl-tab empty" data-tab="tl_rb_tab-3"><a>Third Tab</a></li>
    </ul>

    <div class="tl_rb_tab-1 tl-tab-content current">
      <div class="tl-body">
        <div class="ifb chart chart-racing-ability">
          <div class="zr no-gutters">
            <?php $i = 10;
            while($i <= 26) { 
                getHorseAbility(intval($row['_'.$i.'BA']), $i,$row['distcount_'.$i * 100]);
                $i+=2;
            } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="tl_rb_tab-2 tl-tab-content">
      <div class="tl-body">
        <div class="ifb chart chart-ep">
        <?php $i = 10;
        while ($i <= 26) {
          $rcount = $i * 100;
          $race_count = $row['distcount_'.$i * 100];
          $e50 = $row['e50_' . $rcount . '_pc'];
          $e67 = $row['e67_' . $rcount . '_pc'];
          $e84 = $row['e84_' . $rcount . '_pc'];
          $arnumbers = array('e50'=>$e50,'e67'=>$e67,'e84'=>$e84);
          arsort($arnumbers);
          $numbers = array($e50,$e67,$e84);
          rsort($numbers);
          //print_r($numbers);
          $n1 =  number_format($numbers[0]-$numbers[1],1);
          $n2 =  number_format($numbers[0]-$numbers[2],1);
          $max_value = max(abs($n1),abs($n2));       

        
          
           
            if(count(array_filter($numbers)) == count($numbers)) {
            $e84 = number_format($e84, 1);
            $e67 = number_format($e67, 1);
            $e50 = number_format($e50, 1);  ?>
              <div class="chart-ep-rc  chart-ep-<?php echo $rcount; ?>">
            <div class="chart-ep-h">
              <h4 class="chart-ep-h-t">
                <?php echo $rcount; ?> <span class="rc">(<?php if($race_count){ echo $race_count; }else{
                  echo '0'; 
                } ?>)</span></h4>
            </div>
            <div class="chart-ep-body chart-ep-g">
              <div class="chart-ep-g-in">
                <ul class="chart-ep-g-l">
                  <li class="e84">
                    <span class="pt">84%</span>
                  </li>
                  <li class="e67">
                    <span class="pt">67%</span>
                  </li>
                  <li class="e50">
                    <span class="pt">50%</span>
                  </li>
                </ul>
                <div class="chart-ep-g-s">
                  <div class="chart-ep-g-s-bars">
                    <?php
                    if($max_value < 9){
                      $startnum =  intval($numbers[2] - 1);
                      $endnum = $startnum + 5;
                         if (nBetween($numbers[0], $endnum, $startnum) && nBetween($numbers[1], $endnum, $startnum) && nBetween($numbers[2], $endnum, $startnum)) {
                               $increment =  0.5;
                          }else{
                            $increment = 1;
                           $endnum = $startnum + 10;
                          }
                        }else{
                          $startnum = 5;
                          $endnum = 100;
                          $increment = 5;
                        }  
             
                       if(!empty($e84)){  ?>
                    <div class="chart-ep-g-s-bar e84">
                      <div class="ptv <?php chart_status("e84",$arnumbers); ?>" style="width:<?php echo width_count($e84,$startnum, $endnum, $increment); ?>">
                        <span class="ptv-d"><?php echo $e84; ?></span>
                      </div>
                    </div>
                    <?php }
                    if(!empty($e67)){ ?>
                    <div class="chart-ep-g-s-bar e67">
                      <div class="ptv <?php chart_status("e67",$arnumbers); ?>" style="width:<?php echo width_count($e67,$startnum, $endnum, $increment); ?>">
                        <span class="ptv-d"><?php echo $e67; ?></span>
                      </div>
                    </div>
                    <?php }
                    if(!empty($e50)){ ?>
                    <div class="chart-ep-g-s-bar e50">
                      <div class="ptv <?php chart_status("e50",$arnumbers); ?>" style="width:<?php echo width_count($e50,$startnum, $endnum, $increment); ?>">
                        <span class="ptv-d"><?php echo $e50; ?></span>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="chart-ep-g-s-meter">
                    <div class="zr no-gutters">
                    <?php 
                      for($startnum;$startnum <= $endnum;$startnum += $increment) {  ?>
                      <div class="zc">
                        <div class="chart-ep-g-s-v">
                          <span>
                          <?php if (is_decimal($startnum) ||  $increment == 5 || $startnum==0) {
                               echo $startnum;
                              }else{
                                echo $startnum.".0"; 
                           } ?>
                          </span>
                        </div>
                      </div>
                      <?php }
                     ?>
                    </div>
                  </div>
                </div>
           </div>
            </div> 
            </div>
          <?php
          } else { ?>
          <div class="chart-ep-rc  chart-ep-empty chart-ep-<?php echo $rcount; ?>">
            <div class="chart-ep-h">
            <h4 class="chart-ep-h-t">
                <?php echo $rcount; ?> <span class="rc">(<?php if($race_count){ echo $race_count; }else{
                  echo '0'; 
                } ?>)</span></h4>
            </div>
            <div class="chart-ep-body chart-ep-g">
            <div class="chart-ep-g-in">
                 <div class="nrf">No Records Found.</div>
                <ul class="chart-ep-g-l">
                  <li class="e84">
                    <span class="pt">84%</span>
                  </li>
                  <li class="e67">
                    <span class="pt">67%</span>
                  </li>
                  <li class="e50">
                    <span class="pt">50%</span>
                  </li>
                </ul>
                <div class="chart-ep-g-s">
                  <div class="chart-ep-g-s-bars">
                    <div class="chart-ep-g-s-bar e84">
                      <div class="ptv ptv-low" style="width:30.3%">
                        <span class="ptv-d">30.3</span>
                      </div>
                    </div>
                    <div class="chart-ep-g-s-bar e67">
                      <div class="ptv ptv-mid" style="width:60%">
                        <span class="ptv-d">60</span>
                      </div>
                    </div>
                    <div class="chart-ep-g-s-bar e50">
                      <div class="ptv ptv-high" style="width:90.8%">
                        <span class="ptv-d">90.8</span>
                      </div>
                    </div>
                  </div>
                  <div class="chart-ep-g-s-meter">
                    <div class="zr no-gutters">                 
                      <?php
                      $startnum = 0;
                      $endnum = 100;
                        for ($startnum; $startnum <= $endnum; $startnum+=5) { ?>
                        <div class="zc">
                        <div class="chart-ep-g-s-v">
                          <span><?php echo $startnum; ?></span>
                        </div>
                        </div>
                       <?php } ?>
                    </div>
                  </div>
                </div>
           </div>
            </div> 
            </div>
          <?php } ?>
         
     <?php
          $i += 2;
         }  ?>
         
        </div>
      </div>
    </div>
    <div class="tl_rb_tab-3 tl-tab-content">
      <div class="dummy-content ifb">
        Third Tab Content
      </div>
    </div>
  </div>
</div>
<!-- Race Count -->
<?php
/*
$nrumarray = array(95.0,95.5,96.0,96.5,97.0,97.5,98.0,98.5,99.0,99.5,100.0,100.5);
$search = 99.8;
$eval2 = 99.8;
$closest = null;
  foreach ($nrumarray as $item) {
    echo "search ".$search." closet ".$closest;
  echo "<br/>";
  echo "item ".$item ." closet ".$search;
  echo "<br/>";
     if ($closest === null || abs($search - $closest) > abs($item - $search)) {
        $closest = $item;
     }
  }
  echo "closet ".$closest; */ ?>
