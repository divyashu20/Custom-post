function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Doctors', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Doctor', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Doctors', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Doctor', 'twentythirteen' ),
        'all_items'           => __( 'All Doctors', 'twentythirteen' ),
        'view_item'           => __( 'View Doctor', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Doctor', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Doctor', 'twentythirteen' ),
        'update_item'         => __( 'Update Doctor', 'twentythirteen' ),
        'search_items'        => __( 'Search Doctor', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Doctors', 'twentythirteen' ),
        'description'         => __( 'Doctor news and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    register_post_type( 'doctors', $args );
 
}
add_action( 'init', 'custom_post_type', 0 );
			
			// Meta-Box

function add_your_fields_meta_box() {
    	add_meta_box(
    		'your_fields_meta_box', // $id
    		'Your Fields', // $title
    		'show_your_fields_meta_box', // $callback
    		'doctors', // $screen
    		'normal', // $context
    		'high' // $priority
    	);
    }
    add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
    function show_your_fields_meta_box() 
    {
    	global $post;
    		$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>


    	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
		<p>
	    	<label for="your_fields[text]">First Name</label>
	    	<br>
	    	<input type="text" name="your_fields[first_name]" id="your_fields[text]" class="regular-text" value="<?php echo esc_attr( get_post_meta( get_the_ID(),'first_name',true) ); ?>">

    	</p>

    	<p>
	    	<label for="your_fields[text]">Last Name</label>
	    	<br>
	    	<input type="text" name="your_fields[last_name]" id="your_fields[text]" class="regular-text" value="<?php echo esc_attr( get_post_meta( get_the_ID(),'last_name',true) ); ?>">
    	</p>

		<p>
			<label for="your_fields[textarea]">Address</label>
			<br>
			<textarea id="your_fields[address]" class="large-text" cols="20" rows="1" name="your_fields[address]" onclick="this.focus();this.select()"><?php echo esc_attr( get_post_meta( get_the_ID(),'address',true) ); ?></textarea>
		</p>

		<p>
	    	<label for="your_fields[text]">Email</label>
	    	<br>
	    	<input type="text" name="your_fields[Email]" id="your_fields[text]" class="regular-text" value="<?php echo esc_attr( get_post_meta( get_the_ID(),'first_name',true) ); ?>">
    	</p>

		<p>
	    	<label for="your_fields[checkbox]">Available +24
	    	<input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if ( is_array( $options ) && $options['chec_checkbox_field_0'] == '1' ) {echo 'Checked';} else {echo 'Unchecked';} ?>>
	    	</label>
    	</p>

    	<p>
	    	<label for="your_fields[select]">Specialities</label>
	    	<br>
	    	<select name="your_fields[select]" id="your_fields[select]">
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>Allergy & Immunology</option>
	    			<option value="option-two" <?php selected( $get_post_meta['select'], 'option-two' );?>>Anaesthesiology</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Bariatric Surgery</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Neurology</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Neurosurgery</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Nutrition And Dietics</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Opthalmology</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Orthopaedics</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Pathology</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Physiotherapy</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Psychiatry</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Radiology</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Transplant</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>> Trauma</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Dental Surgery	</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>>Endocrinology</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-three' );?>> Cardiology</option>

	    	</select>
    	</p>

    	<p>
	    	<label for="your_fields[select]">Gender</label>
	    	<br>
			<input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="female") echo "checked";?>
			value="female">Female
			<input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="male") echo "checked";?>
			value="male">Male
			<input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="other") echo "checked";?>
			value="other">Other
	    </p>			

	    <p>
	    	<label for="your_fields[select]">Qualifications</label>
	    	<br>
	    	<select name="your_fields[select]" id="your_fields[Qualifications]">
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>MBBS</option>
	    			<option value="option-two" <?php selected( $get_post_meta['select'], 'option-two' );?>>M.D.</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>M.S.</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>D.N.B</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>D.M</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>M.Ch.</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>Diploma</option>
	    			<option value="option-one" <?php selected( $get_post_meta['select'], 'option-one' );?>>MDS</option>

	    	</select>
	    </p>

    	<p>
	    	<label for="your_fields[image]">Image Upload</label><br>
	    	<input type="text" name="your_fields[image]" id="your_fields[image_upload]" class="meta-image regular-text" value="<?php echo $get_post_meta['image']; ?>">
	    	<input type="button" class="button image-upload" value="Browse">
	    </p>
	    <div class="image-preview"><img src="<?php echo $get_post_meta['image']; ?>" style="max-width: 250px;"></div>

	    	<?php }
    	function your_fields_show_box() 
    	{
		global $meta_box, $post;
		// Use nonce for verification
		echo '<input type="hidden" name="your_meta_box_nonce" value="';
		echo wp_create_nonce(basename(__FILE__)), '" />';
		echo '<table class="form-table">';
		foreach ($meta_box['fields'] as $field) 
			{
			// get current post meta data
			$meta = get_post_meta($post->ID, $field['id'], true);
			echo '<tr><th style="width:20%"><label for="' . $field['id'] . '">';
			echo $field['first_name'];
			echo '</label></th><td>';
			switch ($field['type']) 
				{
				  case 'text':
				    echo '<input type="text" name="' . $field['id'] . '"';
				    echo ' id="' .$field['id'] . '"';
				    echo ' value="' . ( $meta ? $meta : $field['last_name'] ) . '"';
				    echo ' size="30" style="width:97%" />';
				    echo '<br />' . $field['desc'];
				    break;
				}
			echo '<td></tr>';
			}
		echo '</table>';
		}

		add_action('save_post', 'your_fields_save_data');

    	function save_your_fields_meta( $post_id ) 
    	{
    	// verify nonce
	    	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) 
	    	{
	    		return $post_id;
	    	}
	    	// check autosave
	    	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	    	{
	    		return $post_id;
	    	}
	    	 
	    	 
	    		if ( !current_user_can( 'edit_page', $post_id ) ) 
	    		{
	    			return $post_id;
	    		} elseif ( !current_user_can( 'edit_post', $post_id ) ) 
	    		{
	    			return $post_id;
	    		}
	    	 

	    	$old = get_post_meta( $post_id, 'your_fields', true );
	    	$new = $_POST['your_fields'];

	    	if ( $new && $new !== $old ) 
	    	{
	    		update_post_meta( $post_id, 'your_fields', $new );
	    	} elseif ( '' === $new && $old ) 
	    	{
	    		delete_post_meta( $post_id, 'your_fields', $old );
	    	}
    	}
    add_action( 'save_post', 'save_your_fields_meta' );


