
    <?php
    /*
    * Plugin Name: Random Biscuits Generator
    * Description: Displays random biscuits
    * Version: 1.0
    * Author: Shawn
    * Author URI: https://instagram.com/anuptra._
    */

    //shortcode into wordpress init hook
    add_action( 'init', 'wp_add_biscuitgen_shortcode' );

    //register the shortcode called 'biscuit-gen'
    function wp_add_biscuitgen_shortcode() {
        add_shortcode( 'biscuitgen', 'wp_biscuitgen_func' );
    }

    function wp_biscuitgen_func( $atts ) {
        //if there's no specified attribute, no width
        if ($atts != null) {
        $width = $atts['width'];}
        //biscuits array
        $biscuits = ['Original Digestives', 'Milk Chocolate Digestives', 'Jaffa Cakes', 'Cookies and Cream Pocky', 'Milk Pocky', 'Green Tea Pocky'];
        $biscuitsPics = ['og-digestive.jpg', 'milk-choco-digestive.jpg', 'jaffa-cake.jpg', 'cookies-and-cream-pocky.jpg', 'milk-pocky.jpg', 'green-tea-pocky.jpg'];

        $random = rand(0, count($biscuits) - 1);
        $myImg = plugin_dir_url( __FILE__ ) . 'images/' . $biscuitsPics[$random];

        //if there's a specified width, change the image to the specified width
        if ($width != null) {
            echo "<img src=\"" . $myImg . "\" style=\"width: " . $width . "px\">";
        } else {
            echo "<img src=\"" . $myImg ."\">";
        }
        
        echo "<p>".$biscuits[$random]."</p>";
    }
    ?>
