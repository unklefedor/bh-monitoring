<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 26.05.17
 * Time: 17:24
 */

namespace app\components\eventer\rules;

class Rule
{
    private $url;
    private $type;
    private $frequency;
    private $start_period;
    private $end_period;
    private $id;


    /**
     * @param $data
     */
    public function load($data)
    {
        $this->checkData($data);
        $this->setData($data);
    }

    /**
     * @param $data
     * @throws RuleException
     */
    private function checkData($data)
    {
        if (!isset($data['url'])) {
            throw new RuleException('UrlError');
        }

        if (!isset($data['type'])) {
            throw new RuleException('TypeError');
        }

        if (!isset($data['frequency'])) {
            throw new RuleException('FrequencyError');
        }
        
        if (!isset($data['start_period'])) {
            throw new RuleException('StartPeriodError');
        }

        if (!isset($data['end_period'])) {
            throw new RuleException('EndPeriodError');
        }
    }

    /**
     * @param $data
     */
    private function setData($data)
    {
        $this->url = $data['url'];
        $this->type = $data['type'];
        $this->frequency = $data['frequency'];
        $this->start_period = $data['start_period'];
        $this->end_period = $data['end_period'];
        $this->id = $data['id'];
    }


    /**
     * @return array
     */
    public function getAsArray()
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'type' => $this->type,
            'frequency' => $this->frequency,
            'start_period' => $this->start_period,
            'end_period' => $this->end_period
        ];
    }
    
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getStartPeriod()
    {
        return $this->start_period;
    }

    /**
     * @return mixed
     */
    public function getEndPeriod()
    {
        return $this->end_period;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}