<?php
namespace App\Controller;

use App\Model\Entity\ProcessingPlan;
use App\Model\Table\ProcessingPlansTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * ProcessingPlans Controller
 *
 * @property ProcessingPlansTable $ProcessingPlans
 *
 * @method ProcessingPlan[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcessingPlansController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Creaters', 'Workers']
        ];
        $processingPlans = $this->paginate($this->ProcessingPlans);

        $this->set(compact('processingPlans'));
    }

    /**
     * View method
     *
     * @param string|null $id Processing Plan id.
     * @return void
     */
    public function view($id = null)
    {
        $processingPlan = $this->ProcessingPlans->get($id, [
            'contain' => ['Creaters', 'Workers', 'ProcessedStock']
        ]);

        $this->set('processingPlan', $processingPlan);
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $processingPlan = $this->ProcessingPlans->newEntity();
        if ($this->request->is('post')) {
            $processingPlan = $this->ProcessingPlans->patchEntity($processingPlan, $this->request->getData());
            if ($this->ProcessingPlans->save($processingPlan)) {
                $this->Flash->success(__('The processing plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processing plan could not be saved. Please, try again.'));
        }
        $creaters = $this->ProcessingPlans->Creaters->find('list', ['limit' => 200]);
        $workers = $this->ProcessingPlans->Workers->find('list', ['limit' => 200]);
        $this->set(compact('processingPlan', 'creaters', 'workers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Processing Plan id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $processingPlan = $this->ProcessingPlans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $processingPlan = $this->ProcessingPlans->patchEntity($processingPlan, $this->request->getData());
            if ($this->ProcessingPlans->save($processingPlan)) {
                $this->Flash->success(__('The processing plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processing plan could not be saved. Please, try again.'));
        }
        $creaters = $this->ProcessingPlans->Creaters->find('list', ['limit' => 200]);
        $workers = $this->ProcessingPlans->Workers->find('list', ['limit' => 200]);
        $this->set(compact('processingPlan', 'creaters', 'workers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Processing Plan id.
     * @return Response|null Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $processingPlan = $this->ProcessingPlans->get($id);
        if ($this->ProcessingPlans->delete($processingPlan)) {
            $this->Flash->success(__('The processing plan has been deleted.'));
        } else {
            $this->Flash->error(__('The processing plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
