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
    private $nivel;
    
    public function __construct() {
        //Provisorio
        if (isset($_SESSION['nivel'])):
            $this->nivel = $_SESSION['nivel'];
        endif;
    }
    
    public function listarMenu() {
        $menu = false;
        if ($this->nivel == 2):
            $menu[0]['nme']         = 'Sites criados';
            $menu[0]['ico']         = 'home';
            $menu[0]['lnk']         = FALSE;
            $menu[0]['s'][0]['nme'] = 'Comissao Ganha';
            $menu[0]['s'][0]['lnk'] = 'comissao_ganha';
            $menu[1]['nme']         = 'Cursos';
            $menu[1]['ico']         = 'home';
            $menu[1]['lnk']         = 'cursos';
            $menu[2]['nme']         = 'Suporte';
            $menu[2]['lnk']         = 'suporte';
            $menu[2]['ico']         = 'home';
        elseif ($this->nivel == 3):
            $menu[0]['nme']         = 'Colaboradores';
            $menu[0]['ico']         = 'home';
            $menu[0]['lnk']         = FALSE;
            $menu[0]['s'][0]['nme'] = 'Salarios';
            $menu[0]['s'][0]['lnk'] = 'salarios';
            $menu[0]['s'][1]['nme'] = 'Sites Criados';
            $menu[0]['s'][1]['lnk'] = 'sites_criados';
            $menu[1]['nme']         = 'Cursos';
            $menu[1]['ico']         = 'home';
            $menu[1]['lnk']         = 'cursos';
        endif;
        return $menu;
    }
    
    public function inicio() {

        if ($this->nivel == 2):
            $dados = array();
            $this->carregarModelo('painel_pInicio', $dados, 'conta');
        elseif ($this->nivel == 3):
            $dados = array();
            $this->carregarModelo('painel_aInicio', $dados, 'conta');
        else:
            #Provisorio
            if (filter_input(INPUT_POST, 'pass') == 'senha'):
                if (filter_input(INPUT_POST, 'user') == "programador"):
                    $_SESSION['nivel'] = 2;
                elseif (filter_input(INPUT_POST, 'user') == "administrador"):
                    $_SESSION['nivel'] = 3;
                else:
                    //Usuario (Cliente)
                endif;
                header("Location: /conta");
            endif;
            
            
            $this->carregarPagina('painel_login', array(), 'conta');
        endif;

    }
    
    public function cursos() {
        $dados = array();
        if ($this->nivel == 2):
            $this->carregarModelo('painel_pCursos', $dados, 'conta');
        elseif ($this->nivel == 3):
            $this->carregarModelo('painel_aCursos', $dados, 'conta');
        else:
            header("Location: /conta");
        endif;
    }
    
    public function salarios() {
        $dados = array();
        if ($this->nivel == 3):
            $this->carregarModelo('painel_salarios', $dados, 'conta');
        else:
            header("Location: /conta");
        endif;
    }
    
    public function sites_criados() {
        $dados = array();
        if ($this->nivel == 3):
            $this->carregarModelo('painel_sitesCriados', $dados, 'conta');
        else:
            header("Location: /conta");
        endif;
    }
    
    public function suporte() {
        $dados = array();
        if ($this->nivel == 2):
            $this->carregarModelo('painel_suporte', $dados, 'conta');
        else:
            header("Location: /conta");
        endif;
    }

    public function comissao_ganha() {
        $dados = array();
        if ($this->nivel == 2):
            $this->carregarModelo('painel_comissaoGanha', $dados, 'conta');
        else:
            header("Location: /conta");
        endif;
    }
    
    public function sair() {
        #Provisorio
        $_SESSION['nivel'] = null;
        header("Location: /conta");
    }

}