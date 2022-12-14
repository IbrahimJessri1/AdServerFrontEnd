<div class="form">
  <div class="form-toggle"> 
  </div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Login</h1>
    </div>
    <div class="form-content">
      <form  method="POST" action="/user/authenticate">
        @csrf
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required="required"/>
          @error('username')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required="required"/>
          @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
        </div>
        <div class="form-group">
          <button type="submit">Log In</button>
        </div>
      </form>
    </div>
  </div>
  <div class="form-panel two">
    <div class="form-header">
      <h1>Register Account</h1>
    </div>
    <div class="form-content">
      <form id="register_form" name="register_form" method="POST" action="/register">
        @csrf
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text"  name="username" required="required" value="{{old('username')}}"/>
          @error('username')
            <p class="text-[#fcd34d] text-sm mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password"  name="password" required="required"/>
          @error('password')
            <p class="text-[#fcd34d] text-sm mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required="required"/>
        </div>
        <div class="form-group">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Membership</label>
            <div class="col-sm-10 ml-9">
              <select class="form-select" name="membership" form="register_form">
                <option value="NORMAL" selected>Normal</option>
                <option value="PREMIUM">Premium</option>
                <option value="VIP">VIP</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" id="register-btn" class="hover:font-bold">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

</script>


