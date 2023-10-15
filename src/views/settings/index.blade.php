<!DOCTYPE html>
<html>
<head>
    <title>Create  Mudul</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        

        <table class="table table-bordered table-striped">
           {{-- <thead>
                <tr>
                    <th colspan="3" class="bg-secondary">
                        @php
                        print_r( array_keys($settings)[$loop->index] );
                       // dd($setting);
                        @endphp
                    </th>

                </tr>
            </thead>
            --}}
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($settings as $key=>$value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                    <td class="">
                        <p class="row d-inline">
                            <form class="col d-inline" action="{{ route('settings.edit', $key) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary d-inline">Edit</button>
                            </form>
                        </p>
                        <p class="row d-inline ">
                            <form class="col d-inline" action="{{ route('settings.destroy', $key) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger d-inline">Delete</button>
                            </form>
                        </p>
                    </td
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
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
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>