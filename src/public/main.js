const btn = document.getElementById('ca')

btn.addEventListener('click',()=>{
    alert('¡CODIGO AZUL!')
    setInterval(()=>{
        location.href = "../pages/busqueda.php"
    }, 1000)
})