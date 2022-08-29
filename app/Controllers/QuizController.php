<?php

namespace App\Controllers;

use App\Models\QuizTopic;
use App\Models\User;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use App\Models\QuizQuestionOption;

class QuizController
{
    private $userId;
    private $topicId;
    private $quizQuestion;
    private array $quizQuestionOptions;
    private $user;
    private $validAnswers;
    private $totalAnswers;
    private $hasIssues;

    public function index(array $vars)
    {
        $userId = (int)$vars['userId'];
        $topicId = (int)$vars['topicId'];
        $hasIssues = false;

        // store answer in case action is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // store answer if provided
            if ($_POST['answer']) {
                $answeredQuestionOption = query()
                    ->select('isValid')
                    ->from('quiz_question_options')
                    ->where('id = :id')
                    ->setParameter('id', $_POST['answer'])
                    ->executeQuery()
                    ->fetchOne();

                query()
                    ->insert('quiz_question_answers')
                    ->values([
                        'question_id' => ':questionId',
                        'user_id' => ':userId',
                        'is_valid_answer' => ':isValidAnswer',
                    ])
                    ->setParameters([
                        'questionId' => $_POST['questionId'],
                        'userId' => $_POST['userId'],
                        'isValidAnswer' => $answeredQuestionOption,
                    ])
                    ->executeQuery();
            } else {
                // show validation error if answer is not provided
                $hasIssues = true;
            }
        }

        $answeredQuestions = query()
            ->select('question_id')
            ->from('quiz_question_answers')
            ->where('user_id = :userId')
            ->setParameter('userId', $userId)
            ->executeQuery()
            ->fetchAllNumeric();

        // take first element from each result pair
        $answeredQuestions = array_map(fn($value): int => $value[0], $answeredQuestions);

        $quizQuestions = query()
            ->select('*')
            ->from('quiz_questions')
            ->where('topic_id = :id')
            ->setParameter('id', $topicId)
            ->executeQuery()
            ->fetchAllAssociative();

        foreach ($quizQuestions as $question) {
            if (!in_array($question['id'], $answeredQuestions)) {
                $quizQuestion = $question;
                break;
            } else {
                $quizQuestion = null;
            }
        }

        if (!$quizQuestion) {
            header('Location: /quiz/' . $topicId . '/' . $userId . '/result');
            return;
        }

        $quizQuestionOptions = query()
            ->select('*')
            ->from('quiz_question_options')
            ->where('question_id = :id')
            ->setParameter('id', $quizQuestion['id'])
            ->executeQuery()
            ->fetchAllAssociative();

        return require_once __DIR__ . '/../Views/QuizIndexView.php';
    }

    public function result(array $vars)
    {
        $userId = (int)$vars['userId'];
        $topicId = (int)$vars['topicId'];

        $user = query()
            ->select('*')
            ->from('users')
            ->where('id = :id')
            ->setParameter('id', $userId)
            ->executeQuery()
            ->fetchAssociative();

        // count all quiz questions by topicId
        $totalAnswers = query()
            ->select('COUNT(*)')
            ->from('quiz_questions')
            ->where('topic_id = :id')
            ->setParameter('id', $topicId)
            ->executeQuery()
            ->fetchOne();


        // query all valid question answers by userId and question_id's
        $validAnswers = query()
            ->select('COUNT(a.id)')
            ->from('quiz_question_answers', 'a')
            ->leftJoin('a', 'quiz_questions', 'q', 'q.id  = a.question_id')
            ->where('a.user_id = :userId', 'q.topic_id = :topicId', 'a.is_valid_answer = 1')
            ->setParameters([
                'userId' => $userId,
                'topicId' => $topicId
            ])
            ->executeQuery()
            ->fetchOne();

        return require_once __DIR__ . '/../Views/QuizResultView.php';
    }
}