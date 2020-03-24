<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:40
 */

namespace App\Product\Application\Buy;


use App\Coin\Domain\Coin;
use App\Coin\Domain\CoinValue;
use App\Product\Domain\ProductName;

class BuyProductRequest
{
    private $product;
    private $coins = [];

    public function __construct(string $product, string ...$coins)
    {
        $this->product = new ProductName($product);

        foreach ($coins as $coin){
            $this->addCoin(new CoinValue($coin));
        };
    }

    private function addCoin($coin): void
    {
        array_push($this->coins, $coin);
    }

    public function product(): ProductName
    {
        return $this->product;
    }

    /**
     * @return CoinValue[]
     */
    public function coins(): iterable
    {
        return $this->coins;
    }
}