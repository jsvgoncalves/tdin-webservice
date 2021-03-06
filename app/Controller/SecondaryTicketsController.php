<?php
App::uses('AppController', 'Controller');
/**
 * SecondaryTickets Controller
 *
 * @property SecondaryTicket $SecondaryTicket
 * @property PaginatorComponent $Paginator
 */
class SecondaryTicketsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
 * beforeFilter method
 *
 * allows the add() action to be shown even without login.
 */
	function beforeFilter()	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'add', 'edit', 'getLastTickets');
	}	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SecondaryTicket->recursive = 0;
		$this->set('secondaryTickets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SecondaryTicket->exists($id)) {
			throw new NotFoundException(__('Invalid secondary ticket'));
		}
		$options = array('conditions' => array('SecondaryTicket.' . $this->SecondaryTicket->primaryKey => $id));
		$this->set('secondaryTicket', $this->SecondaryTicket->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SecondaryTicket->create();
			if ($this->SecondaryTicket->save($this->request->data)) {
				$this->Session->setFlash(__('The secondary ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secondary ticket could not be saved. Please, try again.'));
			}
		}
		$tickets = $this->SecondaryTicket->Ticket->find('list');
		$departments = $this->SecondaryTicket->Department->find('list');
		$this->set(compact('tickets', 'departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SecondaryTicket->exists($id)) {
			throw new NotFoundException(__('Invalid secondary ticket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SecondaryTicket->save($this->request->data)) {
				$this->Session->setFlash(__('The secondary ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secondary ticket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SecondaryTicket.' . $this->SecondaryTicket->primaryKey => $id));
			$this->request->data = $this->SecondaryTicket->find('first', $options);
		}
		$tickets = $this->SecondaryTicket->Ticket->find('list');
		$departments = $this->SecondaryTicket->Department->find('list');
		$this->set(compact('tickets', 'departments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SecondaryTicket->id = $id;
		if (!$this->SecondaryTicket->exists()) {
			throw new NotFoundException(__('Invalid secondary ticket'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SecondaryTicket->delete()) {
			$this->Session->setFlash(__('The secondary ticket has been deleted.'));
		} else {
			$this->Session->setFlash(__('The secondary ticket could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * getLastTickets method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function getLastTickets($id = null, $date = null) {
		if (!$this->SecondaryTicket->Department->exists($id)) {
			throw new NotFoundException(__('Invalid department'));
		}
		$date = base64_decode($date);
		//$this->SecondaryTicket->recursive = 0;
		$this->SecondaryTicket->contain(array(
				'Ticket' => array(
						'User' => array('id','name','email'),
						'Solver' => array('id','name','email')
				)
			)
		);
		$options = 
			array('conditions' => 
				array(
					'SecondaryTicket.department_id' => $id,
					'SecondaryTicket.created >' => date('Y-m-d H:i:s', strtotime($date))
				)
			);

		$secondaryTickets = $this->SecondaryTicket->find('all', $options);
		$this->set(array(
			'secondaryTickets' => $secondaryTickets,
			'status' => $this->status,
			'request_date' => date('Y-m-d H:i:s'),
			'requested_date' => date('Y-m-d H:i:s', strtotime($date)),
			'_serialize' => array('status', 'request_date', 'requested_date', 'secondaryTickets')
			));
	}

/**
 * addFromApp method
 *
 * @return void
 */
	public function addFromApp($dept_uuid = null, $ticket_uuid = null, $title = null, $msg = null) {
		$this->loadModel('Ticket');
		$this->loadModel('Department');
		if (!$this->Ticket->exists($ticket_uuid)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		if (!$this->Department->exists($dept_uuid)) {
			throw new NotFoundException(__('Invalid department'));
		}

		$this->SecondaryTicket->create();
		$data = array(
				'department_id' => $dept_uuid,
				'ticket_id' => $ticket_uuid,
				'title' => $title,
				'status' => '2',
				'description' => $msg
			);
		if ($this->SecondaryTicket->save($data)) {
			$this->Session->setFlash(__('The secondary ticket has been saved.'));
			//return $this->redirect(array('action' => 'index'));
		} else {
			$this->status = 'fail';
			$this->Session->setFlash(__('The secondary ticket could not be saved. Please, try again.'));
		}

		$this->set(array(
			'status' => $this->status,
			'_serialize' => array('status')
		));
	}				
}
