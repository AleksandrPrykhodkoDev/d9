<?php

/**
 * @file
 * Contains Drupal\custom\Plugin\Field\FieldType\ColorFieldItem.
 */

namespace Drupal\custom\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "color_field",
 *   label = @Translation("Color field"),
 *   module = "custom",
 *   description = @Translation("Custom color picker."),
 *   category = @Translation("Color"),
 *   default_widget = "color_field_widget",
 *   default_formatter = "color_field_default_formatter"
 * )
 */
class ColorFieldItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Hex color'));

    return $properties;
  }
}
