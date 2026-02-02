<?php
/*
Plugin Name: My GitHub Demo Plugin
Description: Demo plugin that updates from GitHub
Version: 1.4.0
Author: Henry Dev
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// ===============================
// ✅ DYNAMIC CLOSEABLE ADMIN NOTICE
// ===============================
add_action('admin_notices', function () {
    // Get current plugin version from plugin header
    $plugin_data = get_file_data( __FILE__, array('Version' => 'Version') );
    $version = $plugin_data['Version'];

    ?>
    <div class="notice notice-success is-dismissible">
        <p>The new version <?php echo esc_html($version); ?> is updated successfully 🚀</p>
    </div>
    <?php
});

// ===============================
// ✅ LOAD PLUGIN UPDATE CHECKER
// ===============================
require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// Your GitHub repo URL
$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/henryimagint/my-github-demo-plugin/',
    __FILE__,
    'my-github-demo-plugin'
);

// Branch to track
$updateChecker->setBranch('main');

// Optional: If repo is private, add GitHub personal access token
// $updateChecker->setAuthentication('ghp_XXXXXXXXXXXXXXXXXXXX');