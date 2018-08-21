<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="http://localhost/CMGP/assets/js/sys/login.js"></script>
<div class="ajax-loader hidden">
    <img src="<?= base_url() ?>images/ajax-loader.gif" class="img-responsive"/>
</div>
<div class="col-md-3 col-centered" style="margin-top:100px">
    <h3 class="form-signin-heading text-center">Login CMGP Web</h3>
    <div style="padding: 10px;">
        <img src="<?= base_url() ?>images/logo_login.png" class="img-responsive center-block"
             width="128" height="128 ">
    </div>
    <?= form_open('login?action=login', 'id="formLogin"');

    echo '<div class="form-group">';
    echo form_input(array(
        'id' => 'rm',
        'name' => 'rm',
        // 'value' => set_value('rm'),
        'class' => 'form-control',
        'placeholder' => 'Digite seu RM',
        'autofocus' => 'autofocus'
    ));
    echo '</div>';
    echo form_error('rm');

    echo '<div class="form-group">';
    echo form_password(array(
        'id' => 'senha',
        'name' => 'senha',
        'class' => 'form-control',
        'placeholder' => 'Digite sua senha'
    ));
    echo '</div>';
    echo form_error('senha');

    echo form_submit(array(
        'value' => 'Acessar',
        'id' => 'btn_acessar',
        'class' => 'btn btn-lg btn-primary btn-block'
    ));
    form_close();
    ?>
    <br/>
    <div class="messages"></div>
</div>
