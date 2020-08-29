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
    /*===============================================CARD FORM ==========================================================*/
    /* CARD FORM SELECT LOOP */
    function quantity(amount, select, fromNumber){
        var select = document.getElementById(select);
        for (let i = 0; i < amount; i++){
            select.options[select.options.length] = new Option(i+fromNumber, i+fromNumber);
        }
    }
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
    $('#myCarousel').carousel({
        interval: 2000,
     })

});
