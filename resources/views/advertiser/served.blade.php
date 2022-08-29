

<x-advertiser-layout :username="$username" :simpleheader="$simpleheader">
   <div id = "all-ads">
      @include('advertiser.ad-served-cards')
   </div>
   <x-loading />
 </x-advertiser-layout>
 <x-ajaxlazyloaderservedads/>