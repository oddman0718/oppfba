<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShipmentPlans Controller
 *
 * @property \App\Model\Table\ShipmentPlansTable $ShipmentPlans
 *
 * @method \App\Model\Entity\ShipmentPlan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShipmentPlansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Creaters', 'Workers']
        ];
        $shipmentPlans = $this->paginate($this->ShipmentPlans);

        $this->set(compact('shipmentPlans'));
    }

    /**
     * View method
     *
     * @param string|null $id Shipment Plan id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipmentPlan = $this->ShipmentPlans->get($id, [
            'contain' => ['Creaters', 'Workers', 'ShippedStock']
        ]);

        $this->set('shipmentPlan', $shipmentPlan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shipmentPlan = $this->ShipmentPlans->newEntity();
        if ($this->request->is('post')) {
            $shipmentPlan = $this->ShipmentPlans->patchEntity($shipmentPlan, $this->request->getData());
            if ($this->ShipmentPlans->save($shipmentPlan)) {
                $this->Flash->success(__('The shipment plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipment plan could not be saved. Please, try again.'));
        }
        $creaters = $this->ShipmentPlans->Creaters->find('list', ['limit' => 200]);
        $workers = $this->ShipmentPlans->Workers->find('list', ['limit' => 200]);
        $this->set(compact('shipmentPlan', 'creaters', 'workers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipment Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shipmentPlan = $this->ShipmentPlans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shipmentPlan = $this->ShipmentPlans->patchEntity($shipmentPlan, $this->request->getData());
            if ($this->ShipmentPlans->save($shipmentPlan)) {
                $this->Flash->success(__('The shipment plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipment plan could not be saved. Please, try again.'));
        }
        $creaters = $this->ShipmentPlans->Creaters->find('list', ['limit' => 200]);
        $workers = $this->ShipmentPlans->Workers->find('list', ['limit' => 200]);
        $this->set(compact('shipmentPlan', 'creaters', 'workers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipment Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipmentPlan = $this->ShipmentPlans->get($id);
        if ($this->ShipmentPlans->delete($shipmentPlan)) {
            $this->Flash->success(__('The shipment plan has been deleted.'));
        } else {
            $this->Flash->error(__('The shipment plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
