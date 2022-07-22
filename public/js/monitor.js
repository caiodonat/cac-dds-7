document.addEventListener("DOMContentLoaded", function(evt){
    document.getElementById("btn-buscar").addEventListener("click", function(){
        const dia = document.getElementById("data-atendimento")
        buscarDia(dia.value)
        console.log(dia.value)
    })
})

const buscarDia = function(dia){
    monitor = document.getElementById("fila-espera")
    monitor.innerHTML = " "


    const uri = `https://central-atendimento-cliente.herokuapp.com/api/atendimentos/day/${dia}`
    resp = fetch(uri)
    .then(r =>r.json().then(r =>{
                if(r.success){
                    r.r.forEach(r1 => {
                        monitor.innerHTML +=  monitor.innerHTML += `<li class="list-group-item">${r1.numero_atendimento}${r1.sufixo_atendimento}</li>`  
                    });
                }else{
                    console.log("falha -> " + r.r[0]);
                }
        })
    )
}