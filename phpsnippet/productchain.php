<?php

  $qurl0 = $urlarr[0];
  $qurl1 = $urlarr[1];
  $qurl2 = $urlarr[2];
  $qurl3 = $urlarr[3];
  $qurl4 = $urlarr[4];

  $prodchains1 = $wpdb->get_results("SELECT DISTINCT m0desc,s1, s1desc from wp_prodlegend WHERE m0='$qurl0';");

  print_r($prodchains1);

 ?>
