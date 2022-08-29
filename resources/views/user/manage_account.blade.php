
<x-layout :username="$username" :footer="$footer" :simpleheader="$simpleheader">
    <div class="form">
        <div class="form-panel one">
            <div class="form-header">
            <h1>Manage Account</h1>
            </div>
            <div class="form-content">
            <form  method="POST" action="/manage_account">
                @csrf
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password"/>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"/>
                </div>
                <div class="form-group">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Membership</label>
                        <div class="col-sm-10 ml-9">
                          <select class="form-select" name="membership">
                            <option value="NORMAL" {{ ($user['membership'] == 'NORMAL' ? "selected":"") }}>Normal</option>
                            <option value="PREMIUM" {{ ($user['membership'] == 'PREMIUM' ? "selected":"") }}>Premium</option>
                            <option value="VIP" {{ ($user['membership'] == 'VIP' ? "selected":"") }}>VIP</option>
                          </select>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <button type="submit">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</x-layout>