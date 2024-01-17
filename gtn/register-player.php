<?php

require_once "function.php";

registerPlayers($_POST['player']);
ans();

if (playersRegistered()) {
    header("location: play.php");
}