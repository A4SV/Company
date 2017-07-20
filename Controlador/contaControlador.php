<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Nícola Henrique Serafim
 */
class contaControlador extends Controlador {
    
    public function inicio() {
        
        $dados = array();
        $this->carregarModelo('painel_inicio', $dados, 'conta');
        
    }
}