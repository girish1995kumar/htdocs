<?php

include('header.php');
//include('classes/DB.php');
//session_start(); 

 ?>
<?php
//include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Post.php');
include('./classes/Image.php');
include('./classes/Notify.php');

//error_reporting(0);

$username = "";
$verified = False;
$isFollowing = False;
if (isset($_GET['username'])) {
        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))) {

                $username = DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['username'];
                $userid = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['id'];
                $verified = DB::query('SELECT verified FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['verified'];
                $followerid = Login::isLoggedIn();

                if (isset($_POST['follow'])) {

                        if ($userid != $followerid) {

                                if (!DB::query('SELECT follower_id FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid))) {
                                        if ($followerid == 6) {
                                                DB::query('UPDATE users SET verified=1 WHERE id=:userid', array(':userid'=>$userid));
                                        }
                                        DB::query('INSERT INTO followers VALUES (\'\', :userid, :followerid)', array(':userid'=>$userid, ':followerid'=>$followerid));
                                } else {
                                        echo 'Already following!';
                                }
                                $isFollowing = True;
                        }
                }
                if (isset($_POST['unfollow'])) {

                        if ($userid != $followerid) {

                                if (DB::query('SELECT follower_id FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid))) {
                                        if ($followerid == 6) {
                                                DB::query('UPDATE users SET verified=0 WHERE id=:userid', array(':userid'=>$userid));
                                        }
                                        DB::query('DELETE FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid));
                                }
                                $isFollowing = False;
                        }
                }
                if (DB::query('SELECT follower_id FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid))) {
                        //echo 'Already following!';
                        $isFollowing = True;
                }

                if (isset($_POST['deletepost'])) {
                        if (DB::query('SELECT id FROM posts WHERE id=:postid AND user_id=:userid', array(':postid'=>$_GET['postid'], ':userid'=>$followerid))) {
                                DB::query('DELETE FROM posts WHERE id=:postid and user_id=:userid', array(':postid'=>$_GET['postid'], ':userid'=>$followerid));
                                DB::query('DELETE FROM post_likes WHERE post_id=:postid', array(':postid'=>$_GET['postid']));
                                echo 'Post deleted!';
                        }
                }


                if (isset($_POST['post'])) {
                        if ($_FILES['postimg']['size'] == 0) {
                                Post::createPost($_POST['postbody'], Login::isLoggedIn(), $userid);
                        } else {
                                $postid = Post::createImgPost($_POST['postbody'], Login::isLoggedIn(), $userid);
                                Image::uploadImage('postimg', "UPDATE posts SET postimg=:postimg WHERE id=:postid", array(':postid'=>$postid));
                        }
                }

                if (isset($_GET['postid']) && !isset($_POST['deletepost'])) {
                        Post::likePost($_GET['postid'], $followerid);
                }

                $posts = Post::displayPosts($userid, $username, $followerid);


        } else {
                die('User not found!');
        }
}

?>
<?php include('nav.php');?>

    <div class="container">
        <h1><?php echo $username; ?>'s Profile <?php if ($verified) { echo '<i class="glyphicon glyphicon-ok-sign verified" data-toggle="tooltip" title="Verified User" style="font-size:28px;color:#da052b;"></i>'; } ?></h1>
     <form action="profile.php?username=<?php echo $username; ?>" method="post">
        <?php
        if ($userid != $followerid) {
                if ($isFollowing) {
                        echo '<div>
        <div class="container">
            <div class="row"><div class="col-md-3"><input class="btn btn-default" type="submit" name="unfollow" value="Unfollow" style="background-image:url(&quot;none&quot;);background-color:#da052b;color:#fff;padding:16px 32px;margin:0px 0px 6px; border:none;box-shadow:none;text-shadow:none;opacity:0.9;text-transform:uppercase;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"></div></div></div></div>';
                } else {
                        echo '<div>
        <div class="container">
            <div class="row"><div class="col-md-3"><input class="btn btn-default" type="submit" name="follow" value="Follow" style="background-image:url(&quot;none&quot;);background-color:#da052b;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;box-shadow:none;text-shadow:none;opacity:0.9;text-transform:uppercase;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"></div></div></div></div>';
                }
        }
        ?>
</form><br/></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php
          if($_SESSION["username"] == $username){
echo'<button class="btn btn-default" type="button" style="width:100%;background-image:url(&quot;none&quot;);background-color:#da052b;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;box-shadow:none;text-shadow:none;opacity:0.9;text-transform:uppercase;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;" onclick="showNewPostModal()">CREATE NEW POST</button>';
}
                    ?>
                    <ul class="list-group"></ul>
                </div>
               
                <div class="col-md-6">
                    <ul class="list-group">
                            <div class="timelineposts">

                            </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="commentsmodal" role="dialog" tabindex="-1" style="padding-top:100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
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
    <div class="modal fade" id="newpost" role="dialog" tabindex="-1" style="padding-top:100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 class="modal-title">New Post</h4></div>
                <div style="max-height: 400px; overflow-y: auto">
                        <form action="profile.php?username=<?php echo $username; ?>" method="post" enctype="multipart/form-data">
                                <textarea name="postbody" rows="8" cols="80"></textarea>
                                <br />Upload an image:
                                <input type="file" name="postimg">

                </div>
                <div class="modal-footer">
                    <input type="submit" name="post" value="Post" class="btn btn-default" type="button" style="background-image:url(&quot;none&quot;);background-color:#da052b;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;box-shadow:none;text-shadow:none;opacity:0.9;text-transform:uppercase;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark">
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

    var start = 5;
    var working = false;
    $(window).scroll(function() {
            if ($(this).scrollTop() + 1 >= $('body').height() - $(window).height()) {
                    if (working == false) {
                            working = true;
                            $.ajax({

                                    type: "GET",
                                    url: "api/profileposts?username=<?php echo $username; ?>&start="+start,
                                    processData: false,
                                    contentType: "application/json",
                                    data: '',
                                    success: function(r) {
                                            var posts = JSON.parse(r)
                                            $.each(posts, function(index) {

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
                                                                            $("[data-id='"+buttonid+"']").html(' <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i>')
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

                                            start+=5;
                                            setTimeout(function() {
                                                    working = false;
                                            }, 4000)

                                    },
                                    error: function(r) {
                                            console.log(r)
                                    }

                            });
                    }
            }
    })

    function scrollToAnchor(aid){
    try {
    var aTag = $(aid);
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
        } catch (error) {
                console.log(error)
        }
    }

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
                        url: "api/profileposts?username=<?php echo $username; ?>&start=0",
                        processData: false,
                        contentType: "application/json",
                        data: '',
                        success: function(r) {
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
