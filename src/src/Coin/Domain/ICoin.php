<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:33
 */

namespace App\Coin\Domain;


interface ICoin
{
    public function value(): float;
}