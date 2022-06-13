<?php

class Text extends Content {

    // Text attributes
    public $text;
    public $span;

    // Constructor used to set defaults for all Text attributes
    public function __construct($text = null, $type = 'p', $class = '') {
        // construct the parent Class first to inherit default attribute values
        parent::__construct();

        if (is_array($text)):
            $this->text = $text['text'];
            $this->type = $text['type'];
            $this->addClass($text['style']);
        else:
            $this->text   = $text;
            $this->type   = $type;
        endif;

        $this->addClass('content__text');

        if ( $class ):
            $this->addClass($class);
        endif;

        $this->span   = false;
    }

    public function format() {
        // Rename $this variable to be more verbose
        $text = $this;

        // Text Class(es)
        $text->addAttribute($text->class);

        // Text ID
        ($text->ID) ? $text->addAttribute($text->ID) : '';

        // Text Data
        ($text->data) ? $text->addAttribute($text->data) : '';


        $contentOpen = '<' . $text->type . $text->attributes . '>';
        $contentClose = '</' . $text->type . '>';

        
        // Checking for available text. If no text is found, nothing will happen.
        if ( $text->text ):
            ob_start();

                echo $contentOpen;

                    if ($text->span):
                        echo '<span>';
                    endif;

                        echo $text->text;

                    if ($text->span):
                        echo '</span>';
                    endif;

                echo $contentClose; 
                    
            $text->content = ob_get_clean();
            return $text;
        else:
            $text->debug();
            generateInternalError('The text can\'t be formatted because no actual text was found. The debug window has been displayed so you can track the current link attributes.');

            return $text;
        endif;
    }
}