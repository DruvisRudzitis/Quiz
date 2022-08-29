<html>
<body>

<form method="post" action="/quiz/start">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name"/>
    </div>

    <select name="topicId">
        <?php foreach ($quizTopics as $quizTopic): ?>
        <option value="<?php echo $quizTopic->id(); ?>"><?php echo $quizTopic->title(); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="Submit" value="Send">
</form>

</body>
</html>