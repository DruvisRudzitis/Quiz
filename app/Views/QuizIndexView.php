<h2><?php echo $quizQuestion['title'] ?></h2>

<form action="/quiz/<?php echo $topicId ?>/<?php echo $userId ?>" method="post">
    <input type="hidden" name="questionId" value="<?php echo $quizQuestion['id'] ?>">
    <input type="hidden" name="userId" value="<?php echo $userId ?>">
    <input type="hidden" name="topicId" value="<?php echo $topicId ?>">


    <?php foreach ($quizQuestionOptions as $questionOption): ?>
        <input type="radio" id="<?php echo $questionOption['id'] ?>" name="answer"
               value="<?php echo $questionOption['id'] ?>">
        <label for="<?php echo $questionOption['id'] ?>"><?php echo $questionOption['text'] ?></label><br>
    <?php endforeach; ?>

    <?php if($hasIssues): ?>
        <p style="color: red">Iesniedziet atbildi!</p>
    <?php endif; ?>

    <input type="submit" name="Submit" value="Send">
</form>
