<?php
$quests = [
  1 => [
    'title' => 'Echoes of Javanese Wisdom',
    'questions' => [
      [
        'question' => 'Apa nama aksara kuno yang digunakan dalam kitab Jawa?',
        'options' => ['Hanacaraka', 'Katakana', 'Hieroglif', 'Sanskerta'],
        'answer' => 0
      ],
      [
        'question' => 'Apa arti filosofi “Ojo Dumeh”?',
        'options' => ['Jangan egois', 'Jangan sombong', 'Jangan menyerah', 'Jangan lupa'],
        'answer' => 1
      ]
    ]
  ]
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$quest = $quests[$id] ?? null;

if (!$quest) {
  echo "<h1>Quest tidak ditemukan!</h1>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($quest['title']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/mulai-quest.css">
</head>
<body>

<div class="quiz-container">
  <h1><?= htmlspecialchars($quest['title']) ?></h1>
  <form method="POST" action="">
    <?php foreach ($quest['questions'] as $index => $q): ?>
      <div class="question-block">
        <h5><?= ($index + 1) . '. ' . htmlspecialchars($q['question']) ?></h5>
        <?php foreach ($q['options'] as $optIndex => $option): ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer<?= $index ?>" value="<?= $optIndex ?>" id="q<?= $index ?>opt<?= $optIndex ?>" required>
            <label class="form-check-label" for="q<?= $index ?>opt<?= $optIndex ?>">
              <?= htmlspecialchars($option) ?>
            </label>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-success btn-submit">Submit Jawaban</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($quest['questions'] as $i => $q) {
      $selected = isset($_POST["answer$i"]) ? (int)$_POST["answer$i"] : -1;
      if ($selected === $q['answer']) {
        $score++;
      }
    }
    echo "<div class='mt-4 alert alert-info text-center'>";
    echo "<strong>Skor Kamu: $score / " . count($quest['questions']) . "</strong>";
    echo "</div>";
  }
  ?>
</div>

</body>
</html>
