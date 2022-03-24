<?php

/* Template Name: Products Ajax */

$theme = '';
$product_cat = '';
$industry = '';

if (isset($_POST['post_themes'])){

    $theme = $_POST['post_themes'];

}

if (isset($_POST['post_categories'])){

    $product_cat = $_POST['post_categories'];

}

if (isset($_POST['post_industries'])){

    $industry = $_POST['post_industries'];

}

//echo 'theme:' . var_dump($theme);

$args = array(

    'post_type'       => 'product',
    'tax_query'       => array(
                          'relation' => 'OR',
                          array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $product_cat
                          ),
                          array(
                            'taxonomy' => 'theme',
                            'field'    => 'slug',
                            'terms'    => $theme
                          ),
                          array(
                            'taxonomy' => 'industry',
                            'field'    => 'slug',
                            'terms' => $industry
                          )
                        ),
    'posts_per_page'  => -1,      
    'post_status'     => 'publish'

  );

  //$theme = trim($theme);
  //$industry = trim($industry);
  //$product_cat = trim($product_cat);

  if (($product_cat == '') && ($theme == '') && ($industry == '')){

    $args = array(

      'post_type'       => 'product',    
      'posts_per_page'  => -1,      
      'post_status'     => 'publish'

    );

  }

  $query1 = new WP_Query($args);

  echo '<div id="loader_icon"><i class="fas fa-spinner fa-10x"></i></div>';

  echo "<div class='container-fluid' style='background-color:white;margin-bottom:20px;'>";
  echo "<div class='row' style='height:100%;padding-top:1px;padding-bottom:30px;'>";    
  

  $ctr = 0;

  while($query1->have_posts()){     

    if ($ctr >= 3) {

      $ctr = 0;

      echo '</div>';
      echo "<div class='row' style='height:100%;padding-top:10px;padding-bottom:30px;'>";   

    }

    $query1->the_post();

    global $post;

    $post_id = get_the_id();

    $title = get_the_title();

    $link = get_permalink($post_id);

    // $excerpt = get_the_excerpt();

    $excerpt = get_excerpt();

    $thumbnail = get_the_post_thumbnail_url();

    echo "<div class='col-md-4' style='padding:0px 10px 0px 10px;'>";   

      //$prod .= '<span class="hidden_excerpt" style="font-size:14pt;">' . $excerpt . '</span>';
    echo '<div class="image_cover" style="background-image:url(' . $thumbnail . ');background-size:cover;border-width:0px;text-align:left;height:350px;width:100%;vertical-align:bottom;padding:0px;">';

    echo "<div style='background-color:rgb(0, 184, 241, 0.5);color:white;padding:15px 10px 15px 10px;position:absolute;width:96%;bottom:0px;height:90px;vertical-align:bottom;overflow:hidden;margin:0px 10px 0px 0px;' class='home_prods'>";

    echo '<span style="font-size:14pt;font-weight:800;" class="prod_title">' . $title . '</span>';

    echo '<hr style="border-width:3px;width:40%;margin-left:0px;" class="prod_line"/>';

    echo '<span class="prod_excerpt" style="font-size:14pt;">' . $excerpt . '</span>';      


    echo "</div>";    

    echo "<a href='" . $link . "' class='prod_link' style='color:black;'>";     

    echo "<div class='cover' style='position:absolute;top:0;left:0;height:100%;width:100%;background-color:red;opacity:0;'></div>";

    echo "</a>";      
    echo "</div>";

    echo "</div>";

    $ctr = $ctr + 1;

   }
   
  echo '</div>';
  echo '</div>';

?>


