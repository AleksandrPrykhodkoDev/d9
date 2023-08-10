<?php

namespace Drupal\custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Returns Ajax response for Hello Ajax route.
 */
class AjaxController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function ajaxResponse(): JsonResponse {
//    $machine_name = 'userswhohavebeenloggedintositetodayblock';
//
//    $block = \Drupal::entityTypeManager()
//      ->getStorage('block')
//      ->load($machine_name);
//    if (!empty($block)) {
//      $block_content = \Drupal::entityTypeManager()
//        ->getViewBuilder('block')
//        ->view($block);
//
//      $pre_render = $block_content;
//    }
//
//    $response['block'] = $pre_render;
//    return new JsonResponse($response);
  }

}
