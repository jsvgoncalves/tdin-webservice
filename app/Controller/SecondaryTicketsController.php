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
}
