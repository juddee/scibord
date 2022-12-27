<div class="flex align-items-center filter-sec">
    <div class="flex align-items-center filter-btn" id="category-btn">
        <span>Category</span>
        <img src="assests/icons/inverted-triangle-svgrepo-com.svg" alt="icon">
        <div class="cat-option d-none">
            <?php
                $categories = $this->Category_models->get_category()->result_array();
                if(!empty($categories)):
                    foreach($categories as $row):
            ?>
            <a href="?cat=<?php echo $row['slug']; ?>"><?php echo $row['name']; ?></a>
            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>
    <!-- <div class="flex align-items-center filter-btn" id="filter-btn">
        <img src="assests/icons/slider.svg" alt="">
        <span>filter</span>
    </div> -->

</div>