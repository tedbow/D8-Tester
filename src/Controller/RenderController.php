<?php

namespace Drupal\tester\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

/**
 * Class RenderController.
 *
 * @package Drupal\tester\Controller
 */
class RenderController extends ControllerBase {

  /**
   * Renderarrays.
   *
   * @return string
   *   Return Hello string.
   */
  public function renderArrays() {
    return [
      '#type' => 'html_tag',
      '#tag' => 'h4',
      '#value' => [
        '#type' => 'link',
        '#url' => Url::fromRoute('help.main'),
        '#title' => $this->t('Help page'),
      ],
    ];
  }

}
