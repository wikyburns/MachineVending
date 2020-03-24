<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 24/03/2020
 * Time: 11:41
 */

namespace App\Controller\Coin;


use App\Coin\Application\Find\CoinFinder;
use App\Coin\Domain\CoinValue;
use App\Coin\Infrastructure\Persistance\FileCoinRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FindCoinGetController
{

    public function __invoke(Request $request)
    {
        $coinValue = $request->query->get('coin');

        $useCase = new CoinFinder(new FileCoinRepository());

        $coin = $useCase->find(new CoinValue($coinValue));

        return new JsonResponse(
            array(
                "name" => $coin->name()->value(),
                "value" => $coin->value()->value(),
                "stock" => $coin->stock()->value()
            )
        );
    }

}