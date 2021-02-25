<?php

/**
 * @file
 * Enables modules and site configuration for a standard site installation.
 */

use Drupal\contact\Entity\ContactForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter() for install_configure_form().
 *
 * Allows the profile to alter the site configuration form.
 */
function webspark_form_install_configure_form_alter(&$form, FormStateInterface $form_state) {
  $form['admin_account']['openasu_admin_asurite'] = [
    '#title' => 'ASURITE User ID',
    '#description' => t('Associate admin account with ASURITE User'),
    '#type' => 'textfield',
    '#required' => FALSE,
    '#weight' => 20,
  ];
  $form['#submit'][] = 'webspark_form_install_configure_submit';

}

/**
 * Submission handler to sync the contact.form.feedback recipient.
 */
function webspark_form_install_configure_submit($form, FormStateInterface $form_state) {
  $site_mail = $form_state->getValue('site_mail');
}

function webspark_install_tasks_alter(&$tasks, $install_state) {
  $academic_site = \Drupal::state()->get('academic_site', FALSE);
  $tasks['webspark_install_configure_form_step_1'] = [
    'display_name' => t('Is this an academic unit site?'),
    'type' => 'form',
    'function' => 'Drupal\webspark_installer_forms\Form\WebsparkConfigureFormStep1',
    'run' => INSTALL_TASK_RUN_IF_NOT_COMPLETED,
  ];
  $tasks['webspark_install_configure_form_step_2'] = [
    'display_name' => t('Include degree pages on your site?'),
    'type' => 'form',
    'function' => 'Drupal\webspark_installer_forms\Form\WebsparkConfigureFormStep2',
    'run' => ($academic_site) ? INSTALL_TASK_RUN_IF_NOT_COMPLETED : INSTALL_TASK_SKIP,
  ];
  $tasks['webspark_install_configure_form_step_3'] = [
    'display_name' => t('Does your department/unit/college have a custom logo to place in the mega footer?'),
    'type' => 'form',
    'function' => 'Drupal\webspark_installer_forms\Form\WebsparkConfigureFormStep3',
    'run' => ($academic_site) ? INSTALL_TASK_RUN_IF_NOT_COMPLETED : INSTALL_TASK_SKIP,
  ];
  $tasks['webspark_install_configure_form_step_4'] = [
    'display_name' => t('Include news articles from news.asu.edu?'),
    'type' => 'form',
    'function' => 'Drupal\webspark_installer_forms\Form\WebsparkConfigureFormStep4',
  ];
}
