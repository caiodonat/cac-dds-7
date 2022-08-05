endPoint = document.getElementById("endPoint").innerHTML;
endPoint_local = document.getElementById("endPoint").innerHTML;
var last_atendimento = 0;

document.addEventListener("DOMContentLoaded", function (evt) {
    document.getElementById("btn-buscar-triagem").addEventListener("click", function () {
        const id = document.getElementById("buscar-triagem")
        buscarId(id.value)
    })
})


const buscarId = function (id) {
    const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimentos/id/${id}`

    requerimento = document.getElementById("requerimento")
    requerimento.innerHTML = " "
    resp = fetch(uri)
        .then(r => r.json().then(r => {
            if (r.success) {
                r.r.forEach(r1 => {
                    requerimento.innerHTML += `<li class="list-group-item"> Senha:  ${r1.numero_atendimento}${r1.sufixo_atendimento}</li>`
                    requerimento.innerHTML += `<li class="list-group-item"> CPF:  ${r1.cpf}</li>`
                    requerimento.innerHTML += `<li class="list-group-item"> Data e Hora da Emissao:  ${r1.date_time_emissao_atendimento}</li>`
                    requerimento.innerHTML += `<li class="list-group-item"> Estado:  ${r1.inicio_atendimento}</li>`
                    requerimento.innerHTML += `<li class="list-group-item"> Atendimento:  ${r1.fim_atendimento}</li>`
                    requerimento.innerHTML += `<li class="list-group-item"> ID Atendimento:  ${r1.id_atendimento}</li>`
                    requerimento.innerHTML += `<li class="list-group-item"> Observações:  ${r1.observacoes}</li>`

                });
            } else {
                console.log("falha -> " + r.r[0]);
            }
        })
        )
}