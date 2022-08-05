endPoint = document.getElementById("endPoint").innerHTML;
endPoint_local = document.getElementById("endPoint").innerHTML;
var last_atendimento = 0;

function callAlert() {
  location.href = "alert"
}

function EmitirSenha(servicosGeral) {
  url = endPoint + `api/atendimento/post/`;

  fetch(url, {
    method: 'post',
    headers: {
      "Content-Type": "application/json; charset=utf-8"
    },
    mode: "cors",
    body: JSON.stringify({
      id_servicos: servicosGeral
    }),
  }).then((r) =>
    r.json().then((r) => {
      if (r.success) {
        alert("Ação realizada com Exito");
        location.href = "totem";
      } else {
        alert("Falha");
      }
    })
  );
}

function GetData() {

  //localStorage.setItem("senha", bot.value)
  //alert(bot.value)

  const endPoint = 'https://central-atendimento-cliente.herokuapp.com/api/';
  const route = 'atendimento/post';
  const servico = document.getElementById("servico").text;
  const cpf = document.getElementById("campo-texto").value;
  const sufixo_atendimento = 'FCR';
  const date = '?' + 'cpf=' + cpf + '&' + 'sufixo_atendimento=' + sufixo_atendimento;


  const initDetails = {
    method: 'post',
    headers: {
      "Content-Type": "application/json; charset=utf-8"
    },
    mode: "cors"
  }

  fetch((endPoint + route + date), initDetails)
    .then(response => {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }

      console.log(response.headers.get("Content-Type"));
      return response.json();
    }
    ).then(myJson => {
      console.log(JSON.stringify(myJson));
      alert(JSON.stringify(myJson))
    })
    .catch(err => {
      console.log('Fetch Error :-S', err);
    });
}


function servicoFinanceiro() {
  servicos = document.getElementById("opcoesFcr");
  servicos.innerHTML = "";

  const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/fcr`
  resp = fetch(uri)
    .then(r => r.json().then(r => {
      if (r.success) {
        r.r.forEach(r1 => {
          servicos.innerHTML += `
                            <div class="box-opt">
                                <label for="opt1" id="">
                                    <input type="radio" class="messageCheckbox" value="${r1.id_servicos}" name="opt" id="sGeral">
                                    ${r1.servico}
                                </label>
                            </div>
                        `
        }
        );
        // const servicosGeral = document.getElementById("sGeral").value
        // // console.log(servicosGeral).value
        // btnF.innerHTML += `<button id='getData' class="btn-emitirsenha" onclick="EmitirSenha("${servicosGeral}"); optionsChecked();">Emitir`
      } else {
        console.log("falha -> " + r.r[0]);
      }
    })
    )
}

function servicoPedagogico() {
  servicos = document.getElementById("opcoesPdg");
  servicos.innerHTML = " ";

  const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/pdg`
  resp = fetch(uri)
    .then(r => r.json().then(r => {
      if (r.success) {
        r.r.forEach(r1 => {
          servicos.innerHTML += `
                            <div class="box-opt">
                                <label for="opt1" id="">
                                    <input type="radio" class="messageCheckbox" value="${r1.id_servicos}" name="opt" id="">
                                    ${r1.servico}
                                </label>
                            </div>
                        `
        });
      } else {
        console.log("falha -> " + r.r[0]);
      }
    })
    )
}

function servicoSecretaria() {
  servicos = document.getElementById("opcoesSct");
  servicos.innerHTML = " ";

  const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/sct`
  resp = fetch(uri)
    .then(r => r.json().then(r => {
      if (r.success) {
        r.r.forEach(r1 => {
          servicos.innerHTML += `
                            <div class="box-opt">
                                <label for="opt1" id="">
                                    <input type="radio" class="messageCheckbox" value="${r1.id_servicos}" name="opt" id="">
                                    ${r1.servico}
                                </label>
                            </div>
                        `
        });
      } else {
        console.log("falha -> " + r.r[0]);
      }
    })
    )
}

function servicoOutrosServicos() {
  servicos = document.getElementById("opcoesOts");
  servicos.innerHTML = " ";

  const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/ots`
  resp = fetch(uri)
    .then(r => r.json().then(r => {
      if (r.success) {
        r.r.forEach(r1 => {
          servicos.innerHTML += `
                            <div class="box-opt">
                                <label for="opt1" id="">
                                    <input type="radio" class="messageCheckbox" value="${r1.id_servicos}" name="opt" id="">
                                    ${r1.servico}
                                </label>
                            </div>
                        `
        });
      } else {
        console.log("falha -> " + r.r[0]);
      }
    })
    )
}



function optionsChecked() {

  var checkedValue = null;
  var inputElements = document.getElementsByClassName('messageCheckbox');
  for (var i = 0; inputElements[i]; ++i) {
    console.log(
      inputElements[i].value
      + " opcoesFcr");

    if (inputElements[i].checked) {
      checkedValue = inputElements[i].value;
      break;
    }
  }
  return checkedValue;
}