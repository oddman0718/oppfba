<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShippedStock Controller
 *
 * @property \App\Model\Table\ShippedStockTable $ShippedStock
 *
 * @method \App\Model\Entity\ShippedStock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShippedStockController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AmazonSkus', 'ShipmentPlans']
        ];
        $shippedStock = $this->paginate($this->ShippedStock);

        $this->set(compact('shippedStock'));
    }

    /**
     * View method
     *
     * @param string|null $id Shipped Stock id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shippedStock = $this->ShippedStock->get($id, [
            'contain' => ['AmazonSkus', 'ShipmentPlans']
        ]);

        $this->set('shippedStock', $shippedStock);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shippedStock = $this->ShippedStock->newEntity();
        if ($this->request->is('post')) {
            $shippedStock = $this->ShippedStock->patchEntity($shippedStock, $this->request->getData());
            if ($this->ShippedStock->save($shippedStock)) {
                $this->Flash->success(__('The shipped stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipped stock could not be saved. Please, try again.'));
        }
        $amazonSkus = $this->ShippedStock->AmazonSkus->find('list', ['limit' => 200]);
        $shipmentPlans = $this->ShippedStock->ShipmentPlans->find('list', ['limit' => 200]);
        $this->set(compact('shippedStock', 'amazonSkus', 'shipmentPlans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipped Stock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shippedStock = $this->ShippedStock->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shippedStock = $this->ShippedStock->patchEntity($shippedStock, $this->request->getData());
            if ($this->ShippedStock->save($shippedStock)) {
                $this->Flash->success(__('The shipped stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipped stock could not be saved. Please, try again.'));
        }
        $amazonSkus = $this->ShippedStock->AmazonSkus->find('list', ['limit' => 200]);
        $shipmentPlans = $this->ShippedStock->ShipmentPlans->find('list', ['limit' => 200]);
        $this->set(compact('shippedStock', 'amazonSkus', 'shipmentPlans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipped Stock id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shippedStock = $this->ShippedStock->get($id);
        if ($this->ShippedStock->delete($shippedStock)) {
            $this->Flash->success(__('The shipped stock has been deleted.'));
        } else {
            $this->Flash->error(__('The shipped stock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
