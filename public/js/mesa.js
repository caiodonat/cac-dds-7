function navbar() {
  nav = document.getElementById("myTab")
  nav.innerHTML = " "

  nav.innerHTML += `<li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="/mesa_atendimento/principal" role="tab" aria-controls="home" aria-selected="true">
      <img src="https://senaies.com.br/wp-content/uploads/2019/11/logo_senai_novo.svg" alt="Senai - ES" class="logo-img" style="height: 32px"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="/mesa_atendimento/atendimento" role="tab" aria-controls="profile"
      aria-selected="false">Atendimento</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="/mesa_atendimento/monitor" role="tab" aria-controls="contact"
      aria-selected="false">Monitor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="/mesa_atendimento/triagem" role="tab" aria-controls="contact"
      aria-selected="false">Triagem</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="/mesa_atendimento/configuracoes" role="tab" aria-controls="contact"
      aria-selected="false">Configuracao</a>
  </li>`
}

function setGuiche() {
  const guiche = document.getElementById("guicheNum");
  guiche.innerHTML = " "

  var select = document.getElementById('number_desk');
  var value = select.options[select.selectedIndex].value;

  guiche.innerHTML += `<h1 class="numero" id="guicheNum">${value}</h1>`


}


// function postServiceDesk(number_desk, id_user){
//     const url =  endPoint_local + `api/service_desk/post/`

function putServiceDesk(number_desk, id_user) {
  const url = endPoint_local + `api/user/set/number_desk`

  console.log(number_desk, id_user);
  fetch(url, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      "number_desk": `${number_desk}`,
      "id_user": `${id_user}`
    })
  })
    .then(r => r.json().then(r => {
      if (r.success) {
        alert("Ação realizada com Exito");
        location.href = "principal";
      } else {
        alert("Falha");
      }
    }))

}



//  function iniciarAtendimento(){
//     location.href = "inicioatendimento"
// }

// function encerrarAtendimento(){
//     location.href = "atendimento"
// }

// function buscarSenha() {
//   location.href = "/configuracao.html"
// }

function salvar() {
  const bot = document.getElementById("campo-texto");
  localStorage.setItem("senha", bot.value)
  alert(localStorage.getItem("senha"))
}

// function GetData() {

//   const bot = document.getElementById("data-atendimento");
//   //localStorage.setItem("senha", bot.value)
//   //alert(bot.value)

//   const uri = 'https://central-atendimento-cliente.herokuapp.com/api/atendimentos/dia/';
//   const initDetails = {
//     method: 'get',
//     headers: {
//       "Content-Type": "application/json; charset=utf-8"
//     },
//     mode: "cors"
//   }

//   fetch((uri + bot.value), initDetails)
//     .then(response => {
//       if (response.status !== 200) {
//         console.log('Looks like there was a problem. Status Code: ' +
//           response.status);
//         return;
//       }

//       console.log(response.headers.get("Content-Type"));
//       return response.json();
//     }
//     ).then(myJson => {
//       console.log(JSON.stringify(myJson));
//       alert(JSON.stringify(myJson))
//       localStorage.setItem("requestResponse", JSON.stringify(myJson));
//     })
//     .catch(err => {
//       console.log('Fetch Error :-S', err);
//     });

// }

// function GetFila() {

//   itemLista = document.getElementById("fila_espera");

//   const dataAtendimento = document.getElementById("data-atendimento")
//   const uri = '/proxy.php';

//   itemLista.innerHTML = "";
//   const proxyParm = dataAtendimento.value;

//   console.log(proxyParm)

//   const loader = document.getElementById("progresso")

//   //console.log(loader)

//   const btnBuscar = document.getElementById("btn-buscar")
//   btnBuscar.setAttribute("disabled", true)

//   loader.classList.add("progresso");

//   fetch(`${uri}?proxyParm=${proxyParm}`)

//     .then(r => r.json().then(r => {
//       r.forEach(e => {

//         itemLista.innerHTML += `<li class="list-group-item">${e.numero_atendimento}${e.sufixo_atendimento}</li>`;

//         console.log(itemLista)


//         loader.classList.remove("progresso");

//         btnBuscar.removeAttribute("disabled");

//       });

//     })).catch(e => {
//       alert("Ocorreu um erro ao tentar selecionar os atendimentos do dia.")
//       loader.classList.remove("progresso");
//       btnBuscar.removeAttribute("disabled");
//       console.log(e);
//     })



// }

// function atendimentosqueueNext() {

//   //localStorage.setItem("senha", bot.value)
//   //alert(bot.value)
//   itemLista = document.getElementById("proximo");
//   const endPoint = 'https://central-atendimento-cliente.herokuapp.com/api/';
//   const route = 'atendimentos/queue/next';
//   itemLista.innerHTML = "";

//   const initDetails = {
//     method: 'get',
//     headers: {
//       "Content-Type": "application/json; charset=utf-8"
//     },
//     mode: "cors"
//   }
//   fetch((endPoint + route), initDetails)
//     .then(response => {
//       itemLista.innerHTML += `<li class="list-group-item"> Senha:  ${response.numero_atendimento}${response.sufixo_atendimento}</li>`;
//       itemLista.innerHTML += `<li class="list-group-item"> Data e Hora da Emissao:  ${response.date_time_emissao_atendimento}`;
//       itemLista.innerHTML += `<li class="list-group-item"> CPF:  ${response.cpf}`;
//       itemLista.innerHTML += `<li class="list-group-item"> Observacoes:  ${response.observacoes}`;
//       if (response.status !== 200) {
//         console.log('Looks like there was a problem. Status Code: ' +
//           response.status);
//         return;
//       }
//       console.log(response.headers.get("Content-Type"));
//       return response.json();
//     }
//     ).then(myJson => {
//       console.log(JSON.stringify(myJson));
//     })

// }

// function getEspera() {

//   itemLista = document.getElementById("proximo");
//   itemLista.innerHTML = ""

//   const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimentos/queue_next`
//   fetch(uri).then(r => r.json().then(r => {

//     console.log(r)
//     itemLista.innerHTML += `<li class="list-group-item"> Senha:  ${r.numero_atendimento}${r.sufixo_atendimento}</li>`
//     itemLista.innerHTML += `<li class="list-group-item"> Data e Hora Emissao:  ${r.date_time_emissao_atendimento}</li>`
//     itemLista.innerHTML += `<li class="list-group-item"> Observacoes:  ${r.observacoes}</li>`

//   }))

// }

// function getAtendimentos() {
//   atendido = document.getElementById("atendido");
//   atendido.innerHTML = " "

//   const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimento/queue_next`
//   fetch(uri).then(r => r.json().then(r => {

//     console.log(r)
//     atendido.innerHTML += `<li class="list-group-item"> Senha:  ${r.numero_atendimento}${r.sufixo_atendimento}</li>`
//     atendido.innerHTML += `<li class="list-group-item"> CPF:  ${r.cpf}</li>`
//     atendido.innerHTML += `<li class="list-group-item"> Data e Hora Emissao:  ${r.date_time_emissao_atendimento}</li>`
//     atendido.innerHTML += `<li class="list-group-item"> Observacoes:  ${r.observacoes}</li>`

//   }))

//   fila = document.getElementById("fila_espera");
//   fila.innerHTML = ""

//   const uris = `https://central-atendimento-cliente.herokuapp.com/api/atendimentos/queue`
//   fetch(uris).then(r => r.json().then(r => {

//     r.forEach(r1 => {

//       fila.innerHTML += `<li class="list-group-item"> Senha:  ${r1.numero_atendimento}${r1.sufixo_atendimento}</li>`
//     });
//     console.log(r)
//   }))
// }

function getProximos() {

  fila = document.getElementById("fila_espera");
  fila.innerHTML = " "

  const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimentos/queue/next`
  resp = fetch(uri)
    .then(r => r.json().then(r => {
      if (r.success) {
        r.r.forEach(r1 => {
          fila.innerHTML += `<li class="list-group-item"> Senha:  ${r1.numero_atendimento}${r1.sufixo_atendimento}</li>`
        });
      } else {
        console.log("falha -> " + r.r[0]);
      }
    })
    )

}

function salvarID() {
  const uri = `http://central-atendimento-cliente.herokuapp.com/api/atendimentos/queue/next/already_called`
  fetch(uri).then(r => r.json().then(r => {

    console.log(r.r.id_atendimento)

    sessionStorage.setItem("id_atendimento", r.r.id_atendimento)

    var id_atendimento = sessionStorage.getItem("id_atendimento")
    console.log(id_atendimento)
    // var userDesk = {{ Auth::user()->number_desk }}
    // console.log(userDesk)

    eval(chamarSenha)();

  }))

}
// function tt2(){
//   window.userID =  {{ Auth::user()->number_desk }};
//   var phpVar = window.userID
//   console.log(phpVar);
//   }




// function getRequerimento(){

//   requerimento = document.getElementById("requerimento");
//   requerimento.innerHTML = " "

//   const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimentos/queue_next`
//   fetch(uri).then(r => r.json().then(r => {

//     console.log(r)
//     requerimento.innerHTML += `<li class="list-group-item"> Senha:  ${r.numero_atendimento}${r.sufixo_atendimento}</li>`
//     requerimento.innerHTML += `<li class="list-group-item"> CPF:  ${r.cpf}</li>`
//     requerimento.innerHTML += `<li class="list-group-item"> Data e Hora da Emissao:  ${r.date_time_emissao_atendimento}</li>`
//     requerimento.innerHTML += `<li class="list-group-item"> Estado:  ${r.estado_fim_atendimento}</li>`
//     requerimento.innerHTML += `<li class="list-group-item"> Atendimento:  ${r.fim_atendimento}</li>`
//     requerimento.innerHTML += `<li class="list-group-item"> ID Atendimento:  ${r.id_atendimento}</li>`
//     requerimento.innerHTML += `<li class="list-group-item"> Observações:  ${r.observacoes}</li>`

//   }))
// }

// function getNext() {

//   fila = document.getElementById("fila_espera");
//   fila.innerHTML = " "

//   const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimentos/queue`
//   fetch(uri).then(r => r.json().then(r => {

//     r.forEach(r1 => {

//       fila.innerHTML += `<li class="list-group-item"> Senha:  ${r1.numero_atendimento}${r1.sufixo_atendimento}</li>`
//     });
//     console.log(r)
//   }))

//   itemLista = document.getElementById("proximo");
//   itemLista.innerHTML = ""


//   const uris = `https://central-atendimento-cliente.herokuapp.com/api/atendimento/queue_next`


//   fetch(uris).then(r => r.json().then(r => {

//     console.log(r)
//     itemLista.innerHTML += `<li class="list-group-item"> Senha:  ${r.numero_atendimento}${r.sufixo_atendimento}</li>`
//     itemLista.innerHTML += `<li class="list-group-item"> Data e Hora Emissao:  ${r.date_time_emissao_atendimento}</li>`
//     itemLista.innerHTML += `<li class="list-group-item"> Observacoes:  ${r.observacoes}</li>`


//   }))
// }

// function addAtributos() {
//   add = document.getElementById("addRequisitos");
//   add.innerHTML = " "

//   const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimento/queue_next`
//   fetch(uri).then(r => r.json().then(r => {

//     console.log(r)
//     add.innerHTML += `<label>CPF: </label>`
//     add.innerHTML += `<input type="text" class="form-control" placeholder="CPF: ${r.cpf}">`
//     add.innerHTML += `<label>Observacoes: </label>`
//     add.innerHTML += `<input type="text" class="form-control" placeholder="Observacoes: ${r.observacoes}">`
//     add.innerHTML += `<button type="button" class="btn mt-1 btn-success">Enviar</button>`

//   }))
// }



function iniciarAtendimento() {
  const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimento/begin`
  dataObject = {
    method: 'PUT',
    // mode: 'no-cors',
    headers: {
      // 'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      "id_service_desk": `{{ Auth::user()->number_desk }}`,
      "id_atendimento": `${idAtendimento} `
    })
  }

  fetch(uri, dataObject)
    .then(response => { console.log(response) })
    .then(json => console.log(json))

    location.href = "inicioatendimento"
}

function chamarSenha() {

  var id_atendimento = sessionStorage.getItem("id_atendimento")
  console.log(id_atendimento)  

  const url = endPoint_local + `api/atendimento/call_next`
 // const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimento/call_next`;
dataObject = {
  method: 'PUT',
  // mode: 'no-cors',
  headers: {
    // 'Accept': 'application/json',
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    "id_service_desk": `{{ Auth::user()->number_desk }}`,
      "id_atendimento": `${id_atendimento}`
    })
  }

  fetch(url, dataObject)
    .then(response => { console.log(response) })
    .then(location.href = "inicioatendimento")
    .then(json => console.log(json))
}

function encerrarAtendimento() {
  const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimento/finish/${id_atendimento}&${$estado_fim_atendimento}`;
dataObject = {
  method: 'PUT',
  // mode: 'no-cors',
  headers: {
    // 'Accept': 'application/json',
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    "id_service_desk": `{{ Auth::user()->number_desk }}`,
      "id_atendimento": `${id_atendimento}`
    })
  }

  fetch(uri, dataObject)
    .then(response => { console.log(response) })
    .then(json => console.log(json))

    location.href = "atendimento"
}