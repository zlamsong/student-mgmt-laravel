
@if(Session('success'))
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i>
        {{Session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(Session('error'))
    <div class="alert alert-danger">
        <i class="fa fa-times-circle"></i>
        {{Session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

