        <div class="container my-4">
            <div class="myTitle">          
                <H2> PHP - CRUD System </H2>
            </div>

            <hr>
                <?php
                if (isset($_SESSION["insert-error"])) {
                    // Unserialize the error data
                    $errorList = $_SESSION["errors"];

                    // Display errors to the user
                    foreach ($errorList as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }

                    // Clear the session variables
                    unset($_SESSION["insert-error"]);
                    unset($_SESSION["errors"]);
                }
                 
                ?>
        <form action="./assets/php/validation.php" method="POST">
              <div class="details">
                <div class="mb-3">
                    <label for="formGroupExampleInput1" class="form-label">Name:</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                </div>

               <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Email:</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="example@exm.com">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput3" class="form-label">age:</label>
                    <input name="age" type="number" class="form-control" id="age" placeholder="age">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput4" class="form-label">Exp Years:</label>
                    <input name="exp" type="number" class="form-control" id="exyear" placeholder="Numbers Only ...">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput5" class="form-label">Monthly Salary:</label>
                    <input name="salary" type="number" class="form-control" id="ms" placeholder="Numbers Only ...">
                </div>
                <div class="buttons">
                    <input type="submit" class="btn btn-primary" name="register" id="add"></input>
                    <button type="button" class="btn btn-danger" onclick="clearForm()">Clear</button>
                </div>
            </div>
        </form>

            <hr>
            <div class="search">
                <button id="srBtn" class="btnS">
                    <i class="fa fa-search bg-primary" aria-hidden="true" id="srch"></i>
                </button>
                <input type="text" id="srData" class="form-control-search" placeholder="Search ..." onkeyup="srch(this.value)">
            </div>
            <div class="clearAll">
                <button type="button" class="btn btn-danger" id="clr">Clear All</button>
            </div>

            <hr>
            <table class="table" border="1">
                <thead class="bg-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">age</th>
                    <th scope="col">Exp Years</th>
                    <th scope="col">Monthly Salary</th>
                    <th scope="col">Update / Delete</th>
                  </tr>
                </thead>
                <tbody id="data">
                

                </tbody>
              </table>
        </div>
