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
    
//    /** @test */
//    public function itemsSeparatedByCommaAreNowAccepted() {
//        $cashier = new Cashier();
//        $this->assertEquals(325, $cashier->scanItemAndReturnTotal("Apples,Cherries,Bananas"));
//    }
//    
//    /** @test */
//    public function twoLotsOfCherriesStillGet20pOffWithCsvFormat() {
//        $cashier = new Cashier();
//        $this->assertEquals(130, $cashier->scanItemAndReturnTotal("Cherries,Cherries"));
//    }
    
    /** @test */
    public function twoLotsOfCherriesGet30pOffAndGetSecondBananasForFree() {
        $cashier = new Cashier();
        $this->assertEquals(75, $cashier->scanItemAndReturnTotal("Cherries"));
        $this->assertEquals(120, $cashier->scanItemAndReturnTotal("Cherries"));
        $this->assertEquals(270, $cashier->scanItemAndReturnTotal("Bananas"));
        $this->assertEquals(270, $cashier->scanItemAndReturnTotal("Bananas"));
    }
    
}