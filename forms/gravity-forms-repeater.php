<?php

// Adjust your form ID to 1
add_filter( 'gform_form_post_get_meta_1', 'add_fields_from_another_form' );
function add_fields_from_another_form( $form ) {
 
    $repeater = GF_Fields::create( array(
        'type'       => 'repeater',
        'id'         => 1000,
        'formId'     => $form['id'],
        'label'      => 'Line Items',
        'pageNumber' => 1, // Ensure this is correct
    ) );
 
    // Sourcing fields from Form ID 3
    $another_form = GFAPI::get_form( 3 );
    foreach ( $another_form['fields'] as $field ) {
        $field->id         = $field->id + 1000;
        $field->formId     = $form['id'];
        $field->pageNumber = 1; // Ensure this is correct
 
        if ( is_array( $field->inputs ) ) {
            foreach ( $field->inputs as &$input ) {
                $input['id'] = (string) ( $input['id'] + 1000 );
            }
        }
    }
 
    $repeater->fields = $another_form['fields'];
    $form['fields'][] = $repeater;
 
    return $form;
}

?>