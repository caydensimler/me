<?php

/**
 * Late night stuff.

 * Block > Content > Element
 * 
 * Block   - a group of content, arranged
 * Content - individual elements, formatted
 * Element - text, link, image
 */

/**
 * Register content types.
 */
require_once get_stylesheet_directory() . '/content/Text.php';
require_once get_stylesheet_directory() . '/content/Link.php';
require_once get_stylesheet_directory() . '/content/Image.php';

class Content {

    // Properties that should be available to all content types
    public $class;
    public $data;
    public $ID;
    public $type;
    public $attributes;

    public $content;

    // Constructor used to set defaults for all Content properties
    public function __construct() {
        $this->class = ' class="acf-content"';
        $this->ID    = false;
        $this->data  = false;
        $this->type  = 'div';
    }

    // METHOD - Content Wrapper
    public function wrap($type = 'div', $class = '') {
        $content = $this->content;

        if ( $content ):
            $classAttribute = ' class="acf-content__wrapper"';
            if ( $class ):
                $classAttribute = insertIntoAttribute($class, $classAttribute);
            endif; 
            
            ob_start();

                echo '<' . $type . $classAttribute . '>';
                    echo $content;
                echo '</' . $type . '>';
            
            $this->content = ob_get_clean();

            return $this;
        else: 
            generateInternalError('The wrap() method won\'t work because no content was found. Use the format() method on the content in order to provide wrap() with content to enclose.');
            
            return $this;
        endif;
    }

    public function display() {
        if ($this->content):
            echo $this->content;
    
            return $this;
        else:
            generateInternalError('No content can be displayed because a properly formatted content cannot be found. Use the format() method on the content in order to provide display() with an content to show.');

            return $this;
        endif;
    }

    // METHOD - Debug Content
    public function debug() {
        // add a debugging class to the Content
        $this->class = insertIntoAttribute('debugging', $this->class);

        // return formatted debugging box
        echo generateContentDebug($this);

        return $this;
    }

    // METHOD - Add class attribute to Content
    public function addClass($class) {
        $this->class = insertIntoAttribute($class, $this->class);

        // to allow for chaining of methods
        return $this;
    }

    // METHOD - Remove specific class from Content
    public function removeClass($class) {
        $this->class = str_replace($class, '', $this->class);

        // to allow for chaining of methods
        return $this;
    }

    // METHOD - Remove class attribute from Content
    public function clearClass() {
        $this->class = 'class=""';

        // to allow for chaining of methods
        return $this;
    }

    // METHOD - Add ID attribute to Content
    public function addID($ID) {
        $this->ID = ' id="' . $ID . '"';

        return $this;
    }

    // METHOD - Add data attribute(s) to Content
    public function addData($dataAttributes) {
        $this->data = ' ' . $dataAttributes;

        return $this;
    }

    // METHOD - Add formatted attributes to Content
    public function addAttribute($attribute) {
        $this->attributes .= ' ' . $attribute;
    }
}