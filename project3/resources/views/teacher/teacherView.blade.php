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
              <h1>Teacher</h1>
                <tr>
                    <th scope="col">id</th>

                    <th scope="col">teachername</th>
                    <th scope="col">college</th>
                    <th scope="col">experience</th>
                    <th colspan="2">action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>

                        <td>{{ $teacher->teachername }}</td>
                        <td>{{ $teacher->college }}</td>
                        <td>{{ $teacher->experience }}</td>



                        <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $teacher->id }}">
                                delete
                            </button></td>

                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $teacher->id }}">
                                edit
                            </button></td>

                    </tr>
                @endforeach

            </tbody>
        </table>


        @foreach ($teachers as $teacher)
<div class="modal fade" id="deleteModal{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are You Sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<a href="{{route('deleteteacher',$teacher->id)}}">
          <button type="button" class="btn btn-primary">Ok</button></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
<a href="/view-student">
  <button type="button" class="btn btn-primary">VIewstudent</button>
</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
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

                        <form action="{{ route('saveTeacher') }}" method="POST">
                          @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">teachername</label>
                                <input type="text" class="form-control" name="teachername"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">college</label>
                                <input type="text" class="form-control" name="college">
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">experience</label>
                        <input type="text" class="form-control" name="experience">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>

                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
        </div>
      </form>



        <!-- Modal -->
        @foreach ($teachers as $teacher)
            <div class="modal fade" id="editModal{{ $teacher->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('updateTeacher') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $teacher->id }}">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">teachername</label>
                                    <input type="text" class="form-control" name="teachername"
                                        value="{{ $teacher->teachername }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">college</label>
                                    <input type="text" class="form-control" name="college"
                                        value="{{ $teacher->college }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">experience</label>
                                    <input type="text" class="form-control" name="experience"
                                        value="{{ $teacher->experience }}">
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
