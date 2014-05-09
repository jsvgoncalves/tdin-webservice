<?php
App::uses('SecondaryTicket', 'Model');

/**
 * SecondaryTicket Test Case
 *
 */
class SecondaryTicketTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.secondary_ticket',
		'app.ticket',
		'app.department'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SecondaryTicket = ClassRegistry::init('SecondaryTicket');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SecondaryTicket);

		parent::tearDown();
	}

}
