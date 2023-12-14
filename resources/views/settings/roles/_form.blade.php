   <div class="form mb-3">
       <label for="name" class="form-label">Name</label>
       <input type="text" value="{{ old('name', @$role->name) }}" required
           class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
           placeholder="Input Name Role">
       @error('name')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
   </div>
   <div class="form mb-3">
       <label for="name" class="form-label">Permission</label>
       <div class="row">
           @foreach ($permission as $value)
               <div class="col-md-3 mb-1">
                   <!-- Switches Color -->
                   <div class="form-check form-switch">
                       <input class="form-check-input" type="checkbox" role="switch"
                           id="SwitchCheck{{ $value->id }}" name="permission[]" value="{{ $value->id }}"
                           {{ in_array($value->id, @$rolePermissions) ? 'checked' : '' }}>
                       <label class="form-check-label" for="SwitchCheck{{ $value->id }}"> {{ $value->name }}</label>
                   </div>
               </div>
           @endforeach
       </div>
       @error('permission')
           <span class="invalid-feedback">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <button type="submit" class="btn btn-primary">{{ $submit }}</button>
   </div>
