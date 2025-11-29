<?php
$data = file_get_contents("Quiz.txt");

$blocks = preg_split("/\n\s*\n/", trim($data));
$questions = [];

foreach ($blocks as $block) {
    $lines = explode("\n", trim($block));

    $q = [
        "question" => $lines[0],
        "options"  => [],
        "answer"   => []
    ];

    foreach ($lines as $line) {
        if (str_starts_with($line, "ANSWER")) {
            $ans = trim(str_replace("ANSWER:", "", $line));
            $q["answer"] = array_map('trim', explode(",", $ans));
        } elseif (preg_match("/^[A-D]\./", $line)) {
            $q["options"][] = $line;
        }
    }

    $questions[] = $q;
}

$result = null;
$user_answers = [];
$totalQs = count($questions);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["reset"])) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $correct = 0;

    foreach ($questions as $i => $q) {
        $user_choice = $_POST["q".$i] ?? [];

        if (!is_array($user_choice)) {
            $user_choice = [$user_choice];
        }

        $user_answers[$i] = $user_choice;

        sort($user_choice);
        $correct_ans = $q["answer"];
        sort($correct_ans);

        if ($user_choice == $correct_ans) {
            $correct++;
        }
    }

    $score10 = round(($correct / $totalQs) * 10, 2);
    $result = "Bạn đúng $correct / $totalQs câu (Điểm: $score10 / 10)";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài thi trắc nghiệm</title>
    <style>
        body { font-family: Arial; max-width: 900px; margin: auto; padding: 20px; }
        .question { border: 1px solid #ccc; padding: 15px; border-radius: 8px; margin-bottom: 15px; }
        .correct { color: green; font-weight: bold; }
        .wrong { color: red; font-weight: bold; }
        .btn-group { margin-top: 20px; }
        button { padding: 8px 16px; margin-right: 8px; cursor: pointer; }
    </style>
</head>
<body>

<h2>Bài thi trắc nghiệm</h2>

<?php if ($result): ?>
    <h3><?= $result ?></h3>
<?php endif; ?>

<form method="POST">

<?php foreach ($questions as $i => $q): ?>
<div class="question">
    <strong>Câu <?= $i+1 ?>:</strong> <?= $q["question"] ?><br><br>

    <?php 
        $is_multi = count($q["answer"]) > 1;
        $selected = $user_answers[$i] ?? [];
    ?>

    <?php foreach ($q["options"] as $op): 
        $letter = substr($op, 0, 1);
        $checked = in_array($letter, $selected) ? "checked" : "";
    ?>
        <label>
            <input 
                type="<?= $is_multi ? 'checkbox' : 'radio' ?>"
                name="q<?= $i ?><?= $is_multi ? '[]' : '' ?>"
                value="<?= $letter ?>"
                <?= $checked ?>
            >
            <?= $op ?>
        </label><br>
    <?php endforeach; ?>

    <?php if ($result): ?>
        <div class="<?= ($selected == $q['answer']) ? 'correct' : 'wrong' ?>">
            Bạn chọn: <?= empty($selected) ? "Không chọn" : implode(", ", $selected) ?>
        </div>

        <div class="correct">
            Đáp án đúng: <?= implode(", ", $q["answer"]) ?>
        </div>
    <?php endif; ?>

</div>
<?php endforeach; ?>

<div class="btn-group">
    <button type="submit" name="submit">Hiển thị đáp án</button>
    <button type="submit" name="reset">Làm lại</button>
</div>

</form>

</body>
</html>
