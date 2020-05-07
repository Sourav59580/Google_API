<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Chart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="./chart.js"></script>
</head>

<body class="bg-light">

    <div class="container p-5">
        <h4 class="mb-4">Google Chart for Business</h4>
        <div class="row">
            <div class="col-md-6 bg-white mb-3" id="chart_div" style="height:350px;box-shadow:0px 0px 4px 1px #ccc;">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 shadow bg-white p-4" style="box-shadow:0px 0px 4px 1px #ccc;">
                <form id="form">
                    <div class="alert alert-success alert-dismissible fade d-none">
                        Your data is saved successfully....
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" name="year" id="year">
                    </div>
                    <div class="form-group">
                        <label for="sale">Sale</label>
                        <input type="number" class="form-control" name="sale" id="sale">
                    </div>
                    <div class="form-group">
                        <label for="profit">Profit</label>
                        <input type="number" class="form-control" name="profit" id="profit">
                    </div>
                    <div class="form-group">
                        <label for="expenses">Expenses</label>
                        <input type="number" class="form-control" name="expenses" id="expenses">
                    </div>

                    <button class="btn btn-primary my-3" type="submit">Submit</button>

                </form>
            </div>
        </div>

    </div>

    <script>
    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "./insert.php",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.trim()=='Your data is saved successfully....'){
                        $(".alert").removeClass('d-none');
                    $(".alert").addClass('show');

                    setTimeout(function(){
                        $(".alert").addClass('d-none');
                        $(".alert").removeClass('show');
                        $("#form").trigger('reset');
                    },2000);
                    }else{
                        alert(response);
                    }
                    

                }
            })
        })
    })
    </script>





</body>

</html>