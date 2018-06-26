<?php

class Emitter
{
    /**
     * Создает экземпляр класса Emitter.
     * @memberof Emitter
     */

    public $events = [];

    public function constructor()
    {
        // Ваш код
    }

    /**
     * связывает обработчик с событием
     *
     * @param string event - событие
     * @param Handler handler - обработчик
     */
    public function on($event, $handler)
    {
        // Ваш код
        if(empty($this->events[$event]))
        {
            $this->events[$event] = [];
        }
        $this->events[$event][] = $handler;
    }

    /**
     * Генерирует событие -- вызывает все обработчики, связанные с событием и
     *                       передает им аргумент data
     *
     * @param string event
     * @param mixed data
     */
    public function emit($event, $data)
    {
        // Ваш код
        if (!empty($this->events[$event])) {
            foreach ($this->events[$event] as $event) {
                $event($data);
            }
        }
    }
}
