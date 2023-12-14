   <div class="form row mb-3">
       <div class="col-lg-2">
           <label for="name" class="form-label">Name</label>
       </div>
       <div class="col-lg-10">
           <input type="text" value="{{ old('name', @$user->name) }}" required
               class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
               placeholder="Input Name">
           @error('name')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
       </div>
   </div>
   <div class="form mb-3 row">
       <div class="col-lg-2">
           <label for="email" class="form-label">Email</label>
       </div>
       <div class="col-lg-10">
           <input type="email" value="{{ old('email', @$user->email) }}" required autocomplete="off"
               class="form-control  @error('email') is-invalid @enderror" id="email" name="email"
               placeholder="Input Email">
           @error('email')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
       </div>
   </div>
   <div class="form mb-3 row">
       <div class="col-lg-2">
           <label for="no_telepon" class="form-label">No Telepon</label>
       </div>
       <div class="col-lg-10">
           <input type="text" value="{{ old('no_telepon', @$user->no_telepon) }}" required autocomplete="off"
               class="form-control  @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon"
               placeholder="Input No Telepon">
           @error('no_telepon')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
       </div>
   </div>
   <div class="form mb-3 row">
       <div class="col-lg-2">
           <label for="password" class="form-label">Password</label>
       </div>
       <div class="col-lg-10">
           <input type="password" autocomplete="false" class="form-control  @error('password') is-invalid @enderror"
               id="password" name="password" placeholder="Input password">
           @error('password')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
       </div>
   </div>
   @role('Admin')
       {{-- <div class="form mb-3 row">
           <div class="col-lg-2">
               <label for="roles" class="form-label">Role</label>
           </div>
           <div class="col-lg-10">
               <select class="js-example-basic-single" name="roles">
                   @foreach ($roles as $role)
                       <option @if (@$user) {{ in_array($role, @$userRole) ? 'selected' : '' }} @endif
                           value="{{ $role }}">
                           {{ $role }}</option>
                   @endforeach
               </select>
               @error('roles')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
           </div>
       </div> --}}
   @endrole
   <div class="col-xs-12 col-sm-12 col-md-12">
       <button type="submit" class="btn btn-primary">{{ $submit }}</button>
   </div>
