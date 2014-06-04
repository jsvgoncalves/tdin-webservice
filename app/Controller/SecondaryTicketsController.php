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
		//$this->SecondaryTicket->recursive = 0;
		$this->SecondaryTicket->contain(array('Ticket'));
		$options = 
			array('conditions' => 
				array(
				//	'SecondaryTicket.department_id' => $id,
					'SecondaryTicket.created >' => date('Y-m-d', strtotime("-6 weeks"))
				)
			);

		$secondaryTickets = $this->SecondaryTicket->find('all', $options);
		$this->set(array(
			'secondaryTickets' => $secondaryTickets,
			'status' => $this->status,
			'request_date' => date('Y-m-d H:i:s'),
			'_serialize' => array('status', 'request_date', 'secondaryTickets')
			));
	}
}
