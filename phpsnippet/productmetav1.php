<?php
//using m0meta, s1meta, s2meta, s3meta database.

// print_r($curLocationArr);

switch (@count($curLocationArr)) {

  case 2:
    //This is m0 page.
    // [products, m0]
    $metatitlem0 = $wpdb->get_results("SELECT * from wp_m0meta WHERE m0='$curLocationArr[1]';");
    echo "<title>".$metatitlem0[0]->m0metatitle." | Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitlem0[0]->m0metadesc,ENT_QUOTES)."'>";
    echo "<meta name='keywords' content='".htmlspecialchars($metatitlem0[0]->m0metakey,ENT_QUOTES)."'>";
  break;

  case 3:
    // This is s1 page. or item page that only have m0 as category.
    // [products, m0, s1-item]
    $metatitles1=$wpdb->get_results("SELECT * from wp_s1meta WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]';");
    if(!empty($metatitles1)) {
      // s1 category exist.
      echo "<title>".$metatitles1[0]->s1metatitle." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitles1[0]->s1metadesc,ENT_QUOTES)."'>";
      echo "<meta name='keywords' content='".htmlspecialchars($metatitles1[0]->s1metakey,ENT_QUOTES)."'>";
    }
    if(empty($metatitles1)) {
      // There s1 category is not found. Setup for item meta - using description from m0.
      $metatitlem0 = $wpdb->get_results("SELECT * from wp_m0meta WHERE m0='$curLocationArr[1]';");
      $metatitleitem = $wpdb->get_results("SELECT DISTINCT item,metakeyitem,metadescitem from wp_prod0 WHERE m0='$curLocationArr[1]' AND item0='$curLocationArr[2]';");
      if(empty($metatitleitem)) {
        $metatitleitem = $wpdb->get_results("SELECT DISTINCT item,metakeyitem,metadescitem from wp_prod0 WHERE item0='$curLocationArr[2]';");
      }
      if(!empty($metatitleitem)) {
        //setup for item meta.
        echo "<title>".$metatitlem0[0]->m0metatitle." | ".$metatitleitem[0]->item." | Cambridge Resources</title>";
        // $itemmetatemp = $metatitleitem[0]->metaitem;
        echo "<meta name='description' content='".htmlspecialchars($metatitleitem[0]->metadescitem,ENT_QUOTES)."'>";
        echo "<meta name='keywords' content='".htmlspecialchars($metatitleitem[0]->metakeyitem,ENT_QUOTES)."'>";
      } else {
        //item meta is empty. using meta from up one level.
        echo "<title>".$metatitlem0[0]->m0metatitle." | Cambridge Resources</title>";
        echo "<meta name='description' content='".htmlspecialchars($metatitlem0[0]->m0metadesc,ENT_QUOTES)."'>";
        echo "<meta name='keywords' content='".htmlspecialchars($metatitlem0[0]->m0metakey,ENT_QUOTES)."'>";
      }
    }
  break;

  case 4:
  // This is s2 page. or item page that only have s1 as category.
  // [products, m0, s1, s2-item]
  // print_r($curLocationArr);
  $metatitles2=$wpdb->get_results("SELECT * from wp_s2meta WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]' AND s2='$curLocationArr[3]';");
  // print_r($metatitles2);
  if(!empty($metatitles2)) {
    // s2 category exist.
    echo "<title>".$metatitles2[0]->s2metatitle." | Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitles2[0]->s2metadesc,ENT_QUOTES)."'>";
    echo "<meta name='keywords' content='".htmlspecialchars($metatitles2[0]->s2metakey,ENT_QUOTES)."'>";
  }
  if(empty($metatitles2)) {
    // There s2 category is not found. Setup for item meta - using description from s1.
    $metatitles1 = $wpdb->get_results("SELECT * from wp_s1meta WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]';");
    $metatitleitem = $wpdb->get_results("SELECT DISTINCT item,metakeyitem,metadescitem from wp_prod0 WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]' AND item0='$curLocationArr[3]';");
    if(empty($metatitleitem)) {
      //joint is m0;
      $metatitleitem = $wpdb->get_results("SELECT DISTINCT item,metakeyitem,metadescitem from wp_prod0 WHERE s1='$curLocationArr[2]' AND item0='$curLocationArr[3]';");
    }
    if(empty($metatitleitem)) {
      //joint is s1;
      $metatitleitem = $wpdb->get_results("SELECT DISTINCT item,metakeyitem,metadescitem from wp_prod0 WHERE item0='$curLocationArr[3]';");
    }
    if(!empty($metatitleitem)) {
      //setup for item meta.
      echo "<title>".$metatitles1[0]->s1metatitle." | ".$metatitleitem[0]->item." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleitem[0]->metadescitem,ENT_QUOTES)."'>";
      echo "<meta name='keywords' content='".htmlspecialchars($metatitleitem[0]->metakeyitem,ENT_QUOTES)."'>";
    } else {
      //item meta is empty. using meta from up one level.
      echo "<title>".$metatitles1[0]->s1metatitle." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitles1[0]->s1metadesc,ENT_QUOTES)."'>";
      echo "<meta name='keywords' content='".htmlspecialchars($metatitles1[0]->s1metakey,ENT_QUOTES)."'>";
    }
  }
  break;

  case 5:
  // This is s3 page. or item page that only have s2 as category.
  // [products, m0, s1, s2, s3-item]
  $metatitles3=$wpdb->get_results("SELECT * from wp_s3meta WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]' AND s2='$curLocationArr[3]' AND s3='$curLocationArr[4]';");
  // print_r($metatitles3);
  if(!empty($metatitles3)) {
    // s3 category exist.
    echo "<title>".$metatitles3[0]->s3metatitle." | Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitles3[0]->s3metadesc,ENT_QUOTES)."'>";
    echo "<meta name='keywords' content='".htmlspecialchars($metatitles3[0]->s3metakey,ENT_QUOTES)."'>";
  }
  if(empty($metatitles3)) {
    // There s3 category is not found. Setup for item meta - using description from s2.
    $metatitles2 = $wpdb->get_results("SELECT * from wp_s2meta WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]' AND s2='$curLocationArr[3]';");
    $metatitleitem = $wpdb->get_results("SELECT DISTINCT item,metakeyitem,metadescitem from wp_prod0 WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]' AND s2='$curLocationArr[3]' AND item0='$curLocationArr[4]';");
    // print_r($metatitles2);
    if(!empty($metatitleitem)) {
      //setup for item meta.
      echo "<title>".$metatitles2[0]->s2metatitle." | ".$metatitleitem[0]->item." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleitem[0]->metadescitem,ENT_QUOTES)."'>";
      echo "<meta name='keywords' content='".htmlspecialchars($metatitleitem[0]->metakeyitem,ENT_QUOTES)."'>";
    } else {
      //item meta is empty. using meta from up one level.
      echo "<title>".$metatitles2[0]->s2metatitle." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitles2[0]->s2metadesc,ENT_QUOTES)."'>";
      echo "<meta name='keywords' content='".htmlspecialchars($metatitles2[0]->s2metakey,ENT_QUOTES)."'>";
    }
  }
  break;

  case 6:
  // This is table/item page with s3 as bottom category.
  // [products, m0, s1, s2, s3, item]
  $metatitles3=$wpdb->get_results("SELECT * from wp_s3meta WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]' AND s2='$curLocationArr[3]' AND s3='$curLocationArr[4]';");
  $metatitleitem = $wpdb->get_results("SELECT DISTINCT item,metakeyitem,metadescitem from wp_prod0 WHERE m0='$curLocationArr[1]' AND s1='$curLocationArr[2]' AND s2='$curLocationArr[3]' AND s3='$curLocationArr[4]' AND item0='$curLocationArr[5]';");

  echo "<title>".$metatitles3[0]->s3metatitle." | ".$metatitleitem[0]->item." | Cambridge Resources</title>";
  echo "<meta name='description' content='".htmlspecialchars($metatitleitem[0]->metadescitem,ENT_QUOTES)."'>";
  echo "<meta name='keywords' content='".htmlspecialchars($metatitleitem[0]->metakeyitem,ENT_QUOTES)."'>";
  break;

  default:
    //this is product main page.
    // [products]
    $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='products';");
    echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
  break;
}

 ?>
