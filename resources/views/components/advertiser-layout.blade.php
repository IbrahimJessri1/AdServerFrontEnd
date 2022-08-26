


<x-layout :username="$username" :simpleheader="$simpleheader">
    <div class="container-fluid page-body-wrapper">
        <x-adminpanel />
        <x-main-wrapper>
            {{$slot}}
        </x-main-wrapper>
    </div>
</x-layout>