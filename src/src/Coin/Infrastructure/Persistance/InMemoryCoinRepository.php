<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 25/03/2020
 * Time: 10:01
 */

namespace App\Coin\Infrastructure\Persistance;


use App\Coin\Domain\Coin;
use App\Coin\Domain\CoinRepository;
use App\Coin\Domain\CoinValue;

class InMemoryCoinRepository implements CoinRepository
{
    /**
     * @var Coin[]
     */
    private $coins = array();

    public function findByValue(CoinValue $value): ?Coin
    {
        $coinFound = null;

        foreach ($this->coins as $coin) {
            if($coin->value()->value() === $value->value()) {
                $coinFound = $coin;
                break;
            }
        }

        return $coinFound;
    }

    public function save(Coin $coin): void
    {
        array_push($this->coins, $coin);
    }
}