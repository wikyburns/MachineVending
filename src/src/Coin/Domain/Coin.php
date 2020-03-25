<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 15:55
 */

namespace App\Coin\Domain;


final class Coin
{

    private $name;
    private $value;
    private $stock;

    public function __construct(CoinName $coin, CoinValue $value, CoinStock $stock)
    {
        $this->name = $coin;
        $this->value = $value;
        $this->stock = $stock;
    }

    public static function create(CoinName $coin, CoinValue $value, CoinStock $stock): self
    {
        $coinCreated = new self($coin, $value, $stock);

        // TODO: Create domain event(Coin created)

        return $coinCreated;
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

    public function increaseStock(): void
    {
        $this->stock = new CoinStock($this->stock->value() + 1);
    }

    public function decreaseStock(): void
    {
        $stockValue = $this->stock->value();

        if($this->stock->value() <= 0)
            throw new \DomainException('No coin stock '.$this->name->value());

        $this->stock = new CoinStock($stockValue - 1);

    }
}