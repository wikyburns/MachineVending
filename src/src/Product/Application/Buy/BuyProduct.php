<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:49
 */

namespace App\Product\Application\Buy;

use App\Coin\Domain\CoinRepository;
use App\Coin\Domain\CoinValue;
use App\Product\Domain\Product;
use App\Product\Domain\ProductRepository;
use App\Storage\CoinStorage;

final class BuyProduct
{
    private $productRepository;
    private $coinRepository;

    private $coins;
    private $product;

    private $coinStorage;

    public function __construct(ProductRepository $productRepository, CoinRepository $coinRepository)
    {
        $this->productRepository = $productRepository;
        $this->coinRepository = $coinRepository;
        $this->coinStorage = new CoinStorage($coinRepository);
    }

    public function buy(BuyProductRequest $request)
    {
        $this->coins   = $request->coins();
        $this->product = $this->productRepository->findByName($request->product());
        $product = $this->product;

        $this->coinStorage->addCoins(...$request->coins());

        // Check if has enought money for the product
        $this->enoughtMoneyForProduct($product);

        // returns an array with the coins returned by machine
        $returnMoney = $this->returnMoney(number_format($this->coinStorage->totalValue() - $product->price()->value(), 2));

        // Use the needed coins inserted
        $this->coinStorage->useCoins($this->product->price()->value());

        return array(
            "product" => $this->product->name()->value(),
            "product_price" => $this->product->price()->value(),
            "value_inserted" => (float) number_format($this->coinStorage->totalValue(), 2),
            "coins_inserted" => $this->coinStorage->toArrayCoins(),
            "coins_returned" => $returnMoney
        );

        // TODO: Publish event
    }

    private function enoughtMoneyForProduct(Product $product): void
    {
        if($product->price()->value() > $this->coinStorage->totalValue() )
            throw new \DomainException('Price of product is greather than total value inserted');
    }

    private function returnMoney(string $release)
    {

        // TODO: Refactor this part, a lot of code for simple logic.
        $returnMoney = $release;
        $coinsReturned = array();

        while($returnMoney > 0) {
            if($returnMoney >= 1) {

                $oneEuro = $this->coinRepository->findByValue(new CoinValue(1.00));
                $oneEuro->decreaseStock();
                $this->coinRepository->save($oneEuro);
                $returnMoney -= $oneEuro->value()->value();
                array_push($coinsReturned, $oneEuro->value()->value());

            } else if($returnMoney >= 0.25) {

                $twentyFiveCent = $this->coinRepository->findByValue(new CoinValue(0.25));
                $twentyFiveCent->decreaseStock();
                $this->coinRepository->save($twentyFiveCent);
                $returnMoney -= $twentyFiveCent->value()->value();
                array_push($coinsReturned, $twentyFiveCent->value()->value());

            } else if($returnMoney >= 0.10) {

                $tenCents = $this->coinRepository->findByValue(new CoinValue(0.10));
                $tenCents->decreaseStock();
                $this->coinRepository->save($tenCents);
                $returnMoney -= $tenCents->value()->value();
                array_push($coinsReturned, $tenCents->value()->value());

            } else {

                $fiveCents = $this->coinRepository->findByValue(new CoinValue(0.05));
                $fiveCents->decreaseStock();
                $this->coinRepository->save($fiveCents);
                $returnMoney -= $fiveCents->value()->value();
                array_push($coinsReturned, $fiveCents->value()->value());

            }
        }

        return $coinsReturned;

    }
}