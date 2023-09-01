var vm_usuario = new Vue({
	el: '#modalAddUsuario',
	data: {
		usuario: {
			nome: '',
			email: '',
			telefone: '',
			dt_nascimento: null
		},
	},	
	methods: {
		cadastrar: function () {
			console.log("Novo usuario cadastrado:" + this.usuario);
			axios.post(base_url + "Usuarios/criarUsuario/", this.usuario)
				.then(response => {
					vm_lista_usuarios.buscar();
					console.log(response.data);
					console.log(this.usuario.dt_nascimento);
				})
				.catch(error => {
					console.log(error);
				});
		},
	}
})

