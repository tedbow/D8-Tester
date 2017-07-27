<?php

namespace Drupal\tester\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SimpleForm.
 *
 * @package Drupal\tester\Form
 */
class SimpleForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'simple_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['test_field'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Test field'),
      '#description' => $this->t('just a test'),
      '#maxlength' => 64,
      '#size' => 64,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#title' => $this->t('Submit'),
    ];

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => t('Submit'),
    ];
    $form['submit']['#attributes']['class'][] = 'use-ajax-submit';

    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
    //$form_state->setErrorByName('test_field', $this->t("I don't know what @input is.", ['@input' => $form_state->getValue('test_field')]));
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }


}
