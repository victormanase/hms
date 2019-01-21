


@if (Session::has('success'))
   


<script>swal("Success!", "{{ Session::get('success') }}", "success");</script>

@endif


@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
