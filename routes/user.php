<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\PayPalController;

use Illuminate\Support\Facades\Crypt;
Config::set("auth.defaults.guard","web");

Route::group(["middleware"=>"status_site"],function(){

    Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){ 

        // start show page  user
        Route::get("/","App\Http\controllers\site2\index@index")->name("index");
        Route::get("/show_department_user","App\Http\controllers\site2\department@index")->name("show_department_user");
        Route::get("/show_single_department/{id}","App\Http\controllers\site2\department@show_single")->name("show_single_department");
        Route::get("/show_tracking_user","App\Http\controllers\site2\account@show_tracking_user")->name("show_tracking_user");
        Route::get("/contact","App\Http\Controllers\site2\contact@index")->name("user_contact_index");
        Route::get("/about","App\Http\controllers\site2\index@about")->name("about_user_site");
        Route::get("/product_detail/{id}","App\Http\controllers\site2\product_detail@index")->name("product_detail");
        
        // end show page  user
        
        // start add user pages
        Route::get("/add_ newsletter","App\Http\Controllers\site2\\newsletter@create")->name("add_newsletter_email");
        Route::get("/add_contact","App\Http\Controllers\site2\contact@add_contact");
        Route::get("/add_review_ajax","App\Http\controllers\site2\product_detail@add_review_ajax");
        

        //end add user pages 

        // start paginaye and filter and search user
        Route::get("/search_user","App\Http\controllers\site2\index@search_user")->name("search_user");
        Route::get("/review_sort_by","App\Http\controllers\site2\product_detail@sort_review");
        Route::get("/paginate_order_department","App\Http\controllers\site2\department@paginate_order_department");
        Route::get("/order_by_navbar","App\Http\controllers\site2\index@order_by_navbar");
        Route::post("/filter_product","App\Http\controllers\site2\department@filter")->name("filter_product"); 
        Route::post("/paginate_order","App\Http\controllers\site2\index@paginate_order")->name("paginate_order");
        // end paginaye and filter and search user
        
        // start navbar proccesses
        Route::get("/new_product_user","App\Http\controllers\site2\index@new_product_user")->name("new_product_user");
        Route::get("/hot_product_user","App\Http\controllers\site2\index@hot_product_user")->name("hot_product_user");
        Route::get("/bestrating_product_user","App\Http\controllers\site2\index@bestrating_product_user")->name("bestrating_product_user");
        Route::get("/discount_product_user","App\Http\controllers\site2\index@discount_product_user")->name("discount_product_user");
        // end navbar proccesses
        
        //start login user    
        Route::get('/auth/login/{service}', "App\Http\controllers\site2\account@google_login");
        Route::get('/auth/login/{service}/callback',"App\Http\controllers\site2\account@google_callback");
        Route::get("/register_user","App\Http\controllers\site2\account@register_user")->name("register_user");
        Route::post("/register_post","App\Http\controllers\site2\account@register_post")->name("register_post");
        Route::get("/logout_user","App\Http\controllers\site2\account@logout")->name("logout_user");
        Route::get("/login_user","App\Http\controllers\site2\account@login")->name("login_user");
        Route::post("/post_login","App\Http\controllers\site2\account@post_login")->name("post_login");
        //end login user 

        //start reset password user
        Route::get("/forget_password","App\Http\controllers\site2\account@forget_password")->name("forget_password");
        Route::post("/send_email_forget","App\Http\controllers\site2\account@send_email_forget")->name("send_email_forget");
        Route::get("/change_pass/{id}","App\Http\controllers\site2\account@change_pass")->name("change_pass");
        Route::post("/post_change","App\Http\controllers\site2\account@post_change")->name("post_change");    
        //end reset password user
        
        


        Route::group(["middleware"=>"user:web"],function(){
       
        // start user cart processes
        Route::get("/show_cart","App\Http\controllers\site2\cart@index")->name("show_cart");
        Route::get("/edit_cart","App\Http\controllers\site2\cart@edit_cart")->name("edit_cart");
        Route::post("/add_cart","App\Http\controllers\site2\cart@add_cart")->name("add_cart");
        Route::get("/delete_cart","App\Http\controllers\site2\cart@delete_cart")->name("delete_cart");
        
        // end user cart processes

        // start user wishlist processes
        Route::get("/show_wishlist","App\Http\controllers\site2\wishlist@index")->name("show_wishlist");
        Route::get("/remove_wishlist_ajax","App\Http\controllers\site2\wishlist@remove_ajax")->name("remove_wishlist_ajax");
        Route::get("/add_wishlist_ajax","App\Http\controllers\site2\wishlist@add_wishlist_ajax")->name("add_wishlist_ajax");
        
        // end user wishlist processes
        
        // start user order processes
        Route::get("/show_order_user","App\Http\controllers\site2\order@index")->name("show_order_user");
        Route::get("/show_order_detail/{id}","App\Http\controllers\site2\order@show_order_detail")->name("show_order_detail");
        // end user order processes
        
        // start user profil processes
        Route::get("/user_profile","App\Http\controllers\site2\account@user_profile")->name("user_profile");
        Route::post("/edit_profile_post","App\Http\controllers\site2\account@edit_profile_post")->name("edit_profile_post");
        // end user profil processes


        //start payment with paypal 
        Route::get('process-transaction', "App\Http\controllers\site2\paypal@process")->name('processTransaction');
        Route::get("/checkout","App\Http\controllers\site2\checkout@index")->name("checkout");
        Route::get('/success-transaction/{id}', "App\Http\controllers\site2\paypal@success")->name('successTransaction');
        Route::get('cancel-transaction/{id}', "App\Http\controllers\site2\paypal@cancel")->name('cancelTransaction');
        //end payment with paypal 
    
    });
    
    
    
    });




});




















        // Route::group(["middleware"=>"user"],function(){
        //     Route::get("/","App\Http\controllers\site\site@show")->name("show_style_user");
        //     Route::get("/logout","App\Http\controllers\site\site@logout_style")->name("logout_style");
        //     Route::get("/my_profile","App\Http\controllers\site\setting@my_profile")->name("my_profile");
        //     Route::get("/contact","App\Http\controllers\site\setting@contact")->name("contact");
        //     Route::get("/show_card","App\Http\controllers\site\cart@show_card")->name("show_card");
        //     Route::get("/show_order","App\Http\controllers\site\order@show_order")->name("show_order");
        //     Route::get("/show_wishlist","App\Http\controllers\site\wishlist@show_wishlist")->name("show_wishlist");
        //     Route::get("/show_product_detail/{id}","App\Http\controllers\site\product@show_product_detail")->name("show_product_detail");
        //     Route::get("/edit_user/{id}","App\Http\controllers\site\setting@edit_user");
        //     Route::post("/save_user_edit_style","App\Http\controllers\site\setting@save_user_edit_style")->name("save_user_edit_style");
        //     Route::get("/delete_cart/{id}","App\Http\controllers\site\cart@delete_cart")->name("delete_cart");
        //     Route::get("/department_items/{id}","App\Http\controllers\site\department@show_items")->name("department_items");
        //     Route::get('/add_heart/{product}/{user}',"App\Http\controllers\site\wishlist@add_heart")->name("add_heart");
        //     Route::get("/delete_wishlist/{id}","App\Http\controllers\site\wishlist@delete_wishlist")->name("delete_wishlist");
        //     Route::post('/suggest',"App\Http\controllers\site\site@add_suggest")->name("suggest");
        //     Route::get("/add_cart/{product_id}/{user_id}","App\Http\controllers\site\cart@add_cart")->name("add_cart");
        //     Route::get("/save_star","App\Http\controllers\site\star@save_star");
        //     Route::post("/checkout","App\Http\controllers\site\site@show_checkout")->name("checkout");
        //     Route::get("/checkout","App\Http\controllers\site\site@show_checkout")->name("checkout");

        //     Route::get('process-transaction', "App\Http\controllers\PaypalController@processTransaction")->name('processTransaction');
        //     Route::get('success-transaction', "App\Http\controllers\PaypalController@successTransaction")->name('successTransaction');
        //     Route::get('cancel-transaction', "App\Http\controllers\PaypalController@cancelTransaction")->name('cancelTransaction');
        //     Route::get("/success_checkout","App\Http\controllers\PaypalController@success_checkout")->name("checkout_success");
        // });
        

        
        // Route::get("/login","App\Http\controllers\site\site@login")->name("login_style");
        // Route::get("/register","App\Http\controllers\site\site@register")->name("register_style");
        // Route::get("/forget","App\Http\controllers\site\site@forget")->name("forget_style");
        // Route::post("/save_login","App\Http\controllers\site\site@save_login_style")->name("login_user");
        // Route::post("/register_style","App\Http\controllers\site\site@register_style")->name("register_style_save");
        // Route::post("/forgetpass","App\Http\Controllers\site\site@post_forget")->name("post_forgetpassword");
        // Route::get("/change_pass","App\Http\Controllers\site\site@change_pass")->name("change_pass");
        // Route::post("/post_change","App\Http\Controllers\site\site@post_change")->name("post_change");
    






