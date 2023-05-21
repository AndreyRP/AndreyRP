const botaoMenu = document.querySelector('.cabecalho-menu')
const menu = document.querySelector('.menu-lateral')
const corpo = document.querySelector('.oi')

botaoMenu.addEventListener('click', () =>{
    menu.classList.toggle('menu-lateral-ativo')
    corpo.classList.toggle('corpo')
})