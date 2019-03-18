<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body>
    <div class="col-sm-6 offset-sm-3">
        <input type="text" id="search" class="form-control mt-3" placeholder="Search ...">

        <h4>Users count:  {{ count($users) }}</h4>
        <table class="table table-light" id="searchableTable">
            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Registered date</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr id="searchableTable-row">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(window).ready(function(){
            $('#search').keyup(function(){
                searchTable($(this).val());
            })

            function searchTable(value){
                $('#searchableTable #searchableTable-row').each(function(){
                    var found = '';
                    $(this).each(function(){
                        if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                            found = 'true';
                        }
                        if (found == 'true') {
                            $(this).show();
                        }else{
                            $(this).hide();
                        }
                    });
                });
            }

            searchTable();
        });

    </script>
</body>
</html>
