/**
 * @author Daniel Bolivar
 * @version 1.0.0
 * @since 14-07-2021
 */

//  inicializa algunas funciones para el correcto funcionamiento.
function initBold(){
    updateCart();
    if(window.location.pathname == '/cart' && window.location.search == ""){
        // enviar a backend los productos
        if(window.localStorage.getItem('cart') != null){ // carrito con productos
            cart = JSON.parse(window.localStorage.getItem('cart'));
            productos = [];
            cantidades = [];
            cart.forEach(item=>{
                productos.push(item.id);
                cantidades.push(item.cantidad);
            })
            console.log(productos,cantidades);
            url = new URLSearchParams();
            url.append('productos',JSON.stringify(productos));
            url.append('cantidades',JSON.stringify(cantidades));
            window.location.href= window.location.pathname+"?"+url.toString();

        }else{ // no hay productos
            alert('no existen productos en el carrito');
            window.location.href="/shop";
        }
    }else{

    }
}
initBold();

function addToCart(id,precio,nombre,url){
    if(window.localStorage.getItem('cart') == null){
        item_cart = {
            id,
            precio,
            nombre,
            url,
            cantidad: 1
        }
        cart = [];
        cart.push(item_cart);
        window.localStorage.setItem('cart',JSON.stringify(cart));
    }else{
        cart = JSON.parse(window.localStorage.getItem('cart'));
        // verifico si id existe.
        console.log(cart);
        aux = 0;
        cart.forEach(element => {
            if(element.id == id){
                element.cantidad = element.cantidad+1;
                aux=1;
            }
        });
        // no encontro articulo se agrega un nuevo articulo.
        if(!aux){
            item_cart = {
                id,
                precio,
                nombre,
                url,
                cantidad:1
            }
            cart.push(item_cart);
            window.localStorage.setItem('cart',JSON.stringify(cart));
        }else{
            window.localStorage.setItem('cart',JSON.stringify(cart));
        }
    }
    updateCart();
}


function updateCart(){
    if(window.localStorage.getItem('cart') != null){ // carrito con articulos
        let cart = JSON.parse(window.localStorage.getItem('cart'));

        let items = cart.length;

        productos = [];
        cantidades = [];

        htmlCart = "";
        cart.forEach(item=>{
            productos.push(item.id);
            cantidades.push(item.cantidad);
            htmlCart+= `<li>
                            <a class="item-cart-bold" href="/products/${item.id}">
                                <div class="media">
                                    <img class="media-left media-object" src="${item.url}" alt="cart-Image">
                                    <div class="media-body">
                                        <h5 class="media-heading">${item.nombre}<br><span>${item.cantidad} X $${item.precio*item.cantidad}</span></h5>
                                        <span class="remove-item" onclick="removeCartItem(${item.id})">&times;</span>
                                    </div>
                                </div>
                            </a>
                        </li>`;
        });

        // enlaces
        url = new URLSearchParams();
        url.append('productos',JSON.stringify(productos));
        url.append('cantidades',JSON.stringify(cantidades));
        let route = '/cart?'+url.toString();
        let routeCheckout = '/checkout?'+url.toString();

        htmlCart += `<li>
                        <div class="btn-group" role="group" aria-label="...">
                            <a type="button" class="btn btn-default" href="${route}">Carrito</a>
                        </div>
                    </li>`;
        document.querySelector('#cartShop').innerHTML = htmlCart;
        document.querySelector('#items-cart').innerHTML = '<i class="fa fa-shopping-cart"></i>'+items;

        if(document.contains(document.querySelector('#checkout-bold-btn'))){
            let anchor = document.querySelector('#checkout-bold-btn');
            anchor.href = routeCheckout;
        }

    }
}


function removeCartItem(id){
    event.preventDefault();
    if(window.localStorage.getItem('cart') != null){
        cart = JSON.parse(window.localStorage.getItem('cart'));
        cart = cart.filter(item=>{return item.id != id});
        window.localStorage.setItem('cart',JSON.stringify(cart));
    }
    showButtonUpdate(true);
    updateCart();
}
function showButtonUpdate(status){
    if(document.contains(document.querySelector('.update-cart-bold'))){
        let btn = document.querySelector('.update-cart-bold');
        if(status){
            btn.classList.remove('no-view');
        }else{
            btn.classList.add('no-view');
        }
    }
}

function removeItemCart(id){ // refrezca la pantalla del carrito de compra.
    if(window.localStorage.getItem('cart') != null){
        cart = JSON.parse(window.localStorage.getItem('cart'));
        cart = cart.filter(item=>{return item.id != id});
        window.localStorage.setItem('cart',JSON.stringify(cart));
    }
    updateCart();
    updateCartCantities();
}
function decrementItemCart(id){
    console.log('decrementando',id);
    if(window.localStorage.getItem('cart') != null){ // existen productos
        cart = JSON.parse(window.localStorage.getItem('cart'));
        cart.forEach(item=>{
            if(item.id == id){
                item.cantidad--;
            }
        });
        window.localStorage.setItem('cart',JSON.stringify(cart));
    }
    showButtonUpdate(true);
    updateCart();
}
function incrementItemCart(id){
    console.log('incrementando',id);
    if(window.localStorage.getItem('cart') != null){ // existen productos
        cart = JSON.parse(window.localStorage.getItem('cart'));
        cart.forEach(item=>{
            if(item.id == id){
                item.cantidad++;
            }
        });
        window.localStorage.setItem('cart',JSON.stringify(cart));
    }
    showButtonUpdate(true);
    updateCart();
}


function updateCartCantities(){
    if(window.localStorage.getItem('cart') != null){ // carrito con productos
        cart = JSON.parse(window.localStorage.getItem('cart'));
        productos = [];
        cantidades = [];
        cart.forEach(item=>{
            productos.push(item.id);
            cantidades.push(item.cantidad);
        })
        // console.log(productos,cantidades);
        url = new URLSearchParams();
        url.append('productos',JSON.stringify(productos));
        url.append('cantidades',JSON.stringify(cantidades));
        window.location.href= window.location.pathname+"?"+url.toString();
    }
}


// funciones de checkout

function getCiudades(e){
    let departamento = e.value;
    getApiService('/general',{
        action: 'getCity',
        departamento
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            options = "<option value=''>Seleccione..</option>";
            datos = data.data;
            datos.forEach(item=>{
                options += `<option value="${item.codigo}">${item.nombre}</option>`;
            })
            document.querySelector('#ciudadesCheckout').innerHTML = options;
        }else{ 
            alert('Se produjo un error al consultar las ciudades');
        }
    })
    .catch(error=>console.log(error));
    // console.log(e.targetElement);
}



function getApiService(url,params){
    header = {
        method: 'GET',
        headers: {
            'content-type': 'application/json'
        }
    }
    let queryStirng = (new URLSearchParams(params).toString() != "") ? "?"+new URLSearchParams(params).toString():"";
    let urlString = url+queryStirng;
    return fetch(urlString,header);
}

function back(){
    window.history.back();
}