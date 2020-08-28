// start img gallery

$(function(){
    $(".gallery-img").click(function(){
        var img = $(this).attr("data-image-path")
        var name = $(this).attr("data-category-name")
        var person = $(this).attr("data-category-person")
        var base_price = $(this).attr("data-category-base-price")
        var current_price = $(this).attr("data-category-current-price")
        $("#preview").attr("src",img)
        $("#preview-footer").css("color","red")
        $("#preview-footer").html(`
            <h5 class="display-4 text-danger">Category <span class="text-white">${name}</span> </h5>
            <h5 class="display-4 text-danger">Person Accomodation <span class="text-white">${person}</span> </h5>
           
        `)
    
        $(".full-panel").css("visibility","visible")
        $("body").css("overflow","hidden")
        window.scrollTo(0, 0); 
    })

    $(".right-arrow").click(function(){
        var current_img = $("#preview").attr("src");
        var current_div = $("#preview-footer").get()
        var x = $(".gallery").find("img[src='" + current_img + "']").parent().next().find("img").attr('src');
        console.log(current_div);
        $("#preview").attr("src",x)

    })

    $(".left-arrow").click(function(){
        var current_img = $("#preview").attr("src");
        var x = $(".gallery").find("img[src='" + current_img + "']").parent().prev().find("img").attr('src');
        $("#preview").attr("src",x)
    })

    $(".close-btn").click(function(){
        $("body").css("overflow","visible")
        $(".full-panel").css("visibility","hidden")
        
    })
})

// end img gallery