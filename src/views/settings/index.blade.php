<!DOCTYPE html>
<html>
<head>
    <title>Config Keys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($settings as $key=>$value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                    <td>

                        <button type="button" class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#settings"
                            data-key="{{$key}}"
                            data-val=" {{$value}}"
                            data-action="{{route('settings.update', $key)}}"
                            data-method="PUT" >Edit</button>

                        <form class=" d-inline" action="{{ route('settings.destroy', $key) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger d-inline">Delete</button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr><td colspan="3">Not Available Data</td></tr>
                @endforelse
            </tbody>
        </table>


        @if(config('quickadmin.add_config_key'))
        <h2>Add Config Key </h2>
        <form action="{{  route('settings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="key"> Key:</label>
                <input type="text" class="form-control" name="key">
            </div>
            <div class="form-group">
                <label for="value"> Value:</label>
                <input type="text" class="form-control" name="value">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        @endif

    </div>


    <div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="settings ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
                    @csrf
                    <input type="hidden" name="method" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="value" class="col-form-label">{{ $key }}:</label>
                            <input type="text" class="form-control" id="key" name="value">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>

        $('#settings').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var key = button.data('key')
            var value = button.data('val')
            var action = button.data('action')
            var method = button.data('method')
            var modal = $(this)
            modal.find('.modal-title').text(key)
            modal.find('#key').val(value)
        })
    </script>

</body>
</html>