const botoes = document.querySelectorAll('.input_categoria')
botoes.forEach(btn => btn.addEventListener('click', filtrarLivros))
const livro_categoria = document.querySelectorAll('.nome_categoria')


function filtrarLivros() {
    const elementoBtn = document.getElementById(this.id)
    const categoria = elementoBtn.value
    console.log(elementoBtn)
    livro_categoria.forEach(livro => {
        //console.log(livro.parentNode.parentNode)
        livro.parentNode.parentNode.classList.add('none')
        
    });

        livro_categoria.forEach(livro => {
        //console.log(livro.parentNode.parentNode)
        if(categoria == livro.innerHTML || categoria == 'todos'){
            livro.parentNode.parentNode.classList.remove('none')
            
        }
    });
    
}
