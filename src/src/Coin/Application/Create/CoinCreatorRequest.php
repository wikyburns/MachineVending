<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 24/03/2020
 * Time: 10:38
 */

namespace App\Coin\Application\Create;


use App\Coin\Domain\CoinName;
use App\Coin\Domain\CoinStock;
use App\Coin\Domain\CoinValue;

class CoinCreatorRequest
{
    private $name;
    private $value;
    private $stock;

    public function __construct(string $name, float $value, int $stock)
    {
        $this->name = new CoinName($name);
        $this->value= new CoinValue($value);
        $this->stock= new CoinStock($stock);
    }

    public function name(): CoinName
    {
        return $this->name;
    }

    public function value(): CoinValue
    {
        return $this->value;
    }

    public function stock(): CoinStock
    {
        return $this->stock;
    }

}