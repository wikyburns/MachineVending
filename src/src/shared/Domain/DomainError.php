<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 12:33
 */

namespace App\shared\Domain;

abstract class DomainError extends \DomainException
{
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract public function errorCode(): string;
    abstract protected function errorMessage(): string;

}