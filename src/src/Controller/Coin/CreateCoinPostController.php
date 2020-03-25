<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 24/03/2020
 * Time: 10:47
 */

namespace App\Controller\Coin;


use App\Coin\Application\Create\CoinCreator;
use App\Coin\Application\Create\CoinCreatorRequest;
use App\Coin\Infrastructure\Persistance\FileCoinRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class CreateCoinPostController
{

    public function __invoke(Request $request)
    {
        $name = $request->request->get('name');
        $value = $request->request->get('value');
        $stock = $request->request->get('stock');

        $requestDTO = new CoinCreatorRequest($name, $value, $stock);

        $useCase = new CoinCreator(new FileCoinRepository());

        $useCase->create($requestDTO);

        return new JsonResponse('Coin created', 201);
    }


}