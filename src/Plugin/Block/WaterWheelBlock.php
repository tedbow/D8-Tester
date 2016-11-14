<?php

namespace Drupal\tester\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'WaterWheelBlock' block.
 *
 * @Block(
 *  id = "water_wheel_block",
 *  admin_label = @Translation("Water wheel block"),
 * )
 */
class WaterWheelBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['default_block']['#markup'] = 'waterwheel included.';
    $build['default_block']['#attached']['library'][] = 'waterwheel/waterwheel';
    return $build;
  }


}
