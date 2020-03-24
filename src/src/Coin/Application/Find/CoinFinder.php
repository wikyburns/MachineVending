<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:31
 */

namespace App\Coin\Application\Find;


use App\Coin\Domain\Coin;
use App\Coin\Domain\CoinNotExist;
use App\Coin\Domain\CoinRepository;
use App\Coin\Domain\CoinValue;

class CoinFinder
{

    private $repository;

    public function __construct(CoinRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find(CoinValue $value): ?Coin
    {
        $coin = $this->repository->findByValue($value);

        if (null === $coin) {
            throw new CoinNotExist($value);
        }

        return $coin;
    }

}