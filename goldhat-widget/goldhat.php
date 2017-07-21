<?php 
    /*
        Plugin Name: Goldhat Stats Plugin
        Plugin URI: http://wordpress.org/extend/plugins/goldhat-widget/
        Version: v1.00
        Author: <a href="http://www.linkedin.com/in/kenjicrosland/">Kenji Crosland</a>
        Description: A simple plugin to display goldhat donations at the end of a post as well as allow users to easily submit posts to Goldhat.
    */
    if (!class_exists("GoldhatStatsPlugin"))
        {
            class GoldhatStatsPlugin
            {
                function GoldhatStatsPlugin()
                { 
                    //constructor
                }
                function addHeaderCode() {
                ?>
                <?php
                }
                function addContent($content = '')
                {
                    $content .= "<div id='tdiv' style='display:none;'>".get_the_title()."</div><div id='linkDiv' style='display:none;'>".get_permalink()."</div><script src=\"http://localhost:3000/javascripts/widget.js?i=1\" type=\"text/javascript\"></script><div id=\"ghatDiv\"></div>";
		            return $content;
                }
            } //End Class GoldhatStatsPlugin
        }
    
        if (class_exists("GoldhatStatsPlugin"))
        {
            $ghat_plugin = new GoldhatStatsPlugin();
        }
        //Actions and Filters	
        if (isset($ghat_plugin))
        {
        //Actions
        add_action('wp_head', array(&$ghat_plugin, 'addHeaderCode'), 1);
        //Filters
        add_filter('the_content', array(&$ghat_plugin, 'addContent'));

        }
?>