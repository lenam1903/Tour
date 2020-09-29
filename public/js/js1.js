$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function AddCart(id) {
    var quantyCart = $("#quantyCart-" + id).attr("quantyCart");
    var quantyCartMax = $("#quantyCart-" + id).attr("quantyCartMax");

    $.ajax({
        url: "Add-Cart/" + id + "/" + quantyCart,
        type: "GET",
    }).done(function (response) {
        if (quantyCart == null) {
            RenderCart(response);
            alertify.success("Đã thêm sản phẩm");
        } else {
            if (Number(quantyCart) < quantyCartMax) {
                RenderCart(response);
                alertify.success("Đã thêm sản phẩm");
            } else {
                alertify.error(
                    "Đã thêm thất bại , số chỗ trống còn: " + quantyCartMax
                );
            }
        }
    });
}

function deleteItemCart(id) {
    $.ajax({
        url: "Delete-Item-Cart/" + id,
        type: "POST",
    }).done(function (response) {
        RenderCart(response);
        alertify.success("Đã xóa sản phẩm");
    });
}

function DeleteListItemCart(id) {
    $.ajax({
        url: "Delete-Item-List-Cart/" + id,
        type: "post",
    }).done(function (response) {
        $("#iconCart").empty();
        $("#change-list-cart").empty();
        $("#change-list-cart").html(response);
        alertify.success("Đã xoá sản phẩm");
    });
}

function SaveListItemCart(id) {
    var quantyMax = $("#saveQuanty-" + id).attr("quantyMax");
    var quanty = $("#quanty-item-" + id).val();
    $.ajax({
        url: "Save-Item-List-Cart/" + id + "/" + $("#quanty-item-" + id).val(),
        type: "post",
    }).done(function (response) {
        if (quanty <= Number(quantyMax)) {
            $("#iconCart").empty();
            $("#change-list-cart").empty();
            $("#change-list-cart").html(response);

            alertify.success("Đã cập nhật thành công");
        } else {
            $("#iconCart").empty();
            alertify.error(
                "Đã cập nhật thất bại, số chỗ trống còn: " + quantyMax
            );
        }
    });
}

function RenderCart(response) {
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);

    $("#total-quanty-show").text(Number($("#total-quanty-cart").val()));
    if (isNaN($("#total-quanty-show").text())) {
        $("#total-quanty-show").text(Number(0));
    }
}

function CheckOutInfo(id) {
    $.ajax({
        url: "CheckOutInfo/" + id,
        type: "get",
    }).done(function (response) {
        $("#content").empty();
        $(".cart-icon").empty();
        $("#content").html(response);
        alertify.success("Vui lòng nhập thông tin thanh toán");
    });
}

function Redirect(url) {
    window.location = url;
}

$(function () {
    // register

    $(".js-modal-register").click(function (event) {
        event.preventDefault();
        $("#myModalRegister").modal("show");
    });

    $(".js-btn-register").click(function (e) {
        e.preventDefault();
        $(".error-form").empty();
        let $this = $(this);
        let $domForm = $this.closest("form");

        $.ajax({
            url: "register",
            data: $domForm.serialize(),
            method: "POST",
        })
            .done(function (results) {
                // ẩn modal
                $("#myModalRegister").modal("hide");
                alert("Đăng ký thành công");
                // làm mới lại form khi đăng kí thành công
                $("#form-register")[0].reset();
                // làm mới lại user
                $("#userLogo").empty();
                $("#userLogo").html(results);
            })
            .fail(function (data) {
                var nameRegister = [];
                var errors = data.responseJSON;
                $(".error-form").empty();
                $.each(errors.errors, function (i, val) {
                    $domForm
                        .find("input[name=" + i + "]")
                        .siblings(".error-form")
                        .text(val[0]);

                    console.log(i);
                    // đẩy tất cả name vào 1 mảng
                    nameRegister.push(i);
                });

                if (nameRegister.indexOf("nameRegister") >= 0) {
                    document.getElementById("nameRegister").style.borderColor =
                        "#FF0000";
                } else {
                    document.getElementById("nameRegister").style.borderColor =
                        "#808080";
                }
                if (nameRegister.indexOf("emailRegister") >= 0) {
                    document.getElementById("emailRegister").style.borderColor =
                        "#FF0000";
                } else {
                    document.getElementById("emailRegister").style.borderColor =
                        "#808080";
                }
                if (nameRegister.indexOf("passwordRegister") >= 0) {
                    document.getElementById(
                        "passwordRegister"
                    ).style.borderColor = "#FF0000";
                } else {
                    document.getElementById(
                        "passwordRegister"
                    ).style.borderColor = "#808080";
                }
                if (nameRegister.indexOf("passwordConfirmRegister") >= 0) {
                    document.getElementById(
                        "passwordConfirmRegister"
                    ).style.borderColor = "#FF0000";
                } else {
                    document.getElementById(
                        "passwordConfirmRegister"
                    ).style.borderColor = "#808080";
                }
            });
    });

    // login

    $(".js-modal-login").click(function (event) {
        event.preventDefault();
        $("#myModalLogin").modal("show");
    });

    $(".js-btn-login").click(function (e) {
        e.preventDefault();
        $(".error-form").empty();
        let $this = $(this);
        let $domForm = $this.closest("form");

        $.ajax({
            url: "login",
            data: $domForm.serialize(),
            method: "POST",
        })
            .done(function (results) {

                if (results == "admin") {
                    alert("Đăng nhập thành công");
                    Redirect("admin/user/list");
                } else if (results == "failed") {
                    alert("Đăng nhập thất bại. Vui lòng nhập lại.");

                    document.getElementById("emailLogin").style.borderColor =
                        "#FF0000";
                    document.getElementById("passwordLogin").style.borderColor =
                        "#FF0000";
                } else {
                    alert("Đăng nhập thành công");
                    // ẩn modal
                    $("#myModalLogin").modal("hide");
                    $("#userLogo").empty();
                    $("#userLogo").html(results);
                }
            })
            .fail(function (data) {
                var nameLogin = [];
                var errors = data.responseJSON;
                $(".error-form").empty();
                $.each(errors.errors, function (i, val) {
                    $domForm
                        .find("input[name=" + i + "]")
                        .siblings(".error-form")
                        .text(val[0]);
                     // đẩy tất cả name vào 1 mảng
                     nameLogin.push(i);

                    // document.getElementById(i).style.borderColor = "#FF0000";
                });

                if (nameLogin.indexOf("emailLogin") >= 0) {
                    document.getElementById("emailLogin").style.borderColor =
                        "#FF0000";
                } else {
                    document.getElementById("emailLogin").style.borderColor =
                        "#808080";
                }
                if (nameLogin.indexOf("passwordLogin") >= 0) {
                    document.getElementById("passwordLogin").style.borderColor =
                        "#FF0000";
                } else {
                    document.getElementById("passwordLogin").style.borderColor =
                        "#808080";
                }
            });
    });
});

var ent;

function show_text(t, dname) {
    var xp, yp, op;
    xp = dname.offsetLeft; // Element's offset x in pixels
    yp = dname.offsetTop; // Element's offset y in pixels
    // Now loop through all parent containers, adding offsets as we do so
    while (dname.offsetParent) {
        op = dname.offsetParent; // Get container parent
        xp = xp + op.offsetLeft; // Add this element's offset x in pixels
        yp = yp + op.offsetTop; // Add this element's offset y in pixels
        dname = dname.offsetParent; // Update current container
    }
    var newdiv = document.createElement("div");
    newdiv.setAttribute("id", "ent");
    document.body.appendChild(newdiv);
    ent = document.getElementById("ent"); // Get the main element
    if (ent) {
        // Change these to customise your popup window
        ent.style.color = "green";
        ent.style.padding = "7px 8px 7px 8px";
        ent.style.background = "#eee";
        ent.style.border = "1px solid #0066cb";
        // Don't, however, change these
        ent.style.position = "absolute";
        ent.style.left = xp + 10 + "px";
        ent.style.top = yp + 25 + "px";
        ent.innerHTML = t;
        ent.style.display = "block";
    }
}

var adult = 1;
var children = 0;
var baby = 0;
var guestNumberMax = 0;
var priceAdult = 0;
var priceChildren = 0;
var priceBaby = 0;

function formAdult(results) {
    guestNumber(adult, baby, children);
    $("#formAdult").empty();
    $("#formAdult").html(results);
}

function totalPrice() {
    let vat =
        (Number(priceAdult) + Number(priceChildren) + Number(priceBaby)) *
        (10 / 100);

    return $("#tongTien").text(
        Number(priceAdult) +
            Number(priceChildren) +
            Number(priceBaby) +
            Number(vat)
    );
}

function adultAjax(id) {
    adult = $("#adult").val();
    let total = 0;
    guestNumberMax = $("#guestNumber").attr("guestNumberMax");

    // Điều này xóa phần tử bật lên
    ent = document.getElementById("ent");
    if (ent) {
        document.body.removeChild(ent);
    }

    $.ajax({
        url: "AdultAjax/" + id,
        data: {
            adult: adult,
            guestNumberMax: guestNumberMax,
            guestNumber: Number(adult) + Number(baby) + Number(children),
        },
        method: "get",
    })
        .done(function (results) {
            if (adult == "") {
                adult = 1;
                $("#adult").val(1);
                alert("Vui lòng nhập số  ( > 0 )");
            }
            if (
                guestNumberMax <
                Number(adult) + Number(baby) + Number(children)
            ) {
                adult = 1;
                $("#adult").val(1);
                formAdult(results);

                total += $("#priceAdult1").val();
                priceAdult = total;

                totalPrice();

                alert(
                    "Không được nhập quá số chỗ trống của Tour " +
                        guestNumberMax +
                        " Vui Lòng nhập lại"
                );
            } else {
                if (adult == 0) {
                    alert("Ít nhất phải có một nguời lớn");
                    adult = 1;
                    $("#adult").val(1);
                    formAdult(results);

                    total += Number($("#priceAdult1").val());
                    priceAdult = total;
                    totalPrice();
                } else {
                    formAdult(results);
                    alertify.success(
                        "Đã hiện " +
                            (Number(adult) + Number(baby) + Number(children)) +
                            " phiếu nhập thông tin"
                    );

                    for (i = 1; i <= adult; i++) {
                        total += Number($("#priceAdult" + i).val());
                    }
                    priceAdult = total;

                    totalPrice();
                }
            }
        })
        .fail(function (data) {});
}

function formChildren(results) {
    guestNumber(adult, baby, children);
    $("#formChildren").empty();
    $("#formChildren").html(results);
}

function childrenAjax(id) {
    if (priceAdult == 0) {
        priceAdult = Number($("#priceAdult1").attr("maxprice"));
    }
    children = $("#children").val();
    guestNumberMax = $("#guestNumber").attr("guestNumberMax");
    let total = 0;

    // Điều này xóa phần tử bật lên
    ent = document.getElementById("ent");
    if (ent) {
        document.body.removeChild(ent);
    }

    $.ajax({
        url: "ChildrenAjax/" + id,
        data: {
            children: children,
            guestNumberMax: guestNumberMax,
            guestNumber: Number(adult) + Number(baby) + Number(children),
        },
        method: "get",
    })
        .done(function (results) {
            if (children === "") {
                children = 0;
                $("#children").val(0);
                alert("Vui lòng nhập số  ( >= 0 )");
            }

            if (
                guestNumberMax <
                Number(adult) + Number(baby) + Number(children)
            ) {
                children = 0;
                $("#children").val(0);
                formChildren(results);

                priceChildren = total;
                totalPrice();

                alert(
                    "Không được nhập quá số chỗ trống của Tour " +
                        guestNumberMax +
                        " Vui Lòng nhập lại"
                );
            } else {
                formChildren(results);
                alertify.success(
                    "Đã hiện " +
                        (Number(adult) + Number(baby) + Number(children)) +
                        " phiếu nhập thông tin"
                );

                for (i = 1; i <= children; i++) {
                    total += Number($("#priceChildren" + i).val());
                }
                priceChildren = total;
                totalPrice();
            }
        })
        .fail(function (data) {});
}

function formBaby(results) {
    guestNumber(adult, baby, children);
    $("#formBaby").empty();
    $("#formBaby").html(results);
}

function babyAjax(id) {
    if (priceAdult == 0) {
        priceAdult = Number($("#priceAdult1").attr("maxprice"));
    }
    let total = 0;
    baby = $("#baby").val();
    guestNumberMax = $("#guestNumber").attr("guestNumberMax");

    $.ajax({
        url: "BabyAjax/" + id,
        data: {
            baby: baby,
            guestNumberMax: guestNumberMax,
            guestNumber: Number(adult) + Number(baby) + Number(children),
        },
        method: "get",
    })
        .done(function (results) {
            if (baby === "") {
                baby = 0;
                $("#baby").val(0);
                alert("Vui lòng nhập đúng số  ( >= 0 )");
            }

            if (
                guestNumberMax <
                Number(adult) + Number(baby) + Number(children)
            ) {
                baby = 0;
                $("#baby").val(0);
                formBaby(results);
                priceBaby = total;
                totalPrice();
                alert(
                    "Không được nhập quá số chỗ trống của Tour " +
                        guestNumberMax +
                        " Vui Lòng nhập lại"
                );
            } else {
                formBaby(results);
                alertify.success(
                    "Đã hiện " +
                        (Number(adult) + Number(baby) + Number(children)) +
                        " phiếu nhập thông tin"
                );

                for (i = 1; i <= baby; i++) {
                    total += Number($("#priceBaby" + i).val());
                }
                priceBaby = total;

                totalPrice();
            }
        })
        .fail(function (data) {});
}

function guestNumber(adult, baby, children) {
    return $("#guestNumber").val(
        Number(adult) + Number(baby) + Number(children)
    );
}

function singleRoom(value, id, price, idGuest) {
    let priceSingleRoom = 1000000;

    if (idGuest.indexOf("singleRoomAdult" + id) == 0) {
        if (value == "Có") {
            $("#priceAdult" + id).val(price + priceSingleRoom);
            priceAdult += priceSingleRoom;
            totalPrice();
        } else {
            $("#priceAdult" + id).val(price);
            priceAdult -= priceSingleRoom;
            totalPrice();
        }
    }

    if (idGuest.indexOf("singleRoomChildren" + id) == 0) {
        if (value == "Có") {
            $("#priceChildren" + id).val(price + priceSingleRoom);
            priceChildren += priceSingleRoom;
            totalPrice();
        } else {
            $("#priceChildren" + id).val(price);
            priceChildren -= priceSingleRoom;
            totalPrice();
        }
    }

    if (idGuest.indexOf("singleRoomBaby" + id) == 0) {
        if (value == "Có") {
            $("#priceBaby" + id).val(price + priceSingleRoom);
            priceBaby += priceSingleRoom;
            totalPrice();
        } else {
            $("#priceBaby" + id).val(price);
            priceBaby -= priceSingleRoom;
            totalPrice();
        }
    }
}

function departureDay(id, valueDate) {
    var departureDay1 = $("#dateCheckoutAdult1").attr("departureDay");
    var tourTime = $("#dateCheckoutAdult1").attr("tourTime");
    departureDay1 = new Date(departureDay1);
    var departureDay2 = new Date(valueDate);
    var minDepartureDayAdult = new Date(valueDate);
    var minDepartureDayChildren = new Date(valueDate);
    var maxDepartureDayChildren = new Date(valueDate);
    var maxDepartureDayBaby = new Date(valueDate);

    tourTime = tourTime.slice(1, 3);
    // ngày xuất phát + số ngày của tour
    departureDay1.setDate(Number(tourTime) + Number(departureDay1.getDate()));

    // ngày ít nhất của người lớn
    minDepartureDayAdult.setFullYear(
        Number(departureDay1.getFullYear()) - Number(12)
    );
    minDepartureDayAdult.setDate(departureDay1.getDate());
    minDepartureDayAdult.setMonth(departureDay1.getMonth());

    // ngày min max của Trẻ Em
    minDepartureDayChildren.setFullYear(
        Number(departureDay1.getFullYear()) - Number(5)
    );
    minDepartureDayChildren.setDate(departureDay1.getDate());
    minDepartureDayChildren.setMonth(departureDay1.getMonth());

    maxDepartureDayChildren.setFullYear(
        Number(departureDay1.getFullYear()) - Number(12)
    );
    maxDepartureDayChildren.setDate(departureDay1.getDate());
    maxDepartureDayChildren.setMonth(departureDay1.getMonth());

    // ngày max của Em Bé
    maxDepartureDayBaby.setFullYear(
        Number(departureDay1.getFullYear()) - Number(5)
    );
    maxDepartureDayBaby.setDate(departureDay1.getDate());
    maxDepartureDayBaby.setMonth(departureDay1.getMonth());

    for (let i = 1; i <= adult; i++) {
        if (id.indexOf("dateCheckoutAdult" + i) == 0) {
            if (departureDay2.getTime() < minDepartureDayAdult.getTime()) {
            } else {
                $("#dateCheckoutAdult" + i).val("");
                alert(
                    "Ngày sinh & độ tuổi Người lớn không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : " +
                        departureDay1.getDate() +
                        "/" +
                        (Number(departureDay1.getMonth()) + Number(1)) +
                        "/" +
                        departureDay1.getFullYear() +
                        ")"
                );
            }
        }
    }

    for (let i = 1; i <= children; i++) {
        if (id.indexOf("dateCheckoutChildren" + i) == 0) {
            if (departureDay2.getTime() >= maxDepartureDayChildren.getTime()) {
                if (
                    departureDay2.getTime() < minDepartureDayChildren.getTime()
                ) {
                } else {
                    $("#dateCheckoutChildren" + i).val("");
                    alert(
                        "Ngày sinh & độ tuổi Trẻ Em không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : " +
                            departureDay1.getDate() +
                            "/" +
                            (Number(departureDay1.getMonth()) + Number(1)) +
                            "/" +
                            departureDay1.getFullYear() +
                            ")"
                    );
                }
            } else {
                $("#dateCheckoutChildren" + i).val("");
                alert(
                    "Ngày sinh & độ tuổi Trẻ Em không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : " +
                        departureDay1.getDate() +
                        "/" +
                        (Number(departureDay1.getMonth()) + Number(1)) +
                        "/" +
                        departureDay1.getFullYear() +
                        ")"
                );
            }
        }
    }

    for (let i = 1; i <= baby; i++) {
        if (id.indexOf("dateCheckoutBaby" + i) == 0) {
            if (
                departureDay2.getTime() >= maxDepartureDayBaby.getTime() &&
                departureDay2.getTime() <= departureDay1.getTime()
            ) {
            } else {
                $("#dateCheckoutBaby" + i).val("");
                alert(
                    "Ngày sinh & độ tuổi Em Bé không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : " +
                        departureDay1.getDate() +
                        "/" +
                        (Number(departureDay1.getMonth()) + Number(1)) +
                        "/" +
                        departureDay1.getFullYear() +
                        ")"
                );
            }
        }
    }
}

function postCheckOutInfo(idTour, idUser) {
    // lấy data trong form gần nhất
    let $dataForm = $("#btnCheckoutInfo").closest("form");

    if (priceAdult == 0) {
        priceAdult = Number($("#priceAdult1").attr("maxprice"));
    }
    let vat = (priceAdult + priceChildren + priceBaby) * (10 / 100);
    let totalPrice = priceAdult + priceChildren + priceBaby + vat;

    adult = $("#adult").val();
    children = $("#children").val();
    baby = $("#baby").val();

    let rules = document.getElementById("rules");

    let isRules = rules.checked;
    let date = true;
    for (let i = 1; i <= adult; i++) {
        if (isNaN(new Date($("#dateCheckoutAdult" + i).val()))) {
            alert(
                "Ngày Sinh Khách Hàng (Người Lớn " +
                    i +
                    " ) không hợp lệ!    Vui lòng nhập lại"
            );

            date = false;
        } else if ($("#fullNameAdult" + i).val() == "") {
            alert(
                "Họ Tên Khách Hàng (Người Lớn " +
                    i +
                    " ) không hợp lệ!    Vui lòng nhập lại"
            );
            date = false;
        } else {
        }
    }

    for (let i = 1; i <= children; i++) {
        if (isNaN(new Date($("#dateCheckoutChildren" + i).val()))) {
            alert(
                "Ngày Sinh Khách Hàng (Trẻ Em " +
                    i +
                    " ) không hợp lệ!    Vui lòng nhập lại"
            );
            date = false;
        } else if ($("#fullNameChildren" + i).val() == "") {
            alert(
                "Họ Tên Khách Hàng (Trẻ Em " +
                    i +
                    " ) không hợp lệ!    Vui lòng nhập lại"
            );
            date = false;
        } else {
        }
    }

    for (let i = 1; i <= baby; i++) {
        if (isNaN(new Date($("#dateCheckoutBaby" + i).val()))) {
            alert(
                "Ngày Sinh Khách Hàng (Em Bé " +
                    i +
                    " ) không hợp lệ!    Vui lòng nhập lại"
            );
            date = false;
        } else if ($("#fullNameBaby" + i).val() == "") {
            alert(
                "Họ Tên Khách Hàng (Em Bé " +
                    i +
                    " ) không hợp lệ!    Vui lòng nhập lại"
            );
            date = false;
        } else {
        }
    }

    if (isRules == true) {
        if (date == false) {
        } else {
            $.ajax({
                url: "CheckOut-Info/" + idTour + "/" + idUser,

                data:
                    $dataForm.serialize() +
                    "&totalPrice=" +
                    totalPrice +
                    "&test=1",

                method: "POST",
            })
                .done(function (results) {
                    RenderCart(results);
                    alert(
                        "Đặt Tour Thành Công (Đã xóa sản phẩm vừa thanh toán)"
                    );

                    window.location = "Bill";
                })
                .fail(function (data) {
                    let errors = data.responseJSON;
                    $(".error-form").empty();
                    $.each(errors.errors, function (i, val) {
                        $dataForm
                            .find("input[name=" + i + "]")
                            .siblings(".error-form")
                            .text(val[0]);
                        alert(val[0]);
                    });
                });
        }
    } else {
        alert("Quý khách cần chọn Điều khoản đăng ký online");
    }
}

function AddReview(idTour, idUser) {
    let $dataForm = $("#form-review");

    $.ajax({
        url: "Review/" + idTour + "/" + idUser,

        data: $dataForm.serialize(),

        method: "post",
    })
        .done(function (results) {
            $("#ajaxReview").empty();
            $("#ajaxReview").html(results);

            alert("Đánh giá thành công !!! 123");
        })
        .fail(function (data) {
            let errors = data.responseJSON;

            $(".error-form-review").empty();
            $.each(errors.errors, function (i, val) {
                $(".error-form-review").html(val);
            });
        });
}

function search() {
    let value = $("#search").val();

    $.ajax({
        url: "Search",
        data: {
            value: value,
        },
        method: "get",
    })
        .done(function (results) {
            $("#list-view").empty();
            $("#list-view").html(results);
        })
        .fail(function (data) {});
}
// js lenam
