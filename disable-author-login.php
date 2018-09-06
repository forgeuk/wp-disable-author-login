<?php
/**
 * Plugin Name: Disable Author Login
 * Plugin URI: https://github.com/forgeuk/wp-disable-author-login
 * Description: Prevents author accounts from logging in
 * Version: 1.0.0
 * Author: Forge
 * Author URI: https://www.forge.uk
 * License: MIT
 */

/**
 * Disable author accounts from logging in
 * @since 1.0.0
 * @param WP_User $user
 * @param string $password
 */
function disable_author_login($user, $password)
{
  if ($user) {
    $roles = (array) $user->roles;
    if ($roles[0] === 'author') {
      return new WP_Error('disable_author_login', 'You do not have permission to log in');
    }
  }
  return $user;
}
add_filter('wp_authenticate_user', 'disable_author_login', 10, 2);
