<?php
// Contoh dummy data quest
$quests = [
  1 => [
    'title' => 'Echoes of Javanese Wisdom',
    'banner' => '../assets/images/Quest/banner_quest/Echoes_of_Javanese_Wisdom.jpg',
    'description' => 'Menelusuri jejak kearifan lokal Jawa untuk mengungkap misteri kitab kuno.',
    'how_to' => 'Cari petunjuk yang tersebar di seluruh wilayah dan pecahkan teka-teki bahasa Sansekerta.',
    'reward' => 150,
    'rules' => [
      'Gunakan logika dan pengetahuan budaya lokal.',
      'Tidak boleh menggunakan AI atau bantuan eksternal.',
      'Kerjakan dalam waktu 2x24 jam setelah dimulai.'
    ]
  ],
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$quest = $quests[$id] ?? null;

if (!$quest) {
  echo "<h1 style='color:white;text-align:center'>Quest tidak ditemukan!</h1>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($quest['title']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/navbar.css" rel="stylesheet">
  <link href="../assets/css/info-quest.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

<div class="quest-container">
  <div class="wanted-title">WANTED</div>

  <img src="<?= $quest['banner'] ?>" class="quest-banner" alt="Banner Quest">

  <div class="quest-name"><?= htmlspecialchars($quest['title']) ?></div>

  <div class="quest-description">
    <h4>Deskripsi</h4>
    <p><?= $quest['description'] ?></p>
  </div>

  <div class="quest-howto">
    <h4>Cara Pengerjaan</h4>
    <p><?= $quest['how_to'] ?></p>
  </div>

  <div class="quest-reward">
    <h4>Reward</h4>
    <p><strong><?= $quest['reward'] ?> Coin</strong></p>
  </div>

  <div class="quest-rules">
    <h4>Rules</h4>
    <ul>
      <?php foreach ($quest['rules'] as $rule): ?>
        <li><?= htmlspecialchars($rule) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

  <a href="mulai-quest.php?id=<?= $id ?>" class="btn-start">Mulai Mengerjakan</a>
</div>


</body>
</html>
