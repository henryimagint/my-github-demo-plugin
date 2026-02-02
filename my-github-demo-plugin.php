<?php
/*
Plugin Name: My GitHub Demo Plugin
Description: Demo plugin that updates from GitHub
Version: 1.3.0
Author: Henry Dev
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Example feature so we know plugin works
add_action('admin_notices', function () {
    ?>
    <div class="notice notice-success is-dismissible">
        <p>My GitHub Demo Plugin is active 🚀</p>
    </div>
    <?php
});

// ✅ LOAD UPDATE CHECKER LIBRARY
require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// ✅ SETUP GITHUB UPDATES
$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/henryimagint/my-github-demo-plugin/', // repo URL
    __FILE__,
    'my-github-demo-plugin'
);

// Branch name
$updateChecker->setBranch('main');

// Optional: if repo is private
// $updateChecker->setAuthentication('GITHUB_PERSONAL_ACCESS_TOKEN');

add_action('admin_footer', function () {
    echo '<p style="text-align:center;">Plugin version 1.3.0 loaded 🎯</p>';
});