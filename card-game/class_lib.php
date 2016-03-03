<?php

/**
 * Class Card represents a playing card
 */
class Card
{

    /**
     * The acceptable suite of the card
     * @var array
     */
    private $allowed_suites = array('C', 'S', 'D', 'H');

    /**
     * The acceptable rank of a card
     * @var array
     */
    private $allowed_ranks = ['A', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

    /**
     * The suite of the card
     * @var string
     */
    protected $suite;

    /**
     * The rank of the card
     * @var string
     */
    protected $rank;

    /**
     * The color of the card
     * @var string
     */
    protected $color;

    /**
     * The icon of the card
     * @var string
     */
    protected $icon;

    /**
     * Makes a card
     * @param $rank string
     * @param $suite string
     */
    public function __construct($rank, $suite)
    {

        //make sure it's an acceptable suite or rank
        if (!in_array($suite, $this->allowed_suites)) {
            throw new Exception('Cannot create a card because the suite(' . $suite . ') is not valid. (Acceptable suites: C, S, D and H)');
        } else if (!in_array($rank, $this->allowed_ranks)) {
            throw new Exception('Cannot create a card because the rank(' . $rank . ')is not valid.');
        }

        //assign
        $this->rank = $rank;
        $this->suite = $suite;

        //give it a color
        $this->assign_color();

        //give it an icon
        $this->assign_icon();


    }

    /**
     * Makes an html rendering of the card
     * @return string
     */
    public function render()
    {
        return "<div id='card'>" . $this->rank . ' ' . $this->icon . "</div>";
    }

    /**
     * assigns a color to the card
     * @return void
     */
    protected function assign_color()
    {
        switch ($this->suite) {
            case 'D':
                $this->color = 'red';
                break;
            case 'H':
                $this->color = 'red';
                break;
            case 'S':
                $this->color = 'black';
                break;
            case 'C':
                $this->color = 'black';
        }
    }

    /**
     * assigns an icon to the card
     * @return void
     */
    protected function assign_icon()
    {
        switch ($this->suite) {
            case 'D':
                $this->icon = '<span id="card_color">&diams;</span>';
                break;
            case 'H':
                $this->icon = '<span id="card_color">&hearts;</span>';
                break;
            case 'S':
                $this->icon = '&spades;';
                break;
            case 'C':
                $this->icon = '&clubs;';
        }
    }

}

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
     * @return card
     */
    public function get_cards()
    {
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

                $return .= $card->render().' ';
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

