<?php

namespace Drupal\tester\Controller;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
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
   * @return array
   *   Modal links render array.
   */
  public function modalLink() {

    $modal_link = Link::createFromRoute('From object', 'tester.simple_form')->openInDialog();
    $modal_link->getUrl()->setOption('attributes', ['class' => ['my-class'], 'data-boo' => 'boo', 'data-dialog-type' => 'dialog']);

    $offLink = Link::createFromRoute('From object off2', 'tester.simple_form');
    $offLink->getUrl()->openInDialog('dialog', 'off_canvas');
    return [
      'modal_link' => [
        '#title' => 'Click Me Modal!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.dialog_callback')->openInDialog('modal', NULL, ['minHeight' => 400, 'dialogClass' => 'other-class']),
      ],
      'modal_link_800' => [
        '#title' => 'Click Me Modal - 800 width!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.dialog_callback')->openInDialog('modal', NULL, ['minHeight' => 400, 'dialogClass' => 'other-class', 'width' => '800px']),
      ],
      'dialog_link' => [
        '#title' => 'Click Me Dialog!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.dialog_callback')->openInDialog('dialog'),
      ],
      'dialog_link_800' => [
        '#title' => 'Click Me Dialog- 800 width!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.dialog_callback')->openInDialog('dialog', NULL, ['minHeight' => 400, 'dialogClass' => 'other-class', 'width' => '800px']),
      ],
      'dialog_form_link' => [
        '#title' => 'Click Me Dialog Form!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.simple_form')->setOption('query', \Drupal::destination()->getAsArray())->openInDialog('dialog', 'off_canvas'),
      ],
      'ajax_link' => [
        '#title' => 'Click Link Ajax!',
        '#type' => 'link',
        '#url' => Url::fromRoute('tester.default_controller_message'),
        '#attributes' => [
          'class' => ['use-ajax'],
        ],
        '#attached' => [
          'library' => [
            'core/drupal.dialog.ajax',
          ],
        ],
      ],
      'from_object' => $modal_link->toRenderable(),
      'from_object_off' => $offLink->toRenderable(),
    ];
  }

  /**
   * Callback to show in modal.
   *
   * @return array
   */
  public function modalCallback() {
    // Confirm doesn't work with dialogs
    drupal_set_message("Can you see me?");
    return [
      '#type' => 'markup',
      '#markup' => '<h2>Callback</h2>',
    ];
  }
}
