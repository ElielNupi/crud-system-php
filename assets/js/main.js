// Materialize

var dataAtual = Date.now();
var tema = "light";
var base_url = window.location.origin + "/crud_smb_novo/";

$(document).ready(function () {
	carregando(false);
	ativarComponentes();

});

function carregando(mostrar) {
	if (mostrar) {
		if ($("#carregando").hasClass("hide")) {
			$("#carregando").css("opacity", 0);
			$("#carregando").removeClass("hide");
			$("#carregando").animate({
					opacity: 1
				},
				500
			);
		}
	} else {
		setTimeout(function () {
			$("#carregando").animate({
					opacity: 0
				},
				500,
				function () {
					$("#carregando").addClass("hide");
				}
			);
		}, 1000);
	}
}

function ativarComponentes() {
	setTimeout(() => {
		console.log("Delayed for 1 second.");
		$('.modal').modal({
			preventScrolling: false
		});

		$('.datepicker').datepicker({
			format: "yyyy-mm-dd"
		});

		$('.sidenav').sidenav();
		$('select').formSelect();
		$('.dropdown-trigger').dropdown();

		$('#telefone').mask('(00) 0 0000-0000');
		$('#editTelefone').mask('(00) 0 0000-0000');

		$('.dark-toggle').on('click', function () {
			if ($(this).find('i').text() == 'brightness_4') {
				$(this).find('i').text('brightness_high');
			} else {
				$(this).find('i').text('brightness_4');
			}
		});

		$('.collapsible').collapsible();
	}, 1000);

	console.log("Teste carregado");
}

  function mudarTema() {
    // Get the checkbox element
    var switchElement = document.querySelector('input[type="checkbox"]');
    
    // Check if the switch is on or off
    if (switchElement.checked) {
      console.log("Switch is on");
	  this.darkMode();
    } else {
      console.log("Switch is off");
	  this.lightMode();
    }
  }

function darkMode() {
	let element = document.body;
	element.className = "dark-mode";
}

function lightMode() {
	let element = document.body;
	element.className = "light-mode";
}
