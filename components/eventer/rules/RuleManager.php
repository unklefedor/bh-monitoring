<?php


namespace app\components\eventer\rules;

use yii\db\Connection;
use yii\db\Query;
use yii\db\Schema;


/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 26.05.17
 * Time: 18:40
 */
class RuleManager
{

    /** @var Connection $db */
    private $db = null;
    private $tableName = 'rules';

    /**
     * RuleManager constructor.
     */
    public function __construct()
    {
        $this->db = \Yii::$app->getDb();
    }


    /**
     * getRuleEntities
     *
     * @param Query $query
     *
     * @return array
     */
    private function getRuleEntities(Query $query)
    {
        $result = [];
        foreach ($query->all() as $rule_data) {
            $rule = new Rule();
            $rule->load($rule_data);
            $result[] = $rule;
        }

        return $result;
    }

    /**
     * getQuery
     *
     * @return Query
     */
    private function getQuery()
    {
        return (new Query())->select('*')->from($this->tableName);
    }


    /**
     * getRules
     *
     * @return array
     */
    public function getRules()
    {
        return $this->getRuleEntities($this->getQuery());
    }

    /**
     * AddRule
     *
     * @param $new_rule
     * @return void
     * @throws RuleException
     */
    public function AddRule($new_rule)
    {
        $this->dbCheck();

        try {
            $rule = new Rule();
            $rule->load($new_rule);
        } catch (RuleException $e) {
            throw new RuleException($e->getMessage());
        }

        $this->saveRule($rule);
    }

    /**
     * saveRule
     *
     * @param Rule $rule
     *
     * @return void
     */
    private function saveRule(Rule $rule)
    {
        $this->db->createCommand()->insert($this->tableName, $rule->getAsArray())->execute();
    }

    /**
     * dbCheck
     *
     * @return void
     */
    private function dbCheck()
    {
        if (!$this->db->getTableSchema($this->tableName)) {
            $this->createTable();
        }
    }

    /**
     * createTable
     *
     * @return void
     */
    private function createTable()
    {
        $this->db->createCommand()->createTable($this->tableName, [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING,
            'type' => Schema::TYPE_STRING,
            'frequency' => Schema::TYPE_INTEGER,
            'start_period' => Schema::TYPE_INTEGER,
            'end_period' => Schema::TYPE_INTEGER
        ])->execute();
    }

    /**
     * @param $id
     */
    public function deleteRule($id)
    {
        $this->db->createCommand()->delete($this->tableName, ['id' => $id])->execute();
    }
}