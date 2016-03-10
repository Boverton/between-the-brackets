<?php

/**
 * Class Deck represents a deck of cards and actions you can do to the deck
 */
class Deck
{

    /**
     * The cards in the deck
     * @var array
     */
    public $cards = [];

    /**
     * create a deck and shuffle it.
     * @param $deck array
     */
    public function __construct()
    {
        //create cards
        $this->create_cards();

        //shuffle cards
        $this->shuffle();

    }

    /**
     * create the cards in the deck
     * @return void
     */
    protected function create_cards()
    {
        $suites = array('C', 'S', 'D', 'H');
        $ranks = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

        foreach ($suites as $suit) {
            foreach ($ranks as $rank) {

                $this->cards[] = new Card($rank, $suit);
            }
        }
    }

    /**
     * Get a card from the shuffled deck
     * @return Card
     */
    public function get_cards()
    {
        if (empty($this->cards)) {
            throw new \Exception('No more cards to give!');
        }
        return $card = array_pop($this->cards);
    }

    /**
     * Shuffle the cards in the deck
     * @return void
     */
    public function shuffle()
    {
        shuffle($this->cards);
    }

    /**
     * Count the number of cards left in the deck
     * @return int
     */
    public function get_num_of_cards()
    {
        return count($this->cards);
    }
}

?>
