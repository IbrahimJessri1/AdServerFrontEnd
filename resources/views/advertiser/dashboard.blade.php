

<x-advertiser-layout :username="$username" :simpleheader="$simpleheader">
    <div class="card flex-column justify-content-around h-screen">
            <div class="flex flex-row, justify-around max-h-72">
                <canvas id="types" class='max-w-[50%] max-h-72'></canvas>
                <canvas id="itv" class='max-w-[50%] max-h-72' ></canvas>
            </div>
            
            <div class="flex flex-row, justify-around max-h-56">
                <canvas id="ctr" class='max-w-[40%] max-h-56'></canvas>
                <canvas id="payment" class='max-w-[40%] max-h-56'></canvas>
            </div>
        
                  
      </div>
      <script>
        document.addEventListener("DOMContentLoaded", () => {
          new Chart(document.querySelector('#types'), {
            type: 'pie',
            data: {
              labels: [
                'Images',
                'GIFS',
                'Videos'
              ],
              datasets: [{
                data: [{!! json_encode($data['images']) !!}, {!! json_encode($data['gifs']) !!}, {!! json_encode($data['videos']) !!}],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(75, 192, 192)'
                ],
                hoverOffset: 4
              }]
            }
          });

          new Chart(document.querySelector('#itv'), {
            type: 'pie',
            data: {
              labels: [
                'Interactive',
                'Non-Interactive'
              ],
              datasets: [{
                data: [{!! json_encode($data['interactive']) !!}, {!! json_encode($data['non_interactive']) !!}],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)'
                ],
                hoverOffset: 4
              }]
            }
          });

          new Chart(document.querySelector('#ctr'), {
            type: 'bar',
            data: {
              labels: ['Impressions', 'Clicks'],
              datasets: [{
                label: 'CTR',
                data: [{!! json_encode($data['impressions']) !!}, {!! json_encode($data['clicks']) !!}],
                backgroundColor: [
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                  'rgb(54, 162, 235)',
                  'rgb(153, 102, 255)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
          new Chart(document.querySelector('#payment'), {
            type: 'bar',
            data: {
              labels: ['Paid', 'Charges'],
              datasets: [{
                label: 'Payment',
                data: [{!! json_encode($data['paid']) !!}, {!! json_encode($data['charges']) !!}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgb(75, 192, 192)',
                    'rgb(255, 99, 132)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        });

      </script>
</x-advertiser-layout>