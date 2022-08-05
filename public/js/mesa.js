endPoint = document.getElementById("endPoint").innerHTML;
endPoint_local = document.getElementById("endPoint").innerHTML;
var last_atendimento = 0;

function navbar() {
  nav = document.getElementById("myTab");
  nav.innerHTML = " ";

  nav.innerHTML += `<li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="/mesa_atendimento/principal" role="tab" aria-controls="home" aria-selected="true">
      <img src="../img/LOGO_LOGO.png" alt="Logo-ES" class="logo-img" style="height: 32px"></a>
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
  </li>`;
}

function setGuiche() {
  const guiche = document.getElementById("guicheNum");
  guiche.innerHTML = " ";

  var select = document.getElementById("number_desk");
  var value = select.options[select.selectedIndex].value;

  guiche.innerHTML += `<h1 class="numero" id="guicheNum">${value}</h1>`;
}

function putServiceDesk(number_desk, id_user) {
  url = endPoint_local + `api/user/set/number_desk`;

  console.log(number_desk, id_user);
  fetch(url, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      number_desk: `${number_desk}`,
      id_user: `${id_user}`,
    }),
  }).then((r) =>
    r.json().then((r) => {
      if (r.success) {
        alert("Ação realizada com Exito");
        location.href = "principal";
      } else {
        alert("Falha");
      }
    })
  );
}

function salvar() {
  const bot = document.getElementById("campo-texto");
  localStorage.setItem("senha", bot.value);
  alert(localStorage.getItem("senha"));
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
  url = endPoint + `api/atendimentos/queue`

  fila = document.getElementById("table_espera");

  fetch(url).then((r) =>
    r.json().then((r) => {
      if (r.success) {
        r.r.forEach((r1) => {
          fila.innerHTML +=
            `<td>${r1.id_atendimento}</td>
            <td>${r1.numero_atendimento} - ${r1.sufixo_atendimento}</td>
            <td>${r1.servico}</td>`
        });
      } else {
        console.log("falha -> " + r.r[0]);
      }
    })
  );

  if (document.getElementById("table_current_senha") == null) { } else {

    url = endPoint + `api/atendimentos/id/${sessionStorage.getItem("id_atendimento")}`

    console.log(sessionStorage.getItem("id_atendimento"));


    fetch(url).then((r) =>
      r.json().then((r) => {
        if (r.success) {
          r.r.forEach((r1) => {
            document.getElementById("table_current_senha").innerHTML +=
              `<td>${r1.id_atendimento}</td>
            <td>${r1.numero_atendimento} - ${r1.sufixo_atendimento}</td>
            <td>${r1.servico}</td>`
          });
        } else {
          console.log("falha -> " + r.r[0]);
        }
      })
    );
  }
}

function salvarID() {
  url = endPoint + `api/atendimentos/queue/next/already_called/`
  //const uri = `http://central-atendimento-cliente.herokuapp.com/api/atendimentos/queue/next/already_called`;

  fetch(url).then((r) =>
    r.json().then((r) => {
      console.log(r.r[0].id_atendimento);

      sessionStorage.setItem("id_atendimento", r.r[0].id_atendimento);

      var id_atendimento = sessionStorage.getItem("id_atendimento");
      console.log(id_atendimento);
      // var userDesk = {{ Auth::user()->number_desk }}
      // console.log(userDesk)

      eval(chamarSenha)();
    })
  );
}

function callNext() {
  url = endPoint + `api/atendimento/queue/call_next`;

  fetch(url, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      "user_desk": document.getElementById("guiche").innerHTML
    })
  }).then((r) =>
    r.json().then((r) => {
      if (r.success) {
        console.log(r.r[0].id_atendimento);
        sessionStorage.setItem("id_atendimento", r.r[0].id_atendimento);

        alert("Ação realizada com Exito");
        location.href = "chamadoatendimento";
      } else {
        alert("Falha");
      }
    })
  );
}

function iniciarAtendimento() {
  url = endPoint_local + `api/atendimento/begin`;

  fetch(url, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      "user_desk": document.getElementById("guiche").innerHTML,
      "id_atendimento": sessionStorage.getItem("id_atendimento"),
    })
  }).then((r) =>
    r.json().then((r) => {
      if (r.success) {
        alert("Ação realizada com Exito");
        location.href = "inicioatendimento";
      } else {
        alert("Falha");
      }
    })
  );
}

function chamarSenha() {
  console.log(sessionStorage.getItem("id_atendimento"), );

  const url = endPoint + `api/atendimento/call/`;

  fetch(url, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      "user_desk": document.getElementById("guiche").innerHTML,
      "id_atendimento": sessionStorage.getItem("id_atendimento"),
    }),
  }).then((r) =>
    r.json().then((r) => {
      if (r.success) {
        alert("Ação realizada com Exito");
      } else {
        alert("Falha");
      }
    })
  );
}

function encerrarAtendimento() {
  url = endPoint + `api/atendimento/finish`;

  fetch(url, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      "user_desk": document.getElementById("guiche").innerHTML,
      "id_atendimento": sessionStorage.getItem("id_atendimento"),
      "status_atendimento": `concluido`
    })
  }).then((r) =>
    r.json().then((r) => {
      if (r.success) {
        alert("Ação realizada com Exito");
        location.href = "atendimento";
      } else {
        alert("Falha");
      }
    })
  );
}
