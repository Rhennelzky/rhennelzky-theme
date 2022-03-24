<?php /* Template Name: Search Page */ ?>

<!DOCTYPE html>
<html lang="en">

<?php 

get_header(); 

$id = get_the_id();
$post = get_post($id); 

create_sticky_menu( 'primary-menu' ); 
create_bootstrap_menu( 'primary-menu' );
breadcrumb();


$s = '';

if (isset($_POST['keyword'])){

    $s = $_POST['keyword'];

}



    $args = array(

      'post_type'       => array('package', 'product'),
      's'               => $s,
      'posts_per_page'  => -1,      
      'post_status'     => 'publish'

    );



  $query = new WP_Query($args);

  if ($s != ''){

    $count = $query->post_count;

    echo "<div class='container-fluid' style='background-color:white;margin-bottom:20px;' id='prods_body'>";
    echo "<div class='row'>";
    echo "<div class='col-md-12'>";
    if ($count > 1){
    
      echo "<h2>" . $count . " items found </h2>";
    
    } else {

      echo "<h2>" . $count . " item found </h2>";
        
    }

    echo "</div>";
    echo "</div>";
    echo "<div class='row' style='height:100%;padding-top:1px;padding-bottom:30px;'>";    
    

    $ctr = 0;

    while($query->have_posts()){     

      if ($ctr >= 3) {

        $ctr = 0;

        echo '</div>';
        echo "<div class='row' style='height:100%;padding-top:10px;padding-bottom:30px;'>";   

      }

      $query->the_post();

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

  } else {

    echo "<div class='container-fluid' style='background-color:white;margin-bottom:20px;text-align:center;padding-top:100px;padding-bottom:100px;'>";
    echo "<div class='row'>";
    echo "<div class='col-md-12'>";
    echo "<h2 style='font-size:35pt;'>Search no found</h2>";
    echo "<p>Try again later. Use other keywords.</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

  }


get_footer(); ?>

</body>
</html>
