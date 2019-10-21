<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AmazonSkuTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AmazonSkuTable Test Case
 */
class AmazonSkuTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AmazonSkuTable
     */
    public $AmazonSku;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AmazonSku',
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
        $config = TableRegistry::getTableLocator()->exists('AmazonSku') ? [] : ['className' => AmazonSkuTable::class];
        $this->AmazonSku = TableRegistry::getTableLocator()->get('AmazonSku', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AmazonSku);

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
