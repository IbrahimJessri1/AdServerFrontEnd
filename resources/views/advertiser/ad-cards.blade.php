
@foreach($data as $ad)
<div class="flex ml-10 items-center flex-row mt-4">
  <div class="w-10/12 rounded overflow-hidden shadow-lg flex flex-row items-center">
      <div class="w-36 h-36 p-1">
        @if($ad['ad_info']['type'] == 'video')
          <video class='w-full h-full' autoplay muted loop>
            <source src="{{$ad['url']}}" type="video/mp4" />
          </video>
        @else
          <img src="{{$ad['url']}}" alt='ad-img' class='lozad w-full h-full' onerror="this.src='/img/notfound.jpg';">
        @endif
      </div>
      <div class="px-6 py-4 w-3/4">
        <div class="font-bold text-base mb-2">{{$ad['ad_info']['text']}}</div>
        <p class="text-gray-700 text-base">
          Created: {{$ad['create_date']}}
        </p>
        @foreach($ad['categories'] as $cat)
          <span class="inline-block mt-6 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
            {{$cat}}
          </span>
        @endforeach
      </div>
    </div>
    
</div>

@endforeach