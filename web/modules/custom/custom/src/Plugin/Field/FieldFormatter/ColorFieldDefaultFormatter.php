<?php

/**
 * @file
 * Contains \Drupal\custom\Plugin\Field\FieldFormatter\ColorFieldDefaultFormatter.
 */

namespace Drupal\custom\Plugin\Field\FieldFormatter;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/** *
 * @FieldFormatter(
 *   id = "color_field_default_formatter",
 *   label = @Translation("Element with background color"),
 *   field_types = {
 *     "color_field"
 *   }
 * )
 */
class ColorFieldDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
        'width' => '50',
        'height' => '50',
      ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);

    $elements['width'] = [
      '#type' => 'number',
      '#title' => t('Width'),
      '#field_suffix' => 'px.',
      '#default_value' => $this->getSetting('width'),
      '#min' => 1,
    ];

    $elements['height'] = [
      '#type' => 'number',
      '#title' => t('Height'),
      '#field_suffix' => 'px.',
      '#default_value' => $this->getSetting('height'),
      '#min' => 1,
    ];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $settings = $this->getSettings();

    $summary[] = t('Width @width px.', ['@width' => $settings['width']]);
    $summary[] = t('Height @height px.', ['@height' => $settings['height']]);

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    $settings = $this->getSettings();

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#type' => 'markup',
        '#markup' => new FormattableMarkup(
          '<div style="width: @width; height: @height; background-color: @color;"></div>',
          [
            '@width' => $settings['width'] . 'px',
            '@height' => $settings['height'] . 'px',
            '@color' => $item->value,
          ]
        ),
      ];
    }

    return $element;
  }

}
