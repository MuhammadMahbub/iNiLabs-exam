<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="main_body mt-5">
        <div class="container">
            <div class="main_body_inner">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card p-3 mb-3">
                            <label class="mb-2">Search By Name/Email</label>
                            <div class="search-box">
                                <form action="">
                                    <input type="text" class="form-control" placeholder="Search..">
                                </form>
                            </div>
                        </div>
                        <div class="card p-3">
                            <label class="mb-2">Sort By Salary</label>
                            <div class="search-box">
                                <select name="" id="" class="form-control">
                                    <option>--Sort--</option>
                                    <option value="lowtohigh">Low-High</option>
                                    <option value="hightolow">High-Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="feature mb-3 d-flex justify-content-between">
                            <div class="feature_left d-flex">
                                <button class="btn btn-danger me-3">Delete All</button>
                                <div class="pagi">
                                    <select name="" id="" class="form-control">
                                        <option>--Data Per Page--</option>
                                        <option value="">5</option>
                                        <option value="">10</option>
                                        <option value="">15</option>
                                    </select>
                                </div>
                            </div>
                            <div class="feature_right">
                                <button class="btn btn-warning">Add Employee</button>
                            </div>
                        </div>
                        <div class="table-body mb-3">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox">
                                    </th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Employee Email </th>
                                    <th scope="col">Employee Image</th>
                                    <th scope="col">Employee Salary</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>
                                                <select name="" id="" class="form-control">
                                                    <option value="">--Action--</option>
                                                    <option value="">Send Mail</option>
                                                    <option value="">View</option>
                                                    <option value="">Edit</option>
                                                    <option value="">Delete</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>
                                                <select name="" id="" class="form-control">
                                                    <option value="">--Action--</option>
                                                    <option value="">Send Mail</option>
                                                    <option value="">View</option>
                                                    <option value="">Edit</option>
                                                    <option value="">Delete</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>
                                                <select name="" id="" class="form-control">
                                                    <option value="">--Action--</option>
                                                    <option value="">Send Mail</option>
                                                    <option value="">View</option>
                                                    <option value="">Edit</option>
                                                    <option value="">Delete</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
