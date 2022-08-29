<?php

namespace App\Controllers;

use App\Models\QuizTopic;
use Doctrine\DBAL\Exception;

class TopicsController
{
    private array $quizTopics;

    /**
     * @throws Exception
     */
    public function index()
    {
        $quizTopicsQuery = query()
            ->select('*')
            ->from('quiz_topics')
            ->orderBy('id', 'desc')
            ->executeQuery()
            ->fetchAllAssociative();

        $quizTopic = [];

        foreach ($quizTopicsQuery as $quizTopic) {
            $quizTopics[] = new QuizTopic(
                (int)$quizTopic['id'],
                $quizTopic['title'],
            );
        }

        return require_once __DIR__ . '/../Views/QuizTopicView.php';
    }

    /**
     * @throws Exception
     */
    public function start()
    {
        $query = query();

        $query
            ->insert('users')
            ->values([
                'name' => ':name',
            ])
            ->setParameters([
                'name' => $_POST['name'],
            ])
            ->executeQuery();

        $userId = $query->getConnection()->lastInsertId();

        header('Location: /quiz/' . $_POST['topicId'].'/'.$userId);
    }

    public function show(array $vars)
    {
        $quizTopicQuery = query()
            ->select('*')
            ->from('quiz_topics')
            ->where('id = :id')
            ->setParameter('id', (int)$vars['id'])
            ->executeQuery()
            ->fetchAssociative();

        return require_once __DIR__ . '/../Views/ArticleShowView.php';
    }
}