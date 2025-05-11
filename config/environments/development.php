<?php

/**
 * Configuration overrides for WP_ENV === 'development'
 */

use Roots\WPConfig\Config;
use function Env\env;

Config::define('SAVEQUERIES', true);
Config::define('WP_DEBUG', true);
Config::define('WP_DEBUG_LOG', true); // Let WP handle the path
Config::define('WP_DEBUG_DISPLAY', true); // show on-screen
Config::define('WP_DISABLE_FATAL_ERROR_HANDLER', true);
Config::define('SCRIPT_DEBUG', true);
Config::define('DISALLOW_INDEXING', true);

ini_set('display_errors', '0'); // Also hide PHP errors on screen

// Enable plugin and theme updates and installation from the admin
Config::define('DISALLOW_FILE_MODS', false);
