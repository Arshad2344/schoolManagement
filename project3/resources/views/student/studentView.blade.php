<html>

<head>

</head>
<!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<body>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/70bc207c3f.js" crossorigin="anonymous"></script>

    <body>
        @csrf
        <table class="table table-bordered container mt-5">
            <thead>

                <h1>student</h1>
                <tr>
                    <th scope="col">id</th>

                    <th scope="col">studentname</th>
                    <th scope="col">college</th>
                    <th scope="col">department</th>
                    <th scope="col">teacher name</th>
                    <th colspan="2">action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>

                        <td>{{ $student->studentname }}</td>
                        <td>{{ $student->college }}</td>
                        <td>{{ $student->department }}</td>
                        <td>
                        </td>



                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $student->id }}">
                                delete
                            </button></td>

                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $student->id }}">
                                edit
                            </button></td>

                    </tr>
                @endforeach

            </tbody>
        </table>


        @foreach ($students as $student)
            <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are You Sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('deletestudent', $student->id) }}">
                                <button type="button" class="btn btn-primary">Ok</button></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="/view-teacher">
            <button type="button" class="btn btn-primary">viewteacher</button>
        </a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addModal">
            ADD
        </button>



        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('savestudent') }}" method="post">
                            @csrf
                            <div class="mb-3">

                                <label for="exampleInputEmail1" class="form-label">studentname</label>
                                <input type="text" class="form-control" name="studentname"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">college</label>
                                <input type="text" class="form-control" name="college">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">department</label>
                                <input type="text" class="form-control" name="department">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Teacher</label>
                                <select name="teacher" id="">
                                    @foreach($teachers as $teacher)
                                        <option value="">{{$teacher->teachername}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>





                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal -->
        @foreach ($students as $student)
            <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('updatestudent') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $student->id }}">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">studentname</label>
                                    <input type="text" class="form-control" name="studentname"
                                        value="{{ $student->studentname }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">college</label>
                                    <input type="text" class="form-control" name="college"
                                        value="{{ $student->college }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">department</label>
                                    <input type="text" class="form-control" name="department"
                                        value="{{ $student->department }}">
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </body>

</html>
