<?php

namespace Drupal\custom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;

/**
 * Provides a 'Users Logged In' Block.
 *
 * @Block(
 *   id = "users_logged_in_block",
 *   admin_label = @Translation("Users who have been logged-in to site today block"),
 *   category = @Translation("Custom"),
 * )
 */
class UsersLoggedIn extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $query = \Drupal::entityQuery('user');
    $query->condition('login', strtotime('today'), '>=');
    $uids = $query->execute();

    $users = [];
    foreach ($uids as $uid) {
      $user = User::load($uid);
      $users[] = $user->getDisplayName();
    }

    return [
      '#theme' => 'users_block',
      '#users' => $users,
      '#attached' => [
        'library' => ['custom/custom'],
      ],
    ];
  }

}
