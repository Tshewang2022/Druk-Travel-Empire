<?php
/**
 * Display default slider
 *
 * @since Travel Way 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('travel_way_default_slider') ) :
    function travel_way_default_slider(){
        $bg_image_style = '';
        if ( get_header_image() ) :
            $bg_image_style .= 'background-image:url(' . esc_url( get_header_image() ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        else:
            $bg_image_style .= 'background-image:url(' . esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        endif; // End header image check.

        $text_align = 'text-left';
        $animation1 = 'init-animate';
        $animation2 = 'init-animate';
        ?>
        <div class="image-slider-wrapper home-fullscreen ">
            <div class="featured-slider">
                <div class="item" style="<?php echo $bg_image_style; ?>">
                    <div class="slider-content <?php echo $text_align;?>">
                        <div class="container">
                            <div class="banner-title <?php echo $animation1;?>">
                                <?php esc_html_e('Create you own Travel Way','travel-way' );?>
                            </div>
                            <div class="image-slider-caption <?php echo $animation2;?>">
                                <p><?php esc_html_e('Lets fly all around the world','travel-way' );?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
endif;

function travel_way_slider_from_page(){
	global $travel_way_customizer_all_values;

	$travel_way_slides_data = json_decode( $travel_way_customizer_all_values['travel-way-slides-data'] );
	$travel_way_feature_slider_text_align = $travel_way_customizer_all_values['travel-way-feature-slider-text-align'];

	$travel_way_feature_slider_enable_animation = $travel_way_customizer_all_values['travel-way-feature-slider-enable-animation'];
	$travel_way_feature_slider_image_only = $travel_way_customizer_all_values['travel-way-feature-slider-display-title'];
	$travel_way_feature_slider_image_excerpt = $travel_way_customizer_all_values['travel-way-feature-slider-display-excerpt'];
	$travel_way_fs_image_display_options = $travel_way_customizer_all_values['travel-way-fs-image-display-options'];

	$post_in = array();
	$slides_other_data = array();
	if( is_array( $travel_way_slides_data ) ){
		foreach ( $travel_way_slides_data as $slides_data ){
			if( isset( $slides_data->selectpage ) && !empty( $slides_data->selectpage ) ){
				$post_in[] = $slides_data->selectpage;
				$slides_other_data[$slides_data->selectpage] = array(
					'button-1-text'  =>$slides_data->button_1_text,
					'button-1-link'  =>$slides_data->button_1_link,
					'button-2-text'  =>$slides_data->button_2_text,
					'button-2-link'  =>$slides_data->button_2_link
				);
			}
		}
	}

	if( !empty( $post_in ) && is_array( $post_in ) ) :
		$travel_way_child_page_args = array(
			'post__in'          => $post_in,
			'orderby'           => 'post__in',
			'posts_per_page'    => count( $post_in ),
			'post_type'         => 'page',
			'no_found_rows'     => true,
			'post_status'       => 'publish'
		);
		$slider_query = new WP_Query( $travel_way_child_page_args );
		/*The Loop*/
		if ( $slider_query->have_posts() ):
			?>
            <div class="image-slider-wrapper home-fullscreen <?php echo esc_attr( $travel_way_fs_image_display_options ); ?>">
                <div class="featured-slider">
					<?php
					$slider_index = 1;
					$text_align = '';
					$animation1 = '';
					$animation2 = '';
					$animation4 = '';

					$bg_image_style = '';
					if( 'alternate' != $travel_way_feature_slider_text_align ){
						$text_align = $travel_way_feature_slider_text_align;
					}
					if( 1 == $travel_way_feature_slider_enable_animation ){
						$animation1 = 'init-animate fadeInDown';
						$animation2 = 'init-animate fadeInDown';
						$animation4 = 'init-animate fadeInDown';
						$animation5 = 'init-animate fadeInDown';
					}
					while( $slider_query->have_posts() ):$slider_query->the_post();

						if( 'alternate' == $travel_way_feature_slider_text_align ){
							if( 1 == $slider_index ){
								$text_align = 'text-left';
							}
                            elseif ( 2 == $slider_index ){
								$text_align = 'text-center';
							}
							else{
								$text_align = 'text-right';
							}
						}
						if (has_post_thumbnail()) {
							$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						}
						else {
							$image_url[0] = get_template_directory_uri().'/assets/img/default-image.jpg';
						}
						if( 'full-screen-bg' == $travel_way_fs_image_display_options ){
							$bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
						}
						$slides_single_data = $slides_other_data[get_the_ID()];
						?>
                        <div class="item" style="<?php echo $bg_image_style; ?>">
							<?php
							if( 'responsive-img' == $travel_way_fs_image_display_options ){
								echo '<img src="'.esc_url( $image_url[0] ).'"/>';
							}
							?>
                            <div class="slider-content <?php echo esc_attr( $text_align );?>">
                                <div class="container">
									<?php
									if( 1 == $travel_way_feature_slider_image_only ){
										?>
                                        <div class="banner-title <?php echo esc_attr( $animation1 );?>"><?php the_title()?></div>
										<?php
									}
									if( 1 == $travel_way_feature_slider_image_excerpt ){
										?>
                                        <div class="image-slider-caption <?php echo esc_attr( $animation2 );?>">
											<?php the_excerpt(); ?>
                                        </div>
										<?php
									}
									if( !empty( $slides_single_data['button-1-text'] ) ){
										?>
                                        <a href="<?php echo esc_url( $slides_single_data['button-1-link'] )?>" class="<?php echo esc_attr( $animation4 );?> btn btn-primary btn-reverse outline-outward banner-btn">
											<?php echo esc_html( $slides_single_data['button-1-text'] ); ?>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
										<?php
									}
									if( !empty( $slides_single_data['button-2-text'] ) ){
										?>
                                        <a href="<?php echo esc_url( $slides_single_data['button-2-link'] )?>" class="<?php echo esc_attr( $animation5 );?> btn btn-primary outline-outward banner-btn">
											<?php echo esc_html( $slides_single_data['button-2-text'] ); ?>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
						<?php
						$slider_index ++;
						if( 3 < $slider_index ){
							$slider_index = 1;
						}
					endwhile;
					?>
                </div><!--acme slick carousel-->
            </div><!--.image slider wrapper-->
			<?php
			wp_reset_postdata();
		else:
			travel_way_default_slider();
		endif;
	else:
		travel_way_default_slider();
	endif;
}

/**
 * Featured Slider display
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'travel_way_feature_slider' ) ) :

    function travel_way_feature_slider( ){
	    travel_way_slider_from_page();
    }
endif;
add_action( 'travel_way_action_feature_slider', 'travel_way_feature_slider', 0 );