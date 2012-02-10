<?php

class Cashier {
  
  const UNIT_PRICE_FOR_MELE = 100;
  const DISCOUNT_FOR_SECOND_LOTS_OF_CHERRIES = 20;
  const DISCOUNT_FOR_SECOND_MELE = 50;
  
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
        $this->applyAdditionalDiscount();
      }
      return $this->total;
  }
  
  public function scanItem($item) {
      if ($item == "Apples") {
          $this->nbApples++;
          return 100;
      } elseif ($item == "Pommes") {
          $this->nbApples++;
          return $this->getPriceForPommes();
      } elseif ($item == "Mele") {
          $this->nbApples++;
          return $this->getPriceForMele();
      } elseif ($item == "Cherries") {
          return $this->getPriceForCherries();
      } elseif ($item == "Bananas") {
          return $this->getPriceForBananas();
      }
  }
  
  private function getPriceForPommes() {
      $this->nbLotsOfPommes++;
      if ($this->nbLotsOfPommes == 3) {
          $this->nbLotsOfPommes = 0;
          return 0;
      } else {
          return 100;
      }
  }
  
  private function getPriceForMele() {
      $price = self::UNIT_PRICE_FOR_MELE;
      $this->nbLotsOfMele++;
      if ($this->nbLotsOfMele == 2) {
          $this->nbLotsOfMele = 0;
          $price -= self::DISCOUNT_FOR_SECOND_MELE;
      }
      return $price;
  }
  
  private function getPriceForCherries() {
      $this->nbLotsOfCherries++;
      if ($this->nbLotsOfCherries == 2) {
          $this->nbLotsOfCherries = 0;
          return 75 - self::DISCOUNT_FOR_SECOND_LOTS_OF_CHERRIES;
      } else {
          return 75;
      }
  }
  
  private function getPriceForBananas() {
      $this->nbLotsOfBananas++;
      if ($this->nbLotsOfBananas == 2) {
          $this->nbLotsOfBananas = 0;
          return 0;
      } else {
          return 150;
      }
  }
  
  private function applyAdditionalDiscount() {
     if ($this->nbPieceOfFruit == 5) {
         $this->nbPieceOfFruit = 0;
         $this->total -= 200;
     }
     if ($this->nbApples == 4) {
         $this->nbApples = 0;
         $this->total -= 100;
     }
  }
  
}