'use strict'

  $(document).ready(function(){
    var url = 'http://mikuy.test'; //get url
     /*=============================================Contact Form ==========================================================*/
     var adviceCheck= $("input[name=advice_type_check]");
     var adviceChecked =$("#advice_checked");
     $(adviceCheck).on('change', function(){
         if($(this).val()=='complaint_option')
         {
             $(adviceChecked).attr("value", "Queja");

         }else if ($(this).val()=='should_option'){
             $(adviceChecked).attr("value", "Recomendación");
         }
         else{
             $(adviceChecked).attr("value", "");
         }
     });
     quantity(5, 'rating', 1);
     function quantity(amount, select, fromNumber){
        var select = document.getElementById(select);
        for (let i = 0; i < amount; i++){
            select.options[select.options.length] = new Option(i+fromNumber, i+fromNumber);
        }
    }

/*===============================================CARD FORM ==========================================================*/
    /* CARD FORM SELECT LOOP */


    //years
    quantity(5,'card_year',2020);

    //months
    quantity(12,'card_month',1);
    /* CARD FORM RADIOBUTTON  */

    var cardValue = $("input[name='card_name_check']");
    var cardValueChecked =$("#card_name_checked");
    $(cardValue).on('change', function(){
        if($(this).val()=='visa_option')
        {
            $(cardValueChecked).attr("value", "Visa");

        }else if ($(this).val()=='mastercard_option'){
            $(cardValueChecked).attr("value", "MasterCard");
        }
        else{
            $(cardValueChecked).attr("value", "Efectivo");
        }
    });
    /* CARD EXPIRED DATE */
    var selectYear = "";
    var selectMonth="";
    var expiredDate ={
        month: '',
        year: '',
    };
    var expiredMonth="";
    var expiredYear="";
    $("select#card_year").change(function(){
        selectYear = $(this).children("option:selected").val();
        expiredDate.year = selectYear;
        console.log(expiredDate);

    });

    $("select#card_month").change(function(){
        selectMonth = $(this).children("option:selected").val();
        expiredDate.month = selectMonth;
        if(selectMonth < 10){

            $("#expiredDate").attr("value", expiredDate.year+'-'+'0'+expiredDate.month);
        }
        else{
            $("#expiredDate").attr("value", expiredDate.year+'-'+expiredDate.month);
        }
        console.log(expiredDate);

    });
    /*AJAX request to save data in db*/
   /* $('#creditCardForm').submit(function(e){
        e.preventDefault();

        var inputExpiredDate = $("input[name=expiredDate]");
        var selectCardType = $("select[name=card_type] option").filter(':selected');
        var cardNumber = $("input[name=card_number]");
        var cardCVC = $("input[name=card_cvc]");
        cardValueChecked = $("input[name=card_name_value]");
        console.log(selectCardType.val(),cardValueChecked.val(), inputExpiredDate.val(), cardNumber.val(), cardCVC.val());

        $.ajax({
            type: "put",
            url: url+'/perfil/card/save',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'card_type': $(selectCardType).val(),
                'card_name': $(cardValueChecked).val(),
                'card_number': $(cardNumber).val(),
                'card_cv' : $(cardCVC).val(),
                'card_date_expired':  $(inputExpiredDate).val(),

            }, success: function(data){
                console.log(data, 'user'); //success
            },
            error:function(data){
                //nos dara el error si es que hay alguno
                var errors = data.responseJSON;
                console.log(errors, data);
            }
        });

    });*/




});

