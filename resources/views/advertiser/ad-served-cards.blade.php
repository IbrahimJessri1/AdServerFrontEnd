
@foreach($data as $served_ad)
<a href="/advertiser/ad/{{$served_ad['ad_id']}}">
  <div class="flex ml-10 items-center flex-row mt-4 max-w-40">
    <div class="w-10/12 rounded overflow-hidden shadow-lg flex flex-row items-center">
        <div class="w-36 h-36 p-1">
          @if($served_ad['type'] == 'video')
            <video class='w-full h-full' autoplay muted loop>
              <source src="{{$served_ad['url']}}" type="video/mp4" />
            </video>
          @else
            <img src="{{$served_ad['url']}}" alt='ad-img' class='lozad w-full h-full' onerror="this.src='/img/notfound.jpg';">
          @endif
        </div>
        <div class="px-6 py-4 w-3/4">
          <div class="font-bold text-base mb-2">Publisher: {{$served_ad['payment_account']}}</div>
          <p class="text-gray-700 text-base">
            Served: {{$served_ad['create_date']}}
          </p>
          <p class="text-gray-700 text-base">
            Impressions: {{$served_ad['impressions']}}
          </p>
          <p class="text-gray-700 text-base">
            @php
                $clicks = $served_ad['clicks'];
                if($clicks == -1)
                    $clicks = "non-clickable";
            @endphp
            Clicks: {{$clicks}} 
          </p>
          <p class="text-gray-700 text-base">
            Agreed CPC: {{$served_ad['agreed_cpc']}}
          </p>
          <p class="text-gray-700 text-base">
            Current charges: {{$served_ad['charges']}}
          </p>
          <p class="text-gray-700 text-base">
            Total Paid: {{$served_ad['paid']}}
            <a href="/advertiser/pay_served_ad/{{$served_ad['id']}}"> 
              <button class="absolute right-[30%] bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ">
                Pay
              </button>
            </a>
          </p>
          
        </div>
      </div>
      
  </div>
</a>
@endforeach