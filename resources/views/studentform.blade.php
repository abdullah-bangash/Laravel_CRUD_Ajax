<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <!--Add Student Data Modal -->
    <div class="modal fade" id="studentaddmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addform" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" class="form-control" name="course" id="course"
                                placeholder="Enter Course">
                        </div>
                        <div class="form-group">
                            <label>Section</label>
                            <input type="text" class="form-control" name="section" id="section"
                                placeholder="Enter Section">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End of Add Model --}}




    <!--Edit Student Modal -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Model</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editFormID" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" class="form-control" name="course" id="course"
                                placeholder="Enter Course">
                        </div>
                        <div class="form-group">
                            <label>Section</label>
                            <input type="text" class="form-control" name="section" id="section"
                                placeholder="Enter Section">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End of Edit Model --}}



    <!--Delete Student Modal -->
    <div class="modal fade" id="studentDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Model</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteFormID" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('Delete')
                        <input type="hidden" name="id" id="delete_id">
                        <p>Are you sure to delete this data!</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End of Delete Model --}}


    <div class="contianer">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Laravel CRUD Using Ajax</h1>
                    <br>
                    <button type="button" class="btn btn-lg btn-primary" data-toggle="modal"
                        data-target="#studentaddmodel">
                        Add
                    </button>
                    <br><br>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">Section</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td style="display:none;">{{$student->id}}</td>
                                <td>{{$student->fname}}</td>
                                <td>{{$student->lname}}</td>
                                <td>{{$student->course}}</td>
                                <td>{{$student->section}}</td>
                                <td>
                                    <button class="btn btn-success editbtn">EDIT</button>
                                </td>
                                <td>
                                    <button class=" btn btn-danger deletebtn">DELETE</button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    {{-- JQuery Validation Plugin --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js">
    </script>
    {{-- Javascript --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    {{-- Bootstrap --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    {{-- Adding Data in Ajax with JQuery Validation --}}
    <script>
        $(document).ready(function() {
              $("#addform").validate({
                rules: {
                  fname: "required",
                  lname: "required",                
                  course: "required",                 
                  section: "required"
                },
                messages: {
                  fname: "Please enter your first name",
                  lname: "Please enter your last name",
                  course: "Enter your course",
                  section: "Enter your section"
                },
                submitHandler: function(form,e) {         
    e.preventDefault();
    $.ajax({
            type: "POST",
            url: "/student",
            data: $('#addform').serialize(),
            success: function (response) {
                console.log(response)
                $('#studentaddmodel').modal('hide')
                alert('Data Saved');
                location.reload();
            },
            error: function(error){
                console.log(error)
                alert('Data Not Saved');
            }
        });
  }
              });
            });
    </script>




    {{-- Scripts For Edit Data --}}
    <script>
        $(document).ready(function(){
$('.editbtn').on('click', function(){
$('#studentEditModal').modal('show');

$tr = $(this).closest('tr');

var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#id').val(data[1]);
$('#editFormID #fname').val(data[2]);
$('#editFormID #lname').val(data[3]);
$('#editFormID #course').val(data[4]);
$('#editFormID #section').val(data[5]);
});
$("#editFormID").validate({
                rules: {
                  fname: "required",
                  lname: "required",                
                  course: "required",                 
                  section: "required"
                },
                messages: {
                  fname: "Please enter your first name",
                  lname: "Please enter your last name",
                  course: "Enter your course",
                  section: "Enter your section"
                },
                    submitHandler:function(form,e){
                    e.preventDefault();
                    var id = $('#id').val();
    $.ajax({
        type: "PUT",
        url: "/student/"+id,
        data: $('#editFormID').serialize(),
        success: function (response) {
        console.log(response);
        $('#studentEditModal').modal('hide');
        alert('Data Updated');
        location.reload();
        
    },
        error: function(error){
        console.log(error);
    }
});
}
});
});
    </script>


    {{-- Scripts For Delete --}}
    <script>
        $(document).ready(function(){
$('.deletebtn').on('click', function(){
$('#studentDeleteModal').modal('show');

$tr = $(this).closest('tr');

var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#delete_id').val(data[1]);
});

$('#deleteFormID').on('submit', function(e){
e.preventDefault();
var id = $('#delete_id').val();
$.ajax({
    type: "delete",
    url: "/student/"+id,
    data: $('#deleteFormID').serialize(),
    success: function (response) {
        console.log(response);
        $('#studentDeleteModal').modal('hide');
        alert('Data Deleted!');
        location.reload();
        
    },
    error: function(error){
        console.log(error);
    }
});
});
});
    </script>


</body>

</html>