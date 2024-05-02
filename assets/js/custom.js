$(function () {
    $(".increment_btn").on("click", function (e) {
        e.preventDefault;
        var stock= document.getElementById("stock");
        stock_val= stock.value;
        
        var qty = $(this).closest('.product_data').find(".input_qty").val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < stock_val) {
            value++;
            $(this).closest('.product_data').find(".input_qty").val(value);
        }
    });

    $(".decrement_btn").on("click", function (e) {
        e.preventDefault;
        var qty = $(this).closest('.product_data').find(".input_qty").val();
        var value = parseInt(qty);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find(".input_qty").val(value);
        }
    });

    $(".addToCartBtn").on("click", function (e) {
        e.preventDefault;
        var qty = document.getElementById("input_qty");
        qty_value = qty.value;
        var prod_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty_value,
                "scope": "add"
            },
            success: function (response) {
                if (response == 201) {
                    alertify.success("Add to cart successfully");
                } else if (response == "existing") {
                    alertify.error("Item already in cart");
                } else if (response == 401) {
                    alertify.error("Need to login to add cart");
                } else if (response == 500) {
                    alertify.error("Something Went Wrong");
                }
            }
        });
    });

    $(".updateQty").on("click", function (e) {
        e.preventDefault;
        var qty = $(this).closest('.product_data').find(".input_qty").val();
        var prod_id = $(this).closest('.product_data').find(".prodID").val();
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            success: function (response) {
                if (response == 201) {
                    alertify.success("Success update quantity");
                } else if (response == 401) {
                    alertify.error("Need to login");
                } else if (response == 500) {
                    alertify.error("Something Went Wrong");
                }
            }
        });
    });
    $(".remove_btn").on("click", function (e) {
        e.preventDefault;
        var cart_id = $(this).val();
        // alert(cart_id);
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function (response) {
                if (response == 200) {
                    alertify.success("Success Delete Item From Cart");
                    location.reload();
                }
                else{
                    alert(response);
                }
            }
        });
    });

    $(".update_hits").on("click", function(e){
        e.preventDefault;
        var hits = $(this).closest('.product_data').find(".hits").val();
        var hits_prod_id = $(this).closest('.product_data').find(".hits_prod_id").val();
        hits++;
        $.ajax({
            method: "POST",
            url: "functions/update_hits.php",
            data: {
                "prod_id": hits_prod_id,
                "hits": hits,
            },
            success: function (response) {
            }
        });
    });

    $("#add_review").on("click", function(e){
        e.preventDefault;
        $('#review_modal').modal('show');

    });
    $('#save_review').on("click", function(e){
        e.preventDefault;
        var prod_id= $('#review_prod_id').val();
        var user_name = $('#user_name').val();
        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {   
            $.ajax({
                url:"functions/submit_review.php",
                method:"POST",
                data:{ prod_id: prod_id,
                       user_name: user_name, 
                       user_review: user_review},
                success:function(response)
                {
                    $('#review_modal').modal('hide');
                    alert(response);
                    location.reload();
                }
            })
        }

    });
});