<?php
return [
    //define the database credentials
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=dbname',
        'user' => 'root',
        'pass' => 'secret',
    ],

    //Provide paths for the autoloader
    'autoloaderpaths' => [
        'Classes',
        'Classes/Controllers',
        'Classes/Forms',
        'Classes/Models',
        'Classes/Views',
        'Classes/Validators',
        'Classes/Forms/Inputs',
    ],
];