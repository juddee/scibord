<header>
        <div class="flex align-items-center justify-content-between container">
            <h1><a href="<?php echo base_url(); ?>">Scibord</a></h1>
            <img src="assests/icons/menu.svg" alt="icon" class="toggle-btn">
            <nav class="flex align-items-center d-none navbar">
                <a href="<?php echo base_url(); ?>"  class="<?php if($active_navbar =='programs'){ echo "btn1"; } ?>">Programs</a>
                <a href="#" class="<?php if($active_navbar =='community'){ echo "btn1"; } ?>">Communities</a>
                <img src="assests/icons/close-svgrepo-com.svg" alt="icon" class="closebtn toggle-btn">
            </nav>
        </div>
    </header>