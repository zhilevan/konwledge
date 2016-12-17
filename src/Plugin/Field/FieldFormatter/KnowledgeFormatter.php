<?php

/**
 * @file
 * Contains \Drupal\knowledge\Plugin\Field\FieldFormatter\KnowledgeFormatter.
 */

namespace Drupal\knowledge\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'knowledge_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "knowledge_formatter",
 *   label = @Translation("Knowledge formatter"),
 *   field_types = {
 *     "done_type"
 *   }
 * )
 */
class KnowledgeFormatter extends FormatterBase {
    /**
     * {@inheritdoc}
     */
    public static function defaultSettings() {
        return array(
            // Implement default settings.
        ) + parent::defaultSettings();
    }

    /**
     * {@inheritdoc}
     */
    public function settingsForm(array $form, FormStateInterface $form_state) {
        return array(
            // Implement settings form.
        ) + parent::settingsForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function settingsSummary() {
        $summary = [];
        // Implement settings summary.

        return $summary;
    }

    /**
     * {@inheritdoc}
     */
    public function viewElements(FieldItemListInterface $items, $langcode) {
        $elements = [];

        foreach ($items as $delta => $item) {
            $elements[$delta] = ['#markup' => $this->viewValue($item)];
        }
        kint($elements);
        return $elements;
    }

    /**
     * Generate the output appropriate for one field item.
     *
     * @param \Drupal\Core\Field\FieldItemInterface $item
     *   One field item.
     *
     * @return string
     *   The textual output generated.
     */
    protected function viewValue(FieldItemInterface $item) {
        // The text value has no text format assigned to it, so the user input
        // should equal the output, including newlines.

        return nl2br(Html::escape($item->knowledge_title));
    }

}
