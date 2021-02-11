<div class="sidebar" data-color="white" data-active-color="danger">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
  <div class="logo">
    <a href="<?= base_url('UserC') ?>" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img <?= base_url('/assets/images/logo-small.png')?>>
      </div>
    </a>
    <a href="<?= base_url('UserC') ?>" class="simple-text logo-normal">
      Nashik Tourism

    </a>
  </div>

  <div class="sidebar-wrapper">
    <ul class="nav ">
      <li class="<?=(basename($_SERVER['PHP_SELF'])=="UserC")?"active":" ";?> ">
        <a href="<?= base_url('UserC') ?>">
          <i class="nc-icon nc-layout-11"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <!-- Home page -->
      <li
        class="nav-item dropdown <?=((basename($_SERVER['PHP_SELF'])=="HomePage")||(basename($_SERVER['PHP_SELF'])=="Homesec2")||(basename($_SERVER['PHP_SELF'])=="Homesec3"))?"active":" ";?> ">
        <div class="dropdown-menu dropdown-menu-right border" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item  <?=(basename($_SERVER['PHP_SELF'])=="Our_Attractions_Sec1")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/our_attractions') ?>">Our_Attractions_Sec1</a>
          <a class="dropdown-item  <?=(basename($_SERVER['PHP_SELF'])=="Home_sec2")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/home_sec2') ?>">Home_Sec2</a>
          <a class="dropdown-item  <?=(basename($_SERVER['PHP_SELF'])=="Culture_Sec3")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/culture_home') ?>">Culture_Sec3</a>
          <a class="dropdown-item  <?=(basename($_SERVER['PHP_SELF'])=="Food-Stuff_Sec4")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/food-stuff_home') ?>">Food-Stuff_Sec4</a>
        </div>
        <a data-toggle="dropdown" class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
          <i class="nc-icon nc-bank"></i>
          <p>Home<b class="caret"></b></p>
        </a>
      </li>

      <!-- Destinition page -->
      <li
        class="nav-item dropdown <?=((substr(basename($_SERVER['PHP_SELF']), 0, -1)=="Destpage")||(basename($_SERVER['PHP_SELF'])=="Destsec2")||(basename($_SERVER['PHP_SELF'])=="Destsec3")||(basename($_SERVER['PHP_SELF'])=="Destsec4")||(basename($_SERVER['PHP_SELF'])=="Destsec5")||(basename($_SERVER['PHP_SELF'])=="Destsec6")||(basename($_SERVER['PHP_SELF'])=="Destsec7"))?"active":" ";?> ">
        <div class="dropdown-menu dropdown-menu-right border" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="places_for_worship_Sec1")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/places_for_worship_dest') ?>">places_for_worship_Sec1</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Exploring_Nashik_Sec2")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/exploring_nashik_dest') ?>">Exploring_Nashik_Sec2</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Destsec3")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/destsec3') ?>">Destination Sec3</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Your_Planning_Sec4")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/your_planning_dest') ?>">Your_Planning_Sec4</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Museums_Sec5")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/museums_dest') ?>">Museums_Sec5</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Mountains_Sec6")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/mountains_dest') ?>">Mountains_Sec6</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Waterfalls_Sec7")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/waterfalls_dest') ?>">Waterfalls_Sec7</a>
        </div>
        <a data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          <i class="nc-icon nc-istanbul"></i>
          <p>Destination<b class="caret"></b></p>
        </a>
      </li>


      <!-- Culture page -->
      <li
        class="nav-item dropdown <?=((basename($_SERVER['PHP_SELF'])=="CulturePage")||(basename($_SERVER['PHP_SELF'])=="Culsec1")||(basename($_SERVER['PHP_SELF'])=="Culsec2"))?"active":" ";?>">
        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Culsec1")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/history_culture') ?>">History_Culture</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="our_events_culture")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/our_events_culture') ?>">our_Events_Sec2</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="our_speciality_culture")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/our_speciality_culture') ?>">our_speciality_Sec3</a>
        </div>
        <a data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          <i class="nc-icon nc-palette"></i>
          <p>Culture<b class="caret"></b></p>
        </a>
      </li>


      <!-- foodstuff page -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-right border" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="FoodSec1")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/food-stuff_sec1') ?>">FoodStuff_Sec1</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="FoodSec2")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/food-stuff_sec2') ?>">FoodStuff_Sec2</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="FoodSec3")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/food-stuff_sec3') ?>">FoodStuff_Sec3</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="FoodSec4")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/food-stuff_sec4') ?>">FoodStuff_Sec4</a>

        </div>
        <a data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          <i class="nc-icon nc-sun-fog-29"></i>
          <p>FoodStuff<b class="caret"></b></p>
        </a>
      </li>


      <!-- Popup window section -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="Pop-up Window")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/popup_data') ?>">
          <i class="nc-icon nc-bulb-63"></i>
          <p>Popup Window</p>
        </a>
      </li>

      <!-- News & announcement section -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="News Section")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/news_section') ?>">
          <i class="nc-icon nc-bell-55"></i>
          <p>Announcements</p>
        </a>
      </li>

      <!-- How to reach page -->
      <li
        class="nav-item dropdown <?=((basename($_SERVER['PHP_SELF'])=="infosec1")||(basename($_SERVER['PHP_SELF'])=="infosec2"))?"active":" ";?>">
        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="How_To_Reach")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/how_to_reach') ?>">How_To_reach</a>
          <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Nashik_Transportation")?"font-weight-bold":" ";?>"
            href="<?= base_url('UserC/View/nashik_transportation') ?>">Nashik_transportation</a>
        </div>
        <a data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          <i class="nc-icon nc-bus-front-12"></i>
          <p>How To Reach<b class="caret"></b></p>
        </a>
      </li>

      <!-- Gallery page -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="Gallery")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/gallery') ?>">
          <i class="nc-icon nc-album-2"></i>
          <p>Gallery</p>
        </a>
      </li>

      <!-- Website navbar tabs  -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="navbar")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/navbar') ?>">
          <i class="nc-icon nc-globe-2"></i>
          <p>Nav bar</p>
        </a>
      </li>


      <!-- Landing images of all pages -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="pages")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/pages') ?>">
          <i class="nc-icon nc-single-copy-04"></i>
          <p>Background Images</p>
        </a>
      </li>


      <!-- Contact form data -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="Contact")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/contact') ?>">
          <i class="nc-icon nc-email-85"></i>
          <p>Contact</p>
        </a>
      </li>

      <!-- Feedback form data -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="Feedback")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/feedback') ?>">
          <i class="nc-icon nc-paper"></i>
          <p>Feedback</p>
        </a>
      </li>

      <!-- Tables to feel extra info of sections -->
      <!--  <li class="nav-item dropdown <?=((basename($_SERVER['PHP_SELF'])=="infosec1")||(basename($_SERVER['PHP_SELF'])=="infosec2"))?"active":" ";?>">
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Destinations")?"font-weight-bold":" ";?>" href="<?= base_url('UserC/View/destination') ?>">Destinations</a>
                    <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Food-Stuff")?"font-weight-bold":" ";?>" href="<?= base_url('UserC/View/foodstuff') ?>">Foodstuff</a>
                    <a class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="Culture")?"font-weight-bold":" ";?>" href="<?= base_url('UserC/View/culture') ?>">Culture</a>
                </div>
                <a data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>More Info Tables<b class="caret"></b></p>
                </a>
            </li>
 -->

      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="All Info Table")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/all_info_table') ?>">
          <i class="nc-icon nc-paper"></i>
          <p>All Info Table</p>
        </a>
      </li>
      <!-- Admin's Profile -->
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="Users")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/users') ?>">
          <i class="nc-icon nc-single-02"></i>
          <p>Admin Profile</p>
        </a>
      </li>
      <li class="nav-item <?=(basename($_SERVER['PHP_SELF'])=="logs")?"active":" ";?>">
        <a href="<?= base_url('UserC/View/logs') ?>">
          <i class="nc-icon nc-single-02"></i>
          <p>Logs</p>
        </a>
      </li>

    </ul>
  </div>
</div>