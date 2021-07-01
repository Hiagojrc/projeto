const crm = document.querySelector("#crm");
const senha = document.querySelector("#senha");
const msg = document.querySelector("#mensagem");

function acessar() {
    
    let xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    let url = "http://localhost/projeto%20tcc/TCC_SAUDE/BACK_END/src/controll/routes/route.usuarioM.php";
    let dados = new FormData();
    if (crm.value != "" && senha.value != "") {
        dados.append("crm", crm.value);
        dados.append("senha", senha.value);
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === this.DONE) {
                let resp = JSON.parse(this.responseText);
                if (resp.hasOwnProperty("erro")) {
                    msg.innerHTML = resp.erro;
                    alert ('entrei no if'+resp);
                }else {
                    alert ('entrei no Else');
                    destino = "http://127.0.0.1:5500/area_medico/";
                    destino += "areamedico.html";
                    window.location.href = destino + "?Crm=" + resp.crm + "&id=" + resp.idArea_medico;
                }
                    
            }
            });
        xhr.open("GET", url);
        xhr.send(dados);
    } else {
        msg.innerHTML = "Favor preencher o crm e a senha";
    }
    setTimeout(() => { msg.innerHTML = "Mensagens do sistema"; }, 3000);
}