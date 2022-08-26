


<x-advertiser-layout :username="$username" :simpleheader="$simpleheader">
   @foreach($data as $ad)
        <x-ad-card :ad="$ad" />
   @endforeach
</x-advertiser-layout>