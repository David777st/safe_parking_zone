resultados.forEach(spaceId => {
    console.log(resultados)
    document.getElementById('presenciales').textContent = resultados[0];
    document.getElementById('virtuales').textContent = resultados[1];
    
    document.getElementById('precensialD').textContent = 36 - resultados[0];
    document.getElementById('virtualD').textContent = 27 - resultados[1];
});