<?php

$busca = 'tipográfica';
$text = 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.';

echo $text;

echo '<hr>';

$arrtext = explode(' ', $text);
$count = count($arrtext);

$newText = str_replace($busca, '<b>' . $busca . '</b>', implode(' ', array_slice($arrtext, verificar($busca, $arrtext), 20)) . '...');

echo $newText;

function verificar($text, $arrtext) {
    $quantPalavra = 20;
    foreach ($arrtext as $key => $str) :
        if (strpos($str, $text) !== false) :
            if ($key < ceil($quantPalavra / 2)) :
                return 0;
            elseif ($key < count($arrtext) - ceil($quantPalavra / 2)) :
                return $key - ceil($quantPalavra / 2);
            else :
                return count($arrtext) - ceil($quantPalavra / 2);
            endif;
        endif;
    endforeach;
}
