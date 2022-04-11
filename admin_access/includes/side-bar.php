<div class="sidebar-header">
	<a href="../" target="_blank"><img src="../images/logo-light.png" class="img-fluid" alt="Nazwa Sharaf" /></a>
</div>
<div class="sidebar-menu">
	<ul class="menu">
		<li class='sidebar-title'>Main Menu</li>
		<li class="sidebar-item dashClass">
			<a href="./" class='sidebar-link'><i data-feather="home" width="20"></i> 
				<span>Dashboard</span>
			</a>
		</li>
		<li class="sidebar-item  has-sub createClass">
			<a href="#" class='sidebar-link'>
				<i data-feather="triangle" width="20"></i> 
				<span>Create</span>
			</a>
			<ul class="submenu">
				<li><a href="insert_skills.php">Skills</a></li>
				<li><a href="insert_category.php">Category</a></li>
				<li><a href="insert_projects.php">Projects</a></li>
				<li><a href="insert_clients.php">Clients</a></li>
				<li><a href="insert_services.php">Services</a></li>
			</ul>
		</li>
		<li class="sidebar-item has-sub cpanelEntry">
			<a href="#" class='sidebar-link'>
				<i data-feather="briefcase" width="20"></i>
				<span>cPanel Entries</span>
			</a>
			<ul class="submenu">
				<li><a href="skills.php">Skills</a></li>
				<li><a href="category.php">Category</a></li>
				<li><a href="projects.php">Projects</a></li>
				<li><a href="clients.php">Clients</a></li>
				<li><a href="services.php">Services</a></li>
			</ul>
		</li>
		<li class="sidebar-item has-sub websiteForms">
			<a href="#" class='sidebar-link'>
				<i data-feather="briefcase" width="20"></i>
				<span>Website Forms</span>
			</a>
			<ul class="submenu">
				<li><a href="quick_enquiry_form.php">Quick Enquiry Form</a></li>
			</ul>
		</li>
		<li class="sidebar-item has-sub webSetting">
			<a href="#" class='sidebar-link'>
				<i data-feather="settings" width="20"></i>
				<span>Website Settings</span>
			</a>
			<ul class="submenu">
				<li><a href="my_profile.php">My Account</a></li>
				<li><a href="modify_home.php">Home/Web Setting</a></li>
			</ul>
		</li>
	</ul>
	<script>
		$(document).ready(function(){
			
			var currentURL = $(location).attr('href');
			var _dashClassArray = ["https://www.shootatsight.com/admin_access/", "https://www.shootatsight.com/admin_access/index.php"];
			var _createClassArray = ["https://www.shootatsight.com/admin_access/insert_skills.php","https://www.shootatsight.com/admin_access/insert_category.php","https://www.shootatsight.com/admin_access/insert_projects.php","https://www.shootatsight.com/admin_access/insert_clients.php","https://www.shootatsight.com/admin_access/insert_services.php"];
			var _cpanelEntryArray = ["https://www.shootatsight.com/admin_access/skills.php", "https://www.shootatsight.com/admin_access/category.php", "https://www.shootatsight.com/admin_access/projects.php", "https://www.shootatsight.com/admin_access/clients.php", "https://www.shootatsight.com/admin_access/services.php"];
			var _websiteFormsArray = ["https://www.shootatsight.com/admin_access/quick_enquiry_form.php"];
			var _webSettingArray = ["https://www.shootatsight.com/admin_access/my_profile.php", "https://www.shootatsight.com/admin_access/modify_home.php"];
			
			if($.inArray(currentURL, _dashClassArray) != -1){
				$(".dashClass").addClass("active");
				$(".createClass").removeClass("active");
				$(".cpanelEntry").removeClass("active");
				$(".websiteForms").removeClass("active");
				$(".webSetting").removeClass("active");
			}else if($.inArray(currentURL, _createClassArray) != -1){
				$(".dashClass").removeClass("active");
				$(".createClass").addClass("active");
				$(".cpanelEntry").removeClass("active");
				$(".websiteForms").removeClass("active");
				$(".webSetting").removeClass("active");
			}else if($.inArray(currentURL, _cpanelEntryArray) != -1){
				$(".dashClass").removeClass("active");
				$(".createClass").removeClass("active");
				$(".cpanelEntry").addClass("active");
				$(".websiteForms").removeClass("active");
				$(".webSetting").removeClass("active");
			}else if($.inArray(currentURL, _websiteFormsArray) != -1){
				$(".dashClass").removeClass("active");
				$(".createClass").removeClass("active");
				$(".cpanelEntry").removeClass("active");
				$(".websiteForms").addClass("active");
				$(".webSetting").removeClass("active");
			}else if($.inArray(currentURL, _webSettingArray) != -1){
				$(".dashClass").removeClass("active");
				$(".createClass").removeClass("active");
				$(".cpanelEntry").removeClass("active");
				$(".websiteForms").removeClass("active");
				$(".webSetting").addClass("active");
			}else{}
		});
	</script>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>