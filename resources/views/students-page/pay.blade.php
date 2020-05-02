@extends('layouts.main')
@section('title', 'Reserve a Locker - BeLockR')
@section('content')
    <div class="z-depth-1 col-md-6" style="margin-top: 3%; margin-left: 23%; margin-bottom: 4%;">
    <!-- Default form subscription -->
    <form class="p-5" action="{{ route('receipt_upload', $loadTransaction->code) }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    
        <p class="text-center h4">Thank you</p>
    
        <p class="text-center mb-4">{{$loadTransaction->comment}}</p>
        <br/>
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-upload"></i>&nbsp;Receipt</span>
            </div>
            <div class="custom-file">
              <input required="" name="receipt_img" type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file: (Max 1.5MB)</label>
            </div>
          </div>  
                    
          <input type="hidden" name="code" value="{{ $loadTransaction->code }}"/>
          <button type="submit" class="btn btn-primary mt-5" onclick="return confirm('Kindly double check your receipt before uploading. Continue?');">
              Submit
          </button>
    
    </form>
  </div>
@endsection