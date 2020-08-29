'use strict'
$(document).ready(function(){
     /* ===============================================================ADMIN DASHBOARD CONTROLL =============================== */
     var url = "http://mikuy.test"

     var chooseOption_chart = $('input[type=radio][name=filter_stats]');

     var adminChartInfo = {
        ajax_success_admin_data : [],
        values : [],
        names: []
     };
     var adminChartInfoDish = {
        ajax_success_admin_data_dish : [],
        values_dish : [],
        names_dish: []
     };
     var adminChartInfoDistricts= {
        ajax_success_admin_data_district : [],
        values_district  : [],
        names_district : []
     };
     var Last7DaysAdvices = {
        ajax_success_admin_data_7_day_adv : [],
        values_7_days_adv : [],
        names_7_days_adv: []
     };



     //binding with radio buttons
     $(chooseOption_chart).on('change', function(){
        if($(this).val() == 'admin_advice')
        {
           getAllAdvicesinfo();
        }
        if($(this).val() == 'admin_dishes')
        {
            getAllDishesinfo();
        }
        if($(this).val() == 'admin_advice_last7Days')
        {
            getLast7DayAdvices();
        }
        if($(this).val() == 'admin_districts')
        {
            getAllDistrictsInfo();
        }
        if($(this).val() == 'admin_products_last7Days')
        {
            getAllOrdersWeekDays();
        }
        if($(this).val() == 'admin_age_frec')
        {
            getFrecuentlyAge();
        }
     });
     /* ======================================================0GENERATE RANDOM VALUES WITHOUT DB DATA ===============0 */
     var WeekDaysOrders = {
        values_7_days_products : [],
        names_7_days_products: ['Lunes','Martes','Miercoles','Jueves', 'Viernes', 'Sabado', 'Domingo']
     };
     var randomNum = Math.floor(Math.random()*9);
        for (var n=0; n<randomNum; n++)
        {
            WeekDaysOrders.values_7_days_products.push(n);

        }

     var ageValues = new Array(18,20,21,22);
     var ordersNumber = new Array(40,32,30,22);

    var AgeValuesFrecuent = {
        values_age : ordersNumber,
        names_age: ageValues
     };

    /* =============================GET DATA FUNCTIONS================================================  */

    function getFrecuentlyAge () {
        drawChart(AgeValuesFrecuent.names_age, AgeValuesFrecuent.values_age);
    }

    function getAllOrdersWeekDays()
    {
        if (WeekDaysOrders.values_7_days_products.length > 8) {

            WeekDaysOrders.values_7_days_products.unique();
        }
        drawChart(WeekDaysOrders.names_7_days_products, WeekDaysOrders.values_7_days_products);

    }

    function getAllAdvicesinfo()
     {
         //get more frecuently adivices
        axios.get('/admin/admin/charts/advice/all')
        .then(function (response){
           adminChartInfo.ajax_success_admin_data = response.data;
           console.log(response.data);
           adminChartInfo.ajax_success_admin_data.forEach(ajax_success_admin_data_item => {
            //delete duplicate values
            if (adminChartInfo.values.length > 1) {

                adminChartInfo.values.unique();
            }
            else{
                adminChartInfo.values.push( ajax_success_admin_data_item.count);
            }

            if (adminChartInfo.names.length > 1) {
                adminChartInfo.names.unique();
            } else{
                adminChartInfo.names.push(ajax_success_admin_data_item.advice_type);
            }

          });
          drawChart(adminChartInfo.names, adminChartInfo.values);
        })
        .catch(function(error){
            console.error(error);
        });
    }
    function getAllDishesinfo()
    {
        axios.get('/admin/admin/charts/dishes')
        .then(function (response){
            adminChartInfoDish.ajax_success_admin_data_dish = response.data;
            adminChartInfoDish.ajax_success_admin_data_dish.forEach(ajax_success_admin_data_item => {
                if (adminChartInfoDish.values_dish.length > 1) {

                    adminChartInfoDish.values_dish.unique();
                }
                else{
                    adminChartInfoDish.values_dish.push( ajax_success_admin_data_item.order_productCount);
                }

                if (adminChartInfoDish.names_dish.length > 1) {
                    adminChartInfoDish.names_dish.unique();
                } else{
                    adminChartInfoDish.names_dish.push(ajax_success_admin_data_item.name);
                }
          });
          drawChart(adminChartInfoDish.names_dish, adminChartInfoDish.values_dish);
        })
        .catch(function(error){
            console.error(error);
        });
    }
    function getAllDistrictsInfo()
    {
        axios.get('/admin/admin/charts/districts')
        .then(function (response){
            adminChartInfoDistricts.ajax_success_admin_data_district = response.data;

            adminChartInfoDistricts.ajax_success_admin_data_district.forEach(ajax_success_admin_data_item => {
                //delete duplicate values
                if (adminChartInfoDistricts.values_district.length > 4) {

                    adminChartInfoDistricts.values_district.unique();
                    console.log(adminChartInfoDistricts.values_district);
                }
                else{
                    adminChartInfoDistricts.values_district.push( ajax_success_admin_data_item.count);

                }

                if (adminChartInfoDistricts.names_district.length > 4) {
                    adminChartInfoDistricts.names_district.unique();
                } else{
                    adminChartInfoDistricts.names_district.push(ajax_success_admin_data_item.shipping_district);
                }

              });

            drawChart(adminChartInfoDistricts.names_district, adminChartInfoDistricts.values_district);

        }).catch(function(error){
            console.error(error);
        });
    }
    function getLast7DayAdvices()
    {
        axios.get('/admin/admin/charts/lastDaysAdvice')
        .then(function (response){
        Last7DaysAdvices.ajax_success_admin_data_7_day_adv = response.data;
        console.log(response);
        Last7DaysAdvices.ajax_success_admin_data_7_day_adv.forEach(ajax_success_admin_data_item => {
            //delete duplicate values
            if (Last7DaysAdvices.values_7_days_adv.length > 1) {

                Last7DaysAdvices.values_7_days_adv.unique();
                console.log(Last7DaysAdvices.values_7_days_adv);
            }
            else{
                Last7DaysAdvices.values_7_days_adv.push( ajax_success_admin_data_item.count);

            }

            if (Last7DaysAdvices.names_7_days_adv.length > 1) {
                Last7DaysAdvices.names_7_days_adv.unique();
            } else{
                Last7DaysAdvices.names_7_days_adv.push(ajax_success_admin_data_item.advice_type);
            }

          });
        drawChart(Last7DaysAdvices.names_7_days_adv, Last7DaysAdvices.values_7_days_adv);

        }).catch(function(error){
            console.error(error);
        });

    }
    //delete duplicates function
    Array.prototype.unique=function(a){
        return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
    });

    function drawChart(labels, values )
    {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '',
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    }
});
