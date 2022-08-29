<?php

namespace App\Models;

class QuizQuestionAnswer
{


    private int $id;
    private int $questionId;
    private string $text;
    private int $isValid;

    public function __construct(int $id, int $questionId, string $text, int $isValid)
    {

        $this->id = $id;
        $this->questionId = $questionId;
        $this->text = $text;
        $this->isValid = $isValid;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function questionId(): int
    {
        return $this->questionId;
    }

    public function text(): string
    {
        return $this->text;
    }

    public function isValid(): int
    {
        return $this->isValid;
    }
}