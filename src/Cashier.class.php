<?php

class Cashier {
    
  var $total = 0;
    
  public function checkout() {
    while (true) {
      $input = readline();
      echo scanItemAndReturnTotal($input) . PHP_EOL;
    }
  }
  
  public function scanItemAndReturnTotal($item) {
      $this->total += $this->scanItem($item);
      return $this->total;
  }
  
  public function scanItem($item) {
      if ($item == "Apples") {
          return 100;
      } elseif ($item == "Cherries") {
          return 75;
      } elseif ($item == "Bananas") {
          return 150;
      }
      
  }
  
}