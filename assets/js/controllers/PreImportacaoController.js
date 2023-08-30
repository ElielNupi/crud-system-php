var vm_pre_importacao = new Vue ({
	el: "#preImportacaoUsuarios",
	mixins: [mixin_importacao],
	data: {},
	methods: {
		confirmaDelecao: function (){
			console.log("chamou o metodo confirmaDelecao");
			var filtros = {
				confirm: true
			}
			this.delecaoTodosUsuarios(filtros);
		}
	}
})
