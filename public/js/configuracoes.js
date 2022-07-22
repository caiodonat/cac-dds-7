document.addEventListener("DOMContentLoaded", function (evt) {
    document.getElementById("btn-config").addEventListener("click", function () {
        const select = document.getElementById('select-setor');
        value = select.options[select.selectedIndex].value;
        selecionarSetor(select.value)
        addServico(select.value)
        console.log(value)

    })
})

const selecionarSetor = function (value) {
    servicos = document.getElementById("servicos-setores")
    servicos.innerHTML = " "

    const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/${value}`
    resp = fetch(uri)
        .then(r => r.json().then(r => {
            if (r.success) {
                r.r.forEach(r1 => {
                    servicos.innerHTML += ` <li class="list-group-item">${r1.servico}<button type="button" class="btn mx-3 btn-outline-danger"><i class="fa-solid fa-trash"></i></button></li>`


                });
            } else {
                console.log("falha -> " + r.r[0]);
            }
        })
        )
}

const addServico = function (value, servico) {

    servico = document.getElementById("add")
    servico.innerHTML = '<input type="text" class="form-control" id="" placeholder="Adicionar Serviço"> <button type="button" id="adicionar" class="btn btn-primary">Adicionar</button>';
    servico2 = servico.text;

    addServico = document.getElementById("post-config")
    addServico.innerHTML = " "



    document.addEventListener("DOMContentLoaded", function (evt) {
        document.getElementById("adicionar").addEventListener("click", function () {


            const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/post/${value}&${servico2}`
            /*const dataObject = {
                servico: 
            }*/
            fetch(uri, {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dataObject)
            }).then(response => {
                return response.json()
            }).then(data =>
                // this is the data we get after putting our data,
                console.log(data)
            )


        })
    })


}


