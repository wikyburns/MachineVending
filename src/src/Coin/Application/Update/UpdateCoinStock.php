<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 24/03/2020
 * Time: 11:29
 */

namespace App\Coin\Application\Update;


use App\Coin\Domain\CoinRepository;
use App\Coin\Domain\CoinValue;

class UpdateCoinStock
{
    private $repository;

    public function __construct(CoinRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update(CoinValue $value): void
    {
        $coin = $this->repository->findByValue($value);

        $coin->increaseStock();

        $this->repository->save($coin);
    }
}