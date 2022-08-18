@props(['name','type' => 'text','value' => ''])
<div class="col-md-12">
    <div class="form-group">
    <input type="{{ $type }}" value="{{ $value }}" class="form-control" name="{{ $name }}" id="{{ $name }}" placeholder="{{ ucwords($name) }}">
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    </div>
    </div>