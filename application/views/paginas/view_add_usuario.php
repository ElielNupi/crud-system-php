<div class="row modal" id="modalAddUsuario">
    <form class="col s12" ref="form" @submit.prevent>
        <div class="modal-content">
            <div class="row">
                <div class="input-field col s12">
                    <label for="nome">Nome Completo</label>
                    <input id="nome" type="text" v-model="usuario.nome" class="validate" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Email</label>
                    <input id="email" placeholder="seuemail@mail.com" v-model="usuario.email" type="email"
                        class="validate" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="telefone">Telefone</label>
                    <input id="telefone" type="text" placeholder="(00) 00 00000-0000" v-model="usuario.telefone" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="disabled">Data Nascimento</label>
                    <input placeholder="00/00/0000" type="text" class="datepicker"
                        v-model="usuario.dt_nascimento" @change="mudouData($event, 'usuario.dt_nascimento')" required>
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
