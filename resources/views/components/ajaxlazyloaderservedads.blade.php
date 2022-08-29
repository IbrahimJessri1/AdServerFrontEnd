



<script defer>
    var no_more = false;
    function loadMoreData(skip, limit){
        $.ajax({
            url: 'http://localhost:9000/advertiser/served',
            data:{ "skip" : skip ,"limit" : limit},
            type: 'get',
            
            beforeSend :function(){
                if(!no_more)
                    $(".ajax-load").show();
            }
        })
        .done(function(data){
            $('.ajax-load').hide();
            if(data.html == " " || data.html == undefined || data.html == "" || data.html == null){
                no_more = true;
                return;
            }
            $("#all-ads").append(data.html);
        })  
        .fail(function(jqXHR, ajaxOptions, thrownError){
            alert("Server not responding");
        });
    }
    var skip = 0;
    var limit = 5;
    $(window).scroll(function(){
        if((window.innerHeight + window.scrollY) >= document.body.offsetHeight){
            skip += 5;
            loadMoreData(skip, limit); 
        }
    });

</script>