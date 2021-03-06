<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2009 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */

/**
 * Base path of the web site. If this includes a domain, eg: localhost/kohana/
 * then a full URL will be used, eg: http://localhost/kohana/. If it only includes
 * the path, and a site_protocol is specified, the domain will be auto-detected.
 */
$config["site_domain"] = dirname(
  empty($_SERVER["ORIG_SCRIPT_NAME"]) ? $_SERVER["SCRIPT_NAME"] : $_SERVER["ORIG_SCRIPT_NAME"]);

/**
 * Force a default protocol to be used by the site. If no site_protocol is
 * specified, then the current protocol is used, or when possible, only an
 * absolute path (with no protocol/domain) is used.
 */
$config["site_protocol"] = "";

/**
 * Name of the front controller for this application. Default: index.php
 *
 * This can be removed by using URL rewriting.
 */
$config["index_page"] = "index.php";

/**
 * Fake file extension that will be added to all generated URLs. Example: .html
 */
$config["url_suffix"] = "";

/**
 * Length of time of the internal cache in seconds. 0 or FALSE means no caching.
 * The internal cache stores file paths and config entries across requests and
 * can give significant speed improvements at the expense of delayed updating.
 */
$config["internal_cache"] = FALSE;
$config["internal_cache_path"] = VARPATH . "tmp/";

/**
 * Enable or disable gzip output compression. This can dramatically decrease
 * server bandwidth usage, at the cost of slightly higher CPU usage. Set to
 * the compression level (1-9) that you want to use, or FALSE to disable.
 *
 * Do not enable this option if you are using output compression in php.ini!
 */
$config["output_compression"] = FALSE;

/**
 * Enable or disable global XSS filtering of GET, POST, and SERVER data. This
 * option also accepts a string to specify a specific XSS filtering tool.
 */
$config["global_xss_filtering"] = TRUE;

/**
 * Enable or disable hooks. Setting this option to TRUE will enable
 * all hooks. By using an array of hook filenames, you can control
 * which hooks are enabled. Setting this option to FALSE disables hooks.
 */
$config["enable_hooks"] = TRUE;

/**
 * Log thresholds:
 *  0 - Disable logging
 *  1 - Errors and exceptions
 *  2 - Warnings
 *  3 - Notices
 *  4 - Debugging
 */
$config["log_threshold"] = 3;

/**
 * Message logging directory.
 */
$config["log_directory"] = VARPATH . "logs";
if (@!is_writable($config["log_directory"])) {
  $config["log_threshold"] = 0;
}

/**
 * Enable or disable displaying of Kohana error pages. This will not affect
 * logging. Turning this off will disable ALL error pages.
 */
$config["display_errors"] = TRUE;

/**
 * Enable or disable statistics in the final output. Stats are replaced via
 * specific strings, such as {execution_time}.
 *
 * @see http://docs.kohanaphp.com/general/configuration
 */
$config["render_stats"] = TRUE;

/**
 * Filename prefixed used to determine extensions. For example, an
 * extension to the Controller class would be named MY_Controller.php.
 */
$config["extension_prefix"] = "MY_";

/**
 * Additional resource paths, or "modules". Each path can either be absolute
 * or relative to the docroot. Modules can include any resource that can exist
 * in your application directory, configuration files, controllers, views, etc.
 */
$config["modules"] = array(
  MODPATH . "forge",
  MODPATH . "gallery",  // gallery must be *last* in the order
);

if (TEST_MODE) {
  array_splice($config["modules"], 0, 0,
               array(MODPATH . "gallery_unit_test",
                     MODPATH . "unit_test"));
}

/**
 * Setting the maintenance_mode to block all non administrative access.  In
 * this mode a user can attempt to logon, but will be unable to access anything.
 * The application will behave normally if an adminstrator logs on.
 */
//$config["maintenance_mode"] = true;
