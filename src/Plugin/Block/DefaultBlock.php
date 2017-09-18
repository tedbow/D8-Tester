<?php

namespace Drupal\tester\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

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

  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $form['mmm'] = [
      '#type' => 'markup',
      '#markup' => '<svg width="100" height="100"><circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" /></svg>',
    ];
    $form['ttt'] = [
      '#type' => 'inline_template',
      '#template' => '<h1>h1</h1><svg width="100" height="100"><circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" /></svg>',
    ];
    return $form;
  }


}
