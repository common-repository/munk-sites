<?php
/**
 * Do not go gentle into that good night,
 * Old age should burn and rave at close of day;
 * Rage, rage against the dying of the light.
 * 
 * Though wise men at their end know dark is right,
 * Because their words had forked no lightning they
 * Do not go gentle into that good night.
 *  
 * Dylan Thomas, 1914 - 1953
 *  
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA 
 *
 * Plugin Name:       Ready to use Gutenberg and Elementor Templates - Munk Sites
 * Plugin URI:        https://wpmunk.com/instant-sites/
 * Description:       Ready to use instant sites built for Elementor Page Builder,the WordPress Gutenberg Editor and Beaver Builder. Import free designs with one click and get started with amazing website.
 * Version:           1.0.7
 * Author:            MetricThemes
 * Author URI:        https://wpmunk.com
 * License:           GPL-2.0+ 
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       munk-sites
 * Domain Path:       /languages
 */


define( 'MUNK_SITES_VERSION', '1.0.7' );
define( 'MUNK_SITES_URL', untrailingslashit( plugins_url(  '', __FILE__ ) ) );
define( 'MUNK_SITES_PATH',dirname( __FILE__ ) );

if ( ! class_exists( 'WP_Importer' ) ) {
	defined( 'WP_LOAD_IMPORTERS' ) || define( 'WP_LOAD_IMPORTERS', true );
	require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
}

require dirname( __FILE__ ) . '/classess/class-placeholder.php';
require dirname( __FILE__ ) . '/importer/class-logger.php';
require dirname( __FILE__ ) . '/importer/class-logger-serversentevents.php';
require dirname( __FILE__ ) . '/importer/class-wxr-importer.php';
require dirname( __FILE__ ) . '/importer/class-wxr-import-info.php';
require dirname( __FILE__ ) . '/importer/class-wxr-import-ui.php';

require dirname( __FILE__ ) . '/classess/class-tgm.php';
require dirname( __FILE__ ) . '/classess/class-munk-sites-compatibility-elementor.php';
require dirname( __FILE__ ) . '/classess/class-plugin.php';
require dirname( __FILE__ ) . '/classess/class-sites.php';
require dirname( __FILE__ ) . '/classess/class-ajax.php';


Munk_Sites::get_instance();
new Munk_Sites_Ajax();