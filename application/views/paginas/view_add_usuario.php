<div class="row modal" id="modalAddUsuario">
    <form class="col s12" ref="form" @submit.prevent>
        <div class="modal-header bg-secundaria text-white">
            <span><a class="modal-close" href="#"><i class="material-icons text-alert white-text right">close</i></a></span>
            <h4 class="white-text"> Inserir novo Usuário </h4>
        </div>
        <div class="modal-content">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" v-model="usuario.nome" class="validate">
                    <label for="first_name">Nome Completo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" placeholder="seuemail@mail.com" v-model="usuario.email" type="email"
                        class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="telefone" type="text" placeholder="(00) 00 00000-0000" v-model="usuario.telefone">
                    <label for="password">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="dtp" placeholder="00/00/0000" type="text" class="datepicker"
                        v-model="usuario.dt_nascimento" @change="mudouData($event, 'usuario.dt_nascimento')">
                    <label for="disabled">Data Nascimento</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="waves-effect waves-light red darken-4 btn modal-close"><i class=" material-icons left">close</i>
                Cancelar</a>
            <button class="btn waves-effect waves-light green darken-3 modal-close" @click="cadastrar"
                name="action">Cadastrar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>
