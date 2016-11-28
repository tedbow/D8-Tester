<?php

namespace Drupal\tester\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

/**
 * Class DialogController.
 *
 * @package Drupal\tester\Controller
 */
class DialogController extends ControllerBase {

  /**
   * Modalopen.
   *
   * @return string
   *   Return Hello string.
   */
  public function modalLink() {
    return [
      'modal_link' => [
        '#title' => 'Click Me Modal!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.dialog_callback'),
        '#attributes' => [
          'class' => ['use-ajax'],
          'data-dialog-type' => 'modal',
        ],
        '#attached' => [
          'library' => [
            'core/drupal.dialog.ajax',
          ],
        ],
      ],
      'dialog_link' => [
        '#title' => 'Click Me Dialog!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.dialog_callback'),
        '#attributes' => [
          'class' => ['use-ajax'],
          'data-dialog-type' => 'dialog',
        ],
        '#attached' => [
          'library' => [
            'core/drupal.dialog.ajax',
          ],
        ],
      ],
    ];
  }

  /**
   * Callback to show in modal.
   *
   * @return array
   */
  public function modalCallback() {
    return [
      '#type' => 'markup',
      '#markup' => '<h2>Callback</h2>',
    ];
  }
}
