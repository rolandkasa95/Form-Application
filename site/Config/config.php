<?php
return [
    //define the database credentials
    'db' => [
        'dsn' => 'mysql:host=127.0.0.1;dbname=site',
        'user' => 'admin',
        'pass' => 'test',
    ],

    //Provide paths for the autoloader
    'autoloaderpaths' => [
        'Classes/Controllers',
        'Classes/Forms',
        'Classes/Models',
        'Classes/Views',
        'Classes/Validators',
        'Classes/Forms/Inputs',
    ],
];