


@php
    $sel_cat = [];
    if(old('categories') !== null){
        $sel_cat = explode(",", old('categories'));
    }

    $sel_age = [];
    if(old('target_age') !== null){
        $sel_age = explode(",", old('target_age'));
    }
@endphp









<x-advertiser-layout :username="$username" :simpleheader="$simpleheader">
    {{-- <x-create-ad-form /> --}}

    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-2  font-bold text-lg">Create New Advertisement</h3>
    
            <form id="create-ad-form" class="mt-4" method="POST" action="/advertiser/create">
                @csrf
                <span class="font-bold text-[#106eea]"> Advertisement Info </span>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Text</label>
                    <div class="col-sm-10">
                        <input type="text" name = "text" class="form-control" placeholder="can be empty" value="{{old('text')}}">
                        @error('text')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select name = "type" class="form-select">
                            <option value="image" {{ (old("type") == 'image' ? "selected":"") }}>Image</option>
                            <option value="gif" {{ (old("type") == 'gif' ? "selected":"") }}>GIF</option>
                            <option value="video" {{ (old("type") == 'video' ? "selected":"") }}>Video</option>
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
                            <option value="rectangular" {{ (old("shape") == 'rectangular' ? "selected":"") }}>Rectangular</option>
                            <option value="horizontal" {{ (old("shape") == 'horizontal' ? "selected":"") }}>Horizontal</option>
                            <option value="vertical" {{ (old("shape") == 'vertical' ? "selected":"") }}>Vertical</option>
                          </select>
                        @error('shape')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Width</label>
                    <div class="col-sm-10">
                        <input type="number"name = "width" class="form-control" placeholder=">=5px e.g:300" value = "{{old('width')}}">
                        @error('width')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Height</label>
                    <div class="col-sm-10">
                        <input type="number" name = "height" class="form-control" placeholder=">=5px e.g:250" value="{{old('height')}}">
                        @error('height')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">URL</label>
                    <div class="col-sm-10">
                        <input type="text" name = "url" class="form-control" placeholder="e.g:https://example.jpg" value="{{old('url')}}">
                        @error('url')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Redirect URL</label>
                    <div class="col-sm-10">
                        <input type="text" name = "redirect_url" class="form-control" placeholder="empty considered non-interactive" value= "{{old('redirect_url')}}">
                        @error('redirect_url')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>

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
                        <input id="keywords" name="keywords" type="text" placeholder="Can Be Empty" value="{{old('keywords')}}">
                        @error('keywords')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>




                <span class="font-bold text-[#106eea]"> User Info </span>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" name = "location" class="form-control" placeholder="empty means any" value="{{old('location')}}">
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
                        @error('target-age')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Target Gender</label>
                    <div class="col-sm-10">
                        <select name = "target-gender" class="form-select">
                            <option value="both" {{ (old("target-gender") == 'both' ? "selected":"") }}>Both</option>
                            <option value="male" {{ (old("target-gender") == 'male' ? "selected":"") }}>Male</option>
                            <option value="female" {{ (old("target-gender") == 'female' ? "selected":"") }}>Female</option>
                        </select>
                        @error('target-gender')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Language</label>
                    <div class="col-sm-10">
                        <select name = "language" class="form-select">
                            <option value="any" {{ (old("language") == 'any' ? "selected":"") }}>any</option>
                            <option value="en" {{ (old("language") == 'en' ? "selected":"") }}>en</option>
                            <option value="ar" {{ (old("language") == 'ar' ? "selected":"") }}>ar</option>
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
                            $max_cpc_val = 1.2;
                            if(old('max_cpc')  != null)
                                $max_cpc_val = old('max_cpc');
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
                        $raise_percentage_val = 0.2;
                            if(old('raise_percentage') != null)
                                $raise_percentage_val = old('raise_percentage');
                        @endphp
                        <input type="range" name="raise_percentage" value="{{$raise_percentage_val}}" class="form-range" min="0.05" max="1" step="0.01" oninput="this.nextElementSibling.value = this.value">
                        <output> {{$raise_percentage_val}} </output>
                        @error('raise_percentage')
                            <p class="text-red-500 text-xs mt-1 ml-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row-sm-10" style="display:flex; flex-direction:row; justify-content:center;">
                    <button type="submit" class="btn btn-primary bg-[#106eea]">Create Ad!</button>
                </div>


            </form>
        </div>
    </div>
    <script type="text/javascript" defer>
        age_options = [
            // { label: 'All Ages', value: 'all ages', alias: 'all ages'},
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


        document.getElementById('create-ad-form').addEventListener('submit', function(e) {
            // e.preventDefault();
            let vs = document.getElementsByClassName('vscomp-hidden-input');
            document.getElementById('categories_input').value = vs[0].value;
            document.getElementById('age_input').value = vs[1].value;
            console.log('hi')
        });


        
    </script>

</x-advertiser-layout>