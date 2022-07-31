import {success} from "./alert.js"

let cart = JSON.parse(localStorage.getItem('cart') || '[]');
let count = localStorage.getItem('count');

const host ="http://localhost:8000/";

// cart funções
const prepareCart= ()=>{
    let i = 0;
   cart.forEach(elm => {
    $("#cart_items").append(newDiv(i));
    i++;
   });
   if(count ==null) count = 0;
}
const inflateCart= ()=>{
    let i = 0;
    cart.forEach(produto => {
        $("#img_"+i).attr("src",host+"storage/"+produto.image_url.replace("public/", "") );
        $("#dados_"+i).text(produto.qtd+"   "+produto.name+"   R$"+(produto.preco*produto.qtd));
        i++;
    });
}
const saveCart= ()=>{
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("count", count);
    
}
const getItem =(e)=>{
   //const item = JSON.parse(e.childNodes[1].innerText);
   let item = {};
   item.id = $("#idP").val();
   item.name = document.getElementById("nameP").innerText;
   item.image_url = document.getElementById("imageP").innerText;
   item.qtd =  $("#qtd").val();
   item.preco =$("#precoP").val();
   
   return item;
}
const addToCart= (e)=>{
    e.preventDefault();
    //var divPai = e.target.parentNode

    $("#cart_items").append(newDiv(count));
    const item = getItem(e.target);
    cart.push(item);

    count++;
    success("Produto adicionado ao carrinho");
    inflateCart();
    saveCart();
}

const removeToCart= (id)=>{
    cart.splice(id,1);
    count--;
    saveCart();
    history.go(0);
    success("Produto removido do carrinho");
}


const limparCart= ()=>{
    localStorage.clear();
    history.go(0);
    success("Carrinho limpo");
}

const newDiv=(id)=>{
    let newDiv = document.createElement("li");
    newDiv.id = 'item_'+id;
    newDiv.className ='d-flex flex-row list-group-item p-0 mb-2 align-items-center justify-content-between';
    //image
    let image = document.createElement("img");
    image.id = 'img_'+id;
    image.className= "rounded-circle";
    image.style.width = "35px";
    image.style.height ="35px";
    image.style.objectFit ="cover";

    //dados
    let dados = document.createElement("div");
    dados.id = 'dados_'+id;

    //buttons
    let buttonRemove = document.createElement("button");
    buttonRemove.id='remove_cart';
    buttonRemove.className ='btn btn-danger btn-sm';
    buttonRemove.onclick = ()=>removeToCart(id);

    let iconButton = document.createElement("svg");
    iconButton.className ="fa fa-trash";
    buttonRemove.appendChild(iconButton);

    newDiv.appendChild(image);
    newDiv.appendChild(dados);
    newDiv.appendChild(buttonRemove);
    return newDiv;
}
prepareCart();
inflateCart();

$("#cart").on("click",inflateCart);
$("#add_cart").on("click",addToCart);
$("#limpar_cart").on("click",limparCart);