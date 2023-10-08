$(document).ready(function(){
    var currentImg=$('.viewCase .all-images img.active');
    var nextImg=currentImg.next();
    var prevImg=currentImg.prev();
    if(nextImg.length==0 && prevImg.length==0){
        $('#prev , #next').css({
            "opacity": "0.2",
            "pointer-events": "none"
        })
    }


    $.post("http://127.0.0.1:8000/api/comments",{case_id:$('.Add-comment input[name="case-id"]').attr("value")}
        , function (data) {

            var comments=JSON.parse(data);
            var main_comment_id=0,main_comment_username="";
            $('.Comments-Box .Comments-Box-header .box2 p.comment-count').html(comments.length)
            comments.map(comment=>{
                var date=comment.created_at.split("T");
                var Time=date[1].split(":");
                var h=Time[0]; var m=Time[1];
                var hm=h+":"+m;
                date=date[0]+" "+hm;
                if(comment.image_link=="http://127.0.0.1:8000/profile_images/"){
                    comment.image_link="http://127.0.0.1:8000/profile_images/person.png"

                }
                if(comment.refrence==null)
                {
                    main_comment_id=comment.box_id;
                    main_comment_username=comment.author_name;
                    $(".comments").append(`<div name="`+comment.box_id+`" class="comment"><div class="main-comment">
            <div class="comment-header">
                <div class="box-p-svg">
                <img src="`+comment.image_link+`">
                <div>
                  <p>`+comment.author_name+`</p>
                  <P>`+date+`</P>
                </div>
                <span>`+comment.author_role+`</span>
                </div>
                <button class="reply" name=`+comment.author_name+` id="`+comment.id+`">پاسخ</button>
            </div>
            <p>`+comment.body+`</p>
            <div class="more-less-div">
            </div>
            </div></div>`)
                }
                else{
                    if(comment.box_id==main_comment_id){
                        $(`[name=`+comment.box_id+`]`).append(`<div class="main-comment reply-comment" >
                <div class="comment-header">
                    <div class="box-p-svg">
                    <img src="`+comment.image_link+`">
                    <div>
                      <p>`+comment.author_name+`</p>
                      <P>`+date+`</P>
                    </div>
                    <span>`+comment.author_role+`</span>
                    </div>
                    <p class="reply-p">در پاسخ به `+main_comment_username+`</p>
                </div>
                <p>`+comment.body+`</p>
             </div>`)
                        $(`[name=`+main_comment_id+`] .main-comment .more-less-div`).html(` <button class="more" name="`+main_comment_username+`"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.88 9.29L12 13.17L8.12 9.29a.996.996 0 1 0-1.41 1.41l4.59 4.59c.39.39 1.02.39 1.41 0l4.59-4.59a.996.996 0 0 0 0-1.41c-.39-.38-1.03-.39-1.42 0z"/></svg></button>
             <button class="less" name="`+main_comment_username+`" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(180 12 12)"><path fill="currentColor" d="M15.88 9.29L12 13.17L8.12 9.29a.996.996 0 1 0-1.41 1.41l4.59 4.59c.39.39 1.02.39 1.41 0l4.59-4.59a.996.996 0 0 0 0-1.41c-.39-.38-1.03-.39-1.42 0z"/></g></svg></button>`)
                    }

                }


            })
        })

    $.post("http://127.0.0.1:8000/api/cases"
        , function (data) {
            var caseList=JSON.parse(data);

            var random=Math.floor(Math.random() * caseList.length)
            var output=`<div style="max-height: 440px;overflow-y: auto;">
          <label>عنوان</label>
          <p>`+caseList[random].title+`</p>
          <label>جنسیت</label>
          <p>`+caseList[random].gender+`</p>
          <label>ارگان بدن</label>
          <p>`+caseList[random].organ+`</p>
          <label>یافته ها</label>
          <p>`+caseList[random].findings+`</p>
          <label>تشخیص پزشک</label>
          <p>`+caseList[random].diagnosis+`</p>
          </div>
          <a href="`+caseList[random].link+`">مشاهده</a>`

            $('.random-case .random-case-details').html(output)
            $('.random-case img').attr("src",caseList[random].image_link)

            output=caseList.map(c => `<div class="col-md-3">
          <div class="case-box">
                  <img src="`+c.image_link+`">
                  <h4>`+c.title+`</h4>
                  <p>`+c.findings.slice(0, 40)+`...</p>
                  <a href="`+c.link+`">مشاهده</a>
          </div>
          </div>`);

            $('.cases').html(output)
            $('.cases').prepend(`<div class="result-msg">
              <p><span style="margin-left: 5px;">`+caseList.length+`</span>پرونده</p></div>`)


        })






    $('#menu-btn svg').on("click", function(){
        $('#navbar').toggleClass('close')
    })


    $('input[name="type"]').on("click",function(){
        if  ($("#Doctor").is(":checked")){
            $('input[name="medical_code"]').addClass("active")
        }

        else{
            type="Radiologist";
            $('input[name="medical_code"]').removeClass("active")
        }
    })

    $('.adv-Search-input .menu').on("click",function(){
        var submenu=$(this).parent().find('.submenu');
        submenu.toggle(300);
        $('.adv-Search-input .menu#'+this.id+' a svg:nth-child(2)').toggle();
        $('.adv-Search-input .menu#'+this.id+' a svg:nth-child(3)').toggle();
    })

    $('.adv-Search-input .menu .submenu').on("click","li",function(){
        menu_id=$(this).parents('.menu').attr("id")
        $('.adv-Search-input .menu#'+menu_id+' a span').html($(this).text())

        $('.adv-Search-input .menu#'+menu_id+'').find('.submenu').children('li').css({
            "color":"black",
            "background-color":"transparent"
        })

        $(this).css({
            "background-color": "#EAF6F5",
            "color": "#009688"
        })


        var cate=$('.adv-Search-input .menu#category a span').html()

        if(menu_id=="category"){
            $('.adv-Search-input .menu#sub-cat a span').html("انتخاب ساب کتگوری")
            if(cate=="انتخاب کتگوری"){
                $('.adv-Search-input .menu#sub-cat').css({
                    "opacity": "50%",
                    "pointer-events": "none"
                })


                $('.adv-Search-input .menu#sub-cat').find('.submenu').fadeOut(300)
                $('.adv-Search-input .menu#sub-cat a svg:nth-child(2)').fadeIn();
                $('.adv-Search-input .menu#sub-cat a svg:nth-child(3)').fadeOut();
            }
            else{

                $.post("http://127.0.0.1:8000/api/subcategory",
                    {

                        name:cate
                    }
                    , function (data) {

                        var sub=JSON.parse(data);
                        let output = sub.map(s => "<li>"+s.name+"</li>");
                        $('.adv-Search-input .menu#sub-cat').find('.submenu').html(output);
                        $('.adv-Search-input .menu#sub-cat').find('.submenu').append("<li>انتخاب ساب کتگوری</li>");
                    })


                $('.adv-Search-input .menu#sub-cat').css({
                    "opacity": "100%",
                    "pointer-events": "all"
                })

            }
        }
    })


    $('.adv-Search-btn').on("click",function(){
        var toSearch={
            title:$('.adv-Search .adv-Search-input input[name="title"]').val(),
            DoctorName:$('.adv-Search .adv-Search-input input[name="DoctorName"]').val(),
            Location:$('.adv-Search .adv-Search-input input[name="Location"]').val(),
            age:$('.adv-Search .adv-Search-input input[name="age"]').val(),
            history:$('.adv-Search .adv-Search-input input[name="history"]').val(),
            MedicaCode:$('.adv-Search .adv-Search-input input[name="MedicaCode"]').val(),
            findings:$('.adv-Search .adv-Search-input textarea[name="findings"]').val(),
            diagnosis:$('.adv-Search .adv-Search-input textarea[name="diagnosis"]').val(),
            gender: $('.adv-Search-input .menu#gender a span').html(),
            organ: $('.adv-Search-input .menu#organ-list a span').html(),
            category: $('.adv-Search-input .menu#category a span').html(),
            sub: $('.adv-Search-input .menu#sub-cat a span').html()
        }

        Object.keys(toSearch).forEach(function(key) {
            if(toSearch[key]=="انتخاب جنسیت" || toSearch[key]=="انتخاب ارگان بدن" || toSearch[key]=="انتخاب کتگوری" || toSearch[key]=="انتخاب ساب کتگوری") {
                toSearch[key]=""
            }
        });

        $.post("http://127.0.0.1:8000/api/cases"
            , function (data) {
                var caseList=JSON.parse(data);
                var results = [];

                for(var i=0; i<caseList.length; i++) {
                    console.log(caseList[i].medical_code.toString().indexOf(toSearch.MedicaCode))

                    if(caseList[i].title.indexOf(toSearch.title)!=-1 && caseList[i].doctor_name.indexOf(toSearch.DoctorName)!=-1
                        && caseList[i].location.indexOf(toSearch.Location)!=-1 && caseList[i].age.toString().indexOf(toSearch.age)!=-1
                        && caseList[i].gender.indexOf(toSearch.gender)!=-1 && caseList[i].organ.indexOf(toSearch.organ)!=-1
                        && caseList[i].category_name.indexOf(toSearch.category)!=-1 && caseList[i].subcategory_name.indexOf(toSearch.sub)!=-1
                        && caseList[i].history.indexOf(toSearch.history)!=-1 &&caseList[i].medical_code.toString().indexOf(toSearch.MedicaCode)!=-1
                        && caseList[i].findings.indexOf(toSearch.findings)!=-1 && caseList[i].diagnosis.indexOf(toSearch.diagnosis)!=-1
                    )
                    {
                        results.push(caseList[i]);
                    }

                }

                let output = results.map(c => `<div class="col-md-3">
              <div class="case-box">
                      <img src="`+c.image_link+`">
                      <h4>`+c.title+`</h4>
                      <p>`+c.findings.slice(0, 40)+`...</p>
                      <a href="`+c.link+`">مشاهده</a>
              </div>
              </div>`);
                $('.show-cases').html(output)
                $('.show-cases').prepend(`<div class="result-msg">
              <p><span style="margin-left: 5px;">`+results.length+`</span>نتیجه یافت شد</p></div>`)
            })
    })

    $('.SearchBox .input-Box input').on("keyup" ,function(){
        if(this.value=="")
        {
            $('.SearchBox .Search-result').fadeOut()
            $('.SearchBox .input-Box').css({
                "background-color":"#f6f7f7"
            })
            $('.SearchBox').css({
                "outline": "none"
            })

        }
        else{
            var toSearch=$(this).val()

            $.post("http://127.0.0.1:8000/api/cases"
                , function (data) {


                    var caseList=JSON.parse(data);
                    var results = [];
                    for(var i=0; i<caseList.length; i++) {



                        if(caseList[i].title.indexOf(toSearch)!=-1 ) {
                            results.push(caseList[i]);
                        }

                    }

                    let output = results.map(c => `<li><a href="`+c.link+`"><svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M1.75 1a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5ZM1 4.75A.75.75 0 0 1 1.75 4H7a.75.75 0 0 1 0 1.5H1.75A.75.75 0 0 1 1 4.75Zm9 7.75a2.5 2.5 0 1 0 0-5a2.5 2.5 0 0 0 0 5Zm0 1.5c.834 0 1.607-.255 2.248-.691l1.472 1.471a.75.75 0 1 0 1.06-1.06l-1.471-1.472A4 4 0 1 0 10 14ZM1.75 7a.75.75 0 0 0 0 1.5H4A.75.75 0 0 0 4 7H1.75Z" clip-rule="evenodd"/></svg>`+c.title+`</a></li>`);
                    if(results.length==0){
                        output=`<li style="text-align: center;">نتیجه ای یافت نشد</li>`
                    }
                    $('.SearchBox .Search-result').html(output)
                })

            $('.SearchBox .Search-result').fadeIn()
            $('.SearchBox .input-Box').css({
                "background-color":"white",
            })
            $('.SearchBox').css({
                "outline": "2px solid var(--border-color)",
                "border-top-right-radius": "10px",
                "border-top-left-radius": "10px"
            })
        }

    })

    $('.adv-Search-input .human-body area').on("click",function(){
        $('.adv-Search-input .menu#organ-list a span').html(this.title)
        $('.adv-Search-input .menu#gender a span').html(this.alt)

        $('.adv-Search-input .menu#organ-list,.adv-Search-input .menu#gender').find('.submenu').children('li').css({
            "color":"black",
            "background-color":"transparent"
        })

        location.href="#gender"

    })

    $('.adv-Search-header .clear').on("click",function(){
        $("input, textarea").val("");
        $('.adv-Search-input .menu').find('.submenu').children('li').css({
            "color":"black",
            "background-color":"transparent"
        })
        $('.adv-Search-input .menu .submenu li:last-child()').css({
            "background-color": "#EAF6F5",
            "color": "#009688"
        })
        $('.adv-Search-input .menu#sub-cat a span').html("انتخاب ساب کتگوری")
        $('.adv-Search-input .menu#organ-list a span').html("انتخاب ارگان بدن")
        $('.adv-Search-input .menu#gender a span').html("انتخاب جنسیت")
        $('.adv-Search-input .menu#category a span').html("انتخاب کتگوری")

        $('.adv-Search-input .menu#sub-cat').css({
            "opacity": "50%",
            "pointer-events": "none"
        })
    })

    $('.viewCase .image-slider #slider img').on('click', function(){
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

    $('#next').on("click" , function(){
        var currentImg=$('.viewCase .all-images img.active');
        var nextImg=currentImg.next();
        if(nextImg.length)
        {
            currentImg.removeClass('active')
            nextImg.addClass('active')
        }
        $('.viewCase .image-slider #slider .active').attr("src",nextImg.attr("src"))

        currentImg=$('.viewCase .all-images img.active');
        nextImg=currentImg.next();
        var prevImg=currentImg.prev();
        if(nextImg.length==0)
        {
            $(this).css({
                "opacity": "0.2",
                "pointer-events": "none"
            })
        }
        if(prevImg.length!=0)
        {
            $('#prev').css({
                "opacity": "1",
                "pointer-events": "all"
            })
        }
    })


    $('#prev').on("click" , function(){
        var currentImg=$('.viewCase .all-images img.active');
        var prevImg=currentImg.prev();
        if(prevImg.length)
        {
            currentImg.removeClass('active')
            prevImg.addClass('active')
        }
        $('.viewCase .image-slider #slider .active').attr("src",prevImg.attr("src"))
        currentImg=$('.viewCase .all-images img.active');
        var nextImg=currentImg.next();
        prevImg=currentImg.prev();


        if(prevImg.length==0)
        {
            $(this).css({
                "opacity": "0.2",
                "pointer-events": "none"
            })
        }
        if(nextImg.length!=0)
        {
            $('#next').css({
                "opacity": "1",
                "pointer-events": "all"
            })
        }
    })

    $('.viewCase .all-images img').on("click" , function(){
        $('.viewCase .image-slider #slider .active').attr("src",this.src)
        $('.viewCase .all-images img').removeClass('active')
        $(this).addClass('active')

        var currentImg=$('.viewCase .all-images img.active');

        var nextImg=currentImg.next();
        var prevImg=currentImg.prev();


        if(prevImg.length==0 && nextImg.length!=0)
        {
            $('#prev').css({
                "opacity": "0.2",
                "pointer-events": "none"
            })
            $('#next').css({
                "opacity": "1",
                "pointer-events": "all"
            })
        }
        else if(nextImg.length==0 && prevImg.length!=0)
        {
            $('#next').css({
                "opacity": "0.2",
                "pointer-events": "none"
            })
            $('#prev').css({
                "opacity": "1",
                "pointer-events": "all"
            })
        }
        else if(nextImg.length==0 && prevImg.length==0)
        {
            $('#prev , #next').css({
                "opacity": "0.2",
                "pointer-events": "none"
            })
        }
        else{
            $('#next , #prev').css({
                "opacity": "1",
                "pointer-events": "all"
            })

        }


    })


    $('.reply-alert').on("click", function(){
        $(this).removeClass('active')
        $('.reply-alert span').text("")
        $('.Add-comment input[name="reply-to"]').attr("value","")
    })

    $(".comments").on("click",".reply",function(){

        $('.reply-alert span').text(this.name)

        $('.Add-comment input[name="reply-to"]').val(this.id)
        $('.reply-alert').addClass('active')
    })

    $(".comments ").on("click ",".more" ,function(){

        $(this).parent().parent().siblings(".reply-comment").addClass("active")
        $(this).toggle()
        $(this).siblings(".less").toggle()


    })

    $(".comments").on("click ",".less" ,function(){
        $(this).parent().parent().siblings(".reply-comment").removeClass("active")
        $(this).toggle()
        $(this).siblings(".more").toggle()


    })

    $(".header .box-profile").on("click" ,function(){
        $('.profile-card').toggleClass("active")

    })

})
