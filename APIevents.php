<?php

$source = 'https://apiv3.apifootball.com/?action=get_events&from=2023-04-05&to=2023-04-05&league_id=152&APIkey=080a4cb8abdd2c76bab13383cf9c7f7fda2fc9100eac8553903420c0a7a2767c';
$content = file_get_contents($source);
$data = json_decode($content, true);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: red;">
  <div class="container-fluid d-flex justify-content-between">
    <div>
      <a href="index.php" style="color: white;">Standings</a>
    </div>
    <div>
      <a href="APIevents.php" style="color: white;">Events</a>
    </div>
    <div>
      <a href="APItopscore.php" style="color: white;">Top Scorer</a>
    </div>
  </div>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">League</th>
      <th scope="col">Date</th>
      <th scope="col">Home</th>
      <th scope="col">Score</th>
      <th scope="col">Away</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data as $row) {
        # code...
        ?>
    <tr>
      <th scope="row"><?php echo $row['league_name']?></th>
      <td><?php echo $row['match_date']?></td>
      <td>
        <img src="<?php echo $row['team_home_badge']; ?>" alt="Logo team" width="50px">
        <?php echo $row['match_hometeam_name']; ?>  
      </td>
      <td>
        <?php echo $row['match_hometeam_score'];?>
        <?php echo $row['match_awayteam_score'];?>
      </td>
      <td>
        <img src="<?php echo $row['team_away_badge']; ?>" alt="Logo team" width="50px">
        <?php echo $row['match_awayteam_name']; ?>  
      </td>
    </tr>
  </tbody>
  <?php }?>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>