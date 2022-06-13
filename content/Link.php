<?php

class Link extends Content {

    // Link Attributes
    public $text;
    public $url;
    public $target;
    public $nofollow;
    public $noreferrer;
    public $title;

    public $defaultStyle;

    public $span;

    // Constructor used to set defaults for all Text attributes
    public function __construct($clone = false) {
        // construct the parent Class first to inherit default attribute values
        parent::__construct();

        $this->addClass('wp-block-button');
        $this->span   = true;

        $this->nofollow = false;
        $this->noreferrer = false;

        // this maps all the fields from the ACF Link clone into the Object
        // acf-json/group_622580ff56ea6.json
        if ( $clone ):
            if (isset($clone['link']['title'])):
                $this->text = $clone['link']['title'];
            endif;

            if (isset($clone['link']['url'])):
                $this->url = $clone['link']['url'];
            endif;

            if (isset($clone['link']['target'])):
                $this->target = $clone['link']['target'];
            endif;

            if (isset($clone['style'])):
                $this->addClass($clone['style']);
            endif;
        endif;
    }

    public function format() {
        // Rename $this variable to be more verbose
        $link = $this;

        // Link ID
        ($link->ID) ? $link->addAttribute($link->ID) : '';

        // Link Data
        ($link->data) ? $link->addAttribute($link->data) : '';

        // Link URL
        $href = 'href="' . $link->url . '"';
        $link->addAttribute($href);

        // Link Target
        ($link->target) ? $link->addAttribute('target="_blank"') : '';

        // Link nofollow
        ($link->nofollow) ? $link->addAttribute('nofollow') : '';

        // Link noreferrer
        ($link->nofollow) ? $link->addAttribute('noreferrer') : '';

        // Link Title
        $title = 'title="' . $link->title . '"';
        ($link->title) ? $link->addAttribute($title) : '';

        // Link Class
        $link->addAttribute('class="wp-block-button__link"');
        
        $contentOpen = '<a' . $link->attributes . '>';
        $contentClose = '</a>';

        
        // Checking for available link and link text. 
        // If either aren't found, an internal error message will be displayed on the front-end.
        if ( $link->url && $link->text ):
            ob_start(); 

            echo '<div class="wp-container-1 wp-block-buttons">';
                echo '<div ' . $link->class . $link->ID . '>';

                    echo $contentOpen;

                        if ($link->span):
                            echo '<span>';
                        endif;

                            echo $link->text;

                        if ($link->span):
                            echo '</span>';
                        endif;

                    echo $contentClose;

                echo '</div>';
            echo '</div>';

            $link->content = ob_get_clean();
            return $link;
        else:
            $link->debug();
            generateInternalError('The link can\'t be formatted because no URL was found. The debug window has been displayed so you can track the current link attributes.');
            
            return $link;
        endif;
    }
}