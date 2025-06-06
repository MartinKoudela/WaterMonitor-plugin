<?php

if (!defined('ABSPATH')) exit;

class WaterMonitor_loader
{
    public function run()
    {
    // for later //
    }

    public function __construct()
    {
        add_shortcode('water_map', array($this, 'plugin_map'));
        add_action('wp_footer', array($this, 'plugin_footer_text'));
        add_shortcode('header_plugin', array($this, 'plugin_header_text'));

    }


    function plugin_footer_text()
    {
        echo '<footer style="text-align: center; padding: 40px; background: linear-gradient(135deg, #1a1a1a, #303030); color: white; margin-top: 60px">
            <p style="margin: 0; font-size: 14px; font-weight: 300;">Powered by <span style="font-weight: 600;">Water Clarity Monitor</span></p>
        </footer>';
    }

    function plugin_header_text()
    {
        echo '<header style="text-align: center; padding: 25px; background: linear-gradient(135deg, #1a1a1a, #303030); color: white;">
            <p style="margin: 0; font-size: 1.3rem; font-weight: 400"><span style="font-weight: 600; font-size: 3rem">Mapa míst</span><br>ve Zlínském kraji.</p>
        </header>';
    }

    function plugin_map()
    {
        $img_url = WM_PLUGIN_URL . '/public/imgs/plugin_map.jpg';
        ob_start();
        ?>

        <div class="map-container" style="text-align: center;">
            <img src="<?php echo esc_url($img_url); ?>" alt="mapa" usemap="#image-map"/>
            <div id="map-points"></div>
        </div>

        <map name="image-map">
            <area target="" alt="" title="" href="" coords="628,82,675,144" shape="rect" >
            <area target="" alt="" title="" href="" coords="486,250,530,315" shape="rect">
            <area target="" alt="" title="" href="" coords="104,447,52,509" shape="rect">
            <area target="" alt="" title="" href="" coords="187,553,247,617" shape="rect">
            <area target="" alt="" title="" href="" coords="263,322,312,377" shape="rect">
            <area target="" alt="" title="" href="" coords="455,422,515,483" shape="rect">
            <area target="" alt="" title="" href="" coords="441,595,490,661" shape="rect">
            <area target="" alt="" title="" href="" coords="223,238,277,301" shape="rect">
        </map>
        <?php
        return ob_get_clean();
    }
}

?>
