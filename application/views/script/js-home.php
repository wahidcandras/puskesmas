   
    <script>
      $(function(){
        'use strict'

        var rs3 = new Rickshaw.Graph({
          element: document.querySelector('#rs3'),
          renderer: 'line',
          series: [{
            data: [
              { x: 0, y: 5 },
              { x: 1, y: 7 },
              { x: 2, y: 10 },
              { x: 3, y: 11 },
              { x: 4, y: 12 },
              { x: 5, y: 10 },
              { x: 6, y: 9 },
              { x: 7, y: 7 },
              { x: 8, y: 6 },
              { x: 9, y: 8 },
              { x: 10, y: 9 },
              { x: 11, y: 10 },
              { x: 12, y: 7 },
              { x: 13, y: 10 }
            ],
            color: '#1B84E7',
          }]
        });
        rs3.render();

        // Responsive Mode
        new ResizeSensor($('.slim-mainpanel'), function(){
          rs3.configure({
            width: $('#rs3').width(),
            height: $('#rs3').height()
          });
          rs3.render();
        });


        var newCust = [[0, 2], [1, 3], [2,6], [3, 5], [4, 7], [5, 8], [6, 10]];
        var retCust = [[0, 1], [1, 2], [2,5], [3, 3], [4, 5], [5, 6], [6,9]];

        var plot = $.plot($('#flotArea1'),[
          {
            data: newCust,
            label: 'New Customer',
            color: '#1B84E7'
          },
          {
            data: retCust,
            label: 'Returning Customer',
            color: '#4E6577'
          }],
          {
            series: {
              lines: {
                show: true,
                lineWidth: 0,
                fill: 0.8
              },
              shadowSize: 0
            },
            points: {
              show: false,
            },
            legend: {
              noColumns: 1,
              position: 'nw'
            },
            grid: {
              hoverable: true,
              clickable: true,
              borderColor: '#ddd',
              borderWidth: 0,
              labelMargin: 5,
              backgroundColor: '#fff'
            },
            yaxis: {
              min: 0,
              max: 15,
              color: '#eee',
              font: {
                size: 10,
                color: '#999'
              }
            },
            xaxis: {
              color: '#eee',
              font: {
                size: 10,
                color: '#999'
              }
            }
          });

          $.plot("#flotBar1", [{
            data: [[0, 3], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6]]
          }], {
            series: {
              bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#4E6577'
              }
            },
            grid: {
              borderWidth: 1,
              borderColor: '#D9D9D9'
            },
            yaxis: {
              tickColor: '#d9d9d9',
              font: {
                color: '#666',
                size: 10
              }
            },
            xaxis: {
              tickColor: '#d9d9d9',
              font: {
                color: '#666',
                size: 10
              }
            }
          });

          // Donut chart
          $('.peity-donut').peity('donut');

      });
    </script>