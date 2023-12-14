   <div class="form mb-3">
       <label for="name" class="form-label">Name</label>
       <input type="text" value="{{ old('name', @$permission->name) }}" required
           class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
           placeholder="Input Name permission">
       @error('name')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
   </div>
   <div class="form mb-3">
       <label for="guard" class="form-label">Guard</label>
       <input type="text" value="web" required class="form-control" id="guard" name="guard" disabled>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <button type="submit" class="btn btn-primary">{{ $submit }}</button>
   </div>
