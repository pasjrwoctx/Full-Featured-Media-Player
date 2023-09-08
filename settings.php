<?php

// Get the plugin settings.
$settings = get_option('full_featured_media_player_settings');

// Create the settings form.
?>
<div class="wrap">
    <h1>Full Featured Media Player Settings</h1>

    <form action="options.php" method="post">
        <?php settings_fields('full_featured_media_player_settings'); ?>

        <table class="form-table">
            <tr>
                <th>Playlists</th>
                <td>
                    <input type="text" name="full_featured_media_player_settings[playlists]" value="<?php echo esc_attr($settings['playlists']); ?>" />
                    <p>Enter a comma-separated list of playlist names.</p>
                </td>
            </tr>

            <tr>
                <th>Show Waveform</th>
                <td>
                    <input type="checkbox" name="full_featured_media_player_settings[show_waveform]" value="1" <?php checked($settings['show_waveform'], 1); ?> />
                </td>
            </tr>

            <tr>
                <th>Other Settings</th>
                <td>
                    <p>This is where you can put other settings.</p>
                </td>
            </tr>
        </table>

        <input type="submit" name="submit" value="Save Changes" class="button-primary" />
    </form>
</div>
