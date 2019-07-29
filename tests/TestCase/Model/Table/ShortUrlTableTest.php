<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShortUrlTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShortUrlTable Test Case
 */
class ShortUrlTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShortUrlTable
     */
    public $ShortUrl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ShortUrl'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShortUrl') ? [] : ['className' => ShortUrlTable::class];
        $this->ShortUrl = TableRegistry::getTableLocator()->get('ShortUrl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShortUrl);

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
}
