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
     });


    /* =============================GET DATA FUNCTIONS================================================  */

    function getAllAdvicesinfo()
     {
         //get more frecuently adivices
        axios.get('/admin/admin/charts/advice/all')
        .then(function (response){
           adminChartInfo.ajax_success_admin_data = response.data;
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
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: adminChartInfo.names,
                  datasets: [{
                      label: '',
                      data: adminChartInfo.values,
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
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: adminChartInfoDish.names_dish,
                  datasets: [{
                      label: '',
                      data: adminChartInfoDish.values_dish,
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
        })
        .catch(function(error){
            console.error(error);
        });
    }
    //delete duplicates function
    Array.prototype.unique=function(a){
        return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
    });
});
