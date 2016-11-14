<?php

namespace Drupal\tester\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

/**
 * Class ModalController.
 *
 * @package Drupal\tester\Controller
 */
class ModalController extends ControllerBase {

  /**
   * Modalopen.
   *
   * @return string
   *   Return Hello string.
   */
  public function modalLink() {
    return [
      'modal_link' => [
        '#title' => 'Click Me!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.modal_controller_modalcallback'),
        '#attributes' => [
          'class' => ['use-ajax'],
          'data-dialog-type' => 'dialog',
        ],
        '#attached' => [
          'library' => [
            'outside_in/drupal.outside_in',
          ],
        ],
      ],
    ];
  }


  public function modalCallback() {
    return [
      '#type' => 'markup',
      '#markup' => '<h2>Callback</h2>',
    ];
  }
}
