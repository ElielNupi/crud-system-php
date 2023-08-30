var vm_importacao = new Vue ({
    el:"#importacao",
    mixins: [mixin_importacao],
    data: {
        arquivo: null
    },
    methods: {
        arquivoChange: function(e) {
            const arquivosPermitidos = ['csv'];
            const arq = e.target.files[0];
            const tipoArquivo = arq.name.split('.').pop();
          
            if (arquivosPermitidos.includes(tipoArquivo)) {
              this.arquivo = arq;
            } else {
              alert('Apenas arquivos .csv são permitidos!');
            }
          },

        subirArquivo: function() {
            this.uploadArquivo (this.arquivo).then((resposta) => {
                carregando(true);
            });
        },
    },
})
