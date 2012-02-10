<?php

require_once dirname(__FILE__) . '/../src/Cashier.class.php';

class CashierTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function appleCost100() {
        $cashier = new Cashier();
        $this->assertEquals(100, $cashier->scanItem("Apples"));
    }

    /** @test */
    public function cherriesCost75() {
        $cashier = new Cashier();
        $this->assertEquals(75, $cashier->scanItem("Cherries"));
    }
    
    /** @test */
    public function bananasCost150() {
        $cashier = new Cashier();
        $this->assertEquals(150, $cashier->scanItem("Bananas"));
    }
    
    /** @test */
    public function printCartTotal() {
        $cashier = new Cashier();
        $this->assertEquals(100, $cashier->scanItemAndReturnTotal("Apples"));
        $this->assertEquals(175, $cashier->scanItemAndReturnTotal("Cherries"));
        $this->assertEquals(250, $cashier->scanItemAndReturnTotal("Cherries"));
    }
    
}