<?php


/**
 * GitHub Update Checker for Custom WordPress Theme
 */
function custom_theme_github_update_checker() {
    
    $github_username = 'MCP21322';
    $github_repo     = 'noorani-bd-job-theme';
    $theme_slug      = 'mahadytwentytwentysix'; // your parent theme folder name

    // Transient cache is used so that requests to GitHub are not made every time the page loads (will check every 12 hours)
    
    $transient_name = $theme_slug . '_update_check';
    $remote_version = get_transient( $transient_name );

    if ( false === $remote_version ) {
        // Link to read the style.css file directly from GitHub
        $url = "https://raw.githubusercontent.com/{$github_username}/{$github_repo}/main/style.css";
        
        $response = wp_remote_get( $url );

        if ( is_wp_error( $response ) ) {
            return;
        }

        $file_contents = wp_remote_retrieve_body( $response );

        // Finding the version number from style.css
        if ( preg_match( '/Version:\s*([\d\.]+)/i', $file_contents, $matches ) ) {
            $remote_version = trim( $matches[1] );
            set_transient( $transient_name, $remote_version, 12 * HOUR_IN_SECONDS ); 
        }
    }

    // Checking the current live theme version
    $current_theme = wp_get_theme( $theme_slug );
    $local_version = $current_theme->get( 'Version' );

    // If the GitHub version is older than the local version, an alert will appear in the admin panel.
    if ( $remote_version && version_compare( $remote_version, $local_version, '>' ) ) {
        add_action( 'admin_notices', function() use ( $remote_version, $github_username, $github_repo ) {
            $download_url = "https://github.com/{$github_username}/{$github_repo}/archive/refs/heads/main.zip";
            ?>
            <div class="notice notice-warning is-dismissible" style="border-left-color: #ffb900; padding: 15px;">
                <p style="font-size: 15px; margin: 0 0 8px 0;">
                    <strong>A new update to your custom theme is available.!</strong> (GitHub version: <code><?php echo esc_html( $remote_version ); ?></code>)
                </p>
                <a href="<?php echo esc_url( $download_url ); ?>" class="button button-primary" target="_blank">গিটহাব থেকে আপডেট জিপ (.zip) ডাউনলোড করুন</a>
            </div>
            <?php
        });
    }
}
add_action( 'admin_init', 'custom_theme_github_update_checker' );