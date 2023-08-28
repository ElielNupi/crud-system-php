var vm_lista_usuarios = new Vue({
	mixins: [mixin_usuario],
	el: '#listandoUsuarios',
	components: {
		'list_usuarios': []
	},
	data: {
		idUsuarioAtual: 0,
	},
	data() {
		return {
			filtro: {
				nome: '',
				pagina: 1,
			},
			usuarioAtual: {
				nome: '',
				email: '',
				telefone: '',
				dt_nascimento: null
			},
			
			list_usuarios: [],
			paginaAnterior: false,
			paginaProxima: false
		}
	},
	mounted() {
		this.buscar()
		console.log(carregando());
	},
	methods: {
		init() {
			this.buscar();
		},
		pagina: function (p) {
			console.log("chamou o método pagina")
			console.log(p)
			this.filtro.pagina = p;
			this.buscar();
		},
		selecionaUsuario(usuario) {
			this.usuarioAtual.id = usuario.id;
			this.usuarioAtual.nome = usuario.nome;
			this.usuarioAtual.email = usuario.email;
			this.usuarioAtual.telefone = usuario.telefone;
			this.usuarioAtual.dt_nascimento = usuario.dt_nascimento;
		},
		editarUsuario() {
			console.log("Novo usuario cadastrado:" + this.usuarioAtual);
			console.log(this.usuarioAtual);
			const usuarioAtual = {...this.usuarioAtual};
			axios.post(base_url + "Usuarios/atualizaUsuario/", usuarioAtual)
				.then(response => {
					this.buscar();
					console.log(response.data);
				})
				.catch(error => {
					console.log(error);
				});
		},
		selecionaId(id, tipo) {
			if (tipo == 1) {
				this.idUsuarioAtual = id;
				console.log(this.idUsuarioAtual);
				this.editarUsuario();
			} else {
				this.idUsuarioAtual = id;
				console.log(this.idUsuarioAtual);
			}
		},
		deletarUsuario() {
			axios.delete(`${base_url}Usuarios/deletarUsuario/${this.idUsuarioAtual}`)
				.then(response => {
					this.buscar()
				})
				.catch(error => {
					console.error('There was an error!', error);
				});
		},
		buscar: function (tipo) {
			if (tipo != 'por_nome'){
				tipo = 'todos'
			}

			carregando(true)

			var filtros = {
				nome: this.filtro.nome,
				pagina: this.filtro.pagina ? this.filtro.pagina : 1,
				por_pagina: this.filtro.por_pagina ? this.filtro.por_pagina: 10,
				tipo: tipo,
			};

			this.listUsuarios (filtros).then((resposta) => {
				carregando(false);
				if (resposta.status == "ok") { 
					this.list_usuarios = resposta.data;
				} else {
					M.toast({
						html: dados.msg,
						classes: "rounded red",
					}),	
					this.list_usuarios = [];
				}
				setTimeout(function () {
					ativarComponentes();
				}, 500);
			})
		},
		limparBusca: function () {
			this.filtro = {
					nome: '',
					pagina: 1
				},
				this.buscar();
		},
	},

	watch: {
		list_usuarios: function (novo, velho) {
			if (novo != velho) {
				if(this.list_usuarios.count == 0) {
					this.list_usuarios.page = 1;
					this.paginaProxima = false;
					this.paginaAnterior = false;
					console.log("pagina proxima pagina false");
				}
			}
		}
	}
});
