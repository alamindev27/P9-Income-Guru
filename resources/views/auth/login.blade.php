 @extends('auth.layouts.auth')
 @section('form')
     <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
         @csrf
         <div class="mb-3">
             <div class="input-group">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                 </div>
                 <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                     placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email"
                     value="{{ old('email') }}" autocomplete="off" autofocus>
             </div>
             @error('email')
                 <small class="text-danger">{{ $message }}</small>
             @enderror
         </div>



         <div class="mb-3">
             <div class="input-group ">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                 </div>
                 <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                     placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password"
                     autocomplete="current-password">
             </div>
             @error('password')
                 <small class="text-danger">{{ $message }}</small>
             @enderror
         </div>
         <div class="form-group row">
             <div class="col-md-12">
                 <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                         {{ old('remember') ? 'checked' : '' }}>
                     <label class="custom-control-label" for="remember">Remember me</label>
                     <a href="{{ route('password.request') }}" id="to-recover" class="text-dark float-right"><i
                             class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                 </div>
             </div>
         </div>
         <div class="form-group text-center">
             <div class="col-xs-12 p-b-20">
                 <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
             </div>
         </div>
         {{-- <div class="form-group m-b-0 m-t-10">
             <div class="col-sm-12 text-center">
                 Don't have an account? <a href="{{ route('register') }}" class="text-info m-l-5"><b>Sign Up</b></a>
             </div>
         </div> --}}
     </form>
 @endsection
