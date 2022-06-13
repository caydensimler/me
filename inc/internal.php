<?php

function determineTagEligibility() {
    $user_id = get_current_user_id();

    if (
        is_user_logged_in() && 
        current_user_can('administrator') &&
        get_field( 'toggle_utility_tags', 'user_'. $user_id )
    ) {
        return true;
    } else {
        return false;
    }
}
  
function generateInternalError($message) {
    if (determineTagEligibility()) {
        echo '<div class="internal-tag internal-tag_error">';
            echo $message;
        echo '</div>';
    }
}

function generateContentDebug($content) {
    if (determineTagEligibility()): ?>
       <div class="internal-tag internal-tag_debug">
            <div class="label"><?php echo get_class($content); ?> Debug Mode: Enabled</div>

            <div class="display-grid">

                <h6>Attributes</h6>
                <h6>Values</h6>

                <?php foreach ($content as $attribute => $value) :
                    // Hiding clones and props due to complexity right now.
                    // Will work both back in later somehow.
                    if ($attribute == 'element'):
                        echo '<div>' . $attribute . '</div>';
                        echo '<div>' . esc_html($value) . '</div>';
                    elseif ($attribute !== 'clone' && $attribute !== 'props'):
                        echo '<div>' . $attribute . '</div>';
                        echo '<div>' . $value . '</div>';
                    endif;
                endforeach;
            echo '</div>';
        echo '</div>';
    endif;
}