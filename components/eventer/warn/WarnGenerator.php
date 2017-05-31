<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 31.05.17
 * Time: 18:41
 */

namespace app\components\eventer\warn;

use app\components\eventer\service\Event;

/**
 * Class WarnGenerator
 * @package app\components\eventer\warn
 */
class WarnGenerator
{
    /**
     * @param Event $event
     * @return Warn
     */
    public static function generateWarn($event)
    {
        $data = [
            'text' => 'Эвенты не поступали подозрительно долго',
            'url' => $event['url'],
            'level' => $event['level'],
            'type' => $event['type'],
            'timestamp' => time(),
        ];

        $warn = new  Warn();

        return $warn->load($data);
    }
}