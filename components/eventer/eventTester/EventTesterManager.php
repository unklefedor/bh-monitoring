<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 31.05.17
 * Time: 15:23
 */

namespace app\components\eventer\eventTester;

use app\components\eventer\reactors\EventPushReactor;
use app\components\eventer\rules\Rule;
use app\components\eventer\rules\RuleManager;
use app\components\eventer\warn\WarnGenerator;
use yii\db\Query;

/**
 * Class EventTesterManager
 * @package app\components\eventer\eventTester
 */
class EventTesterManager
{

    private $queryEvent;
    private $ruleManager;
    private $table = 'events';

    /**
     * EventTesterManager constructor.
     * @param RuleManager $ruleManager
     */
    public function __construct(RuleManager $ruleManager)
    {
        $this->ruleManager = $ruleManager;
        $this->queryEvent = (new Query())->select('*')->from($this->table)->orderBy('timestamp DESC');
    }

    /**
     * вытаскивает все правила и запускает проверку
     */
    public function checkRules()
    {
        if ($this->ruleManager->getRules()) {
            /** @var Rule $rule */
            foreach ($this->ruleManager->getRules() as $rule) {
                $event = $this->queryEvent->where(['url' => $rule->getUrl(), 'type' => $rule->getType()])->one();
                $this->checkEvent($event, $rule);
            }
        }
    }

    /**
     * @param $event
     * @param $rule
     */
    private function checkEvent($event, $rule)
    {
        /** @var Rule $rule */
        if (date('H', time()) > $rule->getStartPeriod() && date('H', time()) < $rule->getEndPeriod()) {
            if ((time() - $event['timestamp']) / 60 > $rule->getFrequency()) {
                $this->generateWarn($event);
            }
        }
    }

    /**
     * @param $event
     */
    private function generateWarn($event)
    {
        $warn = WarnGenerator::generateWarn($event);
        $reactor = new EventPushReactor();
        $reactor->run($warn);
    }
}