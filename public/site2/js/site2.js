function delete_wishlist(id,user_id){
    let request=new XMLHttpRequest();
    let count_wishlist=document.getElementById("count_wishlist");
    request.open("get","remove_wishlist_ajax?id="+parseInt(id)+"&user_id="+parseInt(user_id) );
    request.onreadystatechange=function(){
    
        if(request.status==200&&request.readyState==4){
            
            response1=JSON.parse(this.response)
            count_wishlist.innerHTML=response1.count
            if(response1.found==1){

                document.getElementById('body_wishlist').innerHTML=response1.div1;
                document.getElementById("paginate_wishlist").innerHTML=response1.div2
            }else{
                document.body.innerHTML=`
                <div  class="page-cart">
    <div class="vertical-center">
        <div class="text-center">
            <h1>Em
                <i class="fas fa-child"></i>ty!</h1>
            <h5>Your Wishlist is currently empty.</h5>
            <div class="redirect-link-wrapper u-s-p-t-25">
                <a class="redirect-link" href="/">
                    <span>Return to Shop</span>
                </a>
            </div>
        </div>
    </div>
</div>
`
            }   
        }   
    }
    request.send()
}

function add_wishlist_ajax(product_id,user_id){

    let messages1=document.getElementById("messages_ajax1");
    let messages2=document.getElementById("messages_ajax2");
    let count_wishlist=document.getElementById("count_wishlist");
    let request=new XMLHttpRequest();
    request.open("get","add_wishlist_ajax?product_id="+product_id+"&user_id="+user_id);

    request.onreadystatechange=function(){
        if(request.status==200&&request.readyState==4){

            response1=JSON.parse(request.response);
            console.log(JSON.parse(request.response))
            if(response1.success!=undefined){
                messages1.innerHTML=response1.success;
                messages1.style.display="block";
                messages2.style.display="none";
                count_wishlist.innerHTML=response1.count;

            }else{

                messages2.innerHTML=response1.error;
                messages2.style.display="block";
                messages1.style.display="none";



            }

        }




    }
    request.send();
}


function delete_cart(cart_id,user_id){

    let side_cart=document.getElementById("side_cart");
    let sum_side_cart=document.getElementById("sum_side_cart");
    let count_cart_side=document.getElementById("count_cart_side");
    let sum_cart_side1=document.getElementById("sum_cart_side1");
    let cart_body2=document.getElementById("cart_body2");
    let cart_pagin_ajax=document.getElementById("cart_pagin_ajax");
    let subtotal_ajax=document.getElementById("subtotal_ajax");
    let shipping_ajax=document.getElementById("shipping_ajax");
    let tax_ajax=document.getElementById("tax_ajax");
    let total_ajax=document.getElementById("total_ajax");
    let request=new XMLHttpRequest();
    request.open("get","delete_cart?cart_id="+cart_id+"&user_id="+user_id);
    request.onreadystatechange=function(){
        if(request.status==200&& request.readyState==4){

            response1=JSON.parse(request.response);
            if(response1.success!=undefined){

                side_cart.innerHTML=response1.div2;
                sum_side_cart.innerHTML=response1.sum_cart;
                count_cart_side.innerHTML=response1.count;
                sum_cart_side1.innerHTML=response1.sum_cart;
                cart_body2.innerHTML=response1.div1;
                cart_pagin_ajax.innerHTML=response1.pagin;
                subtotal_ajax.innerHTML=response1.subtotal;
                shipping_ajax.innerHTML=response1.shipping;
                tax_ajax.innerHTML=response1.tax;
                total_ajax.innerHTML=response1.sum_cart;
            } 
            if(response1.count==0){

                document.body.innerHTML=
                `
                <div class="page-cart">
        <div class="vertical-center">
            <div class="text-center">
                <h1>Em
                    <i class="fas fa-child"></i>ty!</h1>
                <h5>Your cart is currently empty.</h5>
                <div class="redirect-link-wrapper u-s-p-t-25">
                    <a class="redirect-link" href="/">
                        <span>Return to Shop</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
                
                `;
                    
            }


        }

    }
    request.send()

}


function update_cart(cart_id,user_id){
let price=document.getElementById("price_cart_"+cart_id);
let quantity=document.getElementById("quantity_cart_"+cart_id);
let subtotal_ajax=document.getElementById("subtotal_ajax");
let shipping_ajax=document.getElementById("shipping_ajax");
let tax_ajax=document.getElementById("tax_ajax");
let total_ajax=document.getElementById("total_ajax");
let sum_cart_side1=document.getElementById("sum_cart_side1");
let sum_side_cart=document.getElementById("sum_side_cart");
let price_cart_side=document.getElementById("price_cart_side_"+cart_id);
let request=new XMLHttpRequest();
request.open("get","edit_cart?cart_id="+cart_id+"&user_id="+user_id+"&quantity="+quantity.value);
request.onreadystatechange=function(){

    if(request.status==200&&request.readyState==4){

        response1=JSON.parse(request.response);
        if(response1.success!=undefined){

            price.innerHTML=response1.price;
            subtotal_ajax.innerHTML=response1.subtotal;
            shipping_ajax.innerHTML=response1.shipping;
            tax_ajax.innerHTML=response1.tax;
            total_ajax.innerHTML=response1.total;            
            sum_cart_side1.innerHTML=response1.total;
            sum_side_cart.innerHTML=response1.total;
            price_cart_side.innerHTML=response1.price;
        }



    }

}
request.send();

}


function add_review_ajax(){

    let rate_value=document.getElementById("rate_value");
    let message_rate_value=document.getElementById("message_rate_value");
    let your_name=document.getElementById("your_name");
    let message_your_name=document.getElementById("message_your_name");
    let your_email=document.getElementById("your_email");
    let message_your_email=document.getElementById("message_your_email");
    let review_title=document.getElementById("review_title");
    let message_review_title=document.getElementById("message_review_title");
    let review=document.getElementById("review12");
    let message_review=document.getElementById("message_review");
    let product_id=document.getElementById("product_id");
    let select_sort=document.getElementById("select_sort");
    let title_review_count=document.getElementById("title_review_count");
    let avg_review1=document.getElementById("avg_review1");
    let sum_review3=document.getElementById("sum_review3");
    let star_5=document.getElementById("star_5");
    let star_4=document.getElementById("star_4");
    let star_3=document.getElementById("star_3");
    let star_2=document.getElementById("star_2");
    let star_1=document.getElementById("star_1");
    let sum_review5=document.getElementById("sum_review5");
    let show_review1=document.getElementById("show_review1");
    let pagin_review1=document.getElementById("pagin_review1");
    let messages_ajax1=document.getElementById("messages_ajax1");
    message_rate_value.innerText="";
    message_your_name.innerHTML="";
    message_your_email.innerHTML="";
    message_review_title.innerHTML="";
    message_review.innerHTML="";
    rate_value.classList.remove("is-invalid")
    your_name.classList.remove("is-invalid")
    your_email.classList.remove("is-invalid")
    review_title.classList.remove("is-invalid")
    review.classList.remove("is-invalid")

   $.ajax({

    type:"get",
    url:"/add_review_ajax",
    data:{"product_id":product_id.value,"rating":rate_value.value,"name":your_name.value,"email":your_email.value,"title":review_title.value,"review":review.value,"sort_by":select_sort.value},
    success:function(data){
        rate_value.value=""
        your_name.value=""
        your_email.value=""
        review_title.value=""
        review.value=""
        title_review_count.innerHTML=data.div2;
        avg_review1.innerHTML=data.avg,
        sum_review3.innerHTML=data.count;
        star_5.innerHTML=data.five;
        star_4.innerHTML=data.four
        star_3.innerText=data.three;
        star_2.innerHTML=data.two;
        star_1.innerHTML=data.one;
        sum_review5.innerHTML=data.count;
        show_review1.innerHTML=data.div
        pagin_review1.innerHTML=data.pagin;
        messages_ajax1.innerHTML=data.message;
        messages_ajax1.style.display="block"

    },
    error:function(error){

        errors1=JSON.parse(error.responseText).errors;
        if(errors1.rating!=undefined){
            message_rate_value.innerText=errors1.rating[0]
            rate_value.classList.add("is-invalid")

        }
        if(errors1.name!=undefined){

        message_your_name.innerHTML=errors1.name[0];
        your_name.classList.add("is-invalid")
            
        }
        if(errors1.email!=undefined){

        message_your_email.innerHTML=errors1.email[0];
        your_email.classList.add("is-invalid")
            
        }

        if(errors1.title!=undefined){
            message_review_title.innerHTML=errors1.title[0]
            review_title.classList.add("is-invalid")
        
        
        }
        if(errors1.review!=undefined){
            message_review.innerHTML=errors1.review[0]
            review.classList.add("is-invalid")
                  
        }
    }
   })
}

function sort_by_review(){
    let select_sort=document.getElementById("select_sort");
    let product_id=document.getElementById("product_id3");
    let show_review1=document.getElementById("show_review1");
    let pagin_review1=document.getElementById("pagin_review1");

        let request=new XMLHttpRequest();
        request.open("get","/review_sort_by?product_id="+product_id.value+"&sort_by="+select_sort.value);

        request.onreadystatechange=function(){

            if(request.status==200&&request.readyState==4){

                response1=JSON.parse(request.response);

                show_review1.innerHTML=response1.div;
                pagin_review1.innerHTML=response1.pagin;
            }
        }
        request.send()

}

function show_single_department(){

    let order_by_single_department=document.getElementById("order_by_single_department");
    let show_single_department=document.getElementById("show_single_department");
    let single_department_id=document.getElementById("single_department_id");
    let product_single_department=document.getElementById("product_single_department");
    let pagin_single_department_link=document.getElementById("pagin_single_department_link");
    let request=new XMLHttpRequest();
    request.open("get","/paginate_order_department?department="+single_department_id.value+"&order_by="+order_by_single_department.value+"&pagin="+show_single_department.value);
    request.onreadystatechange=function(){
        if(request.status==200&&request.readyState==4){
            response1=JSON.parse(request.response);
            product_single_department.innerHTML=response1.div;
            pagin_single_department_link.innerHTML=response1.pagin;


        }




    }

    request.send()
}

function sort_new_order(){

let sort_by_new_product=document.getElementById("sort_by_new_product");
let show_new_product23=document.getElementById("show_new_product23");
let product_loop=document.getElementById("product_loop");
let pagin_link_new_product=document.getElementById("pagin_link_new_product");
let request=new XMLHttpRequest();
request.open("get","/order_by_navbar?order_by="+sort_by_new_product.value+"&pagin="+show_new_product23.value);
request.onreadystatechange=function(){

if(request.status==200&&request.readyState==4){

    response1=JSON.parse(request.response);
    product_loop.innerHTML=response1.div;
    pagin_link_new_product.innerHTML=response1.pagin;


}


}
request.send();
}


function send_contact(){

let contact_name=document.getElementById("contact_name");
let contact_name_message=document.getElementById("contact_name_message");
let contact_email=document.getElementById("contact_email");
let contact_email_message=document.getElementById("contact_email_message");
let contact_subject=document.getElementById("contact_subject");
let contact_subject_message=document.getElementById("contact_subject_message");
let contact_message=document.getElementById("contact_message");
let contact_message_message=document.getElementById("contact_message_message");
let messages_ajax1=document.getElementById("messages_ajax1");
contact_name.classList.remove("is-invalid");
contact_email.classList.remove("is-invalid");
contact_subject.classList.remove("is-invalid");
contact_message.classList.remove("is-invalid");
contact_name_message.innerHTML="";
contact_email_message.innerHTML="";
contact_subject_message.innerHTML="";
contact_message_message.innerHTML="";
$.ajax({
url:"/add_contact",
data:{"name":contact_name.value,"email":contact_email.value,"subject":contact_subject.value,"content":contact_message.value},
success:function(data){
contact_name.value=""
contact_email.value=""
contact_subject.value=""
contact_message.value=""
messages_ajax1.innerHTML=data.success
messages_ajax1.style.display="block"


},
error:function(error){

    errors=error.responseJSON.errors
    if(errors.name!=undefined){
        contact_name.classList.add("is-invalid")
        contact_name_message.innerHTML=errors.name
    }

    if(errors.email!=undefined){
        contact_email.classList.add("is-invalid")
        contact_email_message.innerHTML=errors.email
    }


    if(errors.subject!=undefined){
        contact_subject.classList.add("is-invalid")
        contact_subject_message.innerHTML=errors.subject
    }

    if(errors.content!=undefined){
        contact_message.classList.add("is-invalid")
        contact_message_message.innerHTML=errors.content
    }
}
})
}


function add_newsletter(){

let newsletter_field=document.getElementById("newsletter_field");
let messages_ajax1=document.getElementById("messages_ajax1");
let messages_ajax2=document.getElementById("newletter_message");
messages_ajax2.innerHTML=""
$.ajax({
url:"/add_ newsletter",
method:"get",
data:{"email":newsletter_field.value},
success:function(data){
newsletter_field.value=""
messages_ajax1.innerHTML=data.success;
messages_ajax1.style.display="block"
},
error:function(error){
    errors=error.responseJSON.errors;
    messages_ajax2.innerHTML=errors.email

}


});

}





 


