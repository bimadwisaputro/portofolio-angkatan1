$(document).on("click", "[id=reset_setting]", function (e) {
  e.preventDefault();
  if (confirm("Are you sure want to reset data?")) {
    dataMap = {};
    dataMap["userid"] = "";
    $.post("../php/resetsetting.php", dataMap, function (response) {
      // Log the response to the consol
      console.log(response);
      var res = JSON.parse(response);
      if (res.status == 1) {
        iziToast.success({
          timeout: 5000,
          icon: "fa fa-check",
          title: "Reset Success",
          message: "Thank You.. !",
        });
        setTimeout(function () {
          location.reload(0);
        }, 2000);
      } else if (res.status == 2) {
        iziToast.warning({
          timeout: 5000,
          icon: "fa fa-close",
          title: "Data still empty",
          message: "Alert, Data still empty..",
        });
      } else {
        iziToast.error({
          timeout: 5000,
          icon: "fa fa-close",
          title: "Reset Failed",
          message: "Error",
        });
      }
    });
  } else {
    iziToast.error({
      timeout: 5000,
      icon: "fa fa-close",
      title: "Cancel",
      message: "Process Cancel Reset",
    });
  }
});

// $(document).on("click", "[id=simpan_setting]", function (e) {
//   e.preventDefault();
//   dataMap = {};
//   let formData = new FormData();
//   $.each($(".settingform"), function (index, value) {
//     var idx = $(value).attr("id");
//     var value = $(value).val();
//     dataMap["" + idx + ""] = "" + value + "";
//     formData.append("" + idx + "", "" + value + "");
//   });
//   if (document.getElementById("logo").files.length == 0) {
//     var logo = "";
//   } else {
//     var logo = $("#logo")[0].files[0];
//   }
//   //   console.log(logo);
//   //   return false;
//   formData.append("logo", logo);
//   //   console.log(formData);
//   //   return false;
//   $.ajax({
//     url: "../php/simpansetting.php",
//     method: "POST",
//     contentType: false,
//     processData: false,
//     data: formData,
//     success: function (response) {
//       console.log(response);
//       var res = JSON.parse(response);
//       if (res.status == 1) {
//         iziToast.success({
//           timeout: 5000,
//           icon: "fa fa-check",
//           title: "Delete Success",
//           message: "Thank You.. !",
//         });
//         setTimeout(function () {
//           location.reload(0);
//         }, 2000);
//       } else {
//         iziToast.error({
//           timeout: 5000,
//           icon: "fa fa-close",
//           title: "Delete Failed",
//           message: "Error",
//         });
//       }
//     },
//     error: function () {
//       iziToast.error({
//         timeout: 5000,
//         icon: "fa fa-close",
//         title: "Cancel",
//         message: "Process Cancel",
//       });
//     },
//   });
// });
$(document).on("click", "[id=deletefoto]", function (e) {
  e.preventDefault();
  if (confirm("Are you sure want to delete?")) {
    dataMap = {};
    dataMap["tid"] = $(this).attr("tid");
    dataMap["tipe"] = $(this).attr("tipe");
    $.post("../php/deletefoto.php", dataMap, function (response) {
      // Log the response to the consol
      console.log(response);
      var res = JSON.parse(response);
      if (res.status == 1) {
        iziToast.success({
          timeout: 5000,
          icon: "fa fa-check",
          title: "Delete Success",
          message: "Thank You.. !",
        });
        setTimeout(function () {
          location.reload(0);
        }, 2000);
      } else {
        iziToast.error({
          timeout: 5000,
          icon: "fa fa-close",
          title: "Delete Failed",
          message: "Error",
        });
      }
    });
  } else {
    iziToast.error({
      timeout: 5000,
      icon: "fa fa-close",
      title: "Cancel",
      message: "Process Cancel",
    });
  }
  // alert("test");
  // return false;
});

$(document).on("click", "[id^=delete_]", function (e) {
  e.preventDefault();
  if (confirm("Are you sure want to delete?")) {
    dataMap = {};
    dataMap["tid"] = $(this).attr("tid");
    dataMap["tipe"] = $(this).attr("tipe");
    $.post("../php/delete.php", dataMap, function (response) {
      // Log the response to the consol
      console.log(response);
      var res = JSON.parse(response);
      if (res.status == 1) {
        iziToast.success({
          timeout: 5000,
          icon: "fa fa-check",
          title: "Delete Success",
          message: "Thank You.. !",
        });
        setTimeout(function () {
          location.reload(0);
        }, 2000);
      } else {
        iziToast.error({
          timeout: 5000,
          icon: "fa fa-close",
          title: "Delete Failed",
          message: "Error",
        });
      }
    });
  } else {
    iziToast.error({
      timeout: 5000,
      icon: "fa fa-close",
      title: "Cancel",
      message: "Process Cancel",
    });
  }
  // alert("test");
  // return false;
});

$(document).on("click", "[id=balaspesan]", function (e) {
  e.preventDefault();
  if (confirm("Are you sure want to send this messages?")) {
    dataMap = {};
    dataMap["mode"] = "sendemail";
    dataMap["tipe"] = "contacts";
    dataMap["name"] = $("#name").val();
    dataMap["email"] = $("#email").val();
    dataMap["subject"] = $("#subjectbalasan").val();
    dataMap["message"] = $("#pesanbalasan").val();
    $.post("../php/simpan.php", dataMap, function (response) {
      // Log the response to the consol
      console.log(response);
      var res = JSON.parse(response);
      if (res.status == 1) {
        iziToast.success({
          timeout: 5000,
          icon: "fa fa-check",
          title: "Sending Email Success",
          message: "Thank You.. !",
        });
        setTimeout(function () {
          location.reload(0);
        }, 2000);
      } else {
        iziToast.error({
          timeout: 5000,
          icon: "fa fa-close",
          title: "Sending Email Failed",
          message: "Error",
        });
      }
    });
  } else {
    iziToast.error({
      timeout: 5000,
      icon: "fa fa-close",
      title: "Cancel",
      message: "Process Error Sending Email",
    });
  }
});

//untuk form insert & update
$(document).on("click", "[id^=simpan_]", function (e) {
  e.preventDefault();
  var tipe = $(this).attr("tipe");
  var mode = $(this).attr("mode");
  dataMap = {};
  let formData = new FormData();
  $.each($("." + tipe + "form"), function (index, value) {
    var idx = $(value).attr("id");
    var value = $(value).val();
    dataMap["" + idx + ""] = "" + value + "";
    formData.append("" + idx + "", "" + value + "");
  });

  if (tipe == "contacts") {
    var links = "php/simpan.php";
  } else if (tipe == "resumes" || tipe == "skills" || tipe == "categories") {
    var links = "../php/simpan.php";
  } else {
    if (document.getElementById("foto").files.length == 0) {
      var foto = "";
    } else {
      var foto = $("#foto")[0].files[0];
    }
    formData.append("foto", foto);
    var links = "../php/simpan.php";
  }

  formData.append("tipe", tipe);
  formData.append("mode", mode);
  // console.log(formData);
  // return false;
  $.ajax({
    url: links,
    method: "POST",
    contentType: false,
    processData: false,
    data: formData,
    success: function (response) {
      console.log(response);
      var res = JSON.parse(response);
      if (res.status == 1) {
        iziToast.success({
          timeout: 5000,
          icon: "fa fa-check",
          title: "Add Data Success",
          message: "Thank You.. !",
        });
        setTimeout(function () {
          if (tipe != "contacts") {
            window.location.href = tipe + ".php"; //Will take you to Google.
          } else {
            location.reload(0);
          }
        }, 2000);
      } else {
        iziToast.error({
          timeout: 5000,
          icon: "fa fa-close",
          title: "Add Data Failed",
          message: "Error",
        });
      }
    },
    error: function () {
      iziToast.error({
        timeout: 5000,
        icon: "fa fa-close",
        title: "Cancel",
        message: "Process Cancel",
      });
    },
  });
});
