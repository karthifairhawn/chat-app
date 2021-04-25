<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location:index.php');
}else{
    include 'php/db_conn.php';
    $session_id= $_SESSION['id'];
    $query = "SELECT * FROM user_info WHERE id='$session_id'";
    $query_1_res = mysqli_query($conn,$query);
    $query_1_res_ass = mysqli_fetch_assoc($query_1_res);

     
}



?>


<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="css/users.css">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">




</head>
<body>
    
    <div class="wrapper">
        <form action="#" class="form">
            <div class="header">     
                    <div class  ="left-header">
                        <img class="own-img" src="img/user_images/<?php echo $query_1_res_ass['image'] ?> ">
                        <div class="name_status">
                            <span class="own-name"><?php echo $query_1_res_ass['fname']?></span>
                            <span class="own-status"><?php echo $query_1_res_ass['a_status']?></span>
                        </div>            
                    </div>                           
                    <a href="php/logout.php?user_id=<?php echo $_SESSION['id']?>"><input type="button" class="logout-btn" value="LOG OUT"></a>
            </div>
            <hr>
            <div class="content">
                <span class="text search-child-2">Select an user to send Text.</span>
                <input type="text" class="search-box" id="search-box" placeholder="Enter Name to Search">
                <div class="search-icon" id="search-icon">
                    <i class="fa fa-search" id="search-btn"></i>
                    <span class="x_mark" id="x_mark">&#10006;</span>
                </div>
            </div>


            <!-- Users List -->
            <div class="user-body" id="user_body">
                <script src="js/users_list_ajax.js"></script>

                      
            </div>  
            
        
        </form>
    </div>
    <script src="js/search.js"></script>
    




</body>


</html>