<?php
/**
 * Class for adding Team Section Widget
 *
 * @package Acme Themes
 * @subpackage Travel Way
 * @since 1.0.0
 */
if ( ! class_exists( 'Travel_Way_Team' ) ) {

    class Travel_Way_Team extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'unique_id'             => '',
            'title'                 => '',
            'at_all_page_items'     => '',
            'content_from'          => 'excerpt',
            'content_number'        => -1,
            'column_number'         => 4,
            'background_options'    => 'gray'

        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'travel_way_team',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Team/Speakers Section', 'travel-way'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Team Section.', 'travel-way' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $unique_id              = esc_attr( $instance[ 'unique_id' ] );
            $title                  = esc_attr( $instance[ 'title' ] );
	        $at_all_page_items      = $instance['at_all_page_items'];
	        $content_from           = esc_attr( $instance['content_from'] );
	        $content_number         = intval( $instance['content_number'] );
	        $column_number          = absint( $instance[ 'column_number' ] );
	        $background_options     = esc_attr( $instance['background_options'] );

	        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'unique_id' ); ?>"><?php esc_html_e( 'Section ID', 'travel-way' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'unique_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_id' ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','travel-way')?></small>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'travel-way' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages', 'travel-way' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove. Please do not forget to add Featured Image and Excerpt on selected pages', 'travel-way' ); ?></small>
            <div class="at-repeater">
		        <?php
		        $total_repeater = 0;
		        if  (!empty( $at_all_page_items ) && is_array( $at_all_page_items ) && count( $at_all_page_items ) > 0 ){
			        foreach ($at_all_page_items as $about){
				        $repeater_id  = $this->get_field_id( 'at_all_page_items') .$total_repeater.'page_id';
				        $repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$total_repeater.']['.'page_id'.']';
				        ?>
                        <div class="repeater-table">
                            <div class="at-repeater-top">
                                <div class="at-repeater-title-action">
                                    <button type="button" class="at-repeater-action">
                                        <span class="at-toggle-indicator" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="at-repeater-title">
                                    <h3><?php esc_html_e( 'Select Item', 'travel-way' )?><span class="in-at-repeater-title"></span></h3>
                                </div>
                            </div>
                            <div class='at-repeater-inside hidden'>
						        <?php
						        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
						        $args = array(
							        'selected'              => $about['page_id'],
							        'name'                  => $repeater_name,
							        'id'                    => $repeater_id,
							        'class'                 => 'widefat at-select',
							        'show_option_none'      => esc_html__( 'Select Page', 'travel-way'),
							        'option_none_value'     => 0 // string
						        );
						        wp_dropdown_pages( $args );
						        ?>
                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','travel-way');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','travel-way');?></button>
	                                <?php
	                                if( get_edit_post_link( $about['page_id'] ) ){
		                                ?>
                                        <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $about['page_id'] ) ); ?>">
			                                <?php esc_html_e('Full Edit','travel-way');?>
                                        </a>
		                                <?php
	                                }
	                                ?>
                                </div>
                            </div>
                        </div>
				        <?php
				        $total_repeater = $total_repeater + 1;
			        }
		        }
		        $coder_repeater_depth = 'coderRepeaterDepth_'.'0';
		        $repeater_id  = $this->get_field_id( 'at_all_page_items') .$coder_repeater_depth.'page_id';
		        $repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';
		        ?>
                <script type="text/html" class="at-code-for-repeater">
                    <div class="repeater-table">
                        <div class="at-repeater-top">
                            <div class="at-repeater-title-action">
                                <button type="button" class="at-repeater-action">
                                    <span class="at-toggle-indicator" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="at-repeater-title">
                                <h3><?php esc_html_e( 'Select Item', 'travel-way' )?><span class="in-at-repeater-title"></span></h3>
                            </div>
                        </div>
                        <div class='at-repeater-inside hidden'>
					        <?php
					        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
					        $args = array(
						        'selected'              => '',
						        'name'                  => $repeater_name,
						        'id'                    => $repeater_id,
						        'class'                 => 'widefat at-select',
						        'show_option_none'      => esc_html__( 'Select Page', 'travel-way'),
						        'option_none_value'     => 0 // string
					        );
					        wp_dropdown_pages( $args );
					        ?>
                            <div class="at-repeater-control-actions">
                                <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','travel-way');?></button> |
                                <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','travel-way');?></button>
                            </div>
                        </div>
                    </div>

                </script>
		        <?php
		        /*most imp for repeater*/
		        echo '<input class="at-total-repeater" type="hidden" value="'.$total_repeater.'">';
		        $add_field = esc_html__('Add Item', 'travel-way');
		        echo '<span class="button-primary at-add-repeater" id="'.$coder_repeater_depth.'">'.$add_field.'</span><br/>';
		        ?>
            </div>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_from' ); ?>"><?php _e( 'Content From', 'travel-way' ); ?>:</label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'content_from' ); ?>" name="<?php echo $this->get_field_name( 'content_from' ); ?>">
			        <?php
			        $content_from_options = travel_way_content_from();
			        foreach ( $content_from_options as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $content_from ); ?>><?php echo esc_html( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_number' ); ?>"><?php _e( 'Number of words in content', 'travel-way' ); ?>:</label>
                <br/>
                <small>
			        <?php esc_html_e('Please enter -1 to show full content or 0 to show none','travel-way'); ?>
                </small>
                <input class="widefat" id="<?php echo $this->get_field_id( 'content_number' ); ?>" name="<?php echo $this->get_field_name( 'content_number' ); ?>" type="number" value="<?php echo $content_number; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'column_number' ); ?>"><?php esc_html_e( 'Column Number', 'travel-way' ); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'column_number' ); ?>" name="<?php echo $this->get_field_name( 'column_number' ); ?>" >
                    <?php
                    $travel_way_team_column_numbers = travel_way_widget_column_number();
                    foreach ( $travel_way_team_column_numbers as $key => $value ){
                        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_html( $value );?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'background_options' ); ?>"><?php esc_html_e( 'Background Options', 'travel-way' ); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'background_options' ); ?>" name="<?php echo $this->get_field_name( 'background_options' ); ?>">
			        <?php
			        $travel_way_background_options = travel_way_background_options();
			        foreach ( $travel_way_background_options as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $background_options ); ?>><?php echo esc_html( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'unique_id' ]    = sanitize_key( $new_instance[ 'unique_id' ] );
            $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );

	        /*updated code*/
	        $page_ids = array();
	        if( isset($new_instance['at_all_page_items'] )){
		        $at_all_page_items    = $new_instance['at_all_page_items'];
		        if  (!empty( $at_all_page_items ) && is_array( $at_all_page_items ) && count( $at_all_page_items ) > 0 ){
			        foreach ($at_all_page_items as $key=>$about ){
				        $page_ids[$key]['page_id'] = travel_way_sanitize_page( $about['page_id'] );
			        }
		        }
	        }
	        $instance['at_all_page_items']  = $page_ids;

	        $content_from   = travel_way_content_from();
	        $instance['content_from']           = travel_way_sanitize_choice_options( $new_instance['content_from'], $content_from, 'excerpt' );

	        $instance['content_number']     = intval( $new_instance['content_number'] );

	        $travel_way_widget_column_number    = travel_way_widget_column_number();
	        $instance[ 'column_number' ]            = travel_way_sanitize_choice_options( $new_instance[ 'column_number' ], $travel_way_widget_column_number, 4 );

	        $travel_way_widget_background_options    = travel_way_background_options();
	        $instance[ 'background_options' ]           = travel_way_sanitize_choice_options( $new_instance[ 'background_options' ], $travel_way_widget_background_options, 'default' );

	        return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults);

            /*default values*/
            $unique_id              = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
            $title                  = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
	        $at_all_page_items      = $instance['at_all_page_items'];
	        $content_from           = esc_attr( $instance['content_from'] );
	        $content_number         = intval( $instance['content_number'] );
            $column_number          = absint( $instance[ 'column_number' ] );
	        $background_options     = esc_attr( $instance['background_options'] );
	        $bg_gray_class          = $background_options == 'gray'?'at-gray-bg':'';

	        $div_attr = 'class="row featured-entries-col featured-entries-logo"';

            echo $args['before_widget'];

	        $animation = "init-animate zoomIn";
	        ?>
            <section id="<?php echo esc_attr( $unique_id );?>" class="at-widgets acme-teams <?php echo $bg_gray_class;?>">
                <div class="container">
	               <?php
	               if ( ! empty( $title ) ) {
		               echo "<div class='at-widget-title-wrapper'>";
		               echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		               echo "</div>";
	               }
	                ?>
                    <div <?php echo $div_attr;?>>
                        <?php
                        $post_in = array();
                        if  (!empty( $at_all_page_items ) && is_array( $at_all_page_items ) && count( $at_all_page_items ) > 0 ){
	                        foreach ( $at_all_page_items as $about ){
		                        if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
			                        $post_in[] = $about['page_id'];
		                        }
	                        }
                        }
                        if( !empty ( $post_in ) && is_array( $post_in ) ) :
	                        $travel_way_post_in_page_args = array(
		                        'post__in'         => $post_in,
		                        'orderby'             => 'post__in',
		                        'posts_per_page'      => count( $post_in ),
		                        'post_type'           => 'page',
		                        'no_found_rows'       => true,
		                        'post_status'         => 'publish'
	                        );
                            $team_query = new WP_Query( $travel_way_post_in_page_args );
                            /*The Loop*/
                            if ( $team_query->have_posts() ):
	                            $travel_way_featured_index = 1;
                                while( $team_query->have_posts() ):$team_query->the_post();
	                                $travel_way_list_classes = 'single-list ';
	                                if( 1 != $travel_way_featured_index && $travel_way_featured_index % $column_number == 1 ){
		                                echo "<div class='clearfix'></div>";
	                                }
	                                if ( 1 == $column_number ) {
		                                $travel_way_list_classes .= "col-sm-12";
	                                } elseif ( 2 == $column_number ) {
		                                $travel_way_list_classes .= "col-sm-6";
	                                } elseif ( 3 == $column_number ) {
		                                $travel_way_list_classes .= "col-sm-4 col-md-4";
	                                } else {
		                                $travel_way_list_classes .= "col-sm-3 col-md-3";
	                                }
	                                ?>
                                    <div class="<?php echo esc_attr( $travel_way_list_classes ); ?>">
                                        <div class="team-item <?php echo esc_attr( $animation );?>">
                                            <div class="team-author">
                                                <div class="team-img-box">
                                                    <?php
                                                    $team_no_img = '';
                                                    if( has_post_thumbnail( ) ){
	                                                    echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
	                                                    the_post_thumbnail('full');
	                                                    echo '</a>';
                                                    }
                                                    else{
                                                        $team_no_img = "team-no-img";
                                                    }
                                                ?>
                                                </div>
                                                <div class="team-author-details <?php echo $team_no_img; ?>">
                                                    <h3 class="team-name">
		                                                <?php
		                                                echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
		                                                the_title();
		                                                echo '</a>';
		                                                ?>
                                                    </h3>
                                                    <?php
                                                    if( 0 != $content_number ){
	                                                    ?>
                                                        <div class="team-details">
		                                                    <?php
		                                                    travel_way_advanced_content( $content_number, $content_from );
		                                                    ?>
                                                        </div>
	                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
	                                $travel_way_featured_index++;
                                endwhile;
                            endif;
	                        wp_reset_postdata();
                        endif;
                        ?>
                    </div><!--row-->
                </div>
            </section>
            <?php
            echo $args['after_widget'];
        }
    } // Class Travel_Way_Team ends here
}