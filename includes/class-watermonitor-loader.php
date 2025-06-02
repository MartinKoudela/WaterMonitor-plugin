<?php

if (!defined('ABSPATH')) exit;

class WaterMonitor_loader
{
    public function run()
    {

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
            <p style="margin: 0; font-size: 1rem; font-weight: 400">Toto je <span style="font-weight: 600; font-size: 3rem">Mapa Lokací</span></p>
        </header>';
    }

    function plugin_map()
    {
        $img_url = WM_PLUGIN_URL . '/public/imgs/plugin_map.png';
        ob_start();
        ?>

        <div class="map-container" style="text-align: center;">
            <img src="<?php echo esc_url($img_url); ?>" alt="mapa" usemap="#image-map"/>
            <div id="map-points"></div>
        </div>

        <map name="image-map">
            <area target="" alt="Luhačovická Přehrada" title="Luhačovická Přehrada" href="#" coords="491,474,14"
                  shape="circle"/>
            <area target="" alt="Hulínské Štěrkoviště" title="Hulínské Štěrkoviště" href="#" coords="259,294,15"
                  shape="circle"/>
            <area target="" alt="Štěrkoviště Otrokovice" title="Štěrkoviště Otrokovice" href="#" coords="291,374,15"
                  shape="circle"/>
        </map>
        <?php
        return ob_get_clean();
    }
}

?>
