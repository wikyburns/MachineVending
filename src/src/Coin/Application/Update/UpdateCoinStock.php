<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 24/03/2020
 * Time: 11:29
 */

namespace App\Coin\Application\Update;


use App\Coin\Application\Find\CoinFinder;
use App\Coin\Domain\CoinRepository;
use App\Coin\Domain\CoinValue;

final class UpdateCoinStock
{
    private $repository;
    private $finder;

    public function __construct(CoinRepository $repository)
    {
        $this->repository = $repository;
        $this->finder = new CoinFinder($repository);
    }

    public function update(CoinValue $value): void
    {
        $coin = $this->finder->find($value);

        $coin->increaseStock();

        $this->repository->save($coin);
    }
}