<?php

/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');
/** MySQL database username */
define('DB_USER', 'wordpress');
/** MySQL database password */
define('DB_PASSWORD', 'wordpress');
/** MySQL hostname */
define('DB_HOST', 'database');
define('DB_COLLATE', '');

// Don't show deprecations; useful under PHP 5.5
error_reporting(E_ALL ^ E_DEPRECATED);

/** Define appropriate location for default tmp directory on Pantheon */
define('WP_TEMP_DIR', sys_get_temp_dir());
