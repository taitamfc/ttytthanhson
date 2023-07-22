<?php

/**
 * @Project BCB SOLUTIONS
 * @Author Mr Duy <vuduy1502@gmail.com>
 * @Copyright (C) 2023 Mr Duy. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 19 Mar 2023 05:56:44 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$module_version = array(
    'name' => 'Fives',
    'modfuncs' => 'create_evaluation,create_evaluation_details,
	create_question,edit_evaluation,edit_question_type,evaluation_details_form,
	first_setup,setting,
	main,detail,login',
    //'change_alias' => 'main,detail,search',
    //'submenu' => 'main,detail,search',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.3.03',
    'date' => 'Sun, 19 Mar 2023 05:56:44 GMT',
    'author' => 'Mr Duy (vuduy1502@gmail.com)',
    'uploads_dir' => array($module_name),
    'note' => 'Module Fives'
);
