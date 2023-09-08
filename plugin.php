<?php

// Plugin Name: Full Featured Media Player
// Plugin URI: https://2ndshot.photos/wp-content/plugins/full-featured-media-player
// Description: A full-featured media player plugin for WordPress.
// Version: 1.0.0
// Author: Philip A. Swiderski Jr
// Author URI: https://philipaswiderskijr.com

// Load the plugin's dependencies.
require_once('assets/vendor/autoload.php');

// Register the plugin's settings page.
add_action('admin_menu', 'full_featured_media_player_add_settings_page');

// Create the front-end player.
add_shortcode('full_featured_media_player', 'full_featured_media_player_shortcode');

// Customize the player's styles.
add_action('wp_enqueue_scripts', 'full_featured_media_player_enqueue_styles');

// Customize the player's JavaScript.
add_action('wp_enqueue_scripts', 'full_featured_media_player_enqueue_scripts');

// Add the player's shortcode to the documentation.
add_filter('plugin_row_meta', 'full_featured_media_player_add_shortcode_to_documentation', 10, 2);

// Activate the plugin.
function full_featured_media_player_activate() {
    // Do something when the plugin is activated.
}

// Deactivate the plugin.
function full_featured_media_player_deactivate() {
    // Do something when the plugin is deactivated.
}

// Add the plugin's settings page.
function full_featured_media_player_add_settings_page() {
    add_options_page(
        'Full Featured Media Player Settings',
        'Full Featured Media Player',
        'manage_options',
        'full_featured_media_player',
        'full_featured_media_player_settings_page'
    );
}

// The settings page callback.
function full_featured_media_player_settings_page() {
    // Load the settings page template.
    include('templates/settings.php');
}

// The shortcode callback.
function full_featured_media_player_shortcode($atts) {
    // Get the player's settings.
    $settings = get_option('full_featured_media_player_settings');

    // Create the player.
    $player = new FullFeaturedMediaPlayer($settings);

    // Return the player's HTML.
    return $player->getHtml();
}

// Enqueue the player's styles.
function full_featured_media_player_enqueue_styles() {
    wp_enqueue_style('full-featured-media-player-styles', plugins_url('assets/css/style.css', __FILE__));
}

// Enqueue the player's JavaScript.
function full_featured_media_player_enqueue_scripts() {
    wp_enqueue_script('full-featured-media_player-scripts', plugins_url('assets/js/script.js', __FILE__));
}

// Add the player's shortcode to the documentation.
function full_featured_media_player_add_shortcode_to_documentation($links, $file) {
    if ($file == plugin_basename(__FILE__)) {
        $links[] = '<a href="https://example.com/docs/shortcodes/#full_featured_media_player">[full_featured_media_player]</a>';
    }

    return $links;
}

// Activation hook.
register_activation_hook(__FILE__, 'full_featured_media_player_activate');

// Deactivation hook.
register_deactivation_hook(__FILE__, 'full_featured_media_player_deactivate');

// Class definition.
class FullFeaturedMediaPlayer {

    private $settings;

    public function __construct($settings) {
        $this->settings = $settings;
    }

    public function getHtml() {
        // Get the player's HTML.
        return file_get_contents('templates/player.php');
    }
}
