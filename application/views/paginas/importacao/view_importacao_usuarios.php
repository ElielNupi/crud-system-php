<div id="importacao">
    <nav>
        <div class="nav-wrapper bg-secundaria">
            <div class="col s12">
                <a class="breadcrumb white-text" href="<?php base_url("Importacao")?>">Importação</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <p class="flow-text">
        <blockquote>
            <h5><strong> &#128229 Importação de Usuários via Arquivo .CSV</strong></h5>

            Para garantir uma importação tranquila e sem erros, é importante seguir o modelo de planilha do
            sistema. Este modelo específico garante que os dados sejam lidos corretamente e inseridos nos campos
            apropriados. Você pode baixar o modelo de planilha <a href="#">clicando aqui</a>. Certifique-se de
            seguir as instruções no modelo para preencher cada coluna com as informações adequadas.
            <br> <br>
            <strong>1 .</strong> Baixe o modelo de planilha a partir do link fornecido. <br> <br>
            <strong>2 .</strong> Abra o arquivo baixado com seu software de planilha favorito. <br> <br>
            <strong>3 .</strong> Preencha cada coluna com os dados dos usuários, respeitando os cabeçalhos indicados.
            <br> <br>
            <strong>4 .</strong> Salve o arquivo no formato .CSV quando tiver preenchido todos os detalhes. <br> <br>
            <strong>5 .</strong> Volte a esta página de importação e clique no botão "Escolher arquivo" abaixo. <br> <br>
            <strong>6 .</strong> Selecione o arquivo .CSV que você criou e clique em "Enviar". <br> <br>
            <strong>7 .</strong> Nossa ferramenta cuidará do resto e você será notificado quando a importação for
            concluída com sucesso! <br> <br>
        </blockquote>
        </p>
    </div>
    <div>
        <form enctype="multipart/form-data" @submit.prevent>
            <input type="file" id="myFile" accept=".csv" name="filename" @change="arquivoChange($event)">
            <br> <br>
            <a class="waves-effect waves-light btn btn-primaria" name="importarSubmit" @click="subirArquivo"><i class="material-icons left">file_upload
                </i>Enviar</a>
        </form>
    </div>

</div>
