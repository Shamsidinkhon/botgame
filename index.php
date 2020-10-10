<?php
require('Game.php');


if ($_POST) {
    $game = new Game(1, 10);
    $game->play();
    $results = $game->getResults();
    echo "
        <br>
        <form action='/index.php' method='post'>
            <input type='hidden' value='1' name='hiddenInput'>
            <input type='submit' value='Начать заново'>
        </form>
    ";
    foreach ($results as $key => $value) {
        $htmlResult = "";
        foreach ($value['results'] as $item) {
            $htmlResult .= "
            <tr>
                <td>{$item[0]}</td>
                <td>{$item[1]}</td>
            </tr>
            ";
        }
        echo "
        <br>
        <table border='1'>
            <tr>
                <th>Round: {$key}</th>
                <th>Winner: {$value['winner']}</th>
            </tr>
            <tr>
                <th>Bot 1</th>
                <th>Bot 2</th>
            </tr>
            {$htmlResult}
        </table>
        ";
    }

} else {
    echo "
        <h3>Нажмите кнопку, чтобы начать</h3>
        <form action='/index.php' method='post'>
            <input type='hidden' value='1' name='hiddenInput'>
            <input type='submit' value='Старт'>
        </form>
    ";
}
