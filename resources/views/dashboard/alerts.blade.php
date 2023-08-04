@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
            <span aria-hidden="true">x</span>
        </button>
        <strong>{{ __('dashboard.Error') }}</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('add'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('dashboard.Added successfuly') }}",
                type: "success"
            })
        }
    </script>
@endif
@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('dashboard.Modified successfuly') }}",
                type: "success"
            })
        }
    </script>
@endif
@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('dashboard.Deleted successfuly') }}",
                type: "success"
            })
        }
    </script>
@endif
