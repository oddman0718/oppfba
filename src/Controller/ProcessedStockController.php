<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProcessedStock Controller
 *
 * @property \App\Model\Table\ProcessedStockTable $ProcessedStock
 *
 * @method \App\Model\Entity\ProcessedStock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcessedStockController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProcessingPlans']
        ];
        $processedStock = $this->paginate($this->ProcessedStock);

        $this->set(compact('processedStock'));
    }

    /**
     * View method
     *
     * @param string|null $id Processed Stock id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $processedStock = $this->ProcessedStock->get($id, [
            'contain' => ['ProcessingPlans']
        ]);

        $this->set('processedStock', $processedStock);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $processedStock = $this->ProcessedStock->newEntity();
        if ($this->request->is('post')) {
            $processedStock = $this->ProcessedStock->patchEntity($processedStock, $this->request->getData());
            if ($this->ProcessedStock->save($processedStock)) {
                $this->Flash->success(__('The processed stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processed stock could not be saved. Please, try again.'));
        }
        $processingPlans = $this->ProcessedStock->ProcessingPlans->find('list', ['limit' => 200]);
        $this->set(compact('processedStock', 'processingPlans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Processed Stock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $processedStock = $this->ProcessedStock->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $processedStock = $this->ProcessedStock->patchEntity($processedStock, $this->request->getData());
            if ($this->ProcessedStock->save($processedStock)) {
                $this->Flash->success(__('The processed stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processed stock could not be saved. Please, try again.'));
        }
        $processingPlans = $this->ProcessedStock->ProcessingPlans->find('list', ['limit' => 200]);
        $this->set(compact('processedStock', 'processingPlans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Processed Stock id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $processedStock = $this->ProcessedStock->get($id);
        if ($this->ProcessedStock->delete($processedStock)) {
            $this->Flash->success(__('The processed stock has been deleted.'));
        } else {
            $this->Flash->error(__('The processed stock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
