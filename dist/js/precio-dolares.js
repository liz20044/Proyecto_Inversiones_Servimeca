let inputDolares = document.getElementById('total_us')
let inputBs = document.getElementById('total_ve')

let tasa = inputDolares.dataset.dolar

tasa = Number(tasa)

inputBs.oninput = function () {
    let bs = inputBs.value

    let resultado = bs / tasa

    inputDolares.value = resultado.toFixed(2)
}
