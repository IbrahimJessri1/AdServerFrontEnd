

<script defer>
    document.getElementById('type').onchange = selChange;
    document.getElementById('shape').onchange = selChange;
    document.getElementById('interactive').onchange = selChange;
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
        type = document.getElementById("type").value;
        shape = document.getElementById("shape").value;
        interactive = parseInt(document.getElementById("interactive").value);
        document.getElementById("all-ads").innerHTML = "";
        skip = 0;
        no_more = false;
        loadMoreData(skip, limit, interactive, type, shape);
        return false;
    }
</script>