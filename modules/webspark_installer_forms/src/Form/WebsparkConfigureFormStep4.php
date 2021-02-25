<?php

namespace Drupal\webspark_installer_forms\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 */
class WebsparkConfigureFormStep4 extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'webspark_configure_form_step_4';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#title'] = $this->t('Webspark Config');

    $form['has_articles'] = [
      '#type' => 'checkbox',
      '#title' => t('Include news articles from news.asu.edu?'),
    ];
    $form['academic_unit'] = [
      '#title' => t('Category'),
      '#type' => 'select',
      '#description' => 'Select one option.',
      '#options' => ['option 1', 'option 2', 'option 2'],
      '#states' => [
        'visible' => [
          ':input[name="has_articles"]' =>['checked' => TRUE],
        ],
      ],
    ];

    $form['actions'] = ['#type' => 'actions'];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save and continue'),
      '#weight' => 15,
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
