


<x-advertiser-layout :username="$username" :simpleheader="$simpleheader">

   <x-filter />
   <div id = "all-ads">
      @include('advertiser.ad-cards')
   </div>
   <x-loading />
</x-advertiser-layout>
<x-ajaxlazyloader id="all-ads"/>