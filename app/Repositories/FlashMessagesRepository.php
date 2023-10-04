<?php

namespace App\Repositories;

class FlashMessagesRepository
{
    protected array $messages = ['danger' => [], 'success' => [], 'info' => []];

    public function error(string $value, ?string $title = null)
    {
        $bag = &$this->messages['danger'];

        $bag[] = ['title' => $title, 'value' => $value];
    }

    public function success(string $value, ?string $title = null)
    {
        $bag = &$this->messages['success'];

        $bag[] = ['title' => $title, 'value' => $value];
    }

    public function info(string $value, ?string $title = null)
    {
        $bag = &$this->messages['info'];

        $bag[] = ['title' => $title, 'value' => $value];
    }

    public function put(array $messages)
    {
        $this->messages = $messages;
    }

    public function all()
    {
        return $this->messages;
    }

    public function pull()
    {
        $messages = $this->messages;

        $this->messages = [];

        return $messages;
    }
}
