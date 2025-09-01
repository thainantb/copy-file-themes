<?php
$blocosFlexiveis = get_field('blocos_flexiveis', $post->ID);

if (!empty($blocosFlexiveis)) {
    foreach ($blocosFlexiveis as $blocosFlexivel) {
        if ($blocosFlexivel['acf_fc_layout'] == 'galeria') {
            $bloco = $blocosFlexivel['bloco_galeria'];  ?>
            <section class="bloco-galeria">
                <div class="container">
                    <?php
                    if (!empty($bloco['frase_apoio']) || !empty($bloco['titulo_bloco'])) { ?>
                        <div class="bloco-galeria__cab">
                            <div class="row">
                                <div class="col-auto offset-md-1">
                                    <?php
                                    if (!empty($bloco['frase_apoio'])) { ?>
                                        <h2 class="padrao-titulo-menor cor-site"><?php echo $bloco['frase_apoio']; ?></h2>
                                    <?php
                                    } // if !empty $bloco['frase_apoio'] 

                                    if (!empty($bloco['titulo_bloco'])) { ?>
                                        <h3 class="texto-destaque"><?php echo $bloco['titulo_bloco']; ?></h3>
                                    <?php
                                    } // if !empty $bloco['titulo_bloco'] 
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['frase_apoio']  || !empty($bloco['titulo_bloco'])

                    if (!empty($bloco['galeria'])) { ?>
                        <div class="row g-md-4 g-2">
                            <?php
                            if (!empty($bloco['galeria'][0])) { ?>
                                <div class="col-md-6">
                                    <a href="<?php echo $bloco['galeria'][0]['sizes']['large']; ?>" data-fancybox="galeria">
                                        <picture class="bloco-galeria__img-destaque picture-padrao">
                                            <img src="<?php echo $bloco['galeria'][0]['sizes']['medium']; ?>" alt="">
                                        </picture>
                                    </a>
                                </div>
                            <?php
                            } // if !empty $bloco['galeria'][0] 
                            ?>
                            <div class="col-md-6">
                                <div class="row gy-4 gx-md-4 gx-2">
                                    <?php
                                    if (!empty($bloco['galeria'][1])) { ?>
                                        <div class="col-md-10 col-6">
                                            <a href="<?php echo $bloco['galeria'][1]['sizes']['large']; ?>" data-fancybox="galeria">
                                                <picture class="bloco-galeria__img-secundaria picture-padrao">
                                                    <img src="<?php echo $bloco['galeria'][1]['sizes']['medium']; ?>" alt="">
                                                </picture>
                                            </a>
                                        </div>
                                    <?php
                                    } // if !empty $bloco['galeria'][1] 

                                    if (!empty($bloco['galeria'][2])) { ?>
                                        <div class="col-md-8 col-6">
                                            <a href="<?php echo $bloco['galeria'][2]['sizes']['large']; ?>" data-fancybox="galeria">
                                                <picture class="bloco-galeria__img-menor picture-padrao">
                                                    <img src="<?php echo $bloco['galeria'][2]['sizes']['medium']; ?>" alt="">
                                                </picture>
                                            </a>
                                        </div>
                                    <?php
                                    } // if !empty $bloco['galeria'][2] 

                                    if (count($bloco['galeria']) >= 3) { ?>
                                        <div class="col-md-4 lista-galeria">
                                            <?php
                                            foreach ($bloco['galeria'] as $itemGaleria) { ?>
                                                <a href="<?php echo $itemGaleria['sizes']['large']; ?>" data-fancybox="galeria" class="bloco-galeria__cta">
                                                    <div>
                                                        <?php svg('mais.svg'); ?>
                                                        <h3>ver mais fotos</h3>
                                                    </div>
                                                </a>
                                            <?php
                                            } // foreach $bloco 
                                            ?>
                                        </div>
                                    <?php
                                    } // if count($bloco['galeria']) >= 3
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['galeria'] 
                    ?>
                </div>
            </section>
        <?php
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'galeria'

        if ($blocosFlexivel['acf_fc_layout'] == 'texto_destaque_imagem') {
            $bloco = $blocosFlexivel['bloco_texto_destaque_imagem']; ?>
            <section class="bloco-texto-destaque-imagem">
                <div class="container">
                    <div class="row">
                        <?php
                        if (!empty($bloco['texto_destaque'])) { ?>
                            <div class="col-lg-6 offset-lg-1 editor">
                                <?php echo $bloco['texto_destaque']; ?>
                            </div>
                        <?php
                        } // if !empty $bloco['texto_destaque']
                        if (!empty($bloco['imagem'])) { ?>
                            <div class="col-lg-5">
                                <picture class="bloco-texto-destaque-imagem__img-destaque picture-padrao">
                                    <img src="<?php echo $bloco['imagem']['sizes']['medium']; ?>" alt="<?php echo !empty($bloco['imagem']['alt']) ? $bloco['imagem']['alt'] : 'Imagem sem descrição'; ?>">
                                </picture>
                            </div>
                        <?php
                        } // if !empty $bloco['imagem']
                        ?>
                    </div>
                </div>
            </section>
            <?php
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'texto_destaque_imagem'

        if ($blocosFlexivel['acf_fc_layout'] == 'repetidor_de_blocos') {
            $bloco = $blocosFlexivel['bloco_repetidor_de_blocos'];
            $exibirEmCarrossel = !empty($blocosFlexivel['exibir_em_carrossel']) && $blocosFlexivel['exibir_em_carrossel'];
            $idBloco = uniqid();

            if (!empty($bloco)) { ?>
                <section class="bloco-abrir-conta ban-01 banner-home <?php echo $exibirEmCarrossel ? '' : 'exibir-blocos'; ?>">
                    <div class="swiper-banner" <?php echo $exibirEmCarrossel ? 'js-swiper-conta="' . $idBloco . '"' : ''; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($bloco as $itemBloco) { ?>
                                <div class="swiper-slide">
                                    <?php
                                    if (!empty($itemBloco['imagem_fundo'])) { ?>
                                        <picture class="img-fundo">
                                            <img src="<?php echo $itemBloco['imagem_fundo']['sizes']['large']; ?>" loading="lazy" alt="<?php echo $itemBloco['imagem_fundo']['alt'] ?: strip_tags($itemBloco['titulo_slide']); ?>">
                                        </picture>
                                    <?php
                                    } // if !empty $itemBloco 
                                    ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-6 offset-lg-1 col-lg86 col-md-10">
                                                <div class="ban-01__meta">
                                                    <?php
                                                    if (!empty($itemBloco['icone'])) { ?>
                                                        <div class="cp-ico"><img src="<?php echo $itemBloco['icone']['sizes']['thumbnail']; ?>" loading="lazy"></div>
                                                    <?php
                                                    } // if !empty $itemBloco['icone'] 


                                                    if (!empty($itemBloco['titulo_bloco'])) { ?>
                                                        <h2 class="padrao-titulo cor-destaque"><?php echo $itemBloco['titulo_bloco']; ?></h2>
                                                    <?php
                                                    } // if !empty $itemBloco['titulo_bloco'] 

                                                    if (!empty($itemBloco['bloco_texto'])) { ?>
                                                        <p><?php echo $itemBloco['bloco_texto']; ?></p>
                                                    <?php
                                                    } // if !empty $itemBloco['bloco_texto'] 

                                                    if (!empty($itemBloco['link']['url'])) { ?>
                                                        <a href="<?php echo $itemBloco['link']['url']; ?>" class="cp-botao vazado" cor="destaque" estilo="com-icone" target="<?php echo getTarget($itemBloco['link']['url']); ?>" <?php if (strpos($itemBloco['link']['url'], '#') === 0) echo ' data-fancybox'; ?>>
                                                            <span><?php echo $itemBloco['rotulo_botao'] ?></span>
                                                            <?php svg('seta-2.svg'); ?>
                                                        </a>
                                                    <?php
                                                    } // if !empty $itemBloco['link']['url']
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } // foreach $bloco 
                            ?>
                        </div>
                    </div>

                    <?php
                    if ($exibirEmCarrossel) { ?>
                        <div class="swiper-thumbs" js-swiper-conta-thumbs="<?php echo $idBloco; ?>">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($bloco as $itemBloco) {
                                    if (!empty($itemBloco['imagem_fundo'])) { ?>
                                        <div class="swiper-slide">
                                            <picture class="img-fundo">
                                                <img src="<?php echo $itemBloco['imagem_fundo']['sizes']['thumbnail']; ?>" loading="lazy" alt="<?php echo $itemBloco['imagem_background']['alt'] ?: strip_tags($itemBloco['titulo_slide']); ?>">
                                            </picture>
                                        </div>
                                <?php
                                    } // if !empty $itemBloco[''] 
                                } // foreach $bloco 
                                ?>
                            </div>
                        </div>
                    <?php
                    } // if $exibirEmCarrossel
                    ?>
                </section><!-- FIM [banner] ban-01 -->
            <?php
            } // if !empty $bloco 
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'galeria'

        if ($blocosFlexivel['acf_fc_layout'] == 'repetidor_itens') {
            $bloco = $blocosFlexivel['bloco_repetidor_items'];
            if (!empty($bloco)) { ?>
                <section class="bloco-principios-coop" id="cooperativismo-de-credito">
                    <div class="container">
                        <?php
                        if (!empty($bloco['texto_apoio']) || !empty($bloco['titulo_bloco'])) { ?>
                            <div class="bloco-principios-coop__cab">
                                <div class="row">
                                    <div class="col-lg-4 offset-lg-1">
                                        <?php
                                        if (!empty($bloco['texto_apoio'])) { ?>
                                            <h2 class="padrao-titulo-menor"><?php echo $bloco['texto_apoio']; ?></h2>
                                        <?php
                                        } // if !empty $bloco['texto_apoio'] 

                                        if (!empty($bloco['titulo_bloco'])) { ?>
                                            <p class="texto-destaque cor-destaque"><?php echo $bloco['titulo_bloco']; ?></p>
                                        <?php
                                        } // if !empty $bloco['titulo_bloco'] 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } // if !empty $bloco['texto_apoio'] 
                        ?>
                        <div class="row gy-5">
                            <?php
                            foreach ($bloco['itens'] as $item) { ?>
                                <div class="col-lg-4">
                                    <div class="cp-lista-conteudo__item">
                                        <?php
                                        if (!empty($item['icone'])) { ?>
                                            <img src="<?php echo $item['icone']['sizes']['thumbnail']; ?>" loading="lazy" alt="Ícone">
                                        <?php
                                        } // if !empty $item['icone'] 

                                        if (!empty($item['titulo'])) { ?>
                                            <h3 class="padrao-titulo-secundario menor"><strong><?php echo $item['titulo']; ?></strong></h3>
                                        <?php
                                        } // if !empty $item['titulo'] 

                                        if (!empty($item['texto'])) { ?>
                                            <p><?php echo $item['texto']; ?></p>
                                        <?php
                                        } // if !empty $item['texto'] 
                                        ?>
                                    </div>
                                </div>
                            <?php
                            } // foreach $bloco[''] 
                            ?>
                        </div>
                    </div>
                </section>
            <?php
            } // if !empty $bloco  
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'repetidor_itens'

        if ($blocosFlexivel['acf_fc_layout'] == 'imagem_lateral_textos') {
            $bloco = $blocosFlexivel['bloco_imagem_lateral_textos'];
            if (!empty($bloco['imagem_lateral']) || !empty($bloco['frase_apoio']) || !empty($bloco['titulo_bloco']) || !empty($bloco['bloco_texto'])) { ?>
                <section class="cont-01<?php echo $bloco['direcao_imagem'] == 'direita' ? ' imagem-outra-direita' : ''; ?> imagem-esquerda bg-destaque <?php echo $bloco['fundo']; ?>">
                    <div class="container">
                        <div class="row align-items-center <?php echo $bloco['direcao_imagem'] == 'direita' ? 'flex-lg-row-reverse' : ''; ?>">
                            <?php
                            if (!empty($bloco['imagem_lateral'])) { ?>
                                <div class="col-lg-5 <?php echo $bloco['direcao_imagem'] == 'direita' ? 'offset-lg-1' : ''; ?>">
                                    <figure>
                                        <img src="<?php echo $bloco['imagem_lateral']['sizes']['large']; ?>" loading="lazy">
                                    </figure>
                                </div>
                            <?php
                            } // if !empty $bloco['imagem_lateral'] 
                            ?>
                            <div class="col-lg-5 <?php echo $bloco['direcao_imagem'] != 'direita' ? 'offset-lg-1' : ''; ?>">
                                <?php
                                if (!empty($bloco['frase_apoio'])) { ?>
                                    <h2 class="padrao-titulo-menor"><?php echo $bloco['frase_apoio']; ?></h2>
                                <?php
                                } // if !empty $bloco['frase_apoio'] 

                                if (!empty($bloco['titulo_bloco'])) { ?>
                                    <h2 class="texto-destaque cor-branco"><?php echo strip_tags($bloco['titulo_bloco'], ['<b>', '<em>', '<strong>', '<i>']); ?></h2>
                                <?php
                                } // if !empty $bloco['titulo_bloco'] 

                                if (!empty($bloco['bloco_texto'])) { ?>
                                    <p class="cor-branco"><?php echo $bloco['bloco_texto']; ?></p>
                                <?php
                                } // if !empty $bloco['bloco_texto'] 

                                if (!empty($bloco['card']['titulo']) || !empty($bloco['card']['texto'])) { ?>
                                    <div class="bloco-cards__item">
                                        <?php
                                        if (!empty($bloco['card']['titulo'])) { ?>
                                            <h2 class="padrao-titulo-secundario menor cor-destaque">
                                                <strong><?php echo $bloco['card']['titulo']; ?></strong>
                                            </h2>
                                            <?php
                                            if (!empty($bloco['card']['texto'])) { ?>
                                                <p><?php echo $bloco['card']['texto'] ?></p>
                                        <?php
                                            } // if !empty $bloco['card']['texto']
                                        } // if !empty $bloco['card']['titulo']
                                        ?>
                                    </div>
                                <?php
                                } // if !empty $bloco['card']

                                if (!empty($bloco['link_botao']['url']) && !empty($bloco['rotulo_botao'])) { ?>
                                    <a href="<?php echo $bloco['link_botao']['url']; ?>" class="cp-botao mt-4" cor="branco" estilo="com-icone" target="<?php echo getTarget($bloco['link_botao']['url']); ?>" <?php if (strpos($bloco['link_botao']['url'], '#') === 0) echo ' data-fancybox'; ?>>
                                        <span><?php echo $bloco['rotulo_botao']; ?></span>
                                        <?php svg('seta-2.svg'); ?>
                                    </a>
                                <?php
                                } // if !empty $bloco['link_botao']['url'] || !empty $bloco['rotulo_botao']
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            } // if !empty($bloco['imagem_lateral']) || !empty($bloco['frase_apoio']) || !empty($bloco['titulo_bloco']) || !empty($bloco['bloco_texto'])
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'galeria'

        if ($blocosFlexivel['acf_fc_layout'] == 'midia_topicos') {
            $bloco = $blocosFlexivel['bloco_midia_topicos'];
            if (!empty($bloco['imagem_lateral']) || !empty($bloco['frase_apoio']) || !empty($bloco['titulo_destacado']) || !empty($bloco['bloco_texto']) || !empty($bloco['link_destaque']['url'])) { ?>
                <section class="bl-padrao bloco-trabalhe-conosco">
                    <div class="container">
                        <div class="row">
                            <?php
                            if (!empty($bloco['texto_destacado']) || !empty($bloco['imagem_lateral'])) { ?>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-2">
                                            <?php
                                            if (!empty($bloco['texto_destacado'])) { ?>
                                                <h2 class="texto-destaque cor-destaque"><?php echo $bloco['texto_destacado']; ?></h2>
                                            <?php
                                            } // if !empty $bloco['texto_destacado'] 

                                            if (!empty($bloco['imagem_lateral'])) { ?>
                                                <picture class="img-destaque picture-padrao">
                                                    <img src="<?php echo $bloco['imagem_lateral']['sizes']['large']; ?>">
                                                </picture>
                                            <?php
                                            } // if !empty $bloco['imagem_lateral'] 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } // if !empty $bloco['texto_destacado']  || !empty($bloco['imagem_lateral']) 
                            ?>
                            <div class="col-lg-4 offset-lg-1">
                                <?php
                                if (!empty($bloco['bloco_texto_1']['titulo_texto'])) { ?>
                                    <h3 class="padrao-titulo-secundario menor"><strong><?php echo $bloco['bloco_texto_1']['titulo_texto']; ?></strong></h3>
                                <?php
                                } // if !empty $bloco['bloco_texto_1']['titulo_texto'] 

                                if (!empty($bloco['bloco_texto_1']['texto'])) { ?>
                                    <p><?php echo $bloco['bloco_texto_1']['texto']; ?></p>
                                <?php
                                } // if !empty $bloco['bloco_texto_1']['texto'] 

                                if (!empty($bloco['bloco_texto_2']['titulo_texto'])) { ?>
                                    <h3 class="padrao-titulo-secundario menor"><strong><?php echo $bloco['bloco_texto_2']['titulo_texto']; ?></strong></h3>
                                <?php
                                } // if !empty $bloco['bloco_texto_2']['titulo_texto'] 

                                if (!empty($bloco['bloco_texto_2']['texto'])) { ?>
                                    <p><?php echo $bloco['bloco_texto_2']['texto']; ?></p>
                                <?php
                                } // if !empty $bloco['bloco_texto_2']['texto'] 
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            } // !empty($bloco['imagem_lateral']) || !empty($bloco['frase_apoio']) || !empty($bloco['titulo_destacado']) || !empty($bloco['bloco_texto']) || !empty($bloco['link_destaque']['url'])
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'galeria'

        if ($blocosFlexivel['acf_fc_layout'] == 'cards') {
            $bloco = $blocosFlexivel['bloco_cards'];
            if (!empty($bloco['cards'])) { ?>
                <section class="bloco-cards">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="bloco-cards__grid">
                                    <?php
                                    foreach ($bloco['cards'] as $index => $card) { ?>
                                        <div class="bloco-cards__item">
                                            <?php
                                            if (!empty($card['titulo'])) { ?>
                                                <h2 class="padrao-titulo-secundario menor cor-destaque">
                                                    <strong><?php echo $card['titulo']; ?></strong>
                                                </h2>
                                                <?php
                                                if (!empty($card['texto'])) { ?>
                                                    <p><?php echo $card['texto'] ?></p>
                                            <?php
                                                } // if !empty $card['texto']
                                            } // if !empty $card['titulo']
                                            ?>
                                        </div>
                                    <?php
                                    } // foreach $bloco['cards']
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            } // if !empty $bloco['cards']
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'cards_com_imagem'
        if ($blocosFlexivel['acf_fc_layout'] == 'cards_com_imagem') {
            $bloco = $blocosFlexivel['bloco_cards_com_imagem'];
            if (!empty($bloco['cards'])) { ?>
                <section class="bloco-cards">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="bloco-cards__grid">
                                    <?php
                                    foreach ($bloco['cards'] as $index => $card) { ?>
                                        <div class="bloco-cards__item">
                                            <?php
                                            if (!empty($card['imagem'])) { ?>
                                                <picture class="bloco-cards__img picture-padrao">
                                                    <img src="<?php echo $card['imagem']['sizes']['thumbnail']; ?>" alt="<?php echo $card['titulo']; ?>">
                                                </picture>
                                            <?php
                                            }
                                            if (!empty($card['titulo'])) { ?>
                                                <h2 class="padrao-titulo-secundario menor cor-destaque">
                                                    <strong><?php echo $card['titulo']; ?></strong>
                                                </h2>
                                                <?php
                                                if (!empty($card['texto'])) { ?>
                                                    <p><?php echo $card['texto'] ?></p>
                                                <?php
                                                } // if !empty $card['texto']
                                            } // if !empty $card['titulo']

                                            if (!empty($card['link']['url']) && !empty($card['rotulo_botao'])) { ?>
                                                <a href="<?php echo $card['link']['url']; ?>" class="cp-link" target="_blank" <?php if (strpos($card['link']['url'], '#') === 0) echo ' data-fancybox'; ?>>
                                                    <span><?php echo $card['rotulo_botao']; ?></span>
                                                    <?php svg('seta-2.svg'); ?>
                                                </a>
                                            <?php
                                            } // if !empty $card['link']['url'] && !empty $card['rotulo_botao']
                                            ?>
                                        </div>
                                    <?php
                                    } // foreach $bloco['cards']
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            } // if !empty $bloco['cards']
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'cards'

        if ($blocosFlexivel['acf_fc_layout'] == 'repetidor_cards') {
            $bloco = $blocosFlexivel['bloco_repetidor_cards'];

            if (!empty($bloco['grupo_cards'])) { ?>
                <section class="bloco-links bloco-links--alternativo bg-auxiliar">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 offset-lg-1">
                                <?php
                                if (!empty($bloco['titulo_apoio'])) { ?>
                                    <h2 class="padrao-titulo-menor"><?php echo $bloco['titulo_apoio']; ?></h2>
                                <?php
                                } // if !empty $bloco['titulo_apoio']                           
                                if (!empty($bloco['texto_apoio'])) { ?>
                                    <p class="texto-destaque cor-destaque"><?php echo $bloco['texto_apoio']; ?></p>
                                <?php
                                } // if !empty $bloco['texto_apoio'] 
                                ?>
                            </div>
                        </div>
                        <?php
                        if ($bloco['agrupamento'] == 'padrao') { ?>
                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <?php
                                    foreach ($bloco['grupo_cards'] as $grupoCard) { ?>
                                        <div class="grupo-cards">
                                            <?php if (!empty($grupoCard['titulo'])) { ?>
                                                <h3 class="padrao-titulo-secundario menor"><strong><?php echo $grupoCard['titulo']; ?></strong></h3>
                                            <?php
                                            } // if !empty $grupoCard['titulo']                                 
                                            if (!empty($grupoCard['cards'])) { ?>
                                                <div class="bloco-cards__grid">
                                                    <?php
                                                    foreach ($grupoCard['cards'] as $card) { ?>
                                                        <div class="bloco-cards__item">
                                                            <?php
                                                            if (!empty($card['titulo'])) { ?>
                                                                <p><?php echo $card['titulo'] ?></p>
                                                            <?php
                                                            } // if !empty $card['titulo']
                                                            ?>
                                                        </div>
                                                    <?php
                                                    } // foreach $grupoCard['cards']
                                                    ?>
                                                </div>
                                            <?php
                                            } // if !empty $grupoCard['cards']  
                                            ?>
                                        </div>
                                    <?php
                                    } // foreach $bloco['grupo_cards'] 
                                    ?>
                                </div>
                            </div>
                        <?php
                        } // if $bloco['agrupamento'] == 'filtro_lateral' 

                        if ($bloco['agrupamento'] == 'filtro_lateral') { ?>
                            <div class="filtro-listagem__estado-container" js-grupo-filtro>
                                <div class="filtro-listagem__estado cp-ativavel ativo">
                                    <div class="row gx-5">
                                        <div class="col-lg-3 offset-lg-1">
                                            <!-- Fitlro categorias -->
                                            <?php
                                            if (!empty($bloco['grupo_cards'])) { ?>
                                                <div class="filtro-listagem__grupo-categorias">
                                                    <nav class="filtro-listagem__botoes-categorias">
                                                        <?php
                                                        foreach ($bloco['grupo_cards'] as $indiceGrupo => $grupoCards) { ?>
                                                            <button class="cp-botao vazado <?php echo $indiceGrupo == 0 ? 'ativo' : ''; ?>" cor="destaque" js-botao-filtro="<?php echo $indiceGrupo; ?>">
                                                                <?php echo $grupoCards['titulo']; ?>
                                                            </button>
                                                        <?php
                                                        } // foreach $bloco['grupo_cards'] 
                                                        ?>
                                                    </nav>
                                                </div>
                                            <?php
                                            } // if !empty $bloco['grupo_cards'] 
                                            ?>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="grupo-cards mt-0">
                                                <div class="bloco-cards__grid">
                                                    <?php
                                                    foreach ($bloco['grupo_cards'] as $indiceGrupo => $grupoCard) { ?>
                                                        <?php
                                                        if (!empty($grupoCard['cards'])) {
                                                            foreach ($grupoCard['cards'] as $card) { ?>
                                                                <div class="bloco-cards__item <?php echo $indiceGrupo != 0 ? 'hidden' : ''; ?>" js-item-filtro="<?php echo $indiceGrupo; ?>">
                                                                    <?php
                                                                    if (!empty($card['titulo'])) { ?>
                                                                        <p><?php echo $card['titulo'] ?></p>
                                                                    <?php
                                                                    } // if !empty $card['titulo']
                                                                    ?>
                                                                </div>
                                                        <?php
                                                            } // foreach $grupoCard['cards']

                                                        } // if !empty $grupoCard['cards']  
                                                        ?>
                                                    <?php
                                                    } // foreach $bloco['grupo_cards'] 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php
                        } // if $bloco['agrupamento'] == 'filtro_lateral' 
                        ?>
                    </div>
                </section>
            <?php
            } // if !empty $bloco['repetidor_cards']
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'repetidor_cards'

        if ($blocosFlexivel['acf_fc_layout'] == 'texto_destaque') {
            $bloco = $blocosFlexivel['bloco_texto_destaque'];
            if (!empty($bloco['texto'])) { ?>
                <section class="bloco-texto-destaque">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="texto-destaque">
                                    <?php echo $bloco['texto']; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (!empty($bloco['botoes'])) {
                            $blocoContatopagina = get_field('bloco_contato_pagina', $post->ID);
                            $comFormDinamico = false;
                            if (!empty($blocoContatopagina) && $blocoContatopagina['exibicao'] == 'form_dinamico' && !empty($blocoContatopagina['formulario_dinamico'])) {
                                $URLformDinamico = get_the_permalink($blocoContatopagina['formulario_dinamico']);
                                $comFormDinamico = true;
                            } ?>
                            <div class="row justify-content-center g-3">
                                <?php
                                foreach ($bloco['botoes'] as $item) {
                                    if (!empty($item['link']) && !empty($item['rotulo_botao'])) { ?>
                                        <div class="col-auto">
                                            <a href="<?php echo $comFormDinamico == true && $item['link']['url'] ==  $URLformDinamico ? '#formulario_dinamico_' . $blocoContatopagina['formulario_dinamico'] : $item['link']['url']; ?>" <?php echo $item['abrir_modal'] ? ' data-fancybox' : ''; ?> class="cp-botao" cor="destaque" estilo="com-icone" <?php echo $item['link']['target'] == '_blank' ? 'target="_blank"' : '' ?>>
                                                <span>
                                                    <?php echo $item['rotulo_botao']; ?>
                                                </span>
                                                <?php svg('seta-2.svg'); ?>
                                            </a>
                                        </div>
                                <?php
                                    } // if !empty($item['link']) && !empty($item['rotulo_botao'])
                                } // foreach $bloco['botoes']
                                ?>
                            </div>
                        <?php
                        } // if !empty($bloco['botoes'])
                        ?>
                    </div>
                </section>
            <?php
            } // if !empty $bloco['texto']
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'texto_destaque'

        if ($blocosFlexivel['acf_fc_layout'] == 'carrossel_cards') {
            $bloco = $blocosFlexivel['bloco_carrossel_cards'];
            $blocoId = uniqid();
            if (!empty($bloco['cards'])) { ?>
                <section class="bloco-cards pt-media pb-media">
                    <?php
                    if (!empty($bloco['titulo_apoio']) || !empty($bloco['titulo_bloco']) || !empty($bloco['texto'])) { ?>
                        <div class="bloco-cards__cab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-1">
                                        <?php
                                        if (!empty($bloco['titulo_apoio'])) { ?>
                                            <h3 class="padrao-titulo-menor"><?php echo $bloco['titulo_apoio']; ?></h3>
                                        <?php
                                        } // if !empty $bloco['titulo_apoio']
                                        if (!empty($bloco['titulo_bloco'])) { ?>
                                            <h2 class="texto-destaque cor-destaque"><?php echo $bloco['titulo_bloco']; ?></h2>
                                        <?php
                                        } // if !empty $bloco['titulo_bloco']
                                        if (!empty($bloco['texto'])) { ?>
                                            <p><?php echo $bloco['texto']; ?></p>
                                        <?php
                                        } // if !empty $bloco['texto']
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['texto_apoio'] 
                    ?>
                    <div class="container">
                        <div class="swiper" js-swiper-cards="<?php echo $blocoId; ?>">
                            <div class="cp-nav-slide">
                                <div js-swiper-cards-prev="<?php echo $blocoId; ?>">
                                    <?php svg('seta-2.svg'); ?>
                                </div>
                                <div js-swiper-cards-next="<?php echo $blocoId; ?>">
                                    <?php svg('seta-2.svg'); ?>
                                </div>
                            </div>
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($bloco['cards'] as $index => $card) { ?>
                                    <div class="swiper-slide">
                                        <div class="bloco-cards__item">
                                            <?php
                                            if (!empty($card['titulo'])) { ?>
                                                <h3><?php echo $index + 1; ?></h3>
                                                <h2 class="padrao-titulo-secundario menor cor-destaque">
                                                    <strong><?php echo $card['titulo']; ?></strong>
                                                </h2>
                                                <?php
                                                if (!empty($card['texto'])) { ?>
                                                    <p><?php echo $card['texto'] ?></p>
                                            <?php
                                                } // if !empty $card['texto']
                                            } // if !empty $card['titulo']
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                } // foreach $bloco['cards']
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            } // if !empty $bloco['cards']
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'carrossel_cards'

        if ($blocosFlexivel['acf_fc_layout'] == 'agrupador_infos') {
            $bloco = $blocosFlexivel['bloco_agrupador_infos'];
            if (!empty($bloco['infos'])) { ?>
                <section class="bloco-faq bg-auxiliar">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <?php
                                if (!empty($bloco['titulo_apoio'])) { ?>
                                    <h2 class="padrao-titulo-menor"><?php echo $bloco['titulo_apoio']; ?></h2>
                                <?php
                                } // if !empty $bloco['titulo_apoio']

                                if (!empty($bloco['texto_apoio'])) { ?>
                                    <p class="texto-destaque"><?php echo $bloco['texto_apoio']; ?></p>
                                <?php
                                } // if !empty $bloco['texto_apoio'] 
                                ?>
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <div class="perguntas-frequentes">
                                    <?php
                                    foreach ($bloco['infos'] as $info) {
                                        if (!empty($info['titulo'])) { ?>
                                            <div class="bloco-faq__item">
                                                <button type="button" js-toggle-pergunta>
                                                    <span class="padrao-titulo"><?php echo $info['titulo']; ?></span>
                                                    <div class="expandir">
                                                        <canvas></canvas>
                                                        <canvas></canvas>
                                                    </div>
                                                </button>
                                                <div class="resposta">
                                                    <?php
                                                    if (!empty($info['texto'])) { ?>
                                                        <p><?php echo $info['texto']; ?></p>
                                                    <?php
                                                    } // if !empty $info['texto'] 
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        } // if !empty $info['titulo'] 
                                        ?>
                                    <?php
                                    } // foreach $bloco['infos'] 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            } // if !empty $bloco['infos'] 
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'agrupador_infos'

        if ($blocosFlexivel['acf_fc_layout'] == 'arquivos') {
            $bloco = $blocosFlexivel['bloco_arquivos']; ?>
            <section class="bloco-downloads">
                <div class="container">
                    <?php
                    if (!empty($bloco['titulo_bloco'])) { ?>
                        <div class="bloco-downloads__cab">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <h2 class="padrao-titulo-secundario cor-site"><strong><?php echo $bloco['titulo_bloco']; ?></strong></h2>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['titulo_bloco'] 

                    if (!empty($bloco['arquivos'])) { ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <ul class="bloco-downloads__grid">
                                    <?php
                                    foreach ($bloco['arquivos'] as $itemRepetidor) {
                                        if (!empty($itemRepetidor['arquivo'])) { ?>
                                            <li>
                                                <a href="<?php echo $itemRepetidor['arquivo']['url']; ?>" class="cp-download" target="_blank" rel="noopener noreferrer">
                                                    <div>
                                                        <?php svg('download.svg') ?>
                                                        <h3 class="cp-download__titulo"><?php echo $itemRepetidor['titulo']; ?></h3>
                                                    </div>
                                                </a>
                                            </li>
                                    <?php
                                        } // if !empty $itemRepetidor['arquivo'] 
                                    } // foreach $repetidorItens 
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['arquivos'] 
                    ?>
                </div>
            </section>
        <?php
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'carrossel_cards'

        if ($blocosFlexivel['acf_fc_layout'] == 'agrupador_arquivos') {
            $bloco = $blocosFlexivel['bloco_agrupador_arquivos']; ?>
            <section class="bloco-downloads bloco-faq">
                <div class="container">
                    <?php
                    if (!empty($bloco['titulo_bloco'])) { ?>
                        <div class="bloco-downloads__cab">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <h2 class="padrao-titulo-secundario cor-site"><strong><?php echo $bloco['titulo_bloco']; ?></strong></h2>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['titulo_bloco'] 

                    if (!empty($bloco['grupos_arquivos'])) { ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <?php
                                foreach ($bloco['grupos_arquivos'] as $grupoArquivos) { ?>
                                    <?php
                                    if (!empty($grupoArquivos['arquivos'])) { ?>
                                        <div class="bloco-faq__item">
                                            <button type="button" js-toggle-pergunta>
                                                <span class="padrao-titulo"><?php echo $grupoArquivos['titulo']; ?></span>
                                                <div class="expandir">
                                                    <canvas></canvas>
                                                    <canvas></canvas>
                                                </div>
                                            </button>
                                            <div class="resposta">
                                                <ul class="bloco-downloads__grid">
                                                    <?php
                                                    foreach ($grupoArquivos['arquivos'] as $itemRepetidor) {
                                                        if (!empty($itemRepetidor['arquivo'])) { ?>
                                                            <li>
                                                                <a href="<?php echo $itemRepetidor['arquivo']; ?>" class="cp-download" target="_blank" rel="noopener noreferrer">
                                                                    <div>
                                                                        <?php svg('download.svg') ?>
                                                                        <h3 class="cp-download__titulo"><?php echo $itemRepetidor['titulo']; ?></h3>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                    <?php
                                                        } // if !empty $itemRepetidor['arquivo'] 
                                                    } // foreach $grupoArquivos['arquivos']
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                <?php
                                    } // if !empty $grupoArquivos['arquivos'] 
                                } // foreach $bloco['grupos_arquivos']
                                ?>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['grupos_arquivos']
                    ?>
                </div>
            </section>
        <?php
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'carrossel_cards'

        if ($blocosFlexivel['acf_fc_layout'] == 'titulo_repetidor_dados') {
            $bloco = $blocosFlexivel['bloco_titulo_repetidor_dados']; ?>
            <section class="bloco-dados pt-maior">
                <div class="container">
                    <?php
                    if (!empty($bloco['titulo_bloco'])) { ?>
                        <div class="bloco-dados__cab">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <h2 class="padrao-titulo-secundario cor-site"><strong><?php echo $bloco['titulo_bloco']; ?></strong></h2>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['titulo_bloco'] 

                    if (!empty($bloco['repetidor_dados'])) { ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <ul class="bloco-dados__grid">
                                    <?php
                                    foreach ($bloco['repetidor_dados'] as $itemDado) { ?>
                                        <li class="bloco-dados__item">
                                            <?php
                                            if (!empty($itemDado['prefixo'])) { ?>
                                                <small><?php echo $itemDado['prefixo']; ?></small>
                                            <?php
                                            } // if !empty $itemDado['prefixo'] 

                                            if (!empty($itemDado['dado'])) { ?>
                                                <h3 class="padrao-titulo"><?php echo $itemDado['dado']; ?></h3>
                                            <?php
                                            } // if !empty $itemDado['dado'] 

                                            if (!empty($itemDado['sufixo'])) { ?>
                                                <h4><?php echo $itemDado['sufixo']; ?></h4>
                                            <?php
                                            } // if !empty $itemDado['sufixo'] 
                                            ?>
                                        </li>
                                    <?php
                                    } // foreach $bloco['repetidor_dados'] 
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    } // if !empty $bloco['repetidor_dados'] 
                    ?>
                </div>
            </section>
        <?php
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'titulo_repetidor_dados'

        if ($blocosFlexivel['acf_fc_layout'] == 'formulario_contato') {
            $bloco = $blocosFlexivel['bloco_formulario_contato']; ?>
            <section class="bloco-inscricao">
                <div class="container">
                    <div class="row">
                        <?php
                        if (!empty($bloco['titulo_bloco'])) { ?>
                            <div class="col-lg-4 offset-lg-1">
                                <div class="bloco-inscricao__inscricao">
                                    <?php
                                    if (!empty($bloco['titulo_bloco'])) { ?>
                                        <h2 class="texto-destaque cor-destaque">
                                            <?php echo $bloco['titulo_bloco']; ?>
                                        </h2>
                                        <?php
                                    } // if !empty $bloco['titulo_bloco']

                                    if (!empty($bloco['titulo_bloco'] && !empty($bloco['rotulo_botao']))) {
                                        if (!empty($bloco['tipo_formulario']) && $bloco['tipo_formulario'] == 'lead') { ?>
                                            <a href="#modal-form-lead" data-fancybox class="cp-botao" cor="destaque" estilo="com-icone">
                                                <span>
                                                    <?php echo $bloco['rotulo_botao']; ?>
                                                </span>
                                                <?php svg('seta-2.svg'); ?>
                                            </a>
                                        <?php
                                        } // if !empty $bloco['tipo_formulario']  && $bloco['tipo_formulario'] == 'lead' 
                                        else if (!empty($bloco['tipo_formulario']) && $bloco['tipo_formulario'] == 'basico') { ?>
                                            <a href="#modal-form-contato" data-fancybox class="cp-botao" cor="destaque" estilo="com-icone">
                                                <span>
                                                    <?php echo $bloco['rotulo_botao']; ?>
                                                </span>
                                                <?php svg('seta-2.svg'); ?>
                                            </a>
                                    <?php
                                        } // else if !empty $bloco['tipo_formulario'] && $bloco['tipo_formulario'] == 'basico'                                 
                                    } // if !empty $bloco['titulo_bloco']
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-2">
                                <?php
                                if (!empty($bloco['texto_apoio'])) { ?>
                                    <h2 class="texto-destaque cor-destaque">
                                        <h2 class="texto-destaque cor-destaque">
                                            <?php echo $bloco['texto_apoio']; ?>
                                        </h2>
                                    </h2>
                                <?php
                                } // if !empty $bloco['texto_apoio']

                                if (!empty($bloco['email'])) { ?>
                                    <a herf="mailto:<?php echo $bloco['email']; ?>" class="bloco-inscricao__contato" target="_blank">
                                        <?php svg('email.svg'); ?>
                                        <div class="conteudo">
                                            <h3>E-mail para contato</h3>
                                            <h4>
                                                <?php echo $bloco['email']; ?>
                                            </h4>
                                        </div>
                                    </a>
                                <?php
                                } // if !empty($bloco['email']) 
                                ?>
                            </div>
                        <?php
                        } // if !empty $bloco['titulo_bloco'] 
                        else { ?>
                            <div class="col-lg-4 offset-lg-1">
                                <?php
                                if (!empty($bloco['texto_apoio'])) { ?>
                                    <h2 class="texto-destaque cor-destaque">
                                        <h2 class="texto-destaque cor-destaque">
                                            <?php echo $bloco['texto_apoio']; ?>
                                        </h2>
                                    </h2>
                                <?php
                                } // if !empty $bloco['texto_apoio']

                                if (!empty($bloco['email'])) { ?>
                                    <a herf="mailto:<?php echo $bloco['email']; ?>" class="bloco-inscricao__contato" target="_blank">
                                        <?php svg('email.svg'); ?>
                                        <div class="conteudo">
                                            <h3>E-mail para contato</h3>
                                            <h4>
                                                <?php echo $bloco['email']; ?>
                                            </h4>
                                        </div>
                                    </a>
                                <?php
                                } // if !empty($bloco['email']) 
                                ?>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </section>
            <?php
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'carrossel_cards'

        if ($blocosFlexivel['acf_fc_layout'] == 'iframe') {
            $bloco = $blocosFlexivel['bloco_iframe'];
            if (!empty($bloco['iframe'])) { ?>
                <section class="bloco-iframe">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="editor">
                                    <?php echo $bloco['iframe']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            } // if !empty($bloco['iframe'])
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'iframe'

        if ($blocosFlexivel['acf_fc_layout'] == 'editor') {
            $bloco = $blocosFlexivel['bloco_editor'];
            if (!empty($bloco['editor'])) { ?>
                <section class="bloco-editor-texto py-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="editor">
                                    <?php echo $bloco['editor']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<?php
            } // if !empty($bloco['editor'])
            continue;
        } // if $blocosFlexivel['acf_fc_layout'] == 'editor'
    } // foreach $blocosFlexiveis
} // if !empty $blocosFlexiveis