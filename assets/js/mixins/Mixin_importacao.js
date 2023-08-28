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
        }
    }
}
