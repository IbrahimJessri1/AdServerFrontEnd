












<x-advertiser-layout :username="$username" :simpleheader="$simpleheader">
    {{-- <x-create-ad-form /> --}}

    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-2  font-bold text-lg">Create New Advertisement</h3>
    
            <form class="mt-4">
                
                <span class="font-bold text-[#106eea]"> Advertisement Info </span>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Text</label>
                    <div class="col-sm-10">
                        <input type="text" name = "text" class="form-control" placeholder="can be empty">
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select name = "type" class="form-select">
                            <option value="image">Image</option>
                            <option value="gif">GIF</option>
                            <option value="video">Video</option>
                          </select>
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Shape</label>
                    <div class="col-sm-10">
                        <select name = "shape" class="form-select">
                            <option value="rectangular">Rectangular</option>
                            <option value="horizontal">Horizontal</option>
                            <option value="vertical">Vertical</option>
                          </select>
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Width</label>
                    <div class="col-sm-10">
                        <input type="number"name = "width" class="form-control" placeholder=">=5px e.g:300">
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Height</label>
                    <div class="col-sm-10">
                        <input type="number" name = "height" class="form-control" placeholder=">=5px e.g:250">
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">URL</label>
                    <div class="col-sm-10">
                        <input type="text" name = "url" class="form-control" placeholder="e.g:https://example.jpg">
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Redirect URL</label>
                    <div class="col-sm-10">
                        <input type="text" name = "redirect_url" class="form-control" placeholder="empty considered non-interactive">
                    </div>
                </div>

                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Categories</label>
                    <div class="col-sm-10">
                        <div id="categories-select">
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Optional Keywords</label>
                    <div class="col-sm-10">
                        <input id="keywords" name="keywords" type="text" placeholder="Can Be Empty">
                    </div>
                </div>




                <span class="font-bold text-[#106eea]"> User Info </span>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" name = "location" class="form-control" placeholder="any">
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Target Age</label>
                    <div class="col-sm-10">
                        <div id="age-select">
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Target Gender</label>
                    <div class="col-sm-10">
                        <select name = "target-gender" class="form-select">
                            <option value="both">Both</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                    </div>
                </div>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Language</label>
                    <div class="col-sm-10">
                        <select name = "language" class="form-select">
                            <option value="any">any</option>
                            <option value="en">en</option>
                            <option value="ar">ar</option>
                          </select>
                    </div>
                </div>

                <span class="font-bold text-[#106eea]"> Marketing Info </span>
                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Max CPC</label>
                    <div class="col-sm-10">
                        <input type="range" name="max_cpc" value="1.2" class="form-range" min="0.5" max="10" step="0.01" oninput="this.nextElementSibling.value = this.value">
                        <output> 1.2 </output>
                    </div>
                </div>

                <div class="row mb-3 mt-4 ml-4">
                    <label class="col-sm-2 col-form-label">Raise Percentage</label>
                    <div class="col-sm-10">
                        <input type="range" name="raise_percentage" value="0.2" class="form-range" min="0.05" max="1" step="0.01" oninput="this.nextElementSibling.value = this.value">
                        <output> 0.2 </output>
                    </div>
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
            placeholder: 'Select Target Age'
        });


        categories_options = [
            {label: 'ANY', value: 'any', alias: 'any'},
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
            placeholder: 'Select Categories'
        });


        var keywords = document.getElementById('keywords');
        var choices1 = new Choices(keywords, {
            delimiter: '#',
            editItems: false,
            maxItems: 5,
            removeButton: true
        });




        
    </script>

</x-advertiser-layout>