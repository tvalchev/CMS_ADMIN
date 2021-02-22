'use strict';

$(document).ready(function() {


  const addAccSucceed = document.getElementById("add_acc_succeed");
  const addAccFailed= document.getElementById("add_acc_failed");
  const addAccWrongPass = document.getElementById("add_acc_pass_failed");

  const addDestinationSucceed = document.getElementById("add_destination_succeed");
  const addADestinationFailed= document.getElementById("add_destination_failed");

  const displayAccSucceed = function(){
    addAccSucceed.classList.remove("hidden");
    addAccFailed.classList.add("hidden");
    addAccWrongPass.classList.add("hidden");
  }

  const displayAccFailed= function(){
    addAccSucceed.classList.add("hidden");
    addAccFailed.classList.remove("hidden");
    addAccWrongPass.classList.add("hidden");
  }

  const displayAccWrongPass = function(){
    addAccSucceed.classList.add("hidden");
    addAccFailed.classList.add("hidden");
    addAccWrongPass.classList.remove("hidden");
  }

  const displayDestinationSucceed = function(){
    addDestinationSucceed.classList.remove("hidden");
    addADestinationFailed.classList.add("hidden");
  }

  const displayDestinationFailed= function(){
    addDestinationSucceed.classList.add("hidden");
    addADestinationFailed.classList.remove("hidden");
  }


  const addOfferSucceed = document.getElementById("add_offer_succeed");
  const addAOfferFailed= document.getElementById("add_offer_failed");

  const displayAddOfferSucceed = function(){
    addOfferSucceed.classList.remove("hidden");
    addAOfferFailed.classList.add("hidden");
  }

  const displayAddOfferFailed= function(){
    addOfferSucceed.classList.add("hidden");
    addAOfferFailed.classList.remove("hidden");
  }


  const addPhotoSucceed = document.getElementById("add_photo_succeed");
  const addPhotoFailed = document.getElementById("add_photo_failed");

  const displayAddPhotoSucceed = function(){
    addPhotoSucceed.classList.remove("hidden");
    addPhotoFailed.classList.add("hidden");
  }

  const displayAddPhotoFailed= function(){
    addPhotoSucceed.classList.add("hidden");
    addPhotoFailed.classList.remove("hidden");
  }


  $("#submit-registration").click(function(e) {
    e.preventDefault();
    e.stopPropagation();

    const username = $("#username").val().trim();
    const password = $("#password").val().trim();
    const confirm_password = $("#confirm_password").val().trim();
    if(password === confirm_password)
    {
      $.ajax({
        type: "POST",
        url: "./actions/add_acc.php",
        dataType : 'JSON',
        data: {
          username: username,
          password: password,
        },
        success: function(data) {
          console.log(data['response']);
          if(data['response']=="success"){
            displayAccSucceed();
            setDefaultsAccValues();
          }
          else{
            displayAccFailed();
            setDefaultsAccValues();
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr);
          console.log("error state")
          displayAccFailed();
        }
      });
    }
    else{
      displayAccWrongPass();
      setDefaultsAccValues();
    }
  });


  const setDefaultsAccValues = function(){
    $("#username").val("");
    $("#password").val("");
    $("#confirm_password").val("");
  }

  // ADD Destination
  $('#add_destination').on('submit', function(e){
    e.preventDefault();
    e.stopPropagation();

    const destination = $("#destination").val().trim();

    $.ajax({
      type: "POST",
      url: "./actions/add_destination.php",
      dataType : 'JSON',
      data: {
        destination: destination,
      },
      success: function(data) {
        if(data['response']=="success"){
          displayDestinationSucceed();
          setDefaultsDestinationValues();
        }
        else{
          displayDestinationFailed();
          setDefaultsDestinationValues();
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr);
      }
    });
  
  });

  const setDefaultsDestinationValues = function(){
    $("#destination").val("");
  }

  $('#add_offer_form').on('submit', function(event){
    event.preventDefault();

    const title = $("#title").val();
    const title_short = $("#title_short").val();
    const destination = $("#destination").val();
    const offer_img = $('input[type=file]').val().split('\\').pop();
    const transport_type = $("#transport_type").val();
    const route = $("#route").val();
    const duration = $("#duration").val();
    const add_information = $("#add_information").val();
    const price = $("#price").val();
    const date = $("#date").val();
    const program = CKEDITOR.instances['program'].getData();
    const prices = CKEDITOR.instances['prices'].getData();
    const conditions = CKEDITOR.instances['conditions'].getData();
    const excursions = CKEDITOR.instances['excursions'].getData();
    const last_minute = $("#last_minute").is( ":checked" ) ? 1 : 0;
    const supplier = $("#supplier").val();

    $.ajax({
      type: "POST",
      url: "./actions/add_offer.php",
      dataType : 'json',
      data: {
        title: title,
        title_short: title_short,
        destination: destination,
        offer_img: offer_img,
        transport_type: transport_type,
        route: route,
        duration: duration,
        add_information: add_information,
        price: price,
        date: date,
        program: program,
        prices: prices,
        conditions: conditions,
        excursions: excursions,
        last_minute: last_minute,
        supplier: supplier
      },
      success:function(data)
      {
        if(data['response']=="success"){
          displayAddOfferSucceed();
        }
        else{
          displayAddOfferFailed();
        }
    
      },
      error: function(xhr, status, error) {
        console.error(xhr);
      }
    });
 
  });

  $('#edit_offer_form').on('submit', function(event){
    event.preventDefault();

    const offers_id = $("#offer_id").val();
    const title = $("#title").val();
    const title_short = $("#title_short").val();
    const destination = $("#destination").val();
    const offer_img = $('input[type=file]').val().split('\\').pop();
    const transport_type = $("#transport_type").val();
    const route = $("#route").val();
    const duration = $("#duration").val();
    const add_information = $("#add_information").val();
    const price = $("#price").val();
    const date = $("#date").val();
    const program = CKEDITOR.instances['program'].getData();
    const prices = CKEDITOR.instances['prices'].getData();
    const conditions = CKEDITOR.instances['conditions'].getData();
    const excursions = CKEDITOR.instances['excursions'].getData();
    const last_minute = $("#last_minute").is( ":checked" ) ? 1 : 0;
    const supplier = $("#supplier").val();

    $.ajax({
      type: "POST",
      url: "./actions/edit_offer.php",
      dataType : 'json',
      data: {
        offers_id: offers_id,
        title: title,
        title_short: title_short,
        destination: destination,
        offer_img: offer_img,
        transport_type: transport_type,
        route: route,
        duration: duration,
        add_information: add_information,
        price: price,
        date: date,
        program: program,
        prices: prices,
        conditions: conditions,
        excursions: excursions,
        last_minute: last_minute,
        supplier: supplier
      },
      success:function(data)
      {
        //console.log(data['result']);
        if(data['response']=="success"){
          displayAddOfferSucceed();
        }
        else{
          displayAddOfferFailed();
        }
    
      },
      error: function(xhr, status, error) {
        console.error(xhr);
      }
    });
 
  });

  $('#add_photo_offer').on('submit', function(event){
    event.preventDefault();

    const formData = new FormData();
    var files = $('#file')[0].files;
    
    // Check file selected or not
    if(files.length > 0 ){
        formData.append('file',files[0]);

        $.ajax({
          url: './actions/add_photo_offer.php',
          type: 'post',
          data: formData,
          contentType: false,
          processData: false,
          success:function(response)
          {
            //alert(response);
            if(response != 0){
              displayAddPhotoSucceed();
            }
            else{
              displayAddPhotoFailed();
            }
          },
        });
    }else{
        alert("Моля изберете файл.");
    }

 
  });

  
});
