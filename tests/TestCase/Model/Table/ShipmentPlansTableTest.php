<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShipmentPlansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShipmentPlansTable Test Case
 */
class ShipmentPlansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShipmentPlansTable
     */
    public $ShipmentPlans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ShipmentPlans',
        'app.Creaters',
        'app.Workers',
        'app.ShippedStock'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShipmentPlans') ? [] : ['className' => ShipmentPlansTable::class];
        $this->ShipmentPlans = TableRegistry::getTableLocator()->get('ShipmentPlans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShipmentPlans);

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
