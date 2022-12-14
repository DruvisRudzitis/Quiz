<?php

namespace App\Models;

class QuizTopic
{
    private int $id;
    /**
     * @var string
     */
    private $title;


    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }
}