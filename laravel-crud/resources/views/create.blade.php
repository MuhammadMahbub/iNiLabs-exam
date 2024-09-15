<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="main_body mt-5">
        <div class="container">
            <div class="main_body_inner">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h3 class="mb-3">Create New Employee</h3>
                        <a class="btn btn-warning mb-2" href="{{ route('index') }}">Back Home</a>
                        <div class="card p-3">
                            <form action="{{ route("employee.store") }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="mb-2">Employee Name</label>
                                    <input type="text" value="{{ old('employeeName') }}" name="employeeName" class="form-control @error('employeeName') is-invalid @enderror">
                                    @error('employeeName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Employee Email</label>
                                    <input type="text" value="{{ old('employeeEmail') }}" name="employeeEmail" class="form-control @error('employeeEmail') is-invalid @enderror">
                                    @error('employeeEmail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Employee Salary</label>
                                    <input type="text" value="{{ old('employeeSalary') }}" name="employeeSalary" class="form-control @error('employeeSalary') is-invalid @enderror">
                                    @error('employeeSalary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Employee Image</label> <br>
                                    <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" name="employeeImage" class="form-control">
                                    <img id="img_id" src="" alt="" width="100" class="mt-3">

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning">Add Employee</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
