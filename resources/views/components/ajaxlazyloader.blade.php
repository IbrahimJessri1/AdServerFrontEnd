



<script>
    var no_more = false;
    function loadMoreData(skip, limit, interactive, type, shape){
        $.ajax({
            url: 'http://localhost:9000/advertiser/ads',
            data:{ "skip" : skip ,"limit" : limit, "interactive" :interactive, "type" : type, "shape" : shape},
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
    var interactive = 2;
    var type = "all";
    var shape = "all";
    $(window).scroll(function(){
        if((window.innerHeight + window.scrollY) >= document.body.offsetHeight){
            skip += 5;
            loadMoreData(skip, limit, interactive, type, shape); 
        }
    });


    function selChange(){
        var val = $("#type").serialize();
        alert(val);
        return;
        $.ajax({
            type: "POST",
            url: "select.php",
            data: val,
            success: function(data) { 
                $('#sel2').html(data);
            }
        }); 
        return false;
    }
</script>