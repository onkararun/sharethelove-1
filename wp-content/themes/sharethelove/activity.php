 <?php
/*
Template Name: Project Listing

*/
get_header(); ?>
<div class="secondary-menu">
<?php
if (is_user_logged_in()) {
print(' <div class="secondary-menu-logo">
    <ul>
    <li><a href="');echo home_url(); print('/?page_id=35"><img src="');echo home_url(); print('/wp-content/uploads/2016/04/1-e1459847100362.png"></a></li>
    <li><a href="');echo home_url(); print('/?page_id=286"><img src="');echo home_url(); print('/wp-content/uploads/2016/04/2-e1459847082992.png"></a></li>
    <li><a href="');echo home_url(); print('/?page_id=24"><img src="');echo home_url(); print('/wp-content/uploads/2016/04/3-e1459847059371.png"></a></li>
    <li><a href="');echo home_url(); print('/?page_id=104"><img src="');echo home_url(); print('/wp-content/uploads/2016/04/4-e1459846938556.png"></a></li>
	</ul>
	</div>'); }
?>
</div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php 
            //get your custom posts ids as an array
			$posts = get_posts(array(
			    'post_type'   => 'projects',
			    'post_status' => 'publish',
			    'posts_per_page' => -1,
			    'fields' => 'ids'
			    )
			);
			//loop over each post
			foreach($posts as $p){
			    //get the meta you need from each post
			    $pro_h_img = get_the_post_thumbnail($p);
			    $post_title = get_the_title($p);
			    $role_title = get_post_meta($p,"role-title",true);
			    $pro_vac = get_post_meta($p,"project-vacancies",true);
			    $post_by = get_post_field( 'post_author', $p );
			    $pro_loc = get_post_meta($p,"project-location",true);
			    $pro_s_date = get_post_meta($p,"project-from-date",true);
			    $pro_e_date = get_post_meta($p,"project-to-date",true);
			    $pro_tags = get_post_meta($p,"project-tags",true);
			    $pro_img1 = get_post_meta($p,"project-image-1",true);
			    $pro_img2 = get_post_meta($p,"project-image-2",true);
			    $pro_img3 = get_post_meta($p,"project-image-3",true);
			    $pro_img4 = get_post_meta($p,"project-image-4",true);
			    $pro_img5 = get_post_meta($p,"project-image-5",true);
			    $pro_des = get_post_meta($p,"project-description",true);
			    $pro_rol = get_post_meta($p,"role-description",true);
			    $pro_fac = get_post_meta($p,"project-facilities",false);
			    $pro_email = get_post_meta($p,"project-email",true);
			    $pro_phone = get_post_meta($p,"project-phone",true);
			    $pro_mobile = get_post_meta($p,"project-mobile",true);
	    		$user_info = get_userdata($post_by);
				$project = " ";
				$project .= "<div class='activity-main'>";
				$project .= "<div class='header_image'>" . $pro_h_img . "</div>";
				$project .= "<div class='activity-desc'>";
				$project .= "<p>". $post_title .  "</p>";
				$project .= "<p>Role Title: ". $role_title .  "</p>";
				$project .= "<p>Vacancies: ". $pro_vac .  "</p>";
				$project .= "<p>Posted By: " . $user_info->user_login . "</p>";
				$project .= "<p>Location: " . $pro_loc . "</p>";
				$project .= "<p>Start Date: " . $pro_s_date . "</p>";
				$project .= "<p> Ends On: " . $pro_e_date . "</p>";
				$project .= "<p>". $pro_tags .  "</p>";
				$project .= "</div>";
				$project .= "<div class='project-img'>";
				$project .= "<a href='".$pro_img1."'rel='lightbox[".$p."]'><img src=" . $pro_img1 . "></a>";
				$project .= "<a href='".$pro_img2."'rel='lightbox[".$p."]'><img src=" . $pro_img2 . "></a>";
				$project .= "<a href='".$pro_img3."'rel='lightbox[".$p."]'><img src=" . $pro_img3 . "></a>";
				$project .= "<a href='".$pro_img4."'rel='lightbox[".$p."]'><img src=" . $pro_img4 . "></a>";
				$project .= "<a href='".$pro_img5."'rel='lightbox[".$p."]'><img src=" . $pro_img5 . "></a>";
				$project .= "</div>";
				$project .= "<div class='toggle-container'>";
				$project .= "<div class='description'>";
				$project .= "<h3>Project Description </h3>";
				$project .= "<p>". $pro_des .  "</p>";
				$project .= "</div>";
				$project .= "<div class='role-description'>";
				$project .= "<h3>Role Description </h3>";
				$project .= "<p>". $pro_rol .  "</p>";
				$project .= "</div>";
				$project .= "<div class='facilities'>";
				$project .= "<h3>Facilities:</h3>";
				$project .= "<p>" . implode($pro_fac,', ') . "</p>";
				$project .= "</div>";
				$project .= "<div class='contact-details'>";
				$project .= "<h3>Contact Details</h3>";
				$project .= "<p> ". $pro_email .  "</p>";
				$project .= "<p>" . $pro_phone . "</p>";
				$project .= "<p>" . $pro_mobile . "</p>";
				$project .= "</div>";
				$project .= "</div>";
				$project .= "<a class='moreshow'><span>Know More</span></a>";
				$project .= "</div>";
				//echo $project;
				echo $project;	
			}
				?>
	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<?php get_footer(); ?>