<div id="listandoUsuarios">
    <nav>
        <div class="nav-wrapper bg-secundaria">
            <div class="col s12">
                <a class="breadcrumb white-text" href="<?php base_url("Home")?>">Inicial</a>
                <a id="btn-exportar"
                    class="waves-effect btn-large btn-adicionar-superior hide-on-med-and-down modal-trigger btn-primaria right"
                    href="<?php base_url("") ?> Exportacao"><i class="material-icons left">file_upload</i>
                    Exportar usuários
                </a>
                <a id="btn-importar"
                    class="waves-effect btn-large btn-adicionar-superior hide-on-med-and-down modal-trigger btn-primaria right"
                    href="<?php base_url("") ?> Importacao"><i class="material-icons left">file_download</i>
                    Importar usuários
                </a>
                <a id="btn-adicionar"
                    class="waves-effect btn-large btn-adicionar-superior hide-on-med-and-down modal-trigger btn-primaria right"
                    href="#modalAddUsuario"><i class="material-icons left">add</i>
                    Adicionar usuário
                </a>
            </div>
        </div>
    </nav>

    <!-- Filtros de Usuarios -->
    <div class="row no-margin-bottom">
        <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion">
                <li class="active">
                    <div class="collapsible-header bg-secundaria white-text">
                        <strong><i class="material-icons left">filter_list</i>Filtro</strong>
                    </div>
                    <form class="collapsible-body" @submit.prevent>
                        <div class="row no-margin-bottom">
                            <div class="col m9 s8">
                                <div class="input-field">
                                    <input id="nome" name="nome" type="text" v-model="filtro.nome">
                                    <label for="nome">Nome</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 right-align">
                                <span class="btn waves-effect btn-primaria" @click="limparBusca()">
                                    <i class="fa fa-2x fa-times left"></i>
                                    <i class="material-icons left">clear</i>
                                    Limpar busca
                                </span>
                                <button class="btn waves-effect btn-secundaria" type="button"
                                    @click="buscar('por_nome')" name="action">
                                    <i class="fa fa-2x fa-search left"></i>
                                    <i class="material-icons left">search</i>
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Listar Usuarios -->
    <div class="row">
        <ul class="collection" v-if="list_usuarios.data.length > 0">
            <li id="card-usuarios" v-for="(usuario, key) in list_usuarios.data" class="collection-item avatar"
                :key="key">
                <div>
                    <div><img src="./assets/img/user.png" alt="" class="circle"></div>
                    <i class="material-icons">person</i>
                    <span class="title">
                        {{ usuario.nome }}
                    </span>
                    <p> {{ usuario.telefone }} <br>
                        {{ usuario.email }}
                    </p>
                </div>
                <div id="btn-opcoes">
                    <a class="dropdown-trigger btn waves-effect btn-primaria right" href="#!"
                        :data-target="'dropdown' + usuario.id"><i class="material-icons left">settings</i>
                        Opções
                    </a>
                </div>
                <ul :id="'dropdown' + usuario.id" class='dropdown-content'>
                    <li><a class="modal-trigger" href="#modal_edit_usuario" @click="selecionaUsuario(usuario)"><i
                                class="material-icons left">create</i>Editar</a></li>
                    <li><a class="modal-trigger red-text" href="#modalDelUsuario" @click="selecionaId(usuario.id, 2)"><i
                                class="material-icons left">delete</i>Deletar</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Delete Modal -->
    <div id="modalDelUsuario" class="modal bottom-sheet">
        <div class="modal-content">
            <h1>Deletar Usuário</h1>
            <p>Você tem certeza que deseja deletar este usuario?</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close blue darken-2 white-text btn-flat modal-close"><i class=" material-icons left">close</i>Cancelar</a>
            <a href="#!" class="modal-close red lighten-1 white-text btn-flat modal-close" @click="deletarUsuario()"><i class=" material-icons left">delete</i>Sim, deletar</a>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="modal_edit_usuario" class="modal">
        <div class="modal-header">

        </div>
        <div class="modal-content">
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <label>Nome</label>
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate" v-model="usuarioAtual.nome">
                        </div>
                    </div>
                    <div class="row">
                        <label>Email</label>
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" v-model="usuarioAtual.email">
                        </div>
                    </div>
                    <div class="row">
                        <label>Telefone</label>
                        <div class="input-field col s12">
                            <input id="editTelefone" type="text" v-model="usuarioAtual.telefone">
                        </div>
                    </div>
                    <div class="row">
                        <label for="disabled">Data Nascimento</label>
                        <div class="input-field col s12">
                            <input id="dtp" type="text" class="datepicker" v-model="usuarioAtual.dt_nascimento">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a class="waves-effect waves-light red darken-4 btn modal-close"><i
                        class=" material-icons left">close</i>
                    Cancelar</a>
                <a href="#!" class="btn waves-effect waves-light green darken-3 modal-close" name="action"
                    @click="editarUsuario()">Atualizar
                    <i class="material-icons right">send</i>
                </a>
            </div>
        </div>
        </form>
    </div>

    <!-- Paginação -->
    <div class="row paginacao no-print">
        <div class="col s2">
            <a class="btn waves-effect waves-light light-green darken-4 bg-secundaria" href="#!"
                @click="pagina(list_usuarios.page - 1)" :disabled="list_usuarios.page == 1">
                <i class="material-icons">keyboard_arrow_left</i>
            </a>
        </div>
        <div class="col s8 input-field center-align">
            <select @change="pagina(filtro.pagina)" v-model="filtro.pagina">
                <option :value="(index + 1)" v-for="(p, index) in list_usuarios.pages"
                    :selected="(index + 1) == list_usuarios.page">Página {{ index + 1}}</option>
            </select>

            <p>Total de registros: {{ list_usuarios.count }}</p>
        </div>

        <div class="col s2 right-align">
            <a class="btn waves-effect waves-light light-green darken-4 bg-secundaria" href="#!"
                @click="pagina(list_usuarios.page + 1)"
                :disabled="list_usuarios.pages == 0 || list_usuarios.page == list_usuarios.pages">
                <i class="material-icons">keyboard_arrow_right</i>
            </a>
        </div>
    </div>

</div>

<?= $paginaInterna ?>
