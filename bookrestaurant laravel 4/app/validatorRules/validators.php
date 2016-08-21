<?php

/*
* app/validators.php
*/

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[\pL\s]+$/u', $value);
});
/*lang/xx/validation.php:


/*
|--------------------------------------------------------------------------
| Custom Validation Rules
|--------------------------------------------------------------------------
|
| Custom rules created in app/validators.php
|
*/
/*"alpha_spaces"     => "The :attribute may only contain letters and spaces.",

Use it as usual:

$rules = array(
        'name' => 'required|alpha_spaces',
        );
*/