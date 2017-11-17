<!--
**** This will get tradeshow data.
**** Compare tradeshow start date with current date and display upcoming date.
-->

<div class="upcoming-tradeshows-snippet-container">
  <?php
    global $wpdb;
    $curDate = date('Ymd');
    $upcomingTradeShows = $wpdb->get_results("SELECT * FROM wp_tradeshow WHERE end_yyyymmdd >= $curDate ORDER BY start_yyyymmdd ASC;");
    // print_r($upcomingTradeShows);
    foreach ($upcomingTradeShows as $upcomingTradeshows2) {
      echo "<div class='tradeshow-container'>";
        echo "<div class='tradeshow-name'>";
          echo "<span class='tsn-title'>$upcomingTradeshows2->tradeshow_name</span>";
        echo "</div>";  // end tradeshow-name
        echo "<div class='tradeshow-time'>";
          echo "<span class='tsn-time'>";
            // echo gettype($upcomingTradeshows2->start_yyyymmdd);
            $startYear = substr($upcomingTradeshows2->start_yyyymmdd, 0, 4);
            $startMonth = substr($upcomingTradeshows2->start_yyyymmdd, 4, 2);
            $startMonthName = date('M', mktime(0,0,0, $startMonth));
            $startDay = substr($upcomingTradeshows2->start_yyyymmdd, 6, 2);
            // echo "$startYear / $startMonthName / $startDay";
            // echo "Start Date: ".substr($upcomingTradeshows2->start_yyyymmdd, 0, 4);
            $endYear = substr($upcomingTradeshows2->end_yyyymmdd, 0, 4);
            $endMonth = substr($upcomingTradeshows2->end_yyyymmdd, 4, 2);
            $endMonthName = date('M', mktime(0,0,0, $endMonth));
            $endDay = substr($upcomingTradeshows2->end_yyyymmdd, 6, 2);

            //This will assume that convention doesn't happen between year end and year start.
            if($startMonthName != $endMonthName) {
              echo "<span>$startMonthName $startDay - $endMonthName $endDay, $endYear</span>";
            } elseif ($startMonthName == $endMonthName) {
              echo "<span>$startMonthName $startDay - $endDay, $endYear</span>";
            }

          echo "</span>";
        echo "</div>";  // end tradeshow time
        echo "<div class='tsn-location'>";
          $showLocation = $upcomingTradeshows2->location_name;
          echo "<span>$showLocation</span>";
        echo "</div>";  // end tradeshow location
        echo "<div class='tsn-citystate'>";
          $showCity = $upcomingTradeshows2->city;
          $showState = $upcomingTradeshows2->state;
          echo "<span>$showCity, $showState</span>";
        echo "</div>";  // end tradeshow city and state
      echo "</div>";  // end tradeshow-container
    }
  ?>
</div>
