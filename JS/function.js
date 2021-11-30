
function selecionarR(){
    var SelectR = document.getElementById('regiao');
    var SelectedR = SelectR.options[SelectR.selectedIndex].value;

    var Filtrar = document.getElementById('filtrar');
    Filtrar.href += `&F_regiao=${SelectedR}`;
    
}

function selecionarC(){
    var SelectC = document.getElementById('categoria');
    var SelectedC = SelectC.options[SelectC.selectedIndex].value;

    var Filtrar = document.getElementById('filtrar');
    Filtrar.href += `&F_categoria=${SelectedC}`;
}

function verificar(){
    var Filtrar = document.getElementById('filtrar');
    if(Filtrar.href == "./?ped=allFiltrado"){
        Filtrar.href = "#"
        alert("Sem Filtro")
    }
}

function selecionarRT(){
    var SelectR = document.getElementById('regiao');
    var SelectedR = SelectR.options[SelectR.selectedIndex].value;

    var Filtrar = document.getElementById('filtrar');
    Filtrar.href += `&F_regiao=${SelectedR}`;
}


