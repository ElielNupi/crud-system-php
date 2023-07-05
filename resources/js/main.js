var base_url   = window.location.origin + "/crud-smbstore-CI";

$(document).ready(function(){
    
    // Ajax
	$('#usuariosTable').DataTable({
        "ajax": base_url + "/Home/buscarDados",
        "order": [],
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
    }
    });

    // plugin de mascara para telefone
    $('#telefone').mask('(00) 0 0000-0000');
    $('#editTelefone').mask('(00) 0 0000-0000');

    $('#createForm').submit(function(event){
        event.preventDefault(); 

        $.ajax({
            url : base_url + "/Usuarios/addUsuario",
            data : $('#createForm').serialize(),
            type : 'post',
            async: false,
            dataType : 'json',    
            success : function(response){
    
                $('#createModal').modal('hide');
                $('#createForm')[0].reset();
                alert('Cadastro feito com sucesso!');
                $('#usuariosTable').DataTable().ajax.reload();
            },
            error : function(){
                alert('Error')
            }
        });
    });

    $('#editForm').submit(function(event){
        event.preventDefault(); 

        $.ajax({
            url : base_url + "/Usuarios/atualizaUsuario",
            data : $('#editForm').serialize(),
            type : 'post',
            async: false,
            dataType : 'json',    
            success : function(response){
    
                $('#editModal').modal('hide');
                $('#editForm')[0].reset();
                
                if(response == 1){
                    alert('Usuario atualizado com sucesso!');
                } else{
                    alert('Erro durante atualização com o BD');
                }

                $('#usuariosTable').DataTable().ajax.reload();
            },
            error : function(){
                alert('Error')
            }
        });
    });

});

function editFun(id){
   //alert(id);
    $.ajax({
        url: base_url + "/Usuarios/getDadosEditaveis",
        method:"post",
        data:{id:id},
        dataType:"json",

        success:function(response){
            $('#editID').val(response.id);
            $('#editNome').val(response.nome);
            $('#editEmail').val(response.email);
            $('#editData').val(response.data_nascimento);
            $('#editTelefone').val(response.telefone);
            $('#editModal').modal({
                backdrop:"static",
                keyboard:false
            });
        },

        error : function(){
            alert('Error')
        }
    });

}

function deleteFun(id){
    if(confirm('Deseja deletar este usuário?') == true){
        $.ajax({
            url: base_url + "/Usuarios/deleteUsuario",
            method: "post",
            dataType:"json",
            data: {id:id},
            success: function(response){
                if (response == 1){
                    alert("Usuario deletado com sucesso!")
                    $('#usuariosTable').DataTable().ajax.reload();
                } else {
                    
                    alert("Erro ao tentar deletar!!")
                }
            }
        })
    }
}
