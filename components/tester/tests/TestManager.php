<?php
/**
 * TestManager.php
 *
 * PHP version 7
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     unklefedor
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://breadhead.ru
 */

namespace app\components\tester\tests;

use yii\db\Connection;
use yii\db\Query;
use yii\db\Schema;

/** TestManager
 *
 * Class TestManager
 *
 * @package app\components\tester
 */
class TestManager
{
    private $transports = ['curl'];

    private $types = ['availability'];

    /** @var Connection $db */
    private $db = null;
    private $tableName = 'tests';

    /**
     * TestManager constructor.
     */
    public function __construct()
    {
        $this->db = \Yii::$app->getDb();
    }

    /**
     * getTransports
     *
     * @return array
     */
    public function getTransports()
    {
        return $this->transports;
    }

    /**
     * getTypes
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * getTestEntities
     *
     * @param Query $query
     *
     * @return array
     */
    private function getTestEntities(Query $query)
    {
        $result = [];
        foreach ($query->all() as $test_data){
            $test = new Test();
            $test->load($test_data);
            $result[] = $test;
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
     * getAvailabilityTests
     *
     * @return array
     */
    public function getAvailabilityTests()
    {
        return $this->getTestEntities($this->getQuery()->where(['type' => 'availability']));
    }

    /**
     * getTests
     *
     * @return array
     */
    public function getTests()
    {
        return $this->getTestEntities($this->getQuery());
    }

    /**
     * AddTest
     *
     * @param $new_test
     *
     * @return void
     * @throws TestManagerException
     */
    public function AddTest($new_test)
    {
        $this->dbCheck();

        try {
            $test = new Test();
            $test->load($new_test);
        } catch (TestManagerException $e){
            throw new TestManagerException($e->getMessage());
        }

        $this->saveTest($test);
    }

    /**
     * saveTest
     *
     * @param Test $test
     *
     * @return void
     */
    private function saveTest(Test $test)
    {
        $this->db->createCommand()->insert($this->tableName, $test->getAsArray())->execute();
    }

    /**
     * dbCheck
     *
     * @return void
     */
    private function dbCheck()
    {
        if (!$this->db->getTableSchema($this->tableName)){
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
            'transport' => Schema::TYPE_STRING,
            'type' => Schema::TYPE_STRING,
            'positive_code' => Schema::TYPE_STRING,
            'time_limit' => Schema::TYPE_INTEGER
        ])->execute();
    }
}