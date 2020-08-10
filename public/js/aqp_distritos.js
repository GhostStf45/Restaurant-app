$(document).ready(function(){
    var districts = $.getJSON('ubigeo_peru_2016_distritos.json', function(){
        console.log("success");
    });
});
