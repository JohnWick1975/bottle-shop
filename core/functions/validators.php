<?php

/**
 *checking validate field is empty or not
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_not_empty($field_value, &$field): bool
{
    if (!$field_value) {
        $field['error'] = 'Palikote tuščią laukelį';
        return false;
    }

    return true;
}

/**
 * checking entered value is numeric
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_numeric($field_value, &$field): bool
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Laukelis turi buti skaicius';
        return false;
    }

    return true;
}

/**
 * check name has space between first and last names
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_name_has_space($field_value, &$field): bool
{
    if (!strpos(trim($field_value), " ")) {
        $field['error'] = 'Vardas ir pavardė turi būti atskirti tarpu';
        return false;
    } else {
        return true;
    }
}

/**
 * Validate field number range
 *
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_range($field_value, array &$field, array $params): bool
{
    if ($field_value >= $params['min'] && $field_value <= $params['max']) {
        return true;
    } else {
        $field['error'] = "Netinkamas skaičius skaičius turi būti nuo {$params['min']} iki {$params['max']}";
        return false;
    }
}

/**
 * @param $field_value
 * @param array $field
 * @return bool
 */
function validate_field_has_upper_case($field_value, array &$field): bool
{
    if (!preg_match('/[A-Z]/', $field_value)) {
        $field['error'] = "Slaptažodyje turi būti Didžioji raidė";
        return false;
    }

    return true;
}

/**
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_length($field_value, array &$field, array $params): bool
{
    if (isset($params['max']) && strlen($field_value) >= $params['max']) {
        $field['error'] = "Laukelis turi būti iki {$params['max']} simbolių";
        return false;
    }

    if (isset($params['min']) && strlen($field_value) <= $params['min']) {
        $field['error'] = "Laukelis turi būti nuo {$params['min']} simbolių";
        return false;
    }

    return true;
}

function validate_fields_match(array $filtered_input, array &$form, array $params): bool {
    foreach ($params as $field_id) {
        $reference_value = $reference_value ?? $filtered_input[$field_id];

        if ($reference_value !== $filtered_input[$field_id]) {
            $form['fields'][$field_id]['error'] = 'Laukeliai nesutampa';

            return false;
        }
    }

    return true;
}

function validate_login(array $filtered_input, array &$form): bool {
    $user = App\App::$db->getRowWhere('users', ['email' => $filtered_input['email']]);

    if (!$user || !password_verify($filtered_input['password'], $user['password'])) {
        $form['fields']['password']['error'] = 'Neteisingas slaptažodis';
        return false;
    }

    return true;
}

function validate_field_unique(array $form_values, array &$form, array $params): bool {
    $unique_field = $params['field'];
    $user = App\App::$db->getRowWhere('users', [$unique_field => $form_values[$unique_field]]);

    if ($user) {
        $form['fields'][$unique_field]['error'] = 'Field is not unique';
        return false;
    }

    return true;
}
