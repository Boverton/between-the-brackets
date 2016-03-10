<?php
include('./class_lib/Card.php');
include('./class_lib/Deck.php');
include('./class_lib/Player.php');
?>

<style>
    #card {
        margin: 10px;
        height: 100px;
        width: 75px;
        border: solid 1px black;
        text-align: center;
        vertical-align: middle;
        line-height: 100px;
        display: inline-block;
    }

    #card_color {
        color: red;
    }
</style>


<?php

// Create a deck and shuffle it
$Deck = new Deck();
$Deck->shuffle();

// Create new players
$player_bob = new Player('Bob');
$player_sue = new Player('Sue');
$player_brandon = new Player('Brandon');

//give players 3 cards
for($i = 0; $i < 3; $i++) {
    $player_bob->give_card($Deck->get_cards());
    $player_sue->give_card($Deck->get_cards());
    $player_brandon->give_card($Deck->get_cards());
}


// Show all the cards each player has been dealt
echo '<h3>'.$player_bob->get_name().'</h3>';
echo $player_bob->render();
echo '<br/>';
echo '<h3>'.$player_sue->get_name().'</h3>';
echo $player_sue->render();
echo '<br/>';
echo '<h3>'.$player_brandon->get_name().'</h3>';
echo $player_brandon->render();
echo '<br/>';
echo 'Number of cards remaining in the deck: '.$Deck->get_num_of_cards();
