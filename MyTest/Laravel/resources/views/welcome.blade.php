<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=!, initial-scale=!">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>

    <h1>Liste du contacts</h1>
    <div class="mb-3 row">
        <div class="col-sm-3">
          <input type="password" class="form-control" id="inputPassword">
        </div>
        <div class="col-sm-3">
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                   ajoute
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <form>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>

                                              <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                            </div>
                                            <div class="col-auto">
                                              <span id="passwordHelpInline" class="form-text">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>

                                                <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                            </span>
                                            </div>
                                          </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <textarea class="form-control"  name="" id="" cols="5" rows="5"></textarea>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
    
                                                  <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                                </div>
                                                <div class="col-auto">
                                                  <span id="passwordHelpInline" class="form-text">
                                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
    
                                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                                </span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <select class="form-select" >
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>    
                                           </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
    
                        </div>
                    </div>
                </div>
        </div>


      </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">></a>
          </li>
        </ul>
      </nav>
</body>
</html>