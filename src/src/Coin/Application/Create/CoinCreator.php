<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 24/03/2020
 * Time: 10:37
 */

namespace App\Coin\Application\Create;


use App\Coin\Domain\Coin;
use App\Coin\Domain\CoinRepository;

final class CoinCreator
{
    private $repository;

    public function __construct(CoinRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(CoinCreatorRequest $request)
    {
        $coin = Coin::create($request->name(), $request->value(), $request->stock());

        $this->repository->save($coin);

        // TODO: Publish event
    }

}