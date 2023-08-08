<div id="listandoUsuarios">
<?php $this->load->view("paginas/view_add_usuario") ?>

    <a class="btn btn-large waves-effect waves-light btn-adicionar-superior hide-on-med-and-down" @click="showAddModal">
        Adicionar usuário
    </a>
		<modal-add-usuario v-if="showModal" @close-add-modal="closeAddModal"></modal-add-usuario>
    <ul class="collection">
        <li class="collection-item avatar">
            <img src="" alt="" class="circle">
            <span class="title">Usuario 1</span>
            <p>First Line <br>
                Second Line
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
        <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Usuario 2</span>
            <p>First Line <br>
                Second Line
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
        <li class="collection-item avatar">
            <i class="material-icons circle green">insert_chart</i>
            <span class="title">Usuario 3</span>
            <p>First Line <br>
                Second Line
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
        <li class="collection-item avatar">
            <i class="material-icons circle red">play_arrow</i>
            <span class="title">Usuario 4</span>
            <p>First Line <br>
                Second Line
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
    </ul>
</div>
