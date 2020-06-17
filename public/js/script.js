
$.ajaxSetup({ 
    headers: { 
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
    } 
});


function AddCart(id){

    var quantyCart = $("#quantyCart-"+id).attr("quantyCart");
    var quantyCartMax = ($("#quantyCart-"+id).attr("quantyCartMax"));
    
    $.ajax({
        url: 'Add-Cart/'+id+"/"+quantyCart,
        type: 'GET',
    }).done(function(response){
        if(quantyCart == null){
            RenderCart(response);
            alertify.success("Đã thêm sản phẩm");
            
        }
        else{
            if(Number(quantyCart) < quantyCartMax){
                RenderCart(response);
                alertify.success("Đã thêm sản phẩm");
            }
            else{
                alertify.error("Đã thêm thất bại , số chỗ trống còn: "+ quantyCartMax);
            }
        }
    });
}

$("#change-item-cart").on("click", ".si-close i", function(){
    id = $(this).data("id");
    $.ajax({
        url: 'Delete-Item-Cart/'+id,
        type: 'POST',
        
    
    }).done(function(response){
    RenderCart(response);
    alertify.success("Đã xóa sản phẩm");
    });
    
});

function DeleteListItemCart(id) {
    $.ajax({
        url: 'Delete-Item-List-Cart/'+id,
        type: 'post',
    }).done(function(response){
        $("#change-list-cart").empty();
        $("#change-item-cart").empty();
        $("#change-list-cart").html(response);
        alertify.success("Đã xoá sản phẩm");
    });    
}

function SaveListItemCart(id) {
    
    var quantyMax = $("#saveQuanty-"+id).attr("quantyMax");
    var quanty = $("#quanty-item-"+id).val();
    $.ajax({
        url: 'Save-Item-List-Cart/'+id+'/'+$("#quanty-item-"+id).val(),
        type: 'post',
    }).done(function(response){
        
        if (quanty <= Number(quantyMax)) {
                
            $("#change-list-cart").empty();
            $("#change-item-cart").empty();
            $("#change-list-cart").html(response);
        
            alertify.success("Đã cập nhật thành công");
        }
        else{
            alertify.error("Đã cập nhật thất bại, số chỗ trống còn: "+ quantyMax);
            
        }
    }); 
}

$(document).ready(function(){
    $(".list-cart").click(function(){
        var id = $(this).attr("listCart");
        
        $.ajax({
        url: 'List-Cart',
        type: 'GET',
        }).done(function(response){
            $("#change-list-cart").empty();
            $(".cart-icon").empty();
            $("#change-list-cart").html(response);
            alertify.success("Danh sách Cart đã xuất hiện");
        });
    });
});

function RenderCart(response){
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);  
    $("#total-quanty-show").text($("#total-quanty-cart").val());
            
}

function CheckOutInfo(id) {
    $.ajax({
        url: 'CheckOutInfo/'+id,
        type: 'get',
    }).done(function(response){
        $("#content").empty();
        $(".cart-icon").empty();
        $("#content").html(response);
        alertify.success("Vui lòng nhập thông tin thanh toán");
    });    
}



$(function () {

    $(".js-modal-register").click(function (event) {
        event.preventDefault();
        $("#myModal").modal('show');
    })

    $('.js-btn-login').click(function (e) {
        e.preventDefault();
        $(".error-form").empty();
        let $this = $(this);
        let $domForm = $this.closest('form');

        $.ajax({
            url: 'register',
            data: $domForm.serialize(),
            method : "POST",
        }).done(function (results) {
                // ẩn modal
            $("#myModal").modal('hide');
            alert('Đăng Ký Thành Công');
                // làm mới lại form khi đăng kí thành công
            $("#form-register")[0].reset();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $(".error-form").empty();
            $.each(errors.errors, function (i, val) {
                $domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
            });
        });
    });
})





function postCheckOutInfo(id) {
        // lấy data trong form gần nhất
    let $dataForm = $("#btnCheckoutInfo").closest('form');
    console.log($dataForm);

    $.ajax({
            url: 'CheckOut-Info/'+id,
            data: $dataForm.serialize(),
            method : "POST",
            
        }).done(function (results) {
                
      
            alert(results);
               
       
        }).fail(function (data) {
            

            let errors = data.responseJSON;
            console.log(errors);
        });  
}





var ent;

function show_text(t, dname) {
    var xp, yp, op
    xp = dname.offsetLeft; // Element's offset x in pixels
    yp = dname.offsetTop; // Element's offset y in pixels
    // Now loop through all parent containers, adding offsets as we do so
    while (dname.offsetParent) {
        op = dname.offsetParent; // Get container parent
        xp = xp + op.offsetLeft; // Add this element's offset x in pixels
        yp = yp + op.offsetTop; 	// Add this element's offset y in pixels
        dname = dname.offsetParent; // Update current container
    }
    var newdiv = document.createElement('div');
    newdiv.setAttribute('id', "ent");
    document.body.appendChild(newdiv);
    ent = document.getElementById("ent")	// Get the main element
    if (ent) {
        // Change these to customise your popup window
        ent.style.color = "green";
        ent.style.padding = "7px 8px 7px 8px";
        ent.style.background = "#eee";
        ent.style.border = "1px solid #0066cb";
        // Don't, however, change these
        ent.style.position = 'absolute';
        ent.style.left = (xp + 10) + "px";
        ent.style.top = (yp + 25) + "px";
        ent.innerHTML = t;
        ent.style.display = "block";
    }
}

var adult = 0;
var children = 0;
var baby = 0;
var guest = 0;
var guestNumberMax = 0;

function adultCheck() {
    adult = $("#adult").val();

    if(adult == ''){
        adult = 0;
        $("#adult").val(0);
    }
    guestNumberMax = $("#guestNumber").attr("guestNumberMax");
    

    guestNumber(adult, baby, children)

    // Điều này xóa phần tử bật lên
    ent = document.getElementById("ent");
    if (ent) {
        document.body.removeChild(ent);
    }


    $.ajax({
        url: 'AdultAjax',
        data: { adult: adult, guestNumberMax: guestNumberMax, guestNumber: $("#guestNumber").val()  },
        method : "get",
        
    }).done(function (results) {
            
  
        alert(results);
           
   
    }).fail(function (data) {
        

        let errors = data.responseJSON;
        console.log(errors);
    }); 
}

function childrenCheck() {
    children = $("#children").val();

    if(children == ''){
        children = 0;
        $("#children").val(0);
    }
    guestNumber(adult, baby, children)
    
    // Điều này xóa phần tử bật lên
    ent = document.getElementById("ent");
    if (ent) {
        document.body.removeChild(ent);
    }
}

function babyCheck() {
    baby = $("#baby").val();
  
    if(baby == ''){
        baby = 0;
        $("#baby").val(0);
    }
  
    guestNumber(adult, baby, children)

    // Điều này xóa phần tử bật lên
    ent = document.getElementById("ent");
    if (ent) {
        document.body.removeChild(ent);
    }
}

function guestNumber(adult, baby, children) { 

    return $("#guestNumber").val(Number(adult)+Number(baby)+Number(children));
    
}







