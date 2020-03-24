<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:26
 */

namespace App\Coin\Domain;


interface CoinRepository
{
    public function save(Coin $coin): void;
    public function findByValue(CoinValue $value): ?Coin;
}