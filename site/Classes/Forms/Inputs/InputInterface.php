<?php

namespace Forms\Inputs;
/**
 * Input Interface
 */
interface InputInterface
{
    /**
     * InputInterface constructor.
     */
    public function __construct();

    /**
     * @return string
     */
    public function getInput();
}