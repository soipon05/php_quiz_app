<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Quiz.php');

$quiz = new MyApp\Quiz();
if (!$quiz->isFinished()) {
    $data = $quiz->getCurrentQuiz();
    shuffle($data['a']);
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Quiz</title>
</head>

<body>
    <?php if ($quiz->isFinished()) : ?>
        <a href="">finished!</a>
        <?php $quiz->reset(); ?>
    <?php else : ?>
        <div id="container">
            <h1>Q. <?= h($data['q']); ?></h1>
            <ul>
                <?php foreach ($data['a'] as $a) : ?>
                    <li class="answer"><?= h($a); ?></li>
                <?php endforeach ?>
            </ul>
            <div id="btn" class="disabled">Next Question</div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="quiz.js"></script>
    <?php endif; ?>
</body>

</html>