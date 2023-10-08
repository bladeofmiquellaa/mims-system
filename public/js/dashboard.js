
const body = document.querySelector("body"),
    sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}


sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
$(document).ready(function(){
    $('.case-img .gallery .current-box div[src='+54+']').remove()
    $(".list").on("click" ,function(){
        $(this).children('ul.ul-link-name').toggle("active");
    })

    $(".box-profile").on("click" ,function(){
        $('.profile-card').toggleClass("active")
        $('.box-profile').toggleClass("active")
    })

    $("#upload").on("change",function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.Edit-Profile-img img').attr('src', e.target.result)
            };

            reader.readAsDataURL(this.files[0]);
        }
    })



    // case js
    if($.trim($(".case-img .gallery .current-box").html())=='')
    {
        $(".case-img .gallery .current-box").css({
            "display":"none"
        })
    }

    $('.case-img').on('change','.upload-icon #upload-case-img', function() {

        if (this.files) {
            var filesAmount = this.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<div class="selected"><img src='+event.target.result+'><p> برای نمایش تمام صفحه کلیک کنید</p></div>')).appendTo('.case-img .gallery .selected-box');
                }

                reader.readAsDataURL(this.files[i])
            }
            $(".clear").css({
                "display":"inline-block"
            })
        }
    });

    $('.case-img .gallery .selected-box , .case-img .gallery .current-box').on('click','.selected img , .current img', function(){
        $(".fullImage").css({
            "display":"flex"
        })
        $(".fullImage img").attr('src',this.src)
    })

    $('.fullImage svg').on('click',function(){
        $(".fullImage").css({
            "display":"none"
        })
    })

    $('.case-img .gallery .selected-box').on('mouseenter','.selected img',function(){
        $(this).css({
            "filter": "brightness(70%)"
        })
        $(this).siblings('p').css({
            "display":"block"
        })

    })
    $('.case-img .gallery .selected-box').on('mouseleave','.selected img',function(){
        $(this).css({
            "filter": "brightness(100%)"
        })

        $(this).siblings('p').css({
            "display":"none"
        })
    })

    $('.case-img .gallery .current-box').on('mouseenter','.current span',function(){
        $(this).siblings('img').css({
            "filter": "brightness(70%)"
        })

        $(this).css({
            "color":"red"
        })
    })
    $('.case-img .gallery .current-box').on('mouseleave','.current span',function(){
        $(this).siblings('img').css({
            "filter": "brightness(100%)"
        })
        $(this).css({
            "color":"var(--black-light-color)"
        })
    })

    $('.case-img .gallery .current-box').on('click','.current span',function(){
        $(".pop-up").css({
            "display":"flex"
        })
        var img_src=$(this).siblings('img').attr('src');
        var img_name=$(this).parent('.current').attr('name')
        var img_id=$(this).parent('.current').attr('id')
        $(".pop-up-data img").attr('src',img_src)
        $(".pop-up-buttons .ok").attr('name',img_name)
        $(".pop-up-buttons .ok").attr('id',img_id)

    })

    $('.pop-up-buttons .cancel , .pop-up-icon svg').on('click',function(){
        $(".pop-up").css({
            "display":"none"
        })
        $('.pop-up-box .show-errors').html("")
    })

    $('.pop-up-buttons .ok').on('click',function(){



        var image_id=this.id;

        $.post("http://127.0.0.1:8000/api/image/remove",
            {
                image_name: this.name,
                token:$('.case-main').attr('name')
            }
            , function(data,status){

                if (data.response== "عکس حذف شد") {
                    $(".pop-up").css({
                        "display": "none"
                    })

                    $('.case-img .gallery .current-box div[id='+image_id+']').remove()


                    if ($.trim($(".case-img .gallery .current-box").html()) == '') {
                        $(".case-img .gallery .current-box").css({
                            "display": "none"
                        })
                    }
                }
                else {
                    $('.pop-up-box .show-errors').html(`<div class="alert-danger alert">
            <li>` + data.response + `</li>`)

                }

            });


    })

    $('.clear').on('click',function(){
        $('.case-img .gallery .selected-box').html("")
        SrcArray=[]
        $(".clear").css({
            "display":"none"
        })
        $('.case-img label').remove()
        $('.case-img .upload-icon').prepend(`<label class="btn-default btn-file">
         <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M18 15v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2m-4.7 6H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v8.3c-.6-.2-1.3-.3-2-.3c-1.1 0-2.2.3-3.1.9L14.5 12L11 16.5l-2.5-3L5 18h8.1c-.1.3-.1.7-.1 1c0 .7.1 1.4.3 2Z"/></svg>
         <input type="file" accept="image/*" style="display: none;" id="upload-case-img" multiple>
     </label>`)
    })
})

$("select.category").change(function(){
    var category=$(this).children(":selected").html()

    if(category=="انتخاب کتگوری"){
        $('select.sub-category').css({
            "opacity": "50%",
            "pointer-events": "none"
        })

        $('select.sub-category option[selected="selected"]').removeAttr('selected')
        if($("select.sub-category option:first").html()=="انتخاب ساب کتگوری"){
            $("select.sub-category option:first").attr('selected','selected');
        }

        else{
            $("select.sub-category option:nth-child(2)").attr('selected','selected');
        }

    }

    else{

        $.post("http://127.0.0.1:8000/api/subcategory",
            {

                name:category
            }
            , function (data) {

                var sub=JSON.parse(data);
                let output = sub.map(s => "<option>"+s.name+"</option>");
                $('select.sub-category').html(output);
                $('select.sub-category').prepend("<option>انتخاب ساب کتگوری</option>");
            })


        $('select.sub-category').css({
            "opacity": "100%",
            "pointer-events": "all"
        })

    }

})
