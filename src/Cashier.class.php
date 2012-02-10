<?php

class Cashier {
    
  var $total = 0;
  var $nbLotsOfCherries = 0;
    
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
      if ($item == "Apples") {
          return 100;
      } elseif ($item == "Cherries") {
          $this->nbLotsOfCherries++;
          if ($this->nbLotsOfCherries == 2) {
              $this->nbLotsOfCherries = 0;
              return 75 - 20;
          } else {
              return 75;
          }
          
      } elseif ($item == "Bananas") {
          return 150;
      }
      
  }
  
}