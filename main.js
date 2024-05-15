function domn() {
    var dominio = document.getElementsByClassName('dominio')[0].value;
    if (dominio != "") {
        if (dominio.length < 8) {
            alert("O domínio precisa ter no mínimo 8 caracteres")
            document.getElementsByClassName('dominio')[0].value = "";
        } else if (isFinite(dominio)) {
            var formatado = dominio.substr(0,5) + '-' + dominio.substr(5,1) + '*' + dominio.substr(6,2);
            document.getElementsByClassName('dominio')[0].value = formatado;
        }
        else {
            alert("O domínio precisa ter apenas números")
            document.getElementsByClassName('dominio')[0].value = "";
        }
    }
    
}