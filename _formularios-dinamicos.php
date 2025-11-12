<?php

if (!empty($blocoContatoPagina['exibicao']) && $blocoContatoPagina['exibicao'] == 'form_dinamico') {

    $formularioID = '';
    if (!empty($blocoContatoPagina['exibicao']) && !empty($blocoContatoPagina['formulario_dinamico'])) {
        $formularioID = $blocoContatoPagina['formulario_dinamico'];

        $argsFormularios = array(
            'post_type' => 'formulario',
            'numberposts' => 1,
            'fields' => 'ids',
            'post__in' => array($formularioID),
        );

        $formularios = get_posts($argsFormularios);

        if (!empty($formularios)) {
            $formulario = $formularios[0];
        }

        // foreach ($formularios as $formulario) {
        //     $forms['form_dinamico_' . $formulario] = get_the_title($formulario);
        // }
    }

    if (!empty($formulario)) {
        $termoSCR = get_field('aplicar_termo_scr', $formulario); ?>
        <section class="bloco-inscricao">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1">
                        <div class="bloco-inscricao__inscricao">
                            <?php
                            if (!empty($blocoContatoPagina['titulo_bloco'])) { ?>
                                <h2 class="texto-destaque cor-destaque mb-2"><?php echo $blocoContatoPagina['titulo_bloco']; ?></h2>
                            <?php
                            } // if !empty $blocoContatoPagina['titulo_bloco'] 

                            if (!empty($blocoContatoPagina['texto_apoio'])) { ?>
                                <p class="texto-destaque menor">
                                    <?php echo $blocoContatoPagina['texto_apoio']; ?>
                                </p>
                            <?php
                            } // if !empty $blocoContatoPagina['texto_apoio'] 

                            if (!empty($blocoContatoPagina['rotulo_botao'])) { ?>
                                <a href="#formulario_dinamico_<?php echo esc_html($formulario); ?>" data-fancybox class="cp-botao" cor="destaque" estilo="com-icone" <?php echo $termoSCR == true ? 'js-dispara-api' : ''; ?>>
                                    <span><?php echo $blocoContatoPagina['rotulo_botao']; ?></span>
                                    <?php svg('seta-2.svg'); ?>
                                </a>
                            <?php
                            } // if !empty $blocoContatoPagina['rotulo_botao'] 
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php
                        if (!empty($blocoContatoPagina['subtitulo_bloco'])) { ?>
                            <h2 class="texto-destaque cor-destaque menor">
                                <?php echo $blocoContatoPagina['subtitulo_bloco']; ?>
                            </h2>
                        <?php
                        } // if !empty $blocoContatoPagina['subtitulo_bloco'] 

                        if (!empty($blocoContatoPagina['instagram']) && !empty($blocoContatoPagina['instagram_arroba'])) { ?>
                            <a href="<?php echo $blocoContatoPagina['instagram']; ?>" class="bloco-inscricao__contato" target="_blank">
                                <?php svg('instagram.svg'); ?>
                                <div class="conteudo">
                                    <h3>Instagram</h3>
                                    <h4><?php echo $blocoContatoPagina['instagram_arroba']; ?></h4>
                                </div>
                            </a>
                        <?php
                        } // if !empty $blocoContatoPagina['instagram'] 

                        if (!empty($blocoContatoPagina['email'])) { ?>
                            <a href="mailto:<?php echo $blocoContatoPagina['email']; ?>" class="bloco-inscricao__contato">
                                <?php svg('email.svg'); ?>
                                <div class="conteudo">
                                    <h3>Email</h3>
                                    <h4><?php echo $blocoContatoPagina['email'] ?></h4>
                                </div>
                            </a>
                        <?php
                        } // if !empty $blocoContatoPagina['email'] 
                        ?>
                    </div>
                </div>
            </div>
        </section>


        <div id="formulario_dinamico_<?php echo esc_html($formulario); ?>" class="cp-modal">
            <?php
            $remetentes = get_field('remetentes', $formulario);
            $campos = get_field('campos', $formulario);
            $mensagemSucesso = get_field('mensagem_sucesso', $formulario);
            $tituloFormulario = get_field('titulo_formulario', $formulario);
            function sanitize_name($string)
            {
                $slug = sanitize_title($string);
                return str_replace('-', '_', $slug);
            } ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="cp-modal__wrapper" js-form>
                            <button class="fechar-modal" js-fechar-fancybox>
                                <?php svg('xis.svg'); ?>
                            </button>
                            <form method="post" js-formulario class="form-02 form-dinamico">
                                <div class="hidden"><input name="trap" placeholder="Trap"></div>
                                <input type="hidden" name="action" value="<?php echo esc_html('form_dinamico_' . $formulario); ?>">
                                <input type="hidden" name="titulo_pagina" value="<?php echo get_the_title($post->ID); ?>">
                                <input type="hidden" name="url_pagina" value="<?php echo $urlAtual; ?>">
                                <?php
                                if (!empty($tituloFormulario)) { ?>
                                    <h2 class="card-form__titulo cadastro-form__titulo"><?php echo $tituloFormulario; ?></h2>
                                <?php
                                } // if !empty $tituloFormulario 
                                ?>
                                <?php
                                foreach ($campos as $campo) {
                                    if ($campo['tipo_campo'] == 'text') {
                                        $mascaraCampo = '';
                                        $validarCampo = '';
                                        $placeholder = '';
                                        $nomeLimpo = sanitize_name($campo['nome']);
                                        if ($campo['mascara_campo'] == "telefone") {
                                            $mascaraCampo = 'telefone';
                                            $placeholder = '(00) 00000 00000';
                                            $validarCampo = 'telefone';
                                        } else if ($campo['mascara_campo'] == "cpf") {
                                            $mascaraCampo = 'cpf';
                                            $placeholder = '000.000.000-00';
                                            $validarCampo = 'cpf';
                                        } else if ($campo['mascara_campo'] == "cnpj") {
                                            $mascaraCampo = 'cnpj';
                                            $validarCampo = 'cnpj';
                                        } else if ($campo['mascara_campo'] == "cpf_cnpj") {
                                            $mascaraCampo = 'cpf-cnpj';
                                        } else if ($campo['mascara_campo'] == "cep") {
                                            $mascaraCampo = 'cep';
                                            $placeholder = '00000-000';
                                        } else if ($campo['mascara_campo'] == "valor") {
                                            $mascaraCampo = 'valor';
                                        } else if ($campo['mascara_campo'] == "data") {
                                            $mascaraCampo = 'data';
                                            $placeholder = 'dd/mm/yyyy';
                                            $validarCampo = 'data';
                                        } else if ($campo['mascara_campo'] == "nome") {
                                            $validarCampo = 'nome';
                                        } else {
                                            $mascaraCampo = '';
                                        } ?>
                                        <div class="form-02__grupo">
                                            <label for="<?php echo esc_html($nomeLimpo); ?>"><?php echo esc_html($campo['nome']); ?></label>
                                            <input type="text" id="<?php echo esc_html($nomeLimpo); ?>" name="<?php echo esc_html($nomeLimpo); ?>" <?php echo $mascaraCampo ? 'mascara="' . esc_html($mascaraCampo) . '"' : ''; ?> <?php echo $campo['obrigatorio'] ? 'required' : ''; ?> <?php echo $placeholder ? 'placeholder="' . $placeholder . '"' : ''; ?> <?php echo $validarCampo ? 'validar-campo="' . $validarCampo . '"' : ''; ?>>
                                            <?php
                                            if (!empty($validarCampo)) { ?>
                                                <span class="erro-validacao" style="display:none;"><?php echo esc_html($campo['nome']); ?> inválido</span>
                                            <?php
                                            } // if !empty $validarCampo 
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    if ($campo['tipo_campo'] == 'textarea') {
                                        $nomeLimpo = sanitize_name($campo['nome']); ?>
                                        <div class="form-02__grupo">
                                            <label for="<?php echo esc_html($nomeLimpo); ?>"><?php echo esc_html($campo['nome']); ?></label>
                                            <textarea id="<?php echo esc_html($nomeLimpo); ?>" name="<?php echo esc_html($nomeLimpo); ?>" <?php echo $campo['obrigatorio'] ? 'required' : ''; ?>></textarea>
                                        </div>
                                    <?php
                                    }
                                    if ($campo['tipo_campo'] == 'email') {
                                        $nomeLimpo = sanitize_name($campo['nome']); ?>
                                        <div class="form-02__grupo">
                                            <label for="<?php echo esc_html($nomeLimpo); ?>"><?php echo esc_html($campo['nome']); ?></label>
                                            <input type="text" id="<?php echo esc_html($nomeLimpo); ?>" name="<?php echo esc_html($nomeLimpo); ?>" <?php echo $campo['obrigatorio'] ? 'required' : ''; ?> validar-campo="email">
                                            <span class="erro-validacao" style="display:none;"><?php echo esc_html($campo['nome']); ?> inválido</span>
                                        </div>
                                    <?php
                                    }

                                    if ($campo['tipo_campo'] == 'select' && !empty($campo['selecao'])) {
                                        $nomeLimpo = sanitize_name($campo['nome']); ?>
                                        <div class="form-02__grupo">
                                            <label for="<?php echo esc_html($nomeLimpo); ?>"><?php echo esc_html($campo['nome']); ?></label>
                                            <select name="<?php echo esc_html($nomeLimpo); ?>" id="<?php echo esc_html($nomeLimpo); ?>" <?php echo $campo['obrigatorio'] ? 'required' : ''; ?>>
                                                <option value="">Selecione</option>
                                                <?php
                                                foreach ($campo['selecao'] as $opcao) { ?>
                                                    <option value="<?php echo esc_html($opcao['opcao']); ?>"><?php echo esc_html($opcao['opcao']); ?></option>
                                                <?php
                                                } // foreach $campo['opcoes'] 
                                                ?>
                                            </select>
                                        </div>
                                    <?php
                                    }
                                    if ($campo['tipo_campo'] == 'opcoes' && !empty($campo['opcoes']) && !empty($campo['tipo_opcoes'])) {
                                        $nomeLimpo = sanitize_name($campo['nome']); ?>
                                        <div class="form-02__grupo">
                                            <label><?php echo esc_html($campo['nome']); ?></label>
                                            <div class="formulario__radio-grupo">
                                                <?php
                                                foreach ($campo['opcoes'] as $indice => $opcao) { ?>
                                                    <div class="formulario__<?php echo $campo['tipo_opcoes'] == 'unico' ? 'radio' : 'checkbox' ?>">
                                                        <input type="<?php echo $campo['tipo_opcoes'] == 'unico' ? 'radio' : 'checkbox' ?>" id="<?php echo esc_html($nomeLimpo) . '_' . $indice; ?>" name="<?php echo esc_html($nomeLimpo); ?><?php echo $campo['tipo_opcoes'] == 'multiplo' ? '[]' : ''; ?>" value="<?php echo esc_html($opcao['opcao']); ?>" <?php echo $campo['obrigatorio'] ? 'required' : ''; ?>>
                                                        <label for="<?php echo esc_html($nomeLimpo) . '_' . $indice; ?>"><?php echo esc_html($opcao['opcao']); ?></label>
                                                    </div>
                                                <?php
                                                } // foreach $campo['opcoes'] 
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    if ($campo['tipo_campo'] == 'termos' && !empty($campo['texto_termo'])) { ?>
                                        <div class="formulario__grupo">
                                            <div class="aceitar-termos">
                                                <label><?php echo $campo['texto_termo']; ?></label>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } // foreach $campos 

                                if ($termoSCR == true) { ?>
                                    <div class="form-02__grupo">
                                        <div class="aceitar-termos">
                                            <input class="no-style" type="checkbox" name="aceito-tratamento-scr" id="aceito-tratamento-scr" value="Autorizo" required>
                                            <span class="marcador"></span>
                                            <label for="aceito-tratamento-scr" id="mensagem-finalidade"></label>
                                        </div>
                                    </div>
                                <?php } // if $termoSCR == true 
                                ?>
                                <div js-form-erro class="alerta-form--fail hidden">Ouve algum erro, tente novamente mais tarde</div>
                                <?php // hcaptcha dev 
                                ?>
                                <div class="h-captcha d-flex justify-content-center" data-sitekey="<?php echo getSiteKey(); ?>"></div>
                                <button class="cp-botao" cor="destaque" type="submit" id="enviar-formulario">enviar</button>
                            </form>
                            <div class="sucesso-abrir-conta sucesso-abrir-conta--alternativo hidden" js-form-sucesso>
                                <div class="container">
                                    <div class="sucesso-abrir-conta__cab">
                                        <div class="row justify-content-center">
                                            <div class="col-auto">
                                                <div class="header__logo-container">
                                                    <a href="<?php echo site_url(); ?>" class="logo">
                                                        <?php include 'images/svg/logo.svg'; ?>
                                                    </a>
                                                    <h2 class="header__titulo-menu">Sicredi Integração RS/MG</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                                            <div class="sucesso-abrir-conta__meta">
                                                <div class="form-sucesso__ico"><?php svg('read-chat.svg'); ?></div>
                                                <?php
                                                if (!empty($mensagemSucesso)) {
                                                    echo $mensagemSucesso;
                                                } // if !empty $mensagemSucesso 
                                                ?>
                                                <a href="<?php echo site_url(); ?>" class="cp-botao vazado" cor="branco">Voltar para o site Sicredi Integração RS/MG</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } // if !empty $formulario 
} // 
?>