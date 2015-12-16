<?php

class DestacarPesquisa {

    private $busca = "simplesmente é XVI editoração";
    private $conteudo = "Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.";
    private $countConteudo;
    private $quantidadeTexto = 20;
    private $numeroIniciador;
    private $palavrasQueNaoBusca = array('de', 'é');

    public function __construct() {
        echo '<b>Busca</b>:<br> ' . $this->busca . '<hr>';
        echo '<b>Texto original</b>:<br> ' . $this->conteudo . '<hr>';
        echo '<b>Texto completo com negrito</b>:<br> ' . $this->destacarBusca();
        echo '<hr>';
        echo '<b>Resultado que deve ser exibido</b>:<br> ' . implode(' ', $this->pegarParteConteudo());
    }

    private function destacarBusca() {
        $this->busca = explode(' ', $this->busca);
        $this->conteudo = explode(' ', $this->conteudo);
        $this->countConteudo = count($this->conteudo);
        foreach ($this->busca as $palavraBusca) :
            foreach ($this->conteudo as $key => $palavraConteudo) :
                if (strpos($palavraConteudo, $palavraBusca) !== false) :
                    $this->conteudo[$key] = str_replace($palavraBusca, '<b>' . $palavraBusca . '</b>', $palavraConteudo);
                    if (is_null($this->numeroIniciador) && !in_array($palavraBusca, $this->palavrasQueNaoBusca)) :
                        $this->setNumeroIniciador($key);
                    endif;
                endif;
            endforeach;
        endforeach;
        return implode(' ', $this->conteudo);
    }

    private function pegarParteConteudo() {
        foreach ($this->conteudo as $palavra) :
            if (strpos($palavra, $palavra)) :

            endif;
        endforeach;
        return array_slice($this->conteudo, $this->numeroIniciador, $this->quantidadeTexto);
    }

    private function setNumeroIniciador($key) {
        if ($key < ceil($this->quantidadeTexto / 2)) :
            $this->numeroIniciador = 0;
        elseif ($key < $this->countConteudo - ceil($this->quantidadeTexto / 2)) :
            $this->numeroIniciador = $key - ceil($this->quantidadeTexto / 2);
        else :
            $this->numeroIniciador = $this->countConteudo - ceil($this->quantidadeTexto / 2);
        endif;
    }

}

new DestacarPesquisa;
