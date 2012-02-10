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
    public function itemsSeparatedByCommaAreNowAccepted() {
        $cashier = new Cashier();
        $this->assertEquals(325, $cashier->scanItemAndReturnTotal("Apples,Cherries,Bananas"));
    }
    
    /** @test */
    public function threePommesIsDiscountedTo200() {
        $cashier = new Cashier();
        $this->assertEquals(100, $cashier->scanItemAndReturnTotal("Pommes"));
        $this->assertEquals(200, $cashier->scanItemAndReturnTotal("Pommes"));
        $this->assertEquals(200, $cashier->scanItemAndReturnTotal("Pommes"));
    }
    
    /** @test */
    public function twoMelaIsDiscountedTo150() {
        $cashier = new Cashier();
        $this->assertEquals(100, $cashier->scanItemAndReturnTotal("Mele"));
        $this->assertEquals(150, $cashier->scanItemAndReturnTotal("Mele"));
    }
    
    /** @test */
    public function fifthPieceOfFruitGetAFurther200OffTheBill() {
        $cashier = new Cashier();
        $this->assertEquals(250, $cashier->scanItemAndReturnTotal("Mele,Pommes,Pommes,Mele"));
        $this->assertEquals(200, $cashier->scanItemAndReturnTotal("Bananas"));
    }
    
    /** @test */
    public function fourApplesGetsAnother100OffTheBill() {
        $cashier = new Cashier();
        $this->assertEquals(150, $cashier->scanItemAndReturnTotal("Mele,Pommes,Pommes,Apples,Mele"));
    }
    
}