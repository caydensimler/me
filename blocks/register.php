<?php

/**
 * Register new blocks.
 */


add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'sample',
            'title'             => __('Sample'),
            'description'       => __('A sample block used for testing.'),
            'render_template'   => '/blocks/sample.php',
            'icon' => array(
                'background' => '#000',
                'foreground' => '#fff',
                'src' => 'dismiss',
            ),
            'category'          => 'test',
            'supports'          => array(
                'anchor'        => true,
                'align'         => false,
            ),
        ));
    }
}