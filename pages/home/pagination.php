<!-- Page Number -->
<?php $pages = getPages($db); ?>
    <div class="row page-container con-word-space" style="margin-top: 10px; margin-bottom: 10px;">
      <div class="col-12">
        <nav>
          <ul class="pagination justify-content-center align-items-center">
          <?php if($pages['prev']){ ?>
            <a class="page-link" href="<?php echo getenv('BASE_URL');?>?page=<?php echo $pages['prev']; ?>">
              <li class="page-item">
                <span class="page-link">&laquo; Previous</span>
              </li>
            </a>
          <?php } ?>
            <?php for($i = 1; $i<= $pages['total_pages']; $i++){ ?>

            <li class="page-item pageleter-space">
              <a class="page-link <?php if($pages['current_page'] == $i) echo "active"; ?>" 
                href="<?php echo getenv('BASE_URL');?>?page=<?php echo $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>

            <?php } ?>
            <?php if($pages['next']){ ?>
              <a class="page-link" href="<?php echo getenv('BASE_URL');?>?page=<?php echo $pages['next']; ?>">
                <li class="page-item">
                  <span class="page-link">&laquo; Next</span>
                </li>
              </a>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>