@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
  class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
  <p>
    {{session('message')}}
  </p>
</div>
@endif


@if (session()->has('success-message'))
  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-success fixed top-0 left-1/2 transform -translate-x-1/2 px-48 py-3">
    {{ session()->get('success-message') }}
  </div>
@endif


@if (session()->has('error-message'))
  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-danger fixed top-0 left-1/2 transform -translate-x-1/2 px-48 py-3">
    {{ session()->get('error-message') }}
  </div>
@endif

@if (session()->has('info-message'))
  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-info fixed top-0 left-1/2 transform -translate-x-1/2 px-48 py-3">
    {{ session()->get('info-message') }}
  </div>
@endif