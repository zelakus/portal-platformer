<?php
use yii\data\ActiveDataProvider;
use kouosl\platformer\models\Games;
use kouosl\platformer\bundles\CustomAsset;
?>

<div class="site-index">
    <?php
    //Game info
    $dataprovider = new ActiveDataProvider([
        'query' => Games::find()->where("id='" . $_GET['id'] . "'")
    ]);
    $gamemodels = $dataprovider->GetModels();
    $game = $gamemodels[0];
    ?>
    <center>
        <canvas id="game_canvas" tabindex="1"  width="800" height="500">Browser doesn't support canvas.</canvas>
    </center>
        
    <script>
    var canvas = document.getElementById("game_canvas");
    var ctx = canvas.getContext("2d");
    ctx.fillStyle = "#FF0000";
    ctx.fillRect(0, 0, 800, 500);
        
    var game = <?php echo "'".$game['url']."'"; ?>,
    game_id = <?php echo $_GET['id']; ?>;
    </script>
</div>

<?php CustomAsset::register($this); ?>