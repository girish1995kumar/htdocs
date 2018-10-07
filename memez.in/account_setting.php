<?php 
include('header.php');
include('./classes/Login.php');
include('nav.php');
$user= $_SESSION["username"];


?>

  <?php
  
  if (@$_POST['senddata']) 
  {
    //If the form has been submitted ...

     //Password variables
 $old_password = strip_tags(@$_POST['oldpassword']);
  $new_password = strip_tags(@$_POST['newpassword']);
  $repeat_password = strip_tags(@$_POST['newpassword2']);
  
    if (password_verify($old_password, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$user))[0]['password'])) {

       if ($new_password == $repeat_password) {
        if (strlen($new_password) >= 6 && strlen($newpassword) <= 16) {

                                        DB::query('UPDATE users SET password=:new_password WHERE username=:username', array(':new_password'=>password_hash($new_password, PASSWORD_BCRYPT), ':username'=>$user));
                                        // echo "Password changed successfully!";
                                        //echo mysqli_error();
                                        header("Location:login.php");   
                                     }
                                       else {
                                        
                                          echo 'Password length must be between 6 to 16 charecter';
                                        
                                
                                            }

                                      }  else {
                                      
                                       
                                          echo "Passwords don\'t match!";
                                      
                                
                                
                      
                                               }
                                             }

                                          else {
                                                 
                                        
                                          echo 'Incorrect old password!';
                                        
                        
                                    
                }

      }

      //Check whether the user has uploaded a profile pic or not
  $profile_pic_db = DB::query('SELECT profileimg FROM users WHERE username=:username', array(':username'=>$user,))[0]['profileimg'];
  if($profile_pic_db==""){
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic; 
  }

   //Profile Image upload script
  if (isset($_FILES['profilepic']))  {
    if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576)) //1 Megabyte
  {
   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   $rand_dir_name = substr(str_shuffle($chars), 0, 15);
   mkdir("userdata/profile_pics/$rand_dir_name");
 
   if (file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
   {
    echo @$_FILES["profilepic"]["name"]." Already exists";
   }
   else
   {
    move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
    //echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
    $profile_pic_name = @$_FILES["profilepic"]["name"];
    $profile_pic_query = DB::query('UPDATE users SET profileimg=:profileimg WHERE username=:username', array(':profileimg'=>$profile_pic_name,':username'=>$user));
    header("Location: account_setting.php");
    
   }
  }
  else
  {
      echo "<h1 class='text-center'>Invailid File! Your image must be no larger than 1MB and it must be either a .jpg, .jpeg, .png or .gif</h1>";
  } 

}
  

  
 
?>

<!DOCTYPE html>
<html>
<body>
<div class="container">
<div class="row">
<h2>Edit Account Settings below</h2> 
<hr />
<p>UPLOAD YOUR PROFILE PHOTO:</p>
<form action="account_setting.php" method="POST" enctype="multipart/form-data">
<img src="<?php echo $profile_pic; ?>" width="70" /><br /><br />
<input type="file" name="profilepic" /><br />
<input type="submit" name="uploadpic" value="Upload Image">
</form>
<hr />  
<form action="account_setting.php"  method="post">
<p>CHANGE YOUR PASSWORD:</p> <br />
Your Old Password: &nbsp;&nbsp;&nbsp;<input type="password" name="oldpassword" id="oldpassword" size="40"><br /><br />
Your New Password: &nbsp;<input type="password" name="newpassword" id="newpassword" size="40"><br /><br />
Repeat Password  : &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="newpassword2" id="newpassword2" size="40"><br /><br />
<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>
<hr />
<form action="close-account.php" method="post">
<p>CLOSE ACCOUNT:</p> <br />
<input type="submit" name="closeaccount" id="closeaccount" value="Close My Account">
</form>
<hr />
<br />
<br />
</div>
</div> 
<div class="modal fade" role="dialog" tabindex="-1" style="padding-top:100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Comments</h4></div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<div class="footer-dark navbar-fixed-bottom" style="position:relative">
        <footer>
            <div class="container">
                <p class="copyright">memez.in © 2018</p>
            </div>
        </footer>
    </div>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script type="text/javascript">

        
        $(document).ready(function() {

                $('.sbox').keyup(function() {
                        $('.autocomplete').html("")
                        $.ajax({

                                type: "GET",
                                url: "api/search?query=" + $(this).val(),
                                processData: false,
                                contentType: "application/json",
                                data: '',
                                success: function(r) {
                                        r = JSON.parse(r)
                                        for (var i = 0; i < r.length; i++) {
                                                console.log(r[i].body)
                                                $('.autocomplete').html(
                                                        $('.autocomplete').html() +
                                                        '<a href="profile.php?username='+r[i].username+'#'+r[i].id+'"><li class="list-group-item"><span>'+r[i].body+'</span></li></a>'
                                                )
                                        }
                                },
                                error: function(r) {
                                        console.log(r)
                                }
                        })
                })

                $.ajax({

                        type: "GET",
                        url: "api/posts",
                        processData: false,
                        contentType: "application/json",
                        data: '',
                        success: function(r) {
                                //print(r)
                                //console.log(r)
                                 var posts = JSON.parse(r)
                                  
                                $.each(posts, function(index) {
                                      //console.log(posts[index])

                                       if (posts[index].PostImage == "") {
                                                $('.timelineposts').html(
                                                        $('.timelineposts').html() +

                                                        '<li class="list-group-item" id="'+posts[index].PostId+'"><blockquote><p>'+posts[index].PostBody+'</p><footer>Posted by '+posts[index].PostedBy+' on '+posts[index].PostDate+'</footer></blockquote></li>'
                                                )
                                        } else {
                                                $('.timelineposts').html(
                                                        $('.timelineposts').html() +

                                                        '<li class="list-group-item" id="'+posts[index].PostId+'"><blockquote><p>'+posts[index].PostBody+'</p><img height="400" width="280" src="" data-tempsrc="'+posts[index].PostImage+'" class="postimg" id="img'+posts[index].postId+'"><footer>Posted by '+posts[index].PostedBy+' on '+posts[index].PostDate+'</footer></blockquote></li>'
                                                )
                                        }

                                        $('[data-postid]').click(function() {
                                                var buttonid = $(this).attr('data-postid');

                                                $.ajax({

                                                        type: "GET",
                                                        url: "api/comments?postid=" + $(this).attr('data-postid'),
                                                        processData: false,
                                                        contentType: "application/json",
                                                        data: '',
                                                        success: function(r) {
                                                                var res = JSON.parse(r)
                                                                showCommentsModal(res);
                                                        },
                                                        error: function(r) {
                                                                console.log(r)
                                                        }

                                                });
                                        });

                                        $('[data-id]').click(function() {
                                                var buttonid = $(this).attr('data-id');
                                                $.ajax({

                                                        type: "POST",
                                                        url: "api/likes?id=" + $(this).attr('data-id'),
                                                        processData: false,
                                                        contentType: "application/json",
                                                        data: '',
                                                        success: function(r) {
                                                                var res = JSON.parse(r)
                                                                $("[data-id='"+buttonid+"']").html(' <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+res.Likes+' Likes</span>')
                                                        },
                                                        error: function(r) {
                                                                console.log(r)
                                                        }

                                                });
                                        })
                                })

                                $('.postimg').each(function() {
                                        this.src=$(this).attr('data-tempsrc')
                                        this.onload = function() {
                                                this.style.opacity = '1';
                                        }
                               
                                       })

                                scrollToAnchor(location.hash)
                               
                                
                                 
                        },
                        error: function(r) {
                                console.log(r)
                        }

                });

        });

        function showNewPostModal() {
                $('#newpost').modal('show')
        }

        function showCommentsModal(res) {
                $('#commentsmodal').modal('show')
                var output = "";
                for (var i = 0; i < res.length; i++) {
                        output += res[i].Comment;
                        output += " ~ ";
                        output += res[i].CommentedBy;
                        output += "<hr />";
                }

                $('.modal-body').html(output)
        }
                                
    </script>
</body>
</html>
