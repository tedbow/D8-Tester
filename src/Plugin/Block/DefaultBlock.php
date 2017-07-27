<?php

namespace Drupal\tester\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "default_block",
 *  admin_label = @Translation("Default block"),
 * )
 */
class DefaultBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['default_block']['#markup'] = 'Implement DefaultBlock.';
    $build['default_block']['#attached']['library'][] = 'core/drupal.dialog.off_canvas';
    $build['default_block']['#attached']['library'][] = 'outside_in/drupal.off_canvas';
    $build['default_block']['#attached']['library'][] = 'core/drupal.dialog';
    $build['default_block']['#attached']['library'][] = 'core/drupal.tableheader';
    return $build;
  }

}
