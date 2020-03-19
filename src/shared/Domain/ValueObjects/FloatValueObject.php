<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 11:53
 */
declare(strict_types = 1);

abstract class FloatValueObject
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

}