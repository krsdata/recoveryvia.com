<div class="nav">
  <div class="table">
    <ul class="select">
      <li><a href="#nogo"><b>Dashboard</b></a>
        <div class="select_sub">
          <ul class="sub">
            <li><a href="#nogo">Dashboard Details 1</a></li>
            <li><a href="#nogo">Dashboard Details 2</a></li>
            <li><a href="#nogo">Dashboard Details 3</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <div class="nav-divider">&nbsp;</div>
    <ul <?php if($curPage=='user'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
      <li><a href="#nogo"><b>Users</b></a>
        <div class="select_sub show">
          <ul class="sub">
            <li <?php if($curSubPage=='view_user'){ echo 'class="sub_show"';}?>><a href="manage-user.php">View all users</a></li>
            <li <?php if($curSubPage=='add_user'){ echo 'class="sub_show"';}?>><a href="add-edit-user.php">Add users</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <div class="nav-divider">&nbsp;</div>
    <ul class="select">
      <li><a href="#nogo"><b>News</b></a>
        <div class="select_sub">
          <ul class="sub">
            <li><a href="#nogo">News details 1</a></li>
            <li><a href="#nogo">News details 2</a></li>
            <li><a href="#nogo">News details 3</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
