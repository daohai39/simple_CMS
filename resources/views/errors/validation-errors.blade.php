<div class="row">
    <div class="col-md-12">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong></strong>
                <ul>
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
