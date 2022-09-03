


@php
    $sel_cat = $ad['categories'];
    $sel_age = $ad['target_user_info']['age'];
    $keywords = '';
    for($i = 0; $i < count($ad['keywords']) ; $i+= 1){
        $kw = $ad['keywords'][$i];
        $keywords = $keywords . $kw;
        if ($i != count($ad['keywords']) - 1)
            $keywords = $keywords . '#';
    }
@endphp









<x-advertiser-layout :username="$username" :simpleheader="$simpleheader">

<div class="card">
    <div class="card-body">


        
        <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left"> &nbsp; &nbsp; back</i></a>
        <h3 class="card-title mt-4  font-bold text-lg">View Advertisement</h3>


        
        <div class="flex justify-center items-center">
            <div class="rounded overflow-hidden shadow-lg">
                @isset($ad['redirect_url'])
                    <a target="_blank" href="{{$ad['redirect_url']}}">
                @endisset
                <div class="flex items-center flex-column p-2">
                    @if($ad['ad_info']['type'] == 'video')
                        <video class='w-full h-full max-h-52' autoplay muted controls>
                            <source src="{{$ad['url']}}" type="video/mp4" />
                        </video>
                    @else
                        <img class="lozad max-h-52" src="{{$ad['url']}}" alt='ad-img' onerror="this.src='/img/notfound.jpg';">
                    @endif
                   
                </div>
                
                @isset($ad['redirect_url'])
                    </a>
                @endisset
                <div class="flex row-flex justify-center mt-4">
                    @if($ad['enabled'] == 1)
                        <button id='enable-btn' class="bg-blue-600 hover:bg-[#9dc1fb] text-white font-bold py-2 px-4 rounded-full">
                            Enabled
                        </button>
                    @else
                        <button id='enable-btn' class="bg-[#9dc1fb] hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                            Disabled
                        </button>
                    @endif
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2"></div>
                    <p class="text-gray-700 text-base">
                        <span class='font-bold'>Created:</span> {{$ad['create_date']}}
                    </p>
                    <p class="text-gray-700 text-base">
                        <span class='font-bold'>Impressions:</span> {{$ad['marketing_info']['impressions']}}
                    </p>
                    @isset($ad['marketing_info']['clicks'])
                        <p class="text-gray-700 text-base">
                            <span class='font-bold'>Clicks:</span> {{$ad['marketing_info']['clicks']}}
                        </p>
                    @endisset
                    <p class="text-gray-700 text-base">
                        <span class='font-bold'>Total Charges:</span> {{$ad['marketing_info']['tot_charges']}}
                    </p>
                    <p class="text-gray-700 text-base">
                        <span class='font-bold'>Total Paid:</span> {{$ad['marketing_info']['tot_paid']}}
                        
                    </p>
                    @foreach($ad['categories'] as $cat)
                        <span class="inline-block mt-6 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                        {{$cat}}
                        </span>
                    @endforeach
                    <p class="text-gray-700 text-base pt-4 flex flex-row justify-center">
                        <a href="/advertiser/pay_tot_charges/{{$ad['id']}}"> 
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ">
                                Pay
                            </button>
                        </a>
                    </p>
                </div>
            </div>
        </div>




        <form id="update-ad-form" class="mt-4" method="POST" action="/advertiser/update/{{$ad['id']}}">
            @csrf
            <span class="font-bold text-[#106eea]"> Advertisement Info </span>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Text</label>
                <div class="col-sm-10">
                    <input type="text" name = "text" class="form-control" placeholder="can be empty" value="{{$ad['ad_info']['text']}}">
                    @error('text')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <select name = "type" class="form-select" disabled>
                        @if($ad['ad_info']['type'] =='image')
                            <option value="image">Image</option>
                        @endif
                        @if($ad['ad_info']['type'] =='gif')
                            <option >GIF</option>
                        @endif
                        @if($ad['ad_info']['type'] =='video')
                            <option>Video</option>
                        @endif
                    </select>
                    @error('type')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Shape</label>
                <div class="col-sm-10">
                    <select name = "shape" class="form-select">
                        <option value="rectangular" {{ ($ad['ad_info']['shape'] == 'rectangular' ? "selected":"") }}>Rectangular</option>
                        <option value="horizontal" {{ ($ad['ad_info']['shape']  == 'horizontal' ? "selected":"") }}>Horizontal</option>
                        <option value="vertical" {{ ($ad['ad_info']['shape']  == 'vertical' ? "selected":"") }}>Vertical</option>
                    </select>
                    @error('shape')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Width</label>
                <div class="col-sm-10">
                    <input type="number" name = "width" class="form-control" placeholder=">=5px e.g:300" value = "{{$ad['ad_info']['width']}}">
                    @error('width')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Height</label>
                <div class="col-sm-10">
                    <input type="number" name = "height" class="form-control" placeholder=">=5px e.g:250" value="{{$ad['ad_info']['height']}}">
                    @error('height')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="e.g:https://example.jpg" value="{{$ad['url']}}" disabled>
                    @error('url')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            @isset($ad['redirect_url'])
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Redirect URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="empty considered non-interactive" value= "{{$ad['redirect_url']}}" disabled>
                        @error('redirect_url')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            @endisset

            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Categories</label>
                <div class="col-sm-10">
                    <div id="categories-select">
                    </div>
                    @error('categories')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Optional Keywords</label>
                <div class="col-sm-10">
                    <input id="keywords" name="keywords" type="text" placeholder="Can Be Empty" value="{{$keywords}}">
                    @error('keywords')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>




            <span class="font-bold text-[#106eea]"> User Info </span>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                    <input type="text" name = "location" class="form-control" placeholder="empty means any" value="{{$ad['target_user_info']['location']}}">
                    @error('location')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Target Age</label>
                <div class="col-sm-10">
                    <div id="age-select">
                    </div>
                    @error('target_age')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Target Gender</label>
                <div class="col-sm-10">
                    <select name = "target_gender" class="form-select">
                        <option value="both" {{ ($ad['target_user_info']['gender'] == 'both' ? "selected":"") }}>Both</option>
                        <option value="male" {{ ($ad['target_user_info']['gender'] == 'male' ? "selected":"") }}>Male</option>
                        <option value="female" {{($ad['target_user_info']['gender'] == 'female' ? "selected":"") }}>Female</option>
                    </select>
                    @error('target_gender')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Language</label>
                <div class="col-sm-10">
                    <select name = "language" class="form-select">
                        <option value="any" {{ ($ad['target_user_info']['language'] == 'any' ? "selected":"") }}>any</option>
                        <option value="en" {{ ($ad['target_user_info']['language']== 'en' ? "selected":"") }}>en</option>
                        <option value="ar" {{ ($ad['target_user_info']['language'] == 'ar' ? "selected":"") }}>ar</option>
                      </select>
                      @error('language')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <span class="font-bold text-[#106eea]"> Marketing Info </span>
            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Max CPC</label>
                <div class="col-sm-10">
                    @php
                        $max_cpc_val = $ad['marketing_info']['max_cpc'];
                    @endphp
                    <input type="range" name="max_cpc" value="{{$max_cpc_val}}" class="form-range" min="0.5" max="10" step="0.01" oninput="this.nextElementSibling.value = this.value">
                    <output> {{$max_cpc_val}} </output>
                    @error('max_cpc')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 mt-4 ml-4">
                <label class="col-sm-2 col-form-label">Raise Percentage</label>
                <div class="col-sm-10">
                    @php
                        $raise_percentage_val = $ad['marketing_info']['raise_percentage'];
                    @endphp
                    <input type="range" name="raise_percentage" value="{{$raise_percentage_val}}" class="form-range" min="0.05" max="1" step="0.01" oninput="this.nextElementSibling.value = this.value">
                    <output> {{$raise_percentage_val}} </output>
                    @error('raise_percentage')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="row-sm-10" style="display:flex; flex-direction:row; justify-content:center;">
                <button type="submit" class="btn btn-primary bg-[#106eea]">Update Ad!</button>
            </div>


        </form>
    </div>
</div>
<script type="text/javascript" defer>
    age_options = [
        { label: 'Kids', value: 'kids',  alias: 'kids'},
        { label: 'Youths', value: 'youths',  alias: 'youths'},
        { label: 'Adults', value: 'adults',  alias: 'adults'},
        { label: 'Old', value: 'old people',  alias: 'Old'}
        ];

    VirtualSelect.init({
        ele: '#age-select',
        options: age_options,
        multiple: true,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
        placeholder: 'Select Target Age',
        name:'target_age',
        required: true,
        selectedValue: {!! json_encode($sel_age) !!}
    });


    categories_options = [
        {label: 'PLACES', value: 'places', alias: 'places'},
        {label: 'TECHNOLOGY', value: 'technology', alias: 'technology'},
        {label: 'HEALTHCARE', value: 'healthcare', alias: 'healthcare'},
        {label: 'APPS', value: 'apps', alias: 'apps'},
        {label: 'TOYS', value: 'toys', alias: 'toys'},
        {label: 'GAMING', value: 'gaming', alias: 'gaming'},
        {label: 'EDUCATION', value: 'education', alias: 'education'},
        {label: 'VEHICLES', value: 'vehicles', alias: 'vehicles'},
        {label: 'NATURE', value: 'nature', alias: 'nature'},
        {label: 'FOOD', value: 'food', alias: 'food'},
        {label: 'SMARTPHONES', value: 'smartphones', alias: 'smartphones'},
        {label: 'CARS', value: 'cars', alias: 'cars'},
        {label: 'PRODUCTS', value: 'products', alias: 'products'},
        {label: 'WEBSITES', value: 'websites', alias: 'websites'},
        {label: 'BIKES', value: 'bikes', alias: 'bikes'},
        {label: 'SCHOOL', value: 'school', alias: 'school'},
        {label: 'BOOKS', value: 'books', alias: 'books'},
        {label: 'ELECTRONICS', value: 'electronics', alias: 'electronics'},
        {label: 'HOUSE', value: 'house', alias: 'house'},
        {label: 'FURNITURE', value: 'furniture', alias: 'furniture'},
        {label: 'FAMILY', value: 'family', alias: 'family'},
        {label: 'CLOTHES', value: 'clothes', alias: 'clothes'},
        {label: 'WEARABLE', value: 'wearable', alias: 'wearable'},
        {label: 'ANIMALS', value: 'animals', alias: 'animals'},
        {label: 'MEDIA', value: 'media', alias: 'media'},
        {label: 'JOBS', value: 'jobs', alias: 'jobs'}
        ];

    VirtualSelect.init({
        ele: '#categories-select',
        options: categories_options,
        multiple: true,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
        placeholder: 'Select Categories',
        name :'categories',
        required : true,
        selectedValue: {!! json_encode($sel_cat) !!}
    });

    var keywords = document.getElementById('keywords');
    var choices1 = new Choices(keywords, {
        delimiter: '#',
        editItems: false,
        maxItems: 5,
        removeButton: true
    });


    document.getElementById('update-ad-form').addEventListener('submit', function(e) {
       
        let vs = document.getElementsByClassName('vscomp-hidden-input');
        document.getElementById('categories_input').value = vs[0].value;
        document.getElementById('age_input').value = vs[1].value;
    });


    document.getElementById('enable-btn').onclick = function(){
        
        $.ajax({
            url: 'http://localhost:9000/advertiser/enable',
            data: { "id" : {!! json_encode($ad['id']) !!}},
            type: 'get',
        })
        .done(function(){
           b = document.getElementById('enable-btn');
           if(b.innerHTML == 'Enabled'){
                b.innerHTML = "Disabled";
                b.className  = "bg-[#9dc1fb] hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full";
            }
            else{
                b.innerHTML = "Enabled";
                b.className  = "bg-blue-600 hover:bg-[#9dc1fb] text-white font-bold py-2 px-4 rounded-full";
           }
        })  
        .fail(function(jqXHR, ajaxOptions, thrownError){
            alert("Server not responding");
        });
    }

    
</script>

</x-advertiser-layout>