<?php

/**
 * @file
 * Contains \Drupal\custom\Plugin\Field\FieldWidget\ColorPickerWidget.
 */

namespace Drupal\custom\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @FieldWidget(
 *   id = "color_field_widget",
 *   module = "custom",
 *   label = @Translation("Color Picker"),
 *   field_types = {
 *     "color_field"
 *   }
 * )
 */
class ColorFieldWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element += [
      '#type' => 'color',
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : '',
      '#size' => 7,
      '#maxlength' => 7,
      '#element_validate' => [
        [$this, 'hexColorValidation'],
      ],
    ];

    return ['value' => $element];
  }

  /**
   * {@inheritdoc}
   */
  public function hexColorValidation($element, FormStateInterface $form_state) {
    $value = $element['#value'];
    if (!preg_match('/^#([a-f0-9]{6})$/iD', strtolower($value))) {
      $form_state->setError($element, t('Color is not in HEX format'));
    }
  }

}
