<?php

namespace App\Models;

class QuizQuestionOption
{


    private int $id;
    private int $questionId;
    private int $userId;
    private int $isValidAnswer;

    public function __construct(int $id, int $questionId, int $userId, int $isValidAnswer)
    {

        $this->id = $id;
        $this->questionId = $questionId;
        $this->userId = $userId;
        $this->isValidAnswer = $isValidAnswer;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function questionId(): int
    {
        return $this->questionId;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function isValidAnswer(): int
    {
        return $this->isValidAnswer;
    }
}