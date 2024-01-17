<?php
require_once "templates/header.php";

if (! playersRegistered()) {
    header("location: index.php");
}
ans()
?>

<table class="wrapper" cellpadding="0" cellspacing="0">
    <tr>
        <td>

            <div class="welcome">

                <div class="player-name" style="font-size: 25px">
                    <?php echo $_SESSION['name'] ?> win, your's score is <?php echo $_SESSION['score'] ?>
                </div>

                <a href="play.php">Play again</a><br />
                <br>

                <a href="index.php" class="reset-btn">Reset</a>
            </div>

        </td>
    </tr>
</table>

</body>
</html>

