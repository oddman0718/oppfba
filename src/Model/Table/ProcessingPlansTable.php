<?php
namespace App\Model\Table;

use App\Model\Entity\ProcessingPlan;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProcessingPlans Model
 *
 * @property UsersTable&BelongsTo $Creaters
 * @property UsersTable&BelongsTo $Workers
 * @property ProcessedStockTable&HasMany $ProcessedStock
 *
 * @method ProcessingPlan get($primaryKey, $options = [])
 * @method ProcessingPlan newEntity($data = null, array $options = [])
 * @method ProcessingPlan[] newEntities(array $data, array $options = [])
 * @method ProcessingPlan|false save(EntityInterface $entity, $options = [])
 * @method ProcessingPlan saveOrFail(EntityInterface $entity, $options = [])
 * @method ProcessingPlan patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method ProcessingPlan[] patchEntities($entities, array $data, array $options = [])
 * @method ProcessingPlan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 */
class ProcessingPlansTable extends Table
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

        $this->setTable('processing_plans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Creaters', [
            'className' => 'Users',
            'foreignKey' => 'creater_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Workers', [
            'className' => 'Users',
            'foreignKey' => 'worker_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProcessedStock', [
            'foreignKey' => 'processing_plan_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->notEmptyString('status');

        $validator
            ->integer('work_point')
            ->requirePresence('work_point', 'create')
            ->notEmptyString('work_point');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['creater_id'], 'Creaters'));
        $rules->add($rules->existsIn(['worker_id'], 'Workers'));

        return $rules;
    }
}
