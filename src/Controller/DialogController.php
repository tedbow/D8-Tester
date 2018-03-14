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
   * Dialog link.
   *
   * @return array
   *   Modal links render array.
   */
  public function offCanvasLink() {
    $album = 'aaa';
    $image = "iii";

$elements['link'] = [
  '#title' => 'Edit image',
  '#type' => 'link',
  '#url' => Url::fromRoute('album_image', ['album' => $album_id, 'image' => $image_id],
    [
      'query' => \Drupal::service('redirect.destination')->getAsArray(),
    ]),
  '#attributes' => [
    'class' => ['use-ajax'],
    'data-dialog-type' => 'dialog',
    'data-dialog-renderer' => 'off_canvas',
  ],
  '#attached' => [
    'library' => [
      'core/drupal.dialog.ajax',
    ],
  ],
];
    return $elements;
  }

  /**
   * Test callback.
   *
   * @param $album
   * @param $image
   *
   * @return array
   */
  public function albumTest($album, $image) {
    return [
      '#type' => 'markup',
      '#markup' => "<h2>$album - $image</h2>",
    ];
  }


}
