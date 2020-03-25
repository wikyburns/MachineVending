<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:15
 */

namespace App\Controller\Product;

use App\Coin\Infrastructure\Persistance\FileCoinRepository;
use App\Product\Application\Buy\BuyProduct;
use App\Product\Application\Buy\BuyProductRequest;
use App\Product\Infrastructure\Persistance\FileProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class BuyProductGetController
{

    public function __invoke(Request $request)
    {
        $coins = $request->query->get('coins');
        $product = $request->query->get('product');

        $coinsExploded  = explode(',', $coins);

        $requestDTO = new BuyProductRequest($product, ...$coinsExploded);
        $useCase = new BuyProduct(new FileProductRepository(), new FileCoinRepository());

        $result = $useCase->buy($requestDTO);

        return new JsonResponse($result, 200);
    }

}