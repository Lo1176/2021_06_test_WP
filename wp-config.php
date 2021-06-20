<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', '2021_06_test_WP' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'laurentbinder' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'upyA{n7WP;oU$TFMOT]MEi(F8svi794ttc;>d/b<KcBt0(F+DK-`=p-pp9Stc2z ' );
define( 'SECURE_AUTH_KEY',  '?_cjR=Pk:fW_a z,+:~nLrKe:)S$g2DL`aiooi)k5vfeRp:1 0JGCY2d!R-QAh6/' );
define( 'LOGGED_IN_KEY',    'o$`cX)J|s5r&q*t+Q4 Dogpiu ]qB7B(70*4z^I-?gt-%x`>NIK#]G[86j+EkH76' );
define( 'NONCE_KEY',        '(]KAkm3Ux^Pm(eMlu*N/;a)^y1+E!p1KNURJKeiG{ELdx!PFPo5b#$@[Qr71e5iE' );
define( 'AUTH_SALT',        '=kZQSx7{<=dn4W*Z&TD-q5jNc!3~jD$iZOL45+0Wv9}~E_iu+je.*/+. >!5.&{j' );
define( 'SECURE_AUTH_SALT', 'lS6{[(yHHnDn^=8V=|)5A1NPSB#vU@RHSzyQu?Ix]%W<a2aZK{LJbv$~u@3d csV' );
define( 'LOGGED_IN_SALT',   'TG}rDgvnb=%Lo/3_5oj3.|f7_G,kT!q+[6Lx1U(BWX>L6Qo<n,5D7B4*K5xD$ny)' );
define( 'NONCE_SALT',       ':EUX`|/n:n&&Jx(3o>>(mNk0n>.g.TP=vGH~Z%&8Nxs9dt}q@/$3RlS=9ng.YPZ2' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
