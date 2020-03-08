<footer class="footer">

    <div class="container">
        <p>Matrix the all new news feed &copy;Website 2020</p>
    </div>

</footer>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltitle">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="registration.php" method="POST" onsubmit="return checkForm(this);">
      <div class="form-group">
  <label>Enter Name</label>
  <input type="text" class="form-control" name="fullname" required>
</div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" required>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
    



      </div>
      <div class="modal-footer">
          <!-- <button id="toggleLogin" >Sign up</button> -->
        <button class="btn btn-primary" type="submit" name="register">Sign up</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="validation.php" method="POST">
      <div class="form-group">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
     



      </div>
      <div class="modal-footer">
          <!-- <button id="toggleLogin" >Sign up</button> -->
        <button class="btn btn-primary" type="submit" name="login" value="<?php echo $row['email'];?>">Login</button>
      </div>
    </div>
    </form>
  </div>
</div>



    <script>
        // $("#toggleLogin").click(function() {

        //     if ($("#loginActive").val() == "1") {

        //         $("#loginActive").val("0");
        //         $("#modaltitle").html("Sign up");
        //         $("#loginbutton").html("Sign up");
        //         $("#toggleLogin").html("Login");
        // }else{

        //         $("#loginActive").val("1");
        //         $("#modaltitle").html("Login");
        //         $("#loginbutton").html("Login");
        //         $("#toggleLogin").html("Sign up");
        // }
        // })
        // $("#loginbutton").click(function(){
        //     $.ajax({
        //         type: "POST",
        //         url: "actions.php?action=loginSignup",
        //         data: "email=" + $("#email").val() + 
        //         "&password=" + $("#password").val() + "&loginActive=" +
        //         $("#loginActive").val(),
        //         success: function(result) {
        //             alert(result);
        //         }
        //     })
        // })
        // $(".toogleFollow").click(function(){
        //     var id =  $(this).attr("data-userId");
        //     $.ajax({
        //         type: "POST",
        //         url: "actions.php?action=toggleFollow",
        //         data: "userId=" + id,
        //         success: function(result){
        //             alert(result);
        //             if(result == 1){
        //                 $("a[data-user-Id='" + id + "']").html("Follow");
        //             }else if(result == 2){
        //                 $("a[data-user-Id='" + id + "']").html("Unfollow");
        //             }
        //         }
        //     })
        // })

 function checkForm(myform){
    var password=myform.password.value;
    var confirmpassword=myform.confirmpassword.value;
if(password.length<8){
    alert("Password should be greater than or equal to 8");
    return false;
}
else if(password.length>12){
    alert("Password should be less than 12");
    return false;
}
else if(password.search(/[0-9]/)==-1){
    alert("Please should have a number");
    return false;
}
else if(password.search(/[a-z]/)==-1){
    alert("Password should have a lower case letter");
    return false;
}
else if(password.search(/[A-Z]/)==-1){
    alert("Password should have a upper case letter");
    return false;
}
else if(password.search(/[!\@\#\$\%\^\&\(\)\_\+\.\,\;\:]/)==-1){
    alert("Password should have a special character except ~ ` * ");
    return false;
}
else if(password!=confirmpassword){
    alert("Please check password and confirmpassword");
    return false;
}
else{
return true;
}
}

    </script>

</body>
</html>