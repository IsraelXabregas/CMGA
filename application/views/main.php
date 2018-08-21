<div class="jumbotron">
    <div class="container">
        <!--MOSTRA O NOME DO USUÁRIO DA SESSÃO-->
        <h2>Bem vindo, <?php echo $this->session->userdata('nome'); ?>.
            <!--Função para saudação de acordo com hora-->
            <?php

            $hr = date(" H ");
            if ($hr >= 12 && $hr < 18) {
                $resp = "Boa tarde!";
            } else if ($hr >= 0 && $hr < 12) {
                $resp = "Bom dia!";
            } else {
                $resp = "Boa noite!";
            }
            echo "$resp";
            ?>
        </h2>
              <br>
        <p>Este sistema faz parte do projeto de TCC do curso de Automação Industrial da ETEC Presidente Vargas.</p>
        <p>Navegue utilizando os menus acima.</p>
        <?
        // $datestring = '%d/%m/%Y - %H:%ih';
        // $time = time();
        // echo mdate($datestring, $time);
        echo date('Y-m-d H:i:s');


        ?>
    </div>
</div>
