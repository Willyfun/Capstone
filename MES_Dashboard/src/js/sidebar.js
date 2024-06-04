let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }

  function machinedata(){
    document.getElementById("machinedata");
  }

  $('#machinedatamenu').click(function(){
    $('#machinedata').css("display","block")
    $('#oeedata').css("display","none")
  })

  $('#oeemenu').click(function(){
    $('#machinedata').css("display","none")
    $('#oeedata').css("display","block")
  })

  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daily Good and Bad count'
    },
    xAxis: {
        categories: [
            '8.00am-9.00am',
            '9.00am-10.00a.m',
            '10.00am-11.00am',
            '11.00am-12.00am',
            '12.00am-1.00pm',
            '1.00pm-2.00pm',
            '2.00pm-3.00pm',
            '3.00pm-4.00pm',
            '4.00pm-5.00pm',
            '5.00pm-6.00pm',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Good',
        data: [12345, 23456, 34567, 45678, 56789, 0, 0, 0,
            0,0]
    }, {
        name: 'Not Good',
        data: [123, 234, 345, 456, 567, 0, 0, 0, 0]
    }]
});

function displayGoodCount(){
  $.ajax({
    url:"getGoodCount.php",
    type:"post",
    async:true,
    dataType:"json",
    success:function(data){


      var Goodcount = parseInt(data.goodcount);
      $("#Goodcount").empty();
      $("#Goodcount").append(

       "<h1 style='text-align:left; color:#107C10'>" +Goodcount+ "</h1>"
      )
     
    },
    error: function(){
      alert("error");
    }
  })
};

function displayBadCount(){
  $.ajax({
    url:"getBadCount.php",
    type:"post",
    async:true,
    dataType:"json",
    success:function(data){


      var Badcount = parseInt(data.badcount);
      $("#Badcount").empty();
      $("#Badcount").append(

       "<h1 style='text-align:left; color:#A80000'>" +Badcount+ "</h1>"
      )
     
    },
    error: function(){
      alert("error");
    }
  })
};

