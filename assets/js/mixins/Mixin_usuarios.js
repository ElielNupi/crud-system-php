var mixin_usuario = {
	data(){
		return {};
	},
	methods: {
		async listUsuarios(filtro) {
			let params = {
				...filtro,
			};

			var url = base_url + "Usuarios/get/usuarios";
			return await axios.post(url, params).then((resposta) => {
				return resposta.data;
			})
		}
	}
}
