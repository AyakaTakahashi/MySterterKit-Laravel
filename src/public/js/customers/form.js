$(function () {
    $("#photo").on("change", function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#image").attr("src", e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });

    $("#address_search").click(function (e) {
        let postcode = $("#postcode").val(); 
        if(!postcode){return};

        $.ajax({
            url: '/customer/getAddressByPostalCode/' + postcode, //アクセスするURL
            type: 'get',   //post or get
            cache: false,        //cacheを使うか使わないかを設定
            dataType: 'json',     //data type script・xmlDocument・jsonなど
        })
        .done(function(response) { 
            if(response[0] != null){
                $("#prefecture").val(response[0].prefecture);
                $("#city").val(response[0].city);
                $("#address").val(response[0].address);
            }else{
                $("#prefecture").val("");
                $("#city").val("");
                $("#address").val("");
            };
        })
        .fail(function(xhr) {
            return
        })
    });

    // $("#customer_filter").click(function (e) {
    //     let customer_id = $("#customer_filter_by_id").val(); 
    //     if(!customer_id){return};

    //     $.ajax({
    //         url: '/customer/' + customer_id, //アクセスするURL
    //         type: 'get',   //post or get
    //         cache: false,        //cacheを使うか使わないかを設定
    //         dataType: 'json',     //data type script・xmlDocument・jsonなど
    //     })
    //     .done(function(response) {
    //         console.log(response);
    //     })
    //     .fail(function(xhr) {
    //         return
    //     })
    // });
});