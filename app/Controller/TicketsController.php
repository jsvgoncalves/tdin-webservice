<?php
App::uses('AppController', 'Controller');
/**
 * Tickets Controller
 *
 * @property Ticket $Ticket
 * @property PaginatorComponent $Paginator
 */
class TicketsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * Helpers
 *
 * @var array
 */
        public $helpers = array('Status');


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ticket->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('Ticket.user_id' => $this->Auth->user()['id']),
			'limit' => 10
		);
		$this->set('tickets', $this->Paginator->paginate());
	}

/**
 * allTickets method
 *
 * @return void
 */
	public function allTickets() {
		$this->Ticket->recursive = 0;
		$this->set('tickets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
		$this->set('ticket', $this->Ticket->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Ticket']['user_id'] = $this->Auth->user()['id'];
			$this->Ticket->create();
			if ($this->Ticket->save($this->request->data)) {
				$this->Session->setFlash(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Session->setFlash(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
			$this->request->data = $this->Ticket->find('first', $options);
		}

		$users = $this->Ticket->User->find('list');
		$solvers = $this->Ticket->Solver->find('list');
		$this->set(compact('users', 'solvers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ticket->id = $id;
		if (!$this->Ticket->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ticket->delete()) {
			$this->Session->setFlash(__('The ticket has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ticket could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * unassigned method
 *
 * @return void
 */
	public function unassigned() {
		$this->Ticket->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('Ticket.status' => '0'),
			'limit' => 10
		);
		$tickets = $this->Paginator->paginate();
		$this->set(array(
			'tickets' => $tickets,
			'status' => $this->status,
			'_serialize' => array('status', 'tickets')
		));
	}
}
