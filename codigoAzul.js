const btn = document.getElementById('ca')

btn.addEventListener('click',()=>{
    alert('¡CODIGO AZUL!')
    setInterval(()=>{
        location.href = "ficha.php"
    }, 1000)
})