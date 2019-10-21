<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProcessedStock Model
 *
 * @property \App\Model\Table\ProcessingPlansTable&\Cake\ORM\Association\BelongsTo $ProcessingPlans
 *
 * @method \App\Model\Entity\ProcessedStock get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProcessedStock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProcessedStock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProcessedStock|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProcessedStock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProcessedStock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProcessedStock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProcessedStock findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProcessedStockTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('processed_stock');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProcessingPlans', [
            'foreignKey' => 'processing_plan_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('processed_stock')
            ->requirePresence('processed_stock', 'create')
            ->notEmptyString('processed_stock');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->integer('quantity_before')
            ->requirePresence('quantity_before', 'create')
            ->notEmptyString('quantity_before');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['processing_plan_id'], 'ProcessingPlans'));

        return $rules;
    }
}
