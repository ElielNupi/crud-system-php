var mixin_importacao = {
	data(){
		return {};
	},
	methods: {
       async uploadArquivo (dados) {
            let params = {
                ...dados,
            };
            
            var url = base_url + "Importacao/importarDados";
            return await axios.post(url, params).then((resposta) => {
                console.log("Post no Axios feito!")
                console.log(params)
				return resposta.data;
			});
        },
		
		 async delecaoTodosUsuarios (dados) {
			carregando(true);
			let params = {
				...dados,
			};

			var url = base_url + "Usuarios/apagarTodosUsuarios"
			return await axios.post(url, params).then((resposta) => {
				if (resposta.data.status == "ok") {
					console.log(params)
					console.log("Delecao feita com sucesso!")
					carregando(false);
					window.location.href = base_url + "Home";
				} else {
					console.log("Deu problema!")
					carregando(false);
                	console.log(params)
					console.log(resposta)
					window.location.href = base_url + "Home";
				}
			});
		}
    }
}
