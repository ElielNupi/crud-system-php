Vue.mixin({
	data() {
		temaAtual: 'light'
	},
	methods: {
		mudouData(event, model) {
			console.log(event, model)
			eval("this." + model + " = '" + event.target.M_Datepicker.$el[0].value + "'");
		},
	}
});
