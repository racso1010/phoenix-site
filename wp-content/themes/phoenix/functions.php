<?php
function enqueue_styles_child_theme() {

	$parent_style = 'wp-bootstrap-starter-style';
	$child_style  = 'phoenix-style';

	wp_enqueue_style( $parent_style,
				get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( $child_style,
				get_stylesheet_directory_uri() . '/style.css',
				array( $parent_style ),
				wp_get_theme()->get('Version')
				);
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_child_theme' );


function custom_enqueue_styles() {

	//Styles
    wp_enqueue_style( 'custom-style', 
    get_stylesheet_directory_uri() . '/css/custom-style.css', 
    array(), 
    wp_get_theme()->get('Version')
);

	//Scripts
	if(is_front_page()) {
		wp_enqueue_script('parallax', get_stylesheet_directory_uri() . '/js/parallax.js', [], 1.0, true);
		wp_enqueue_script('animation-frame', get_stylesheet_directory_uri() . '/js/requestAnimationFrame.js', [], 1.0, true);
		wp_enqueue_script('jq-parallax', get_stylesheet_directory_uri() . '/js/jquery.parallax.js', [], 1.0, true);
	}

	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', [], 1.0, true);
	wp_register_script('custom_script', get_stylesheet_directory_uri(). '/js/price-woocommerce.js', array(), '1', true );
  wp_enqueue_script('custom_script');
}

add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles');


/**
 * Remove default widgets footer
 * Then add new widget footer
 */
remove_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );
function wp_bootstrap_starter_new_widget() {    
register_sidebar( array(
	'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
	'id'            => 'footer-1',
	'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );
register_sidebar( array(
	'name'          => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
	'id'            => 'footer-2',
	'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );
register_sidebar( array(
	'name'          => esc_html__( 'Footer 3', 'wp-bootstrap-starter' ),
	'id'            => 'footer-3',
	'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );
register_sidebar( array(
    'name'          => esc_html__( 'Footer 4', 'wp-bootstrap-starter' ),
    'id'            => 'footer-4',
    'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );

}
add_action( 'widgets_init', 'wp_bootstrap_starter_new_widget' );


/**
 * Shortcode Parallax HomePage
 */
function parallax_homepage($atts) {
			$atts = shortcode_atts(
				array(
						'title' => '',            
				), $atts);
	
    ob_start(); ?>
    
    <ul id="scene" class="scene" style="position:relative;">
        <li class="layer galaxy" data-depth="0.00"></li>
        <li class="layer bokeh" id="b2" data-depth="0.05"><img src="http://phoenix.local/wp-content/uploads/2020/09/bokeh2.png" alt=""></li> 
        <li class="layer bokeh1" id="b1" data-depth="0.03"><img src="http://phoenix.local/wp-content/uploads/2020/09/bokeh1.png" alt=""></li>
        <li class="layer molecules" data-depth="0.10"><img src="http://phoenix.local/wp-content/uploads/2020/09/molecule_back.png" alt=""></li>
        <li class="layer molecules" id="m2" data-depth="0.10"><img src="http://phoenix.local/wp-content/uploads/2020/09/molecule_front.png" alt=""></li>
        <li class="layer bird" data-depth="0.6"><img src="http://phoenix.local/wp-content/uploads/2020/09/bird.png" alt=""></li>
        <li class="layer phoenix" data-depth="0.1"><img src="http://phoenix.local/wp-content/uploads/2020/09/Logotype.png" alt=""></li>
        <li class="layer ashes" data-depth="0.1"><h1><?php echo $atts['title'] ?></h1></li>
        <li class="clouds" data-depth="0.0"><img src="http://phoenix.local/wp-content/uploads/2020/09/clouds.png" alt=""></li>
		</ul>
		
		<?php return ob_get_clean();
}
add_shortcode('parallax_home', 'parallax_homepage');

/**
 * Woocommerce - change price position
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

/**
 * Toggle Bar Shortcode
 */
function toogle_access($atts, $content = null) {

	$atts = shortcode_atts(
		array(
				'title' => '',   
				'code' => '0'          
	), $atts);
	$code = rand(1000, 9999);
	ob_start();
	?>

	<div class="accordion" id="accordionExample">
		<div class="card">
			<div class="card-header" id="headingThree">
				<h2 class="mb-0 pb-0">
					<button class="btn btn-link collapsed toggle-button" type="button" data-toggle="collapse" data-target="#ph-<?=$code?>" aria-expanded="false" aria-controls="ph-<?=$code?>">
						<?php echo $atts['title'] ?>
					</button>
				</h2>
			</div>
			<div id="ph-<?=$code?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				<div class="card-body">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('toggle_phoenix', 'toogle_access');

/**
 * Woocommerce separate Registration form
 */

add_shortcode( 'wc_reg_form_phoenix', 'phoenix_separate_registration_form' );
    
function phoenix_separate_registration_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   ob_start();
 
   // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
 
   do_action( 'woocommerce_before_customer_login_form' );
 
   ?>
      <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;</label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" placeholder="<?php _e( 'First name', 'woocommerce' ); ?>"/>
			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" placeholder="<?php _e( 'Last name', 'woocommerce' ); ?>"/>
			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_billing_address_1"><?php _e( 'Address', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" placeholder="<?php _e( 'Address', 'woocommerce' ); ?>"/>
			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_billing_state"><?php _e( 'State', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_state" id="reg_billing_state" value="<?php if ( ! empty( $_POST['billing_state'] ) ) esc_attr_e( $_POST['billing_state'] ); ?>" placeholder="<?php _e( 'State', 'woocommerce' ); ?>" />
			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;</label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="<?php _e( 'Email', 'woocommerce' ); ?>"/><?php // @codingStandardsIgnoreLine ?>
			</p>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
       <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
       <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" placeholder="<?php _e( '(###)###-#####', 'woocommerce' ); ?>"/>
			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
       <label for="reg_billing_company"><?php _e( 'Company Name', 'woocommerce' ); ?><small><?php _e(' (If Applicable)') ?></small></label>
       <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_company" id="reg_billing_company" value="<?php esc_attr_e( $_POST['billing_company'] ); ?>" placeholder="<?php _e( 'Company', 'woocommerce' ); ?>" />
			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
       <label for="reg_billing_reseller_lic"><?php _e( 'Reseller Licence', 'woocommerce' ); ?><small><?php _e(' (If Applicable)') ?></small></label>
       <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_reseller_lic" id="reg_billing_reseller_lic" value="<?php esc_attr_e( $_POST['billing_company'] ); ?>" placeholder="<?php _e( 'Reseller Licence', 'woocommerce' ); ?>"/>
			</p>
			
			
			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;</label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php _e( 'Password', 'woocommerce' ); ?>"/>
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Create', 'woocommerce' ); ?>"><?php esc_html_e( 'Create', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>
 
   <?php
     
   return ob_get_clean();
}

/**
 * Create User using Woocommerce Form
 */
/**
* Below code save extra fields.
*/
function wooc_save_extra_register_fields( $customer_id ) {
	if ( isset( $_POST['billing_phone'] ) ) {
		// Phone input filed which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
	}
	if ( isset( $_POST['billing_address_1'] ) ) {
		// Phone input filed which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
	}
	if ( isset( $_POST['billing_company'] ) ) {
		// Phone input filed which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
	}
	if ( isset( $_POST['billing_reseller_lic'] ) ) {
		// Phone input filed which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_reseller_lic', sanitize_text_field( $_POST['billing_reseller_lic'] ) );
	}
	if ( isset( $_POST['billing_state'] ) ) {
		// Phone input filed which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_state', sanitize_text_field( $_POST['billing_state'] ) );
	}
	if ( isset( $_POST['billing_first_name'] ) ) {
		//First name field which is by default
		update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
		// First name field which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}
	if ( isset( $_POST['billing_last_name'] ) ) {
		// Last name field which is by default
		update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
		// Last name field which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

add_filter( 'woocommerce_default_address_fields', 'phoenix_dashboard_add_field' );
function phoenix_dashboard_add_field( $fields ) {
 
	$fields['billing_reseller_lic']   = array(
		'label'        => 'Reseller Licence',
		'required'     => true,
		'class'        => array( 'form-row-wide', 'my-custom-class' ),
		'priority'     => 20,
		'placeholder'  => 'Resellers Licence',
	);
 
	return $fields;
 
}
add_filter( 'woocommerce_customer_meta_fields', 'phoenix_admin_address_field' );
 
function phoenix_admin_address_field( $admin_fields ) {
 
	$admin_fields['billing']['fields']['billing_reseller_lic'] = array(
		'label' => 'Reseller Licence',
		'description' => 'User reseller licence',
	);
 
	// or $admin_fields['shipping']['fields']['shipping_fav_color']
	// or both
 
	return $admin_fields;

}

// function woocommerce_edit_my_account_page() {
// 	return apply_filters( 'woocommerce_forms_field', array(
// 			'woocommerce_my_account_page' => array(
// 					'type'        => 'text',
// 					'label'       => __( 'Socail Media Profile Link', ' cloudways' ),
// 					'placeholder' => __( 'Profile Link', 'cloudways' ),
// 					'required'    => false,
// 			),
// 	) );
// }
// function edit_my_account_page_woocommerce() {
// 	$fields = woocommerce_edit_my_account_page();
// 	foreach ( $fields as $key => $field_args ) {
// 			woocommerce_form_field( $key, $field_args );
// 	}
// }
// add_action( 'woocommerce_register_form', 'edit_my_account_page_woocommerce', 15 );




// Woocommerce - Show all products in one page

/**
 * Change number of products that are displayed per page (shop page)
 */

function new_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options –> Reading
	// Return the number of products you wanna show per page.
	$cols = 30;
	return $cols;
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );