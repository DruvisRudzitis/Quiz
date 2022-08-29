<?php

namespace App\Models;

class QuizQuestion
{
    private int $id;

    private int $topicId;
    /**
     * @var string
     */
    private $title;


    public function __construct(int $id, int $topicId, string $title)
    {
        $this->id = $id;
        $this->topicId = $topicId;
        $this->title = $title;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function topicId(): int
    {
        return $this->topicId;
    }

    public function title(): string
    {
        return $this->title;
    }
}