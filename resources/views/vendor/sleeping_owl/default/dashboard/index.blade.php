@extends(AdminTemplate::getViewPath('_layout.inner'))
@push('scripts')

 @endpush
@push('content.top')
 <!-- Main content -->

  <!-- Main content -->
  <section class="content">

   <!-- Default box -->
   <div class="box">
    <div class="box-header with-border">
     <h3 class="box-title">Title</h3>

    </div>
    <div class="box-body">
<div>
     <div class="col-md-6"><canvas id="bar-chart" width="800" height="450"></canvas></div>
     <div class="col-md-6"><canvas id="pie-chart" width="800" height="450"></canvas></div>
</div>
     <br>
<div>
     <div class="col-md-6"> <canvas id="bar-chart2" width="800" height="450"></canvas></div>

     <div class="col-md-6"><canvas id="pie-chart2" width="800" height="450"></canvas></div>
</div>
 <div>
     <div class="col-md-6"><canvas id="bar-chart3" width="800" height="450"></canvas></div>
     <div class="col-md-6"><canvas id="pie-chart3" width="800" height="450"></canvas></div>
</div>
<br>
<br>
<br>
<br>
        @if(Auth::user()->isSuperAdmin())
      <form>
       <div class="col-md-8">
      <select name="type">

       <option value="" active>{{$titler}}</option>
       <option value="weight">Вес</option>
       <option value="quantity">Количество</option>
       <option value="volume">Обьем</option>

      </select>
        <button type="submit" >Filter</button>
       </div>



      </form>

     <div class="col-md-10">
      <canvas id="canvas" width="300" height="200"></canvas>
     </div>
        @endif
    </div>
    <!-- /.box-body -->




    <!-- /.box-footer-->
   </div>
   <!-- /.box -->

  </section>



@endpush

@push('footer-scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
 <script>
 // Bar chart

 new Chart(document.getElementById("bar-chart"), {
 type: 'bar',
 data: {
 labels: ["{{$weight[0]['name']}}", "{{$weight[1]['name']}}", "{{$weight[2]['name']}}", "{{$weight[3]['name']}}", "{{$weight[4]['name']}}"],
 datasets: [
 {
 label: "Масса: (кг)",
 backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
 data: ["{{$weight[0]['value']/1000}}","{{$weight[1]['value']/1000}}","{{$weight[2]['value']/1000}}","{{$weight[3]['value']/1000}}","{{$weight[4]['value']/1000}}"]
 }
 ]
 },
 options: {
 legend: { display: false },
 title: {
 display: true,
 text: 'Масса'
 }
 }
 });
 new Chart(document.getElementById("bar-chart2"), {
 type: 'bar',
 data: {
 labels: ["{{$quantity[0]['name']}}", "{{$quantity[1]['name']}}", "{{$quantity[2]['name']}}", "{{$quantity[3]['name']}}", "{{$quantity[4]['name']}}"],
 datasets: [
 {
 label: "Количетво: (шт.)",
 backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
 data: ["{{$quantity[0]['value']}}","{{$quantity[1]['value']}}","{{$quantity[2]['value']}}","{{$quantity[3]['value']}}","{{$quantity[4]['value']}}"]
 }
 ]
 },
 options: {
 legend: { display: false },
 title: {
 display: true,
 text: 'Количетво'
 }
 }
 });
 new Chart(document.getElementById("bar-chart3"), {
 type: 'bar',
 data: {
 labels: ["{{$volume[0]['name']}}", "{{$volume[1]['name']}}", "{{$volume[2]['name']}}", "{{$volume[3]['name']}}", "{{$volume[4]['name']}}"],
 datasets: [
 {
 label: "Обьем: (л.)",
 backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
 data: ["{{$volume[0]['value']}}","{{$volume[1]['value']}}","{{$volume[2]['value']}}","{{$volume[3]['value']}}","{{$volume[4]['value']}}"]
 }
 ]
 },
 options: {
 legend: { display: false },
 title: {
 display: true,
 text: 'Обьем'
 }
 }
 });

 new Chart(document.getElementById("pie-chart"), {
     type: 'pie',
     data: {
         labels: ["{{$pweight[0]['name']}}", "{{$pweight[1]['name']}}", "{{$pweight[2]['name']}}", "{{$pweight[3]['name']}}", "{{$pweight[4]['name']}}"],
         datasets: [{
             label: "Population (millions)",
             backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
             data: ["{{$pweight[0]['value']}}","{{$pweight[1]['value']}}","{{$pweight[2]['value']}}","{{$pweight[3]['value']}}","{{$pweight[4]['value']}}"]
         }]
     },
     options: {
         title: {
             display: true,
             text: ' '
         }
     }
 });

 new Chart(document.getElementById("pie-chart2"), {
     type: 'pie',
     data: {
         labels: ["{{$pquantity[0]['name']}}", "{{$pquantity[1]['name']}}", "{{$pquantity[2]['name']}}", "{{$pquantity[3]['name']}}", "{{$pquantity[4]['name']}}"],
         datasets: [{
             label: "Population (millions)",
             backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
             data: ["{{$pquantity[0]['value']}}","{{$pquantity[1]['value']}}","{{$pquantity[2]['value']}}","{{$pquantity[3]['value']}}","{{$pquantity[4]['value']}}"]
         }]
     },
     options: {
         title: {
             display: true,
             text: ' '
         }
     }
 });

 new Chart(document.getElementById("pie-chart3"), {
     type: 'pie',
     data: {
         labels: ["{{$pvolume[0]['name']}}", "{{$pvolume[1]['name']}}", "{{$pvolume[2]['name']}}", "{{$pvolume[3]['name']}}", "{{$pvolume[4]['name']}}"],
         datasets: [{
             label: "Population (millions)",
             backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
             data: ["{{$pvolume[0]['value']}}","{{$pvolume[1]['value']}}","{{$pvolume[2]['value']}}","{{$pvolume[3]['value']}}","{{$pvolume[4]['value']}}"]
         }]
     },
     options: {
         title: {
             display: true,
             text: ' '
         }
     }
 });


</script>

@if(Auth::user()->isSuperAdmin())
<script>
 var barChartData = {
     labels: [["{{$tweight[0]->name}}","Январь"],["{{$tweight[1]->name}}", "Февраль"], ["{{$tweight[2]->name}}","Март"], ["{{$tweight[3]->name}}","Апрель"], ["{{$tweight[4]->name}}","Май"],["{{$tweight[5]->name}}", "Июнь"],["{{$tweight[6]->name}}", "Июль"],["{{$tweight[7]->name}}","Август"],["{{$tweight[8]->name}}","Сентябрь"],["{{$tweight[9]->name}}","Октябрь"],["{{$tweight[10]->name}}", "Ноябрь"],["{{$tweight[11]->name}}","Декабрь"]],
     datasets: [{
         type: 'bar',
         label: ["Вес (кг)"],
         data: ["{{$tweight[0]->value}}", "{{$tweight[1]->value}}", "{{$tweight[2]->value}}", "{{$tweight[3]->value}}", "{{$tweight[4]->value}}", "{{$tweight[5]->value}}", "{{$tweight[6]->value}}", "{{$tweight[7]->value}}","{{$tweight[8]->value}}","{{$tweight[9]->value}}","{{$tweight[10]->value}}","{{$tweight[11]->value}}"],
         fill: false,
         backgroundColor: '#b33c24',

         yAxisID: 'y-axis-1'
     },
         // {
         //     type: 'bar',
         //     label: "Visitor",
         //     data: [200, 185, 590, 621, 250, 400, 95],
         //     fill: false,
         //     backgroundColor: '#60a0b3',
         //
         //     yAxisID: 'y-axis-1'
         // },

         {
             label: "Max temp.",
             type:'line',
             data: ["{{$weth[0]['avg_max_t']}}", "{{$weth[1]['avg_max_t']}}", "{{$weth[2]['avg_max_t']}}", "{{$weth[3]['avg_max_t']}}", "{{$weth[4]['avg_max_t']}}", "{{$weth[5]['avg_max_t']}}", "{{$weth[6]['avg_max_t']}}", "{{$weth[7]['avg_max_t']}}", "{{$weth[8]['avg_max_t']}}","{{$weth[9]['avg_max_t']}}","{{$weth[10]['avg_max_t']}}", "{{$weth[11]['avg_max_t']}}"],
             fill: false,
             borderColor: '#EC932F',
             backgroundColor: '#EC932F',
             pointBorderColor: '#EC932F',
             pointBackgroundColor: '#EC932F',

             yAxisID: 'y-axis-2'
         },
         {
             label: "Min temp.",
             type:'line',
             data: ["{{$weth[0]['avg_min_t']}}", "{{$weth[1]['avg_min_t']}}", "{{$weth[2]['avg_min_t']}}", "{{$weth[3]['avg_min_t']}}", "{{$weth[4]['avg_min_t']}}", "{{$weth[5]['avg_min_t']}}", "{{$weth[6]['avg_min_t']}}", "{{$weth[7]['avg_min_t']}}", "{{$weth[8]['avg_min_t']}}","{{$weth[9]['avg_min_t']}}","{{$weth[10]['avg_min_t']}}", "{{$weth[11]['avg_min_t']}}"],
             fill: false,
             borderColor: '#1b27b3',
             backgroundColor: '#1b27b3',
             pointBorderColor: '#1b27b3',
             pointBackgroundColor: '#1b27b3',

             yAxisID: 'y-axis-2'
         }

     ]
 };

 window.onload = function() {
     var ctx = document.getElementById("canvas").getContext("2d");
     window.myBar = new Chart(ctx, {
         type: 'bar',
         data: barChartData,
         options: {
             title: {
                 display: true,
                 text: '{{$titler}}'
             },
             responsive: true,
             tooltips: {
                 mode: 'label'
             },
             elements: {
                 line: {
                     fill: false
                 }
             },
             scales: {
                 xAxes: [{
                     display: true,
                     // gridLines: {
                     //     display: false
                     // },
                     labels: {
                         show: true,
                     }
                 }],
                 yAxes: [{
                     type: "linear",
                     display: true,
                     position: "left",
                     id: "y-axis-1",
                     // gridLines:{
                     //     display: false
                     // },
                     labels: {
                         show:true,

                     }
                 }, {
                     type: "linear",
                     display: true,
                     position: "right",
                     id: "y-axis-2",
                     // gridLines:{
                     //     display: false
                     // },
                     labels: {
                         show:true,

                     }
                 }]
             }
         }
     });
 };
 </script>
@endif
@endpush