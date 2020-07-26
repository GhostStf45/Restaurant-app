'use strict'

/* ======================CARD FORM SELECT LOOP =========================================== */

function quantity(amount, select, fromNumber){
    var select = document.getElementById(select);
    for (var i = 0; i < amount; i++){
        select.options[select.options.length] = new Option(i+fromNumber, i);
      }
  }

  //years
  quantity(5,'card_year',2020);

  //months
  quantity(12,'card_month',1);

