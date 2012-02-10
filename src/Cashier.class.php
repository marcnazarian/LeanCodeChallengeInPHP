<?php

class Cashier {
  
  const REDUCTION_FOR_SECOND_LOTS_OF_CHERRIES = 20;
  
  var $total = 0;
  var $nbLotsOfCherries = 0;
  var $nbLotsOfBananas = 0;
    
  public function checkout() {
    while (true) {
      $input = readline();
      echo $this->scanItemAndReturnTotal($input) . PHP_EOL;
    }
  }
  
  public function scanItemAndReturnTotal($input) {
      $items = explode(",", $input);
      foreach ($items as $item) {
        $this->total += $this->scanItem($item);
      }
      return $this->total;
  }
  
  public function scanItem($item) {
      if ($item == "Apples" || $item == "Pommes" || $item == "Mele") {
          return 100;
      } elseif ($item == "Cherries") {
          $this->nbLotsOfCherries++;
          if ($this->nbLotsOfCherries == 2) {
              $this->nbLotsOfCherries = 0;
              return 75 - self::REDUCTION_FOR_SECOND_LOTS_OF_CHERRIES;
          } else {
              return 75;
          }
      } elseif ($item == "Bananas") {
          $this->nbLotsOfBananas++;
          if ($this->nbLotsOfBananas == 2) {
              $this->nbLotsOfBananas = 0;
              return 0;
          } else {
              return 150;
          }
      }
      
  }
  
}