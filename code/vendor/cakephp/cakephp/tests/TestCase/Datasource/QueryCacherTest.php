<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Test\TestCase\Datasource;

use Cake\Cache\Cache;
use Cake\Datasource\QueryCacher;
use Cake\TestSuite\TestCase;

/**
 * Query cacher test
 */
class QueryCacherTest extends TestCase
{

	/**
	 * Setup method
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();
		$this->engine = $this->getMock('Cake\Cache\CacheEngine');
		$this->engine->expects($this->any())
			->method('init')
			->will($this->returnValue(true));

		Cache::config('queryCache', $this->engine);
		Cache::enable();
	}

	/**
	 * Teardown method
	 *
	 * @return void
	 */
	public function tearDown()
	{
		parent::tearDown();
		Cache::drop('queryCache');
	}

	/**
	 * Test fetching with a function to generate the key.
	 *
	 * @return void
	 */
	public function testFetchFunctionKey()
	{
		$this->_mockRead('my_key', 'A winner');
		$query = $this->getMock('stdClass');

		$cacher = new QueryCacher(function ($q) use ($query) {
			$this->assertSame($query, $q);
			return 'my_key';
		}, 'queryCache');

		$result = $cacher->fetch($query);
		$this->assertEquals('A winner', $result);
	}

	/**
	 * Test fetching with a function to generate the key but the function is poop.
	 *
	 * @expectedException \RuntimeException
	 * @expectedExceptionMessage Cache key functions must return a string. Got false.
	 * @return void
	 */
	public function testFetchFunctionKeyNoString()
	{
		$this->_mockRead('my_key', 'A winner');
		$query = $this->getMock('stdClass');

		$cacher = new QueryCacher(function ($q) {
			return false;
		}, 'queryCache');

		$cacher->fetch($query);
	}

	/**
	 * Test fetching with a cache instance.
	 *
	 * @return void
	 */
	public function testFetchCacheHitStringEngine()
	{
		$this->_mockRead('my_key', 'A winner');
		$cacher = new QueryCacher('my_key', 'queryCache');
		$query = $this->getMock('stdClass');
		$result = $cacher->fetch($query);
		$this->assertEquals('A winner', $result);
	}

	/**
	 * Test fetching with a cache hit.
	 *
	 * @return void
	 */
	public function testFetchCacheHit()
	{
		$this->_mockRead('my_key', 'A winner');
		$cacher = new QueryCacher('my_key', $this->engine);
		$query = $this->getMock('stdClass');
		$result = $cacher->fetch($query);
		$this->assertEquals('A winner', $result);
	}

	/**
	 * Test fetching with a cache miss.
	 *
	 * @return void
	 */
	public function testFetchCacheMiss()
	{
		$this->_mockRead('my_key', false);
		$cacher = new QueryCacher('my_key', $this->engine);
		$query = $this->getMock('stdClass');
		$result = $cacher->fetch($query);
		$this->assertNull($result, 'Cache miss should not have an isset() return.');
	}

	/**
	 * Helper for building mocks.
	 */
	protected function _mockRead($key, $value = false)
	{
		$this->engine->expects($this->any())
			->method('read')
			->with($key)
			->will($this->returnValue($value));
	}
}
