<?php
require_once "templates/header.php";

if (! playersRegistered()) {
    header("location: index.php");
}

// if (playsCount() >= 9) {
//     header("location: result.php");
// }
// 
?>

<h2>Hello <?php echo $_SESSION['name'] ?>! <br>Let guess the number together!</h2>
<div class = "hint"><?php echo(hint_sumTerm()."<br>". hint_even_odd() . "<br>" . hint_sumFL() . "<br>". hint_mul2l() . "<br>")?></div>
<br>

<form method="post" action="play.php">

    <label for="guess">Guess The Number</label>
    <input type="number" id="guess" name="guess" required />
    </br></br>
    <button type="submit" id="play-btn" name = "play-btn" onclick ="myFunction()">Guess</button>
    </br></br>

</form>

<?php 
   if (isset($_POST['play-btn']))
   {
    echo("Your last guess ".$_POST['guess'].".</br>");
    echo(turn($_POST['guess']));
    // echo($_SESSION['ans']);
   }
   if (checkwin($_POST['guess'])) {
        $_SESSION['score']++;
        header("location: result.php");
    }
?>


<?php
require_once "templates/footer.php";
