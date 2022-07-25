/*
document.addEventListener("DOMContentLoaded", function (evt) {
    document.getElementById("btn-config").addEventListener("click", function () {
        const select = document.getElementById('select-setor');
        value = select.options[select.selectedIndex].value;
        selecionarSetor(select.value)
        console.log(value)

    })
})
*/
const endpoint = "https://central-atendimento-cliente.herokuapp.com/";
//const endpoint = "http://127.0.0.1:8000/";

const selecionarSetor = function (value) {
    console.log(value);
    
    servicos = document.getElementById("servicos-setores")
    servicos.innerHTML = " "

    const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/${value}`
    resp = fetch(uri)
        .then(r => r.json().then(r => {
            if (r.success) {
                r.r.forEach(r1 => {
                    servicos.innerHTML += ` <li class="list-group-item">${r1.servico}<button type="button" class="btn mx-3 btn-outline-danger"><i class="fa-solid fa-trash"></i></button></li>`
                });
            
                servico = document.getElementById("add")
                servico.innerHTML = `
                    <input type="text" class="form-control" id="newServico" placeholder="Adicionar Serviço">
                    <button class="btn mt-4 btn-primary btn-lg" onclick="postServico(
                        document.getElementById('select-setor').value,
                        document.getElementById('newServico').value
                    )">addServico</button>`;
            } else {
                console.log("falha -> " + r.r[0]);
            }
        })
        )
}

const postServico = function (setorValue, servicoValue) {
    //falta validar tamanho maximo de char

    const uri = endpoint + "api/servicos/post/";
    const dataObject = {
        method: 'POST',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            setor: setorValue,
            servico: servicoValue,
        })
    }

    fetch(uri, dataObject)
    .then(response => {console.log(response)})
    .then(json => console.log(json))
}
/*
function GetFila() {
    itemLista = document.getElementById("fila_espera");
  
    const dataAtendimento = document.getElementById("data-atendimento");
    console.log(dataAtendimento.value);
  
    const uri = "/proxy.php";
  
    itemLista.innerHTML = "";
    const proxyParm = dataAtendimento.value;
  
    console.log(proxyParm);
  
    const loader = document.getElementById("progresso");
  
    //console.log(loader)
  
    const btnBuscar = document.getElementById("btn-buscar");
    btnBuscar.setAttribute("disabled", true);
  
    loader.classList.add("progresso");
  
    fetch(`${uri}?proxyParm=${proxyParm}`)
      .then((r) =>
        r.json().then((r) => {
          r.forEach((e) => {
            itemLista.innerHTML += `<li class="list-group-item">${e.numero_atendimento}${e.sufixo_atendimento}</li>`;
  
            console.log(itemLista);
  
            loader.classList.remove("progresso");
  
            btnBuscar.removeAttribute("disabled");
          });
        })
      )
      .catch((e) => {
        alert("Ocorreu um erro ao tentar selecionar os atendimentos do dia.");
        loader.classList.remove("progresso");
        btnBuscar.removeAttribute("disabled");
      });
  }
*/  