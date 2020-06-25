<?php

require 'validators.php';

/**
 * Sanitize fields, takes a $_POST array sanitize each input value
 *
 * @param array $fields
 * @return array
 */
function sanitize_post(array $fields): ?array
{
    $params = [];
    foreach ($fields as $field) {
        $params[$field] = FILTER_SANITIZE_SPECIAL_CHARS;
    }
    return filter_input_array(INPUT_POST, $params);
}

/**
 * Sanitize form inputs
 *
 * @param array $form
 * @return array|null
 */
function sanitize_form_values(array $form): ?array
{
    $field_indexes = array_keys($form['fields']);

    return sanitize_post($field_indexes);
}

/**
 * Validate form based on field validators
 *
 * @param array $form
 * @param array $form_values fields indexes from POST after sanitize
 * @return bool
 */
function validate_form(array &$form, array $form_values): bool
{
    $is_valid = true;

    foreach ($form['fields'] as $field_id => &$field) {
        $field['value'] = $form_values[$field_id];

        foreach ($field['validators'] ?? [] as $validator_key => $validator) {
            if (is_array($validator)) {
                $validator_function = $validator_key;
                $params = $validator;
            } else {
                $validator_function = $validator;
            }

            $field_is_valid = $validator_function($field['value'], $field, $params ?? null);

            if (!$field_is_valid) {
                $is_valid = false;
                break;
            }
        }

    }

    if ($is_valid) {
        foreach ($form['validators'] ?? [] as $validator_id => $validator) {
            if (is_array($validator)) {
                $is_valid = $validator_id($form_values, $form, $validator);
            } else {
                $is_valid = $validator($form_values, $form);
            }

            if (!$is_valid) {
                $is_valid = false;
                break;
            }
        }
    }

    if ($is_valid) {
        if (isset($form['callbacks']['success'])) {
            $form['callbacks']['success']($form, $form_values);
        }
    } else {
        if (isset($form['callbacks']['fail'])) {
            $form['callbacks']['fail']($form, $form_values);
        }
    }

    return $is_valid;
}

