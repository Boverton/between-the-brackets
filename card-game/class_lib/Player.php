<?php


/**
 * Class Player represents a player in the game
 */
class Player
{
    /**
     * Name of the player
     * @var string
     */
    protected $name;

    /**
     * Cards the player is holding
     * @var array
     */
    protected $cards = [];

    /**
     * Player constructor.
     * @param $player string player's name
     */
    public function __construct($player)
    {
        $this->name = $player;
    }

    /**
     * Give player a card
     * @param Card $card
     */
    public function give_card(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * Give html representation of players cards
     * @return null|string
     */
    public function render()
    {
        $return = null;

        if (empty($this->cards)) {

            $return .= 'No Cards';

        } else {

            foreach ($this->cards as $card) {

                $return .= $card->render() . ' ';
            }
        }
        return $return;
    }


    /**
     * Get the player's name
     * @return string player name
     */
    public function get_name()
    {
        return $this->name;

    }
}

?>


