<div class="col s12 #aeea00 lime accent-4">
	Inicial
</div>

<div id="appHome">
	<h1> Testando controller/view</h1>
    <a href="<?php base_url("")?>Home"> Testando Link</a>
	<p> <strong>Testando Vue</strong> {{ atributoTeste }}</p>
    <table class="highlight">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Data Nascimento</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>

            <!-- <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
        </tr>
        <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
        </tr>
        <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
        </tr> -->
        </tbody>
    </table>
	<button @click="transformarFrase('testes')"> @Testando VD do Vue</button>
</div>
<script src="assets/js/controllers/HomeController.js"></script>
