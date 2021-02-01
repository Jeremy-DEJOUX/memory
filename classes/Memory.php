<?php
    require_once '../functions/functions.php';
class Memory {
    private $pairs = ['A', 'A', 'B', 'B', 'C', 'C', 'D', 'D', 'E', 'E', 'F', 'F', 'G', 'G'];
    private $difficulty;
    private $desk;

    public function setDifficulty(int $difficulty) {
        $this->difficulty = $difficulty;
        echo 'difficulty = ' . $this->difficulty;
    }


    public function createDesk(): array {
        $desk = [];
        $numbCards = $this->difficulty * 2;
        // echo $numbCards;
        // die;
        for ($i = 0; $i <= $numbCards - 1; ++$i) {
            $desk[$i] = $this->pairs[$i];
        }
        $this->desk = $desk;
        prp($desk);
        return $desk;
    }


    public function shuffleDeck():array {
        shuffle($this->desk);
        return $this->desk;
    }


    public function showDifficulty() {
        return $this->difficulty;
    }
    public function createCard($index, $value) {
        echo '<div class="card">';
        echo '<a href="playing.php?id=' . $index . '&value=' . $value . '">';
        echo '<p>id=' . $index . '</p>' ;
        echo '<p>value=' . $value . '</p>';
        echo '</a>';
        echo '</div>', "\n";
    }

    public function buildDeck($arrayValues) {
        foreach ($arrayValues  as $k => $v) {
            $this->createCard($k, $v);
        }
    }
}