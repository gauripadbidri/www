<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

add_filter( 'rwmb_meta_boxes', 'csp__register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function csp__register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'meta_';

	// 1st meta box : HOME
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'home',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Home Page related HEADER Fields', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array('page'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Image Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}ImageText",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Orange Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}OrangeText",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Green Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}GreenText",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Blue Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}BlueText",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			)
		)
	);

	// 2nd meta box : CLOUD
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'cloud',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Cloud Page related HEADER Fields', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array('page'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Image Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}CloudImageHeader",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Row 1 Col 1 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}Row1Col1Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Row 1 Col 2 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}Row1Col2Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Row 2 Col 1 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}Row2Col1Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Row 2 Col 2 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}Row2Col2Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			)
		)
	);
// 3rd meta box : RETAIL
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'retail',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Retail Page related HEADER Fields', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array('page'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Image Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}RetailImageHeader",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Left Panel Row 1 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}LeftRow1Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Left Panel Row 2 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}LeftRow2Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Left Panel Row 3 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}LeftRow3Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Right Panel Row 1 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}RightRow1Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
                                        array(
				// Field name - Will be used as label
				'name'  => __( 'Right Panel Row 2 Header Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}RightRow2Text",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			)
		)
	);

	return $meta_boxes;
}