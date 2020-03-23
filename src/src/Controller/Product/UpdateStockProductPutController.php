<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 12:01
 */

namespace App\Controller\Product;


use App\Product\Application\Update\ProductUpdateStock;
use App\Product\Domain\ProductName;
use App\Product\Domain\ProductStock;
use App\Product\Infrastructure\Persistance\FileProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdateStockProductPutController
{

    public function __invoke(Request $request)
    {
        $name = $request->request->get('product');
        $stock = $request->request->get('stock');

        $useCase = new ProductUpdateStock(new FileProductRepository());

        $useCase->update(
            new ProductName($name),
            new ProductStock($stock)
        );

        return new JsonResponse('Stock product updated', 200);
    }

}