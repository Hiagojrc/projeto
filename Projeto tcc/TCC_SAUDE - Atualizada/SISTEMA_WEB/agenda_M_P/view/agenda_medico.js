const msg = document.querySelector("#mensagem");
const xhr = new XMLHttpRequest();
const tableAgenda = document.querySelector("#agenda");
const tableMedico = document.querySelector("#medico");
const tablePaciente = document.querySelector("#paciente");
const urlAgenda = "http://localhost/Projeto_tcc/TCC_SAUDE/BACK_END/src/controll/routes/route.agenda.php?id=0";


function carregaAgenda() {
    /*alert("SEJA BEM VINDO");*/
    fetch(urlAgenda)
        .then(function (resp) {
            //Obtem a resposta da URL no formato JSON
            if (!resp.ok)
                throw new Error("Erro ao executar requisição: " + resp.status);
            return resp.json();
        })
        .then(function (data) {
            //Se obteve a resposta explora os dados recebidos
            data.forEach((val) => {
                let row = document.createElement("tr");
                row.innerHTML = `<tr><td>${val.id}</td>`;
                row.innerHTML += `<td>${val.id_medico}</td>`;
                row.innerHTML += `<td>${val.id_paciente}</td>`;
                row.innerHTML += `<td>${val.data_hora}</td>`;
                row.innerHTML += `<td>${val.id_status}</td>`;
                row.innerHTML += `<td style="padding:3px"><button onclick='editAgenda(this)'>Edit</button><button onclick='delAgenda(this)'>Del</button></td></tr>`;
                tableAgenda.appendChild(row);
            });
        }) //Se obteve erro no processo exibe no console do navegador
        .catch(function (error) {
            console.error(error.message);
        });
}

function carregaMedico() {
    /*alert("SEJA BEM VINDO");*/
    fetch(urlAgenda)
        .then(function (resp) {
            //Obtem a resposta da URL no formato JSON
            if (!resp.ok)
                throw new Error("Erro ao executar requisição: " + resp.status);
            return resp.json();
        })
        .then(function (data) {
            //Se obteve a resposta explora os dados recebidos
            data.forEach((val) => {
                let row = document.createElement("tr");
                row.innerHTML = `<tr><td>${val.crm}</td>`;
                row.innerHTML += `<td>${val.nome}</td>`;
                row.innerHTML += `<td style="padding:3px"><button onclick='editMedico(this)'>Edit</button><button onclick='delAgenda(this)'>Del</button></td></tr>`;
                tableMedico.appendChild(row);
            });
        }) //Se obteve erro no processo exibe no console do navegador
        .catch(function (error) {
            console.error(error.message);
        });
}

function carregaPaciente() {
    /*alert("SEJA BEM VINDO");*/
    fetch(urlAgenda)
        .then(function (resp) {
            //Obtem a resposta da URL no formato JSON
            if (!resp.ok)
                throw new Error("Erro ao executar requisição: " + resp.status);
            return resp.json();
        })
        .then(function (data) {
            //Se obteve a resposta explora os dados recebidos
            data.forEach((val) => {
                let row = document.createElement("tr");
                row.innerHTML = `<tr><td>${val.cpf}</td>`;
                row.innerHTML += `<td>${val.nome}</td>`;
                row.innerHTML += `<td style="padding:3px"><button onclick='editPaciente(this)'>Edit</button><button onclick='delAgenda(this)'>Del</button></td></tr>`;
                tablePaciente.appendChild(row);
            });
        }) //Se obteve erro no processo exibe no console do navegador
        .catch(function (error) {
            console.error(error.message);
        });
}


/*-------------------------------CRIAR AGENDA--------------------------------------*/
function criaAgenda() {
    let url = "http://localhost/Projeto_tcc/TCC_SAUDE/BACK_END/src/controll/routes/route.agenda.php";
    let id_medico = document.querySelector("#id_medico");
    let id_paciente = document.querySelector("#id_paciente");
    let data_hora = document.querySelector("#data_hora");
    let id_status = document.querySelector("#id_status");

    if (id_medico.value != "" && id_paciente.value != "" && data_hora.value != "" && id_status.value != "") {
        let dados = new FormData();
        dados.append("id_medico", id_medico.value);
        dados.append("id_paciente", id_paciente.value);
        dados.append("data_hora", data_hora.value);
        dados.append("id_status", id_status.value); 
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === this.DONE) {
                let resp = JSON.parse(this.responseText);
                if (resp.hasOwnProperty("erro")) {
                    msg.innerHTML = resp.erro;
                } else {
                    msg.innerHTML = "Agenda Registrada com sucesso.";
                }
                setTimeout(() => { window.location.reload(); }, 3000);
            }
        });
        xhr.open("POST", url);
        xhr.send(dados);
    } else {
        msg.innerHTML = "Favor preencher todos os campos.";
        setTimeout(() => { msg.innerHTML = ""; }, 3000);
    }
}


/*----------------------------EDITAR AGENDA---------------------------------------*/
function editServicos(p) {
    p.parentNode.parentNode.cells[1].setAttribute("contentEditable", "true");
    p.parentNode.parentNode.cells[2].setAttribute("contentEditable", "true");
    p.parentNode.parentNode.cells[3].setAttribute("contentEditable", "true");
    p.parentNode.parentNode.cells[4].setAttribute("contentEditable", "true");
    p.parentNode.parentNode.cells[5].innerHTML = "<button onclick='putAgenda(this)'>Enviar</button>";
}

function putServicos(p) {
    let url = "http://localhost/Projeto_tcc/TCC_SAUDE/BACK_END/src/controll/routes/route.agenda.php";
    let id = p.parentNode.parentNode.cells[0].innerHTML;
    let id_medico = p.parentNode.parentNode.cells[1].innerHTML;
    let id_paciente = p.parentNode.parentNode.cells[2].innerHTML;
    let data_hora = p.parentNode.parentNode.cells[3].innerHTML;
    let id_status = p.parentNode.parentNode.cells[4].innerHTML;


    let dados = "id=" + id;
    dados += "&id_medico=" + id_medico;
    dados += "&id_paciente=" + id_paciente;
    dados += "&data_hora=" + data_hora;
    dados += "&id_status=" + id_status;
    
    if (window.confirm("Confirma Alteração dos dados?")) {
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === this.DONE) {
                let resp = JSON.parse(this.responseText);
                if (resp.hasOwnProperty("erro")) {
                    msg.innerHTML = resp.erro;
                } else {
                    msg.innerHTML = "Agenda alterada com sucesso.";
                }
                setTimeout(() => { window.location.reload(); }, 3000);
            }
        });
        xhr.open("PUT", url);
        xhr.send(dados);
    }
}


function delServicos(p) {
    let url = "http://localhost/Projeto_tcc/TCC_SAUDE/BACK_END/src/controll/routes/route.agenda.php";
    let id = p.parentNode.parentNode.cells[0].innerText;
    let dados = "id=" + id;
    if (window.confirm("Confirma Exclusão do id " + id + "?")) {
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === this.DONE) {
                let resp = JSON.parse(this.responseText);
                if (resp.hasOwnProperty("erro")) {
                    msg.innerHTML = resp.erro;
                } else {
                    msg.innerHTML = "Agenda Deletado com sucesso.";
                }
                setTimeout(() => { window.location.reload(); }, 3000);
            }
        });
        xhr.open("DELETE", url);
        xhr.send(dados);
    }
}