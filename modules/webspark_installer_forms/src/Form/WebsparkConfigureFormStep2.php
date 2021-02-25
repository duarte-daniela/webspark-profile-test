<?php

namespace Drupal\webspark_installer_forms\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 */
class WebsparkConfigureFormStep2 extends ConfigFormBase {

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
    return 'webspark_configure_form_step_2';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#title'] = $this->t('Webspark Config');

    $form['academic_site'] = [
      '#type' => 'checkbox',
      '#title' => t('Include degree pages on your site?'),
    ];

    $form['academic_unit'] = [
      '#title' => t('Academic Unit'),
      '#type' => 'select',
      '#description' => 'Select one option.',
      '#options' => ['option 1', 'option 2', 'option 2'],
      '#states' => [
        'visible' => [
          ':input[name="academic_site"]' =>['checked' => TRUE],
        ],
      ],
    ];
    $form['has_degrees'] = [
      '#type' => 'checkbox',
      '#title' => t('Include undergrad or graduate degrees?'),
      '#states' => [
        'visible' => [
          ':input[name="academic_site"]' =>['checked' => TRUE],
        ],
      ],
    ];
    $form['has_certificates'] = [
      '#type' => 'checkbox',
      '#title' => t('Include minors/certificates?'),
      '#states' => [
        'visible' => [
          ':input[name="academic_site"]' =>['checked' => TRUE],
        ],
      ],
    ];
    $form['rfi_available'] = [
      '#type' => 'checkbox',
      '#title' => t('Include RFI forms on degree pages if available?'),
      '#states' => [
        'visible' => [
          ':input[name="academic_site"]' =>['checked' => TRUE],
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
