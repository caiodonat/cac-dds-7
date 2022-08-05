function refreshQueue() {

  url = endPoint_local + `api/atendimentos/queue/already_called/`

  fetch(url).then(r => r.json().then(r => {
    if (r.success) {
      if (last_atendimento >= r.r.slice(-1)[0].id_atendimento) { 
        console.log(last_atendimento,"-",r.r.id_atendimento);
      } else {
        console.log(last_atendimento,"-",r.r.id_atendimento);
        last_atendimento = r.r.id_atendimento;

        document.getElementById("primeiroFila").innerHTML = `
        <tr>
        <th class="tabela-1">SENHAS ANTERIORES</th>
        <th class="tabela-1"onclick="callNext()">GUICHÊ</strong></th>
        <tr>
        </tr>`


        document.getElementById("senhaAtual").innerHTML = `${r.r.slice(-1)[0].numero_atendimento} - ${r.r.slice(-1)[0].sufixo_atendimento}`;

        document.getElementById("guicheAtual").innerHTML = `${r.r.slice(-1)[0].user_desk}`;

        document.getElementById("primeiroFila").innerHTML +=
          //1°
          `<th class="tabela-1">${r.r.slice(-4)[2].numero_atendimento} - ${r.r.slice(-4)[2].sufixo_atendimento}</th>` +
          `<th class="tabela-2">${r.r.slice(-4)[2].user_desk}</th> </tr>`
          +//2°
          `<th class="tabela-1">${r.r.slice(-4)[1].numero_atendimento} - ${r.r.slice(-4)[1].sufixo_atendimento}</th>` +
          `<th class="tabela-2">${r.r.slice(-4)[1].user_desk}</th> </tr>`
          +//3°
          `<th class="tabela-1">${r.r.slice(-4)[0].numero_atendimento} - ${r.r.slice(-4)[0].sufixo_atendimento}</th>` +
          `<th class="tabela-2">${r.r.slice(-4)[0].user_desk}</th> </tr>`
      }
    }
  }));
}

function time() {
  today = new Date();

  document.getElementById("hora").innerHTML = 
    today.getHours() + ":" + today.getMinutes();

  document.getElementById("data").innerHTML = 
    ((today.getDate())) + "/" + ((today.getMonth() + 1)) + "/" + today.getFullYear();
}

//observer
function myOnload() {
  refreshQueue();
  time();
}
setInterval('refreshQueue()', 5000);
setInterval('time()', 60000);