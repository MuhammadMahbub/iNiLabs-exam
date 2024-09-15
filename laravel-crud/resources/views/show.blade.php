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
                        <h3 class="mb-3">Single Employee</h3>
                        <a class="btn btn-warning mb-2" href="{{ route('index') }}">Back Home</a>
                        <div class="card p-3">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Employee Name:</strong> {{ $employee->employeeName }}</li>
                                <li class="list-group-item"><strong>Employee Email:</strong> {{ $employee->employeeEmail }}</li>
                                <li class="list-group-item"><strong>Employee Salary:</strong> {{ $employee->employeeSalary }}</li>
                                <li class="list-group-item"><strong>Employee Image: <br></strong> <img width="200" src="{{ asset($employee->employeeImage) }}"></li>
                              </ul>
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
