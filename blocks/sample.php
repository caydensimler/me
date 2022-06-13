<?php
/**
 * Block template file: inc/blocks/sample.php
 *
 * Sample Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'sample-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block block-sample';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    
    <div class="grid-container display-grid columns-2 tablet-columns-2 mobile-columns-1">
        <div class="cell">
            <?php
            
            $image = (new Image(get_field( 'image' ), 'large'))
                ->format()
                ->wrap('div', 'center')
                ->display();

            ?>
        </div>

        <div class="cell"><?php

            // Sub-Heading
            $subHeading = (new Text(get_field('sub-heading'), 'h6', 'mb0 uppercase weight-700'))
                ->format()
                ->display();

            // Heading
            $heading = (new Text(get_field('heading_text-options')))
                ->format()
                ->wrap('section', 'text__wrapped')
                ->display();

            // Text
            $text = (new Text(get_field('text'), 'p', 'has-p-large-font-size'))
                ->format()
                ->display();

            // Link
            $link = (new Link(get_field('link_options')))
                ->format()
                ->display();

        ?></div>
    </div>
    
</div>