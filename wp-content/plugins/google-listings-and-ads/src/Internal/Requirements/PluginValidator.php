<?php
declare( strict_types=1 );

namespace Automattic\WooCommerce\GoogleListingsAndAds\Internal\Requirements;

use Automattic\WooCommerce\GoogleListingsAndAds\Internal\Requirements\WCAdminValidator;
use Automattic\WooCommerce\GoogleListingsAndAds\Internal\Requirements\WCValidator;

defined( 'ABSPATH' ) || exit;

/**
 * Class PluginValidator
 *
 * Display admin notices for required and incompatible plugins.
 *
 * @package AutomatticWooCommerceGoogleListingsAndAdsInternalRequirements
 */
class PluginValidator {

	private const PLUGINS = [
		WCAdminValidator::class,
		WCValidator::class,
	];

	/**
	 * Validate all required and incompatible plugins.
	 *
	 * @return bool
	 */
	public static function validate(): bool {
		$validated = true;

		foreach ( self::PLUGINS as $plugin ) {
			if ( ! $plugin::instance()->validate() ) {
				$validated = false;
			}
		}

		return $validated;
	}
}
