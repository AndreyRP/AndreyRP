const titulo_cadastro = document.querySelectorAll('.titulo_tabela')
const btns = document.querySelectorAll('.btn_iten')
titulo_cadastro.forEach(titulo => { titulo.parentNode.classList.add('none')});

btns.forEach(btn => btn.addEventListener('click', filtroCadastro))

function filtroCadastro()
{
   const elementoBtn = document.getElementById(this.id)
    const cadastro = elementoBtn.innerHTML
    
    
    titulo_cadastro.forEach(registro => {
        registro.parentNode.classList.add('none')
        console.log(cadastro)
        console.log(registro.parentNode)
        
        if(cadastro == registro.id){
                registro.parentNode.classList.remove('none')   
            }
    });/* */
       
}