<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippedStockTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippedStockTable Test Case
 */
class ShippedStockTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShippedStockTable
     */
    public $ShippedStock;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ShippedStock',
        'app.AmazonSkus',
        'app.ShipmentPlans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShippedStock') ? [] : ['className' => ShippedStockTable::class];
        $this->ShippedStock = TableRegistry::getTableLocator()->get('ShippedStock', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShippedStock);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
