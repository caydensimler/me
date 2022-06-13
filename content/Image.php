<?php

class Image extends Content {

    // Image Attributes
    public $src;
    public $alt;
    public $title;

    public $height;
    public $width;
    public $loading;

    // Constructor used to set defaults for all Text attributes
    public function __construct($object = false, $size = null) {
        // construct the parent Class first to inherit default attribute values
        parent::__construct();

        $this->addClass('content__image');

        $this->type    = 'img';
        $this->loading = 'lazy';

        if ( $object ):
            if ( $size ):
                $this->src = $object['sizes'][$size];
            else: 
                $this->src   = $object['url'];
            endif;

            $this->alt   = $object['alt'];
            $this->title = $object['title'];
        endif; 
    }

    public function format() {
        // Rename $this variable to be more verbose
        $image = $this;

        // Image Source
        $source = 'src="' . $image->src . '"';
        $image->addAttribute($source);

        // Image Alt
        $alt = 'alt="' . $image->alt . '"';
        ($image->alt) ? $image->addAttribute($alt) : '';

        // Image Title
        $title = 'title="' . $image->title . '"';
        ($image->title) ? $image->addAttribute($title) : '';

        // Image Height
        $height = 'height="' . $image->height . '"';
        ($image->height) ? $image->addAttribute($height) : '';

        // Image Width
        $width = 'width="' . $image->width . '"';
        ($image->width) ? $image->addAttribute($width) : '';

        // Image Loading
        $loading = 'loading="' . $image->loading . '"';
        $image->addAttribute($loading);


        // Create Image content
        $content = '<' . $image->type . $image->attributes . ' />';


        // Checking for available image source.
        // If the source isn't found, an internal error message will be displayed on the front-end.
        if ( $image->src ):
            ob_start();
            
                // Display Image
                echo $content;
            
            $image->content = ob_get_clean();
            return $image;
        else:
            $image->debug();
            generateInternalError('The image can\'t be formatted because no source was found. The debug window has been displayed so you can track the current image attributes.');

            return $image;
        endif;
    }
}