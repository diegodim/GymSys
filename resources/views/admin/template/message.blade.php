<div id="messages-header">
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    @if(is_array(Session::get('success')))
    @foreach(Session::get('success') as $success)
    <p>{{ $success }}</p>
    @endforeach
    @else
    <p>{{ session('success') }}</p>
    @endif
</div>
@endif
@if(isset($errors) && count($errors)>0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
@endif
</div>
