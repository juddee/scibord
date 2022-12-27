<?php $this->load->view('templates/header'); ?>
<body class="home">
    <?php $this->load->view('templates/navbar'); ?>
    <!-- status-sec -->
    <section class="status-sec">
        <input type="hidden" id="active_status_bar" value="<?php echo $active_status_bar; ?>">
        <div class="container">
            <a href="<?php echo base_url(); ?>" class="live_program_btn <?php if($active_status_bar =='live'){ echo "active"; } ?> ">Live</a>
            <a href="<?php echo base_url('all-programs'); ?>" class="all_program_btn <?php if($active_status_bar =='all'){ echo "active"; } ?> ">All Programs</a>
        </div>
    </section>
    <!-- status-sec -->

    <!-- filter-sec -->

    <?php $this->load->view('templates/filter'); ?>
    

    <!-- filter-sec -->

    <section class="program-cards">
        <!-- hero -->
        <div class="hero">
            <h2>Discover free and sponsored training</h2>
            <h4>Discover over 100+ carefully curated free and sponsored tech training programs offered by different organizations in various tech tracks( web dev,Ui design,PM ,graphics,web3 e.t.c) 
            </h4>
        </div>
        <!-- hero -->
        <div class="container grid grid-col-1" id="program-cards"></div>
        <!-- skeleton -->
        <div class="grid card-skeleton d-none">
            <div class="skeleton-item card">
                <p class="skeleton-item"></p>
                <p class="skeleton-item"></p>
                <div class="skeleton-item"></div>
                <p> </p>
            </div>
            <div class="skeleton-item card">
                <p class="skeleton-item"></p>
                <p class="skeleton-item"></p>
                <div class="skeleton-item"></div>
                <p> </p>
            </div>
            <div class="skeleton-item card">
                <p class="skeleton-item"></p>
                <p class="skeleton-item"></p>
                <div class="skeleton-item"></div>
                <p> </p>
            </div>
            <div class="skeleton-item card">
                <p class="skeleton-item"></p>
                <p class="skeleton-item"></p>
                <div class="skeleton-item"></div>
                <p> </p>
            </div>
        </div>
        <!-- skeleton -->
        <div class="flex justify-content-center align-items-center load-btn">
            <button class="loadBtn">Load 20 more programs 🚀</button>
        </div>
    </section>
    
    <?php $this->load->view('templates/footer'); ?>

