<?php

namespace Drupal\tester\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\tester\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Message.
   *
   * @return string
   *   Return Hello string.
   */
  public function message() {
    drupal_set_message('bo bo');
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: message')
    ];
  }

}
