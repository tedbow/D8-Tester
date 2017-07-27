<?php

namespace Drupal\tester\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class JSMessageController.
 *
 * @package Drupal\tester\Controller
 */
class JSMessageController extends ControllerBase {

  /**
   * Message.
   *
   * @return string
   *   Return Hello string.
   */
  public function message() {
    return [
      '#type' => 'container',
      'msg' => [
        '#type' => 'markup',
        '#markup' => $this->t('Implement method: message'),
      ],
      '#attached' => [
        'library' => ['tester/drupal.tester_message '],
      ],
    ];
  }

}
