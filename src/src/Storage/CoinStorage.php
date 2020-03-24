<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 24/03/2020
 * Time: 15:13
 */

namespace App\Storage;


use App\Coin\Domain\Coin;
use App\Coin\Domain\CoinNotExist;
use App\Coin\Domain\CoinRepository;
use App\Coin\Domain\CoinValue;

final class CoinStorage
{

    private $repository;

    private $coins = array();
    private $totalValue;

    public function __construct(CoinRepository $repository)
    {
        $this->repository = $repository;
    }

    public function addCoins(CoinValue ...$coins): void
    {
        foreach ($coins as $coin) {
            $coinFound = $this->repository->findByValue($coin);

            if (null === $coinFound) {
                throw new CoinNotExist($coin);
            }

            array_push($this->coins, $coinFound);
            $this->increaseTotalValue($coinFound);

        }
    }

    private function increaseTotalValue(Coin $coin): void
    {
        $this->totalValue += $coin->value()->value();
    }

    private function decreaseTotalValue(Coin $coin): void
    {
        $this->totalValue -= $coin->value()->value();
    }

    /**
     * @return Coin[]
     */
    public function coins() : iterable
    {
        return $this->coins;
    }

    public function totalValue(): float
    {
        return $this->totalValue;
    }

    public function useCoins(): void
    {
        foreach($this->coins() as $coinKey => $coin) {
            $coinInMachine = $this->repository->findByValue($coin->value());

            $coinInMachine->increaseStock();
            $this->repository->save($coinInMachine);

        }

    }

    public function toArrayCoins(): iterable
    {
        $insertedCoins = array();

        foreach ($this->coins() as $coinInserted) {
            array_push($insertedCoins, $coinInserted->value()->value());
        }

        return $insertedCoins;
    }


}