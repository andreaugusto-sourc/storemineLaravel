const menuSection = document.querySelector("div.menu-section");


menuSection.addEventListener("click", ()=>{
    menuSection.classList.toggle("on");
    document.querySelector("a.logo-texto").classList.toggle("d-none");
    document.querySelector("img.logo").classList.toggle("d-none");
    document.querySelector("div.pesquisa").classList.toggle("d-none");
})