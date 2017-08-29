<?php

namespace Drupal\tester\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

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
    //drupal_set_message('bo bo');
    debug(\Drupal::entityTypeManager()->getDefinition('block')->getFormClass('off_canvas'));
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: message')
    ];
  }

  public function testCount() {
    $node = Node::load(1);

    $markup = 'results1: ';
    $markup .=  ($node->get('path')->isEmpty() ? 'isempty': 'no isempty') .  '----';
    $markup .=  (count($node->get('path')) ? 'count': 'no count') .  '----';
    /** @var EntityTypeManagerInterface $manager */
    $manager = \Drupal::service('entity_type.manager');
    $manager->getStorage('node')->resetCache([1]);
    $node = Node::load(1);
    $markup .= '<br>results2: ';
    $markup .=  (count($node->get('path')) ? 'count': 'no count') .  '----';
    $markup .=  ($node->get('path')->isEmpty() ? 'isempty': 'no isempty') .  '----';



    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];

  }

}
