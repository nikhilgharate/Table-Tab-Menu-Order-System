
<style type="text/css">
.page-header-title {
    background-color: #f2f2f2;
    margin: -20px -5px 23px -5px;
    padding: 10px 15px 100px 20px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
}
  .logo span, .logo-sm span {
  font-size: 25px;
  font-weight:normal;
  color: #663366;
  text-shadow: 2px 2px 3px #fff;
  font-family: 'verdana', serif; 
}
.logo-sm span {
    background-color: #cc99cc;
    height: 44px;
    width: 44px;
    display: block;
    line-height: 44px;
    margin-top: 13px;
}
.button-menu-mobile {
    background: #7a6249;
    border: none;
    color: rgba(255, 255, 255, 0.8);
    font-size: 28px;
    height: 42px;
    width: 42px;
    border-radius: 50%;
    margin-top: 14px;
    margin-left: 15px;
}
#sidebar-menu > ul > li > a.active {
    color: #6091ba;
    background-color: #796148;
}
</style>
<div class="topbar">

<div class="topbar-left" style="background-color:#c5a17a;box-shadow:
 3px 1px 1px #3f3021;">

<div class="text-center" >
	<a href="dashboard.php" class="logo"><span style="color:#;">Smart</span> <span style="color:#;">Hotel</span> </a> 
	<a href="dashboard.php" class="logo-sm"><span>+</span></a>
</div>
</div>
 <div class="navbar navbar-default" role="navigation">
 
 <div class="container" style="background-color:#c5a17a;box-shadow:
 3px 3px 2px #7b634a;">
 
 
 <div class="">
 
 <div class="pull-left" > 
 
 
 <button type="button" class="button-menu-mobile open-left waves-effect waves-light"> <i class="ion-navicon"></i> </button> 
 
 
 <span class="clearfix"></span>
 
 </div>
 
 <ul class="nav navbar-nav navbar-right pull-right" >
	
	<li class="dropdown"> 
	    <a style="line-height: 31px;" href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"> <img src="assets/images/users/header_bg.png" alt="user-img" class="img-circle"> <span class="profile-username"> <?php echo $_SESSION['username']; ?> <br/>  </span> </a>
		
		    <ul class="dropdown-menu">
			  <li><a href="javascript:void(0)">Profile</a></li>
			 
			  
			  <li class="divider"></li>
			  <li><a href="logout.php?logout">Logout</a></li>
			  </ul>
        </li>
	</ul>
	
	</div>
	
	</div>
	</div>
 
 
 
 
 
 </div>