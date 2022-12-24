function delete_admin(id){
    
    let tbody_admin=document.getElementById("tbody_admin");
    let pagin_admin=document.getElementById("pagin_admin");
    let ajax_message1=document.getElementById("ajax_message1");
    let ajax_message2=document.getElementById("ajax_message2");
    let request=new XMLHttpRequest();
    request.open("get","/admin/Delete_admin?id="+id);
    request.onreadystatechange=function(){

        if(request.status==200&&request.readyState==4){

            response1=JSON.parse(request.response);
            if(response1.success!=undefined){
                
                tbody_admin.innerHTML=response1.div;
                pagin_admin.innerHTML=response1.pagin;
                ajax_message1.innerHTML=response1.success;
                ajax_message1.style.display="flex";
            }else{

                ajax_message2.innerHTML=response1.error;
                ajax_message2.style.display="flex";
            }
        }
    }
    request.send()
}

function delete_user(id){

    let ajax_message1=document.getElementById("ajax_message1");
    let ajax_message2=document.getElementById("ajax_message2");
    let tbody_user=document.getElementById("tbody_user");
    let pagin_user=document.getElementById("pagin_user");
    let request=new XMLHttpRequest();
    request.open("get","/admin/Delete_user?id="+id);
    request.onreadystatechange=function(){

        if(request.status==200&&request.readyState==4){

            response1=JSON.parse(request.response);
            if(response1.success!=undefined){

                ajax_message1.innerHTML=response1.success;
                ajax_message1.style.display="flex";
                tbody_user.innerHTML=response1.div;
                pagin_user.innerHTML=response1.pagin;
            }else{
                ajax_message2.innerHTML=response1.error;
                ajax_message2.style.display="flex";
            }
        }
    }
    request.send();
}

function delete_country(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_country=document.getElementById("tbody_country");
let pagin_country=document.getElementById("pagin_country");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_country?id="+id);
request.onreadystatechange=function(){

if(request.status==200&&request.readyState==4){
    response1=JSON.parse(request.response);
    if(response1.success!=undefined){

        tbody_country.innerHTML=response1.div;
        pagin_country.innerHTML=response1.pagin;
        ajax_message1.innerHTML=response1.success;
        ajax_message1.style.display="flex";
    }else{

        ajax_message2.innerHTML=response1.error;
        ajax_message2.style.display="flex";
    }
}
}
request.send();
}

function delete_city(id){

    let ajax_message1=document.getElementById("ajax_message1");
    let ajax_message2=document.getElementById("ajax_message2");
    let tbody_city=document.getElementById("tbody_city");
    let pagin_city=document.getElementById("pagin_city");
    let request=new XMLHttpRequest();
    request.open("get","/admin/Delete_city?id="+id)
    request.onreadystatechange=function(){

        if(request.status==200&&request.readyState==4){

            response1=JSON.parse(request.response);
            if(response1.success!=undefined){

                tbody_city.innerHTML=response1.div;
                pagin_city.innerHTML=response1.pagin;
                ajax_message1.innerHTML=response1.success;
                ajax_message1.style.display="flex"

            }else{
                ajax_message2.innerHTML=response1.error;
                ajax_message2.style.display="flex"
            }
        }
    }
    request.send()
}

function delete_area(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_area=document.getElementById("tbody_area");
let pagin_area=document.getElementById("pagin_area");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_area?id="+id);
request.onreadystatechange=function(){

if(request.status==200&&request.readyState==4){

    response1=JSON.parse(request.response);
    if(response1.success!=undefined){

        tbody_area.innerHTML=response1.div;
        pagin_area.innerHTML=response1.pagin;
        ajax_message1.innerHTML=response1.success;
        ajax_message1.style.display="flex";

    }else{
        ajax_message2.innerHTML=response1.error;
        ajax_message2.style.display="flex"
    }
}
}
request.send();
}

function delete_department(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_department=document.getElementById("tbody_department");
let pagin_department=document.getElementById("pagin_department");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_department?id="+id);
request.onreadystatechange=function(){

if(request.status==200&&request.readyState==4){
response1=JSON.parse(request.response);
if(response1.success!=undefined){

    tbody_department.innerHTML=response1.div;
    pagin_department.innerHTML=response1.pagin;
    ajax_message1.innerHTML=response1.success;
    ajax_message1.style.display="flex";
}else{
    ajax_message2.innerHTML=response1.error;
    ajax_message2.style.display="flex";
}
}
}
request.send();
}

function delete_factory(id){

    let ajax_message1=document.getElementById("ajax_message1");
    let ajax_message2=document.getElementById("ajax_message2");
    let tbody_factory=document.getElementById("tbody_factory");
    let pagin_factory=document.getElementById("pagin_factory");
    let request=new XMLHttpRequest();
    request.open("get","/admin/Delete_factory?id="+id);
    request.onreadystatechange=function(){

        if(request.status==200&&request.readyState==4){

            response1=JSON.parse(request.response);
            if(response1.success!=undefined){

                tbody_factory.innerHTML=response1.div;
                pagin_factory.innerHTML=response1.pagin;
                ajax_message1.innerHTML=response1.success;
                ajax_message1.style.display="flex";
            }else{

                ajax_message2.innerHTML=response1.error;
                ajax_message2.style.display="flex";
            }
        }
    }
    request.send()
}

function delete_track(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_track=document.getElementById("tbody_track");
let pagin_track=document.getElementById("pagin_track");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_track?id="+id);
request.onreadystatechange=function(){

    if(request.status==200&&request.readyState==4){

        response1=JSON.parse(request.response);
        if(response1.success!=undefined){

            tbody_track.innerHTML=response1.div;
            pagin_track.innerHTML=response1.pagin;
            ajax_message1.innerHTML=response1.success;
            ajax_message1.style.display="flex";
        }else{

            ajax_message2.innerHTML=response1.error;
            ajax_message2.style.display="flex";
        }
    }
}
request.send()
}

function delete_mall(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_mall=document.getElementById("tbody_mall");
let pagin_mall=document.getElementById("pagin_mall");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_mall?id="+id);
request.onreadystatechange=function(){

    if(request.status==200&&request.readyState==4){

        response1=JSON.parse(request.response);
        if(response1.success!=undefined){

            tbody_mall.innerHTML=response1.div;
            pagin_mall.innerHTML=response1.pagin;
            ajax_message1.innerHTML=response1.success;
            ajax_message1.style.display="flex"
        }else{
            ajax_message2.innerHTML=response1.error;
            ajax_message2.style.display="flex"
        }
    }
}
request.send()
}

function delete_color(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_color=document.getElementById("tbody_color");
let pagin_color=document.getElementById("pagin_color");
let request  =new XMLHttpRequest();
request.open("get","/admin/Delete_color?id="+id);
request.onreadystatechange=function(){

if(request.status==200&& request.readyState==4){

response1=JSON.parse(request.response);

if(response1.success!=undefined){

    tbody_color.innerHTML=response1.div;
    pagin_color.innerHTML=response1.pagin;
    ajax_message1.innerHTML=response1.success;
    ajax_message1.style.display="flex";
}else{

    ajax_message2.innerHTML=response1.error;
    ajax_message2.style.display="flex";
}
}
}
request.send();
}

function delete_size(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_size=document.getElementById("tbody_size");
let pagin_size=document.getElementById("pagin_size");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_size?id="+id);
request.onreadystatechange=function(){
if(request.status==200&&request.readyState==4){

    response1=JSON.parse(request.response);
    if(response1.success!=undefined){
 
        tbody_size.innerHTML=response1.div;
        pagin_size.innerHTML=response1.pagin;
        ajax_message1.innerHTML=response1.success;
        ajax_message1.style.display="flex";
    }else{
        ajax_message2.innerHTML=response1.error;
        ajax_message2.style.display="flex";}
}
}
request.send();
}

function delete_suggest(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_suggest=document.getElementById("tbody_suggest");
let pagin_suggest=document.getElementById("pagin_suggest");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_suggest?id="+id);
request.onreadystatechange=function(){

    if(request.status==200&&request.readyState==4){

        response1=JSON.parse(request.response);

        if(response1.success!=undefined){

            tbody_suggest.innerHTML=response1.div;
            pagin_suggest.innerHTML=response1.pagin;
            ajax_message1.innerHTML=response1.success;
            ajax_message1.style.display="flex";
            
        }else{

            ajax_message1.innerHTML=response1.error;
            ajax_message1.style.display="flex";


        }
    }
}
request.send()
}

function delete_product(id){

let ajax_message1=document.getElementById("ajax_message1");
let ajax_message2=document.getElementById("ajax_message2");
let tbody_product=document.getElementById("tbody_product");
let pagin_product=document.getElementById("pagin_product");
let request=new XMLHttpRequest();
request.open("get","/admin/Delete_product?id="+id);
request.onreadystatechange=function(){
if(request.status==200&&request.readyState==4){

response1=JSON.parse(request.response);
if(response1.success!=undefined){

    tbody_product.innerHTML=response1.div;
    pagin_product.innerHTML=response1.pagin;
    ajax_message1.innerHTML=response1.success;
    ajax_message1.style.display="flex";
}else{

    ajax_message2.innerHTML=response1.error;
    ajax_message2.style.display="flex"
}


}




}
request.send()


}