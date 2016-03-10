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

?>
