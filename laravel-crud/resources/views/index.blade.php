<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="assets/css/toastr.min.css" rel="stylesheet"/>
</head>
<body>

    <div class="main_body mt-5">
        <div class="container">
            <div class="main_body_inner">
                <div class="row">
                    <div class="col-lg-3">
                        <form action="{{ route('index') }}" method="GET">
                            <div class="card p-3 mb-3">
                                <label class="mb-2">Search By Name/Email</label>
                                <div class="search-box">
                                    <input type="text" name="search" class="form-control" placeholder="Search..">
                                    <button type="submit" class="btn btn-warning form-control mt-2">Search</button>
                                </div>
                            </div>
                            <div class="card p-3">
                                <div class="search-box">
                                    <label for="sort">Sort by Salary:</label>
                                    <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                                        <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Low to High</option>
                                        <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9">
                        <div class="feature mb-3 d-flex justify-content-between">
                            <div id="action_btn" class="feature_left d-flex d-none">
                                <button id="deleteSelected" class="btn btn-danger me-3">Delete All</button>
                                <div class="pagi">
                                    <button id="sendMail" class="btn btn-success me-3">Send Mail</button>
                                </div>
                            </div>
                            <div class="feature_right d-flex justify-content-end ms-auto">
                                <a href="{{ route('employee.create') }}" class="btn btn-warning">Add Employee</a>
                            </div>
                        </div>
                        <div class="table-body mb-3">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox" name="check_all" class="check_all">
                                    </th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Employee Email </th>
                                    <th scope="col">Employee Image</th>
                                    <th scope="col">Employee Salary</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="id[]" value="{{ $employee->id }}"  class="employee_check">
                                            </td>
                                            <td>{{ Str::ucfirst($employee->employeeName) }}</td>
                                            <td>{{ $employee->employeeEmail }}</td>
                                            <td>
                                                @if($employee->employeeImage)
                                                    <img src="{{ asset($employee->employeeImage) }}" alt="Employee Image" width="80">
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td>{{ $employee->employeeSalary }}</td>
                                            <td class="d-flex justify-content-between">
                                                <a class="btn btn-info" href="{{ route('employee.show', $employee->id) }}">View</a>
                                                <a class="btn  btn-success" href="{{ route('employee.edit', $employee->id) }}">Edit</a>
                                                <a data-id="{{ $employee->id }}" class="btn btn-danger employeeDelete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>

                        </div>
                        <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                            {{ $employees->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>

    <script>
        $(document).ready(function(){

            // delete all item
            $('#deleteSelected').click(function() {
                let all_employee_id = [];
                $('input[type="checkbox"].employee_check:checked').each(function() {
                    all_employee_id.push($(this).val());
                });

                swal({
                    title: "Are You Sure Delete All Data? ",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                        $.ajax({
                            type: "POST",
                            url: "{{ route('employee.delete_all') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "all_employee_id" : all_employee_id,
                            },
                            success: function(data){
                                setInterval(() => {
                                    window.location.reload(true);
                                }, 1000);

                            },
                            error: function(data){
                                console.log(data);
                            }
                        })
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });

            // check all setting
            $('input[name="check_all"]').click(function() {
                if(this.checked){
                    $('.employee_check').each(function(){
                        $(this).prop('checked', true);
                        $("#action_btn").removeClass("d-none")
                    });
                }else{
                    $('.employee_check').each(function(){
                        $(this).prop('checked', false);
                        $("#action_btn").addClass("d-none")
                    });
                }
            });


            // check all employee
            $('body').on("click", ".employee_check", function(){
                let emptyCheckBox  = $('.employee_check').length; // number of checkboxes
                let checkedCheckboxes = $('.employee_check:checked').length; // number of checked checkboxes

                if(checkedCheckboxes === emptyCheckBox ) {
                    $('.check_all').prop('checked', true);
                } else {
                    $('.check_all').prop('checked', false);
                }

                if(this.checked) {
                    $("#action_btn").removeClass("d-none")
                }
                else {
                    $("#action_btn").addClass("d-none")
                }
            });


            // send mail by employee email
            $('#sendMail').click(function() {
                let all_employee_id = [];
                $('input[type="checkbox"].employee_check:checked').each(function() {
                    all_employee_id.push($(this).val());
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('employee.send_mail') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "all_employee_id" : all_employee_id,
                    },
                    success: function (response) {
                        if(response.success === true) {
                            toastr.success("Email send success")
                        }
                        setInterval(() => {
                            window.location.reload(true);
                        }, 3000);

                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });

        });

        // delete data
        $(".employeeDelete").click(function(){
            let id = $(this).attr('data-id')
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    });
                    $.ajax({
                            type:'GET',
                            url: "/delete/"+id,
                            success: function(data){
                                setInterval(() => {
                                    window.location.reload(true);
                                }, 1000);

                            },
                            error: function(data){
                                console.log(data);
                            }
                        })
                } else {
                    swal("Your imaginary file is safe!");
                }
                });
            })
        // delete data

    </script>

    {{-- TOAST MESSAGE --}}
    @if (Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}")
        </script>
    @endif

    @if (Session::has('fail'))
        <script>
            toastr.error("{!! Session::get('fail') !!}")
        </script>
    @endif
    {{-- TOAST MESSAGE --}}

</body>
</html>
