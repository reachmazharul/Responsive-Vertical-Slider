<?php

/**
* @package VerticalSlide
* 
*/

//RVS( Responsive Vertical Slider ) Shortcode 
function verticalSlide_scode( $atts ){
ob_start(); 

$args = array(
    'post_type'        => 'verticalSlide',
    'posts_per_page'   => 5,
    );    

$verticalSlide = new WP_Query( $args ); ?>

<?php if ( $verticalSlide->have_posts() ) : ?>
<div class="slider-container">
    <ul id="carousel">
	 
	<?php while ( $verticalSlide->have_posts() ) : $verticalSlide->the_post(); ?>	

        <li class="">
            <span><p><?php the_title(); ?></p></span>
        </li>

	<?php endwhile; ?>
    </ul>
</div>
	 
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

    
<?php
    return ob_get_clean();
}
add_shortcode( 'vertical_slide', 'verticalSlide_scode' );