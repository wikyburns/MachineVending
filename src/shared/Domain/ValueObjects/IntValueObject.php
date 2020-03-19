<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 11:53
 */
declare(strict_types = 1);

abstract class IntValueObject
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }
}