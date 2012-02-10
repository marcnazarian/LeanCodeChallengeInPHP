<?php

class Cashier {
  
  const UNIT_PRICE_FOR_APPLES   = 100;
  const UNIT_PRICE_FOR_MELE     = 100;
  const UNIT_PRICE_FOR_POMMES   = 100;
  const UNIT_PRICE_FOR_CHERRIES =  75;
  const UNIT_PRICE_FOR_BANANAS  = 150;
  
  const DISCOUNT_FOR_SECOND_LOTS_OF_CHERRIES = 20;
  const DISCOUNT_FOR_SECOND_MELE = 50;
  const DISCOUNT_FOR_THIRD_POMMES = 100;
  
  const ADDITIONAL_DISCOUNT_FOR_FOUR_APPLES = 100;
  const ADDITIONAL_DISCOUNT_FOR_FIVE_PIECE_OF_FRUIT = 200;
  
  var $total = 0;
  
  var $nbPieceOfFruit = 0;
  var $nbApples = 0;
  
  var $nbLotsOfCherries = 0;
  var $nbLotsOfBananas = 0;
  var $nbLotsOfPommes = 0;
  var $nbLotsOfMele = 0;
    
  public function checkout() {
    while (true) {
      $input = readline();
      echo $this->scanItemAndReturnTotal($input) . PHP_EOL;
    }
  }
  
  public function scanItemAndReturnTotal($input) {
      $items = explode(",", $input);
      foreach ($items as $item) {
        $this->nbPieceOfFruit++;
        $this->total += $this->scanItem($item);
        $this->applyAdditionalDiscount($item);
      }
      return $this->total;
  }
  
  public function scanItem($item) {
      if ($this->isAnApple($item)) {
          $this->nbApples++;
      }
      if ($item == "Apples") {
          return self::UNIT_PRICE_FOR_APPLES;
      } elseif ($item == "Pommes") {
          return $this->getPriceForPommes();
      } elseif ($item == "Mele") {
          return $this->getPriceForMele();
      } elseif ($item == "Cherries") {
          return $this->getPriceForCherries();
      } elseif ($item == "Bananas") {
          return $this->getPriceForBananas();
      }
  }
  
  private function isAnApple($item) {
      return $item == "Apples" || $item == "Pommes" || $item == "Mele";
  }
  
  private function getPriceForPommes() {
      $price = self::UNIT_PRICE_FOR_POMMES;
      $this->nbLotsOfPommes++;
      if ($this->nbLotsOfPommes %3 == 0) {
          $price -= self::DISCOUNT_FOR_THIRD_POMMES;
      }
      return $price;
  }
  
  private function getPriceForMele() {
      $price = self::UNIT_PRICE_FOR_MELE;
      $this->nbLotsOfMele++;
      if ($this->nbLotsOfMele %2 == 0) {
          $price -= self::DISCOUNT_FOR_SECOND_MELE;
      }
      return $price;
  }
  
  private function getPriceForCherries() {
      $price = self::UNIT_PRICE_FOR_CHERRIES;
      $this->nbLotsOfCherries++;
      if ($this->nbLotsOfCherries %2 == 0) {
          $price -= self::DISCOUNT_FOR_SECOND_LOTS_OF_CHERRIES;
      }
      return $price;
  }
  
  private function getPriceForBananas() {
      $price = self::UNIT_PRICE_FOR_BANANAS;
      $this->nbLotsOfBananas++;
      if ($this->nbLotsOfBananas % 2 == 0) {
          $this->nbLotsOfBananas = 0;
          $price = 0;
      }
      return $price;
  }
  
  private function applyAdditionalDiscount($item) {
     $this->applyAdditionalDiscountForFourthApple($item);
     $this->applyAdditionalDiscountForFivePieceOfFruit();
  }
  
  private function applyAdditionalDiscountForFourthApple($item) {
      if ($this->isAnApple($item) && $this->nbApples % 4 == 0) {
          $this->total -= self::ADDITIONAL_DISCOUNT_FOR_FOUR_APPLES;
      }
  }
  
  private function applyAdditionalDiscountForFivePieceOfFruit() {
      if ($this->nbPieceOfFruit % 5 == 0) {
          $this->total -= self::ADDITIONAL_DISCOUNT_FOR_FIVE_PIECE_OF_FRUIT;
      }
  }
  
}