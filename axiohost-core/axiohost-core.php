<?php
/**
 * @package ThemeixPlugins
 */
/*
Plugin Name: Axiohost Core
Plugin URI: https://themeix.com/
Description: This is plugin use for Themeix axiohost WordPress theme.
Version: 1.0.0
Author: Themeix
Author URI: https://themeix.com/
License: GPLv2 or later
Text Domain: themeix-axiohost
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

if(!defined('ABSPATH')){
    die;
}

class ThemeixAxiohostPlugin{
    function add_action_hook(){
        add_shortcode('social_share_buttons', array($this, 'axiohost_social_sharing_buttons'));
    }

    //activation
    function activation(){
        
        //generated social share buttons
        $this->axiohost_social_sharing_buttons();
        
        //flush rewrite rules
        flush_rewrite_rules();
    }

    //Deactivation
    function deactivation(){

    }

    
    
    //axiohost Social Share Buttons
     function axiohost_social_sharing_buttons() {
        if(is_singular()){
        
            // Get current post URL 
            $Post_url = get_the_permalink();
     
            // Get current post title
            $post_title = get_the_title();
     
            // Construct sharing URL without using any script
            $twitterURL = 'https://twitter.com/intent/tweet?text='.$post_title.'&amp;url='.$Post_url.'&amp;via=axiohost';
            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$Post_url;
            $googleURL = 'https://plus.google.com/share?url='.$Post_url;
            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$Post_url.'&amp;title='.$post_title;
     
        ?>
            <ul class="single-share list-inline float-right">
                <li class="facebook"><a href="<?php echo esc_url($facebookURL); ?>" onclick="javascript:window.open(this.href, 'facebook-share',  ' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  class="blue"><i class="fa fa-facebook-f"></i></a></li>

                <li class="twitter"><a href="<?php echo esc_url($twitterURL); ?>" onclick="javascript:window.open(this.href, 'facebook-share',  ' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="paste"><i class="fa fa-twitter"></i></a></li>

                <li class="googleplus"><a href="<?php echo esc_url($googleURL); ?>" onclick="javascript:window.open(this.href, 'facebook-share',  ' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="red"><i class="fa fa-google-plus"></i></a></li>
                
                <li class="linkedin"><a href="<?php echo esc_url($linkedInURL); ?>" onclick="javascript:window.open(this.href, 'facebook-share',  ' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="pink"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        <?php
            
          
        }
    }
}
if(class_exists('ThemeixAxiohostPlugin')){
    $axiohostPlugin = new ThemeixAxiohostPlugin();
    $axiohostPlugin->add_action_hook();
}


//Activation Hook
register_activation_hook(__FILE__, array($axiohostPlugin, 'activation'));

//Deactivation Hook
register_deactivation_hook(__FILE__, array($axiohostPlugin, 'deactivation'));