<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcessingPlansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcessingPlansTable Test Case
 */
class ProcessingPlansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProcessingPlansTable
     */
    public $ProcessingPlans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProcessingPlans',
        'app.Creaters',
        'app.Workers',
        'app.ProcessedStock'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProcessingPlans') ? [] : ['className' => ProcessingPlansTable::class];
        $this->ProcessingPlans = TableRegistry::getTableLocator()->get('ProcessingPlans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProcessingPlans);

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
