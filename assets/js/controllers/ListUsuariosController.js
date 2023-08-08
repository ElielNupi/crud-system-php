const vm_lista_usuarios = new Vue ({
	el: '#listandoUsuarios',

	data: {
		showModal: false 
	},
	methods:{
		showAddModal() {
			this.showModal = true;
		},
		closeAddModal() {
			this.showModal = false;
		}
	}
});
