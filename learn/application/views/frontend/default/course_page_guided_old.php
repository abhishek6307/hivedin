<?php
$controller=$this->session->userdata('reg_type');
if($this->session->userdata('user_login')!=true)
$controller="home";
$course_details = $this->crud_model->get_course_by_id_guided($course_id)->row_array();
var_dump($course_details);
exit;
$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
$institute = json_decode($course_details['institution_name']);
$position = json_decode($course_details['position']);
$experience = json_decode($course_details['experience']);

$data1= $this->crud_model->config_details();
$wo['config'] = array();
foreach($data1 as $val){
     $wo['config'][$val['name']]  = $val['value'];
}

?>

<!-- style added by bhargavi-->

<style>
/* suraj d for label tag on course*/
.topleft {
position: absolute;
top:0px;
left:0px;
    box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);
    font-size: 15px;
    font-weight:700;
   /* border-radius: 50px;*/
    background: #f4c150 !important;
   
    padding: 3px 15px;
    width: auto;
    height: 30px;
    color: black !important;
    margin-bottom: 5px;
        
    
}
.experience-box .experience-title {
    display: block;
    font-size: 22px;
    font-weight: 600;
    margin: 0 0 20px;
}

.second-footer{ /* for footer*/

   /* display: none;*/
}

.newsec {

     background-color:white;
         width: 100%;
}

.mb-3, .my-3 {
    margin-bottom: 1rem!important;
    padding-left: -10px;
    margin-left: -2%;
    
}

 .already_purchased a {
     
     background-color: #563271 !important;
    border-color: #563271 !important;
    color:  white !important;
     line-height: 1.35135;
    font-weight: 600;
 }

.btn {
    border-radius: 21px;
    background-color: #f5ede0 !important;
    border-color: #563271 !important;
    color:  #563271 !important;
    line-height: 1.35135;
    font-weight: 600;
    display: inline-block;

}
.container {
    height:15%;
}
section.course-header-area {
    background-color: #29303b;
    height: 12%;

    color: #fff;
    padding: 0;
}

.course-sidebar {
   margin-top: 21px;
}
.course_edit {
     margin-top: 21px;
}

/*.side {*/
/*    padding-left: 30px;*/
/*    padding-right:0px;*/
/*    margin-left:0px;*/
/*    padding-top: 40px;*/
/*}*/

@media (min-width: 768px)
{
.col-md-9 {
   padding-top: 5%;
    padding-right: 5%; 
  }
  
  .col-md-3 {
     padding-left: 3%;
    max-width: 19%;
}
}

.student-feedback-box {
    margin: 50px 0;
    width: 147%;
}

.description-box {
    max-height: max-content;
}
.compare-box{
    max-height: max-content;
}
.about-instructor-details{
   max-height: max-content; 
}
.course-badge{
    margin-right: 15px;
}
.live_limit_area {
    margin-top: 40px;
}
.live_limit {
    font-size: 22px;
    font-weight: 600;
    margin: 0 0 10px;
}
/*from here bhargavi*/
.post-options li > a,.post-options li > div, .post-privacy-options li > div {
    font-family: 'Noto Sans';
    color: #525252;
    font-size: 13px;
    font-weight: 600;
    padding: 6.8px 22px !important;
}
 .post-options li > a:hover, .post-options li > div:hover, .post-privacy-options li > div:hover {
    color: #000;
    background: #FDE7A2;
}
#time-desk {
    padding-top: 25px;
}
.item-rating, .enrolled-student{
    padding-right: 20px;
}
.btnbg{
       background-color: #EFE8DE !important;
}
@media (min-width: 600px){
.newsec {
    display: flex;
}

}
@media(min-width: 768px){
    .second-footer {
    margin-left: 55%;
}
}
@media(min-width:600px){
    .mob{
        display:none;
    }
}
@media(max-width:600px){
    .web{
        display:none;
    }
}
</style>
<div class="content-container container" style="width:100%; max-width:95.5%;">
<div class="row chagn">
<!--<div class="col-md-3 side" style="float:left;background-color: #f5ede0;margin-top:20px;margin-left: 3%;">-->
<div class="col-md-2 side" style="float:left;background-color: #f5ede0;margin-top:0px;position:fixed">
    <?php	//if ($this->session->userdata('user_login')) { ?>
    <div>
      <?php include 'left_sidebar_learn.php'; ?>
    </div>
    <?php //} ?>
</div>

<!--<div class="col-md-9 padd" style="margin-left:1%;margin-right:2%">-->
<div class="col-md-12 padd" style="float:left;background-color: #EFE8DE;;margin-top:25px;margin-left:auto">
    
    <div class="col-lg-12 filter-area">
                <div class="course_type_filter mb-3">
                   <!-- <button type="button" class="btn btn-sm allcourses btnbg allCrse <?php if($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all' && $enrolled == 0) echo 'active' ?>" onclick="getAll()">
                              <?php if($course_details['mode'] == 'guided'){ echo "All Guided Learning";} else { echo "All Industry & Mentors"; } ?>  
                    </button>
                    
                     <button type="button" class="btn btn-sm allcourses btnbg enr <?php if($enrolled == 1) echo 'active' ?>" onclick="getEnrolled() ">
                                Enrolled
                    </button>-->
                    <?php if($user_details['is_guided_learning'] == 0 && $user_details['is_service'] == 0 && $user_details['is_mentor'] == 0){ ?>
                    <!--<button type="button" class="btn btn-sm allcourses apply_to_id" id="<?php echo ($user_details['is_instructor'])?"1":"0"?>" onclick="getUploaded(this.id)">
                            <?php if($course_details['mode'] == 'guided'){ ?>
                              <?php if($user_details['is_instructor']) echo "Uploaded Courses"; else  echo "+ Apply to be a Trainer";  ?>  
                              <?php } else { ?>
                                    <?php if($user_details['is_instructor']) echo "Uploaded Courses"; else  echo "+ Apply to be a Mentor";  ?>  
                              <?php } ?>
                    </button>-->
                    <?php } ?>
                </div>
     </div>            
    
 <!--<section class="newsec">  -->
    
<!--<section class="course-header-area" style="height:300px">

  <div style="width:100%;height:100%;">
     <img src="https://img.freepik.com/free-vector/abstract-technology-particle-background_52683-25766.jpg?size=626&ext=jpg" alt="Norway"
       style="float:left;width:100%;height:100%;object-fit:cover;">
    <div class="row align-items-end">
      <div class="col-lg-8">-->
        <!--<div class="course-header-wrap">
          <h1 class="title"><?php echo $course_details['title']; ?></h1>
          <p class="subtitle"><?php echo $course_details['short_description']; ?></p>
          <div class="rating-row">
            <span class="course-badge best-seller"><?php echo ucfirst($course_details['level']); ?></span>
            <?php
            $total_rating =  $this->crud_model->get_ratings( 'course', $course_details['id'],$course_details['mode'], true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings('course',$course_details['id'], $course_details['mode'] )->num_rows();
            if ($number_of_ratings > 0) {
              $average_ceil_rating = ceil($total_rating / $number_of_ratings);
            }else {
              $average_ceil_rating = 0;
            }

            for($i = 1; $i < 6; $i++):?>
            <?php if ($i <= $average_ceil_rating): ?>
              <i class="fas fa-star filled" style="color: #f5c85b;"></i>
            <?php else: ?>
              <i class="fas fa-star"></i>
            <?php endif; ?>
          <?php endfor; ?>
          <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span><span>(<?php echo $number_of_ratings.' '.site_phrase('ratings'); ?>)</span>
          <span class="enrolled-num">
            <?php
            $number_of_enrolments = $this->crud_model->enrol_history($course_details['id'],$course_details['mode'])->num_rows();
            echo $number_of_enrolments.' '.site_phrase('students_enrolled');
            ?>
          </span>
        </div>
        <div class="created-row">
          <span class="created-by">
            <?php echo site_phrase('created_by'); ?>
            <a href="<?php echo site_url('home/instructor_page/'.$course_details['user_id']); ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
          </span>
          <?php if ($course_details['last_modified'] > 0): ?>
            <span class="last-updated-date"><?php echo site_phrase('last_updated').' '.date('D, d-M-Y', $course_details['last_modified']); ?></span>
          <?php else: ?>
            <span class="last-updated-date"><?php echo site_phrase('last_updated').' '.date('D, d-M-Y', $course_details['date_added']); ?></span>
          <?php endif; ?>
          <span class="comment"><i class="fas fa-comment"></i><?php echo ucfirst($course_details['language']); ?></span>
        </div>
      </div>-->
   <!-- </div>
    <div class="col-lg-4">

    </div>
  </div>
</div>
</section>-->


<section class="course-content-area" >
  <div class="container" style="width:100%; max-width:100%;">
    <div class="row">
        <div class="newsec">
      <div class="col-lg-8">
    <!--below lines are added by bhargavi-->
         <div class="course_edit">
             
        <!--  <h1 class="title"><?php echo $course_details['title']; ?></h1>-->
        <!-- by suraj d course image left side-->
          <p class="subtitle"><?php echo $course_details['short_description']; ?></p>
          <div class="rating-row">
              <div class="course-sidebar natural">
    <?php if ($course_details['video_url'] != ""){ ?>
      <div class="preview-video-box">
        <a data-toggle="modal" data-target="#CoursePreviewModal">
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!-- suraj d to add listing on course -->
                     <?php if(!empty($course_details['listing'])){?>
                     <div class="topleft"><?php echo $course_details['listing']; ?>
                     <i class="fa fa-crown" style="font-size:16px;color:"></i>
                     </div>
                     <?php } ?>
          <span class="preview-text"><?php echo site_phrase('preview_this_course'); ?></span>
          <span class="play-btn"></span>
        </a>
      </div>
    <?php } else { ?>
    <div class="preview-video-boxx">
        
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!-- suraj d to add listing on course -->
                     <?php if(!empty($course_details['listing'])){?>
                     <div class="topleft"><?php echo $course_details['listing']; ?>
                     <i class="fa fa-crown" style="font-size:16px;color:"></i>
                     </div>
                     <?php } ?>
          <!--<span class="preview-text"><?php //echo site_phrase('preview_this_course'); ?></span>-->
          <span class="play-btn"></span>
       
      </div>
    <?php } ?>
    <!-- end by suraj -->
  </div>
            <h5 class="title"><?php echo $course_details['title']; ?></h5>
            <span class="course-badge best-seller"><?php echo ucfirst($course_details['level']); ?> <?php  echo " "; ?> </span>
            <?php
            $total_rating =  $this->crud_model->get_ratings('course' ,$course_details['id'],  $course_details['mode'],true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings('course',  $course_details['id'],$course_details['mode'])->num_rows();
            if ($number_of_ratings > 0) {
              $average_ceil_rating = ceil($total_rating / $number_of_ratings);
            }else {
              $average_ceil_rating = 0;
            }

            for($i = 1; $i < 6; $i++):?>
            <?php if ($i <= $average_ceil_rating): ?>
              <i class="fas fa-star filled" style="color: #f5c85b;"></i>
            <?php else: ?>
              <i class="fas fa-star"></i>
            <?php endif; ?>
          <?php endfor; ?>
          <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span><span><?php echo " "; ?> (<?php echo $number_of_ratings.' '.site_phrase('ratings'); ?>)</span>
          <!--<span class="enrolled-num" style="margin-left:15px">
            <?php
            $number_of_enrolments = $this->crud_model->enrol_history($course_details['id'],$course_details['mode'])->num_rows();
            echo $number_of_enrolments.' '.site_phrase('students_enrolled');
            ?>
          </span>-->
        </div>
        <div class="created-row">
            <div>
            <span class="enrolled-num" style="">
            <?php
            $number_of_enrolments = $this->crud_model->enrol_history($course_details['id'],$course_details['mode'])->num_rows();
            echo $number_of_enrolments.' '.site_phrase('learners_enrolled');
            ?>
          </span>
          
          </div>
          <div>
             <span class="created-by" style="">
            <?php echo site_phrase('created_by'); ?>
            <?php 	if ($this->session->userdata('user_login')) { ?>
            <a href="<?php echo site_url('home/instructor_page/'.$course_details['user_id']); ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
            <?php } else { ?>
             <a href="# "><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
            <?php } ?>
          </span> 
          </div>
          <?php if ($course_details['last_modified'] > 0): ?>
            <span class="last-updated-date" style="margin-right: 15px;"><?php echo site_phrase('last_updated').' '.date('D, d-M-Y', $course_details['last_modified']); ?></span>
          <?php else: ?>
            <span class="last-updated-date"><?php echo site_phrase('last_updated').' '.date('D, d-M-Y', $course_details['date_added']); ?></span>
          <?php endif; ?>
          <span class="comment"><i class="fas fa-comment"></i><?php echo ucfirst($course_details['language']); ?></span>
        </div>
         <!--<span class="live_limit"> <?php echo "Live class limit:" . ' ' . $course_details['live_limit'];  ?></span>-->
        <div>
            
        </div>
      </div>
      <div class="live_limit_area">
          <div class="live_limit"><?php echo "Live class limit:" . ' ' . $course_details['live_limit'];  ?></div>
      </div>
      <!--for mobile-->
      <div class="col-lg-4 mob">
    <?php 	if ($this->session->userdata('user_login')) { ?>
     <!--<div class="btn btn-default stat-item" style="margin-left:150px;margin-top:30px" title="share" onclick="Wo_SharePostOn(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
         <path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z"></path>
      </svg>-->
      <div class=" btn btn-default stat-item dropdown"  style="margin-left:100px;margin-top:30px">
      <div class=" " data-toggle="dropdown" role="button" aria-expanded="false" title="<?php echo 'share' ?>" >
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="animation: none;">
         <path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z"></path>
      </svg>
      </div>
     <ul class="dropdown-menu post-privacy-menu post-options" role="button">
     <!--<li>
       <div class="pointer"  onclick="Wo_SharePostOn(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')">share</div>
     </li>-->
     <li>
       <div class="pointer" onclick="Wo_ShareTimeline(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')"><?php //echo $wo['lang']['edit_offer'];?> share to Timeline</div>
     </li>
     <!--<li>
       <div class="pointer" onclick="Wo_ShareChat(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')"><?php //echo $wo['lang']['edit_offer'];?> share to chat</div>
     </li>
     <li>
       <div class="pointer" onclick="Wo_ShareGroupPage(<?php echo $course_details['id']; ?>,'group');"><?php //echo $wo['lang']['edit_offer'];?> share to group</div>
     </li>
     <li>
       <div class="pointer" onclick="Wo_ShareGroupPage(<?php echo $course_details['id']; ?>,'page');"><?php //echo $wo['lang']['edit_offer'];?> share to page</div>
     </li>-->
     <li>
       <div class="pointer" onclick="Wo_ShareCopylink('<?php echo site_url('home/course_guided/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id'])//$course_details['url']; ?>');"><?php //echo $wo['lang']['edit_offer'];?> copy link</div>
     </li>
     </ul>
   </div>
   
   

    <?php } ?>
    
  <div class="course-sidebar natural">
    <?php if ($course_details['video_url'] != ""){ ?>
      <div class="preview-video-box">
        <a data-toggle="modal" data-target="#CoursePreviewModal">
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <span class="preview-text"><?php echo site_phrase('preview_this_course'); ?></span>
          <span class="play-btn"></span>
        </a>
      </div>
    <?php } else { ?>
    <div class="preview-video-boxx">
        
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!--<span class="preview-text"><?php //echo site_phrase('preview_this_course'); ?></span>-->
          <span class="play-btn"></span>
       
      </div>
    <?php } ?>
    <div class="course-sidebar-text-box">
      <div class="price">
        <?php if ($course_details['is_free_course'] == 1): ?>
          <span class = "current-price"><span class="current-price"><?php echo site_phrase('free'); ?></span></span>
        <?php else: ?>
          <?php if ($course_details['discount_flag'] == 1): ?>
            <span class = "current-price"><span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span></span>
            <span class="original-price"><?php echo currency($course_details['price']) ?></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['discounted_price']); ?>">
          <?php else: ?>
            <span class = "current-price"><span class="current-price"><?php echo currency($course_details['price']); ?></span></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['price']); ?>">
          <?php endif; ?>
        <?php endif; ?>
      </div>

      <?php if(is_purchased($course_details['id'], $course_details['mode'])) :?>
        <div class="already_purchased">
          <a  href="<?php echo site_url('home/my_courses'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
        </div>
         <!-- SEND MESSAGE MODAL by NK-->
        <div class="already_purchased">
            <a data-toggle="modal" data-target="#MsgOwnr"><?php echo site_phrase('message'); ?></a>
        </div>
         <!--end by NK -->
      <?php else: ?>
     
          <!-- WISHLIST BUTTON -->
          <div class="buy-btns">
              <button class="btn btn-add-wishlist <?php echo $this->crud_model->is_added_to_wishlist($course_details['id']."_".$course_details['mode']) ? 'active' : ''; ?>" type="button" id = "<?php echo $course_details['id']."_".$course_details['mode']; ?>" onclick="handleAddToWishlist(this)">
                  <?php
                    if($this->crud_model->is_added_to_wishlist($course_details['id']."_".$course_details['mode'])){?>
                    <i class="fa fa-bookmark" style="font-size:16px;color:#410d68"></i>
                    
                    <?php
                         echo "Bookmarked";
                         // echo site_phrase('added_to_wishlist');
                        
                    }  else{ ?>
                    <i class="far fa-bookmark" style"=font-size:16px;"></i>
                    <?php
                         echo "Bookmark";
                        // echo site_phrase('add_to_wishlist');
                      
                    }
                    ?>
              </button>
          </div>
          
        

        <?php if ($course_details['is_free_course'] == 1): ?>
          <div class="buy-btns">
            <?php if ($this->session->userdata('user_login') != 1): ?>
              <a href = "#" class="btn btn-buy-now" onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
            <?php else: ?>
              <a href = "<?php echo site_url('home/get_enrolled_to_free_course/'.$course_details['id'].'/'.$course_details['mode']); ?>" class="btn btn-buy-now"><?php echo site_phrase('get_enrolled'); ?></a>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div class="buy-btns">
            <a href = "javascript::" class="btn btn-buy-now" id = "course_<?php echo $course_details['id']; ?>" onclick="handleBuyNow(this, '<?php echo $course_details['mode']; ?>')"><?php echo site_phrase('buy_now'); ?></a>
            <?php if (in_array($course_details['id'], $this->session->userdata('cart_items'))): ?>
              <button class="btn btn-add-cart addedToCart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this, '<?php echo $course_details['mode']; ?>')"><i class="fas fa-shopping-cart"></i><?php echo " " . site_phrase('added_to_cart'); ?></button>
            <?php else: ?>
              <button class="btn btn-add-cart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this, '<?php echo $course_details['mode']; ?>')"><i class="fas fa-shopping-cart"></i><?php echo " " . site_phrase('add_to_cart'); ?></button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>


      <div class="includes">
        <div class="title"><b><?php echo site_phrase('includes'); ?>:</b></div>
        <ul>
            <?php
             $check = $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']);
            
            if( $check != "00:00:00 Hours" ){ ?>
          <li><i class="far fa-file-video"></i>
            <?php
            echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']).' '.site_phrase('on_demand_videos');
            ?>
          </li>
          <?php } ?>
          <?php if($this->crud_model->get_lessons('course', $course_details['id'], $course_details['mode'])->num_rows() != 0) { ?>
          <li><i class="far fa-file"></i><?php echo $this->crud_model->get_lessons('course', $course_details['id'], $course_details['mode'])->num_rows().' '.site_phrase('lessons'); ?></li>
          <?php } ?>
         <!-- <li><i class="far fa-compass"></i><?php echo site_phrase('full_lifetime_access'); ?></li> by bhargavi-->
          <!--<li><i class="fas fa-mobile-alt"></i><?php// echo site_phrase('access_on_mobile_and_tv'); ?></li>-->
        </ul>
      </div>
    </div>
  </div>
</div>
      
      <!-- <div class="description-box view-more-parent"> bhargavi-->
        <div class="description-box ">
      <!--<div class="view-more" onclick="viewMore(this,'hide')">+ <?php echo site_phrase('view_more'); ?></div>-->
      <?php if($course_details['mode'] == 'guided') {  ?>
      <div class="description-title"><?php echo site_phrase('description'); ?></div>
      <?php } else {?>
      <div class="description-title">Industry /Area of Expertise</div>
      <?php } ?>
      <div class="description-content-wrap">
        <div class="description-content">
          <?php echo $course_details['description']; ?>
        </div>
      </div>
    </div>
      
                   <!-- above lines are added by bhargavi-->

        <div class="what-you-get-box">
          <div class="what-you-get-title"><?php //echo site_phrase('what_will_i_learn'); ?>What will I learn?</div>
          <ul class="what-you-get__items">
            <?php foreach (json_decode($course_details['outcomes']) as $outcome): ?>
              <?php if ($outcome != ""): ?>
                <li><?php echo $outcome; ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <br>
        
        <div class="course-curriculum-box">
            <?php if($course_details['mode'] != "guided" && $course_details['mode'] != "mentor") {?>
          <div class="course-curriculum-title clearfix">
            <div class="title float-left"><?php echo site_phrase('curriculum_for_this_course'); ?></div>
            <div class="float-right">
              <span class="total-lectures">
                <?php echo $this->crud_model->get_lessons( 'course', $course_details['id'], $course_details['mode'])->num_rows().' '.site_phrase('lessons'); ?>
              </span>
              <span class="total-time float-left">
                <?php
                echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']);
                
                ?>
              </span>
            </div>
          </div>
          <div class="course-curriculum-accordion">
            <?php
            $sections = $this->crud_model->get_section( 'course', $course_id, $course_details['mode'])->result_array();
            $counter = 0;
            foreach ($sections as $section): ?>
            <div class="lecture-group-wrapper">
              <div class="lecture-group-title clearfix" data-toggle="collapse" data-target="#collapse<?php echo $section['id']; ?>" aria-expanded="<?php if($counter == 0) echo 'true'; else echo 'false' ; ?>">
                <div class="title float-left">
                  <?php  echo $section['title']; ?>
                </div>
                <div class="float-right">
                  <span class="total-lectures">
                    <?php echo $this->crud_model->get_lessons('section', $section['id'], $course_details['mode'])->num_rows().' '.site_phrase('lessons'); ?>
                  </span>
                  <span class="total-time">
                    <?php echo $this->crud_model->get_total_duration_of_lesson_by_section_id($section['id']); ?>
                  </span>
                </div>
              </div>

              <div id="collapse<?php echo $section['id']; ?>" class="lecture-list collapse <?php if($counter == 0) echo 'show'; ?>">
                <ul>
                  <?php $lessons = $this->crud_model->get_lessons('section', $section['id'], $course_details['mode'])->result_array();
                  foreach ($lessons as $lesson):?>
                  <li class="lecture has-preview">
                    <span class="lecture-title"><?php echo $lesson['title']; ?></span>
                    <span class="lecture-time"><?php echo $lesson['duration']; ?></span>
                    <!-- <span class="lecture-preview float-right" data-toggle="modal" data-target="#CoursePreviewModal">Preview</span> -->
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <?php
          $counter++;
        endforeach; ?>
      </div>
       <?php } ?>
    </div>
      
    <div class="requirements-box">
      <div class="requirements-title"><?php echo site_phrase('requirements'); ?></div>
      <div class="requirements-content">
        <ul class="requirements__list">
          <?php foreach (json_decode($course_details['requirements']) as $requirement): ?>
            <?php if ($requirement != ""): ?>
              <li><?php echo $requirement; ?></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
   


    <!--<div class="compare-box view-more-parent"> bhargavi-->
     <!--<div class="view-more" onclick="viewMore(this)">+ <?php echo site_phrase('view_more'); ?></div>-->
    <!--<div class="compare-box">
      <div class="compare-title"><?php echo site_phrase('other_related_courses'); ?></div>
      <div class="compare-courses-wrap">
        <?php
        $this->db->limit(5);
        $other_realted_courses = $this->crud_model->get_courses($course_details['category_id'], $course_details['sub_category_id'])->result_array();
        foreach ($other_realted_courses as $other_realted_course):
          if($other_realted_course['id'] != $course_details['id'] && $other_realted_course['status'] == 'active'): ?>
          <div class="course-comparism-item-container this-course">
            <div class="course-comparism-item clearfix">
              <div class="item-image float-left" id="time-desk">
                <a href="<?php echo site_url($controller.'/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><img src="<?php $this->crud_model->get_course_thumbnail_url($other_realted_course['id']); ?>" alt="" class="img-fluid"></a>
                <div class="item-duration"><b><?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($other_realted_course['id']); ?></b></div>
              </div>
              <div class="item-title float-left">
                <div class="title"><a href="<?php echo site_url($controller.'/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><?php echo $other_realted_course['title']; ?></a></div>
                <?php if ($other_realted_course['last_modified'] > 0): ?>
                  <div class="updated-time"><?php echo site_phrase('updated').' '.date('D, d-M-Y', $other_realted_course['last_modified']); ?></div>
                <?php else: ?>
                  <div class="updated-time"><?php echo site_phrase('updated').' '.date('D, d-M-Y', $other_realted_course['date_added']); ?></div>
                <?php endif; ?>
              </div>
              <div class="item-details float-left">
                <span class="item-rating">
                  <i class="fas fa-star"></i>
                  <?php
                  $total_rating =  $this->crud_model->get_ratings('course',$other_realted_course['id'],$other_realted_course['mode'], true)->row()->rating;
                  $number_of_ratings = $this->crud_model->get_ratings( 'course',$other_realted_course['id'],$other_realted_course['mode'])->num_rows();
                  if ($number_of_ratings > 0) {
                    $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                  }else {
                    $average_ceil_rating = 0;
                  }
                  ?>
                  <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                </span>
                <span class="enrolled-student">
                  <i class="far fa-user"></i>
                  <?php echo $this->crud_model->enrol_history($other_realted_course['id'],$other_realted_course['mode'])->num_rows(); ?>
                </span>
                <?php if ($other_realted_course['is_free_course'] == 1): ?>
                  <span class="item-price">
                    <span class="current-price"><?php echo site_phrase('free'); ?></span>
                  </span>
                <?php else: ?>
                  <?php if ($other_realted_course['discount_flag'] == 1): ?>
                    <span class="item-price">
                      <span class="original-price"><?php echo currency($other_realted_course['price']); ?></span>
                      <span class="current-price"><?php echo currency($other_realted_course['discounted_price']); ?></span>
                    </span>
                  <?php else: ?>
                    <span class="item-price">
                      <span class="current-price"><?php echo currency($other_realted_course['price']); ?></span>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <div class="item-image float-left" id="time-mobile">
                <a href="<?php echo site_url($controller.'/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><img src="<?php $this->crud_model->get_course_thumbnail_url($other_realted_course['id']); ?>" alt="" class="img-fluid"></a>
                <div class="item-duration"><b><?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($other_realted_course['id']); ?></b></div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>-->

  <div class="about-instructor-box">
    <div class="about-instructor-title">
      <?php if($course_details['mode'] == "guided"){ ?>
      <?php echo site_phrase('about_the_instructor'); ?>
      <?php }else{ 
        echo "About the Mentor";
      } ?>
      
      
    </div>
    <div class="row">
      <div class="col-lg-4">
          
          
        <div class="about-instructor-image">
          <img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" class="img-fluid">
          <ul>
            <!-- <li><i class="fas fa-star"></i><b>4.4</b> Average Rating</li> -->
            <!--<li><i class="fas fa-comment"></i><b>
                
              <?php //echo $this->crud_model->get_instructor_wise_course_ratings($instructor_details['id'])->num_rows(); ?>
            </b> <?php //echo site_phrase('reviews'); ?></li>-->
           <!-- <li><i class="fas fa-user"></i><b>
              <?php
              /*$course_ids = $this->crud_model->get_instructor_wise_courses($instructor_details['id'], 'simple_array');
              $this->db->select('user_id');
              $this->db->distinct();
              $this->db->where_in('course_id', $course_ids);
               $this->db->where_in('mode', $course_details['mode']);
              echo $this->db->get('enrol')->num_rows();*/
              ?>
            </b> <?php //echo site_phrase('learners') ?></li>
            <li><i class="fas fa-play-circle"></i><b>
              <?php //echo $this->crud_model->get_instructor_wise_courses($instructor_details['id'])->num_rows(); ?>
            </b> <?php //echo site_phrase('courses'); ?></li>-->
          </ul>
        </div>
      </div>
      <div class="col-lg-8">
    <!--<div class="about-instructor-details view-more-parent">-->
        <div class="about-instructor-details">
          <!--<div class="view-more" onclick="viewMore(this)">+ <?php echo site_phrase('view_more'); ?></div>-->
          <div class="instructor-name">
             <?php 	if ($this->session->userdata('user_login')) { ?>
            <a href="<?php echo site_url($controller.'/instructor_page/'.$course_details['user_id']); ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
            <?php } else { ?>
             <a href="# "><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
            <?php } ?>
          </div>
          <div class="instructor-title">
            <?php echo $instructor_details['title']; ?>
          </div>
          <div class="instructor-bio">
            <?php echo $instructor_details['biography']; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--start by bharagvi-->
  
  <div class="experience-box">
      <div class="experience-title">
          <?php echo "Experience"; ?>
      </div>
      <?php if (count(json_decode($course_details['institution_name'])) > 0 || count(json_decode($course_details['experience'])) > 0 || count(json_decode($course_details['position'])) > 0 ):
      foreach (json_decode($course_details['institution_name']) as $index => $value ):
      ?>
      <div class="" style="margin-bottom:30px;">
          <div>
          <span><?php echo "<strong>Institute:</strong>" . ' ' . $institute[$index]; ?></span>
          </div>
          <div>
            <?php if($experience[$index][0] == '') { $year=0;} else{ $year = $experience[$index][0];  }?> 
            <?php if($experience[$index][1] == '') { $month=0;} else{ $month = $experience[$index][1];  }?>
            
          <span><?php echo "<strong>Experience:</strong>". ' '. $year .' ' .'years'. ' ' . $month . ' ' . 'months'; ?></span>
          </div>
          <div>
          <span><?php echo "<strong>Position:</strong>" . ' ' . $position[$index]; ?></span>
          </div>
      </div>
      <?php endforeach;?>
      <?php endif;?>
  </div>
  
  <!--end by bharagvi-->

  <div class="student-feedback-box">
    <div class="student-feedback-title">
      <!--<?php //echo site_phrase('student_feedback'); ?>   commented by bhargavi -->
       Feedback
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="average-rating">
          <div class="num">
            <?php
            $total_rating =  $this->crud_model->get_ratings( 'course', $course_details['id'],$course_details['mode'], true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings( 'course', $course_details['id'],$course_details['mode'])->num_rows();
            if ($number_of_ratings > 0) {
              $average_ceil_rating = ceil($total_rating / $number_of_ratings);
            }else {
              $average_ceil_rating = 0;
            }
            echo $average_ceil_rating;
            ?>
          </div>
          <div class="rating">
            <?php for($i = 1; $i < 6; $i++):?>
              <?php if ($i <= $average_ceil_rating): ?>
                <i class="fas fa-star filled" style="color: #f5c85b;"></i>
              <?php else: ?>
                <i class="fas fa-star" style="color: #abb0bb;"></i>
              <?php endif; ?>
           <?php endfor; ?>
        </div>
        <div class="title"><?php echo site_phrase('average_rating'); ?></div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="individual-rating">
        <ul>
          <?php for($i = 1; $i <= 5; $i++): ?>
            <li>
              <div class="progress" style="width:40%">
                <div class="progress-bar" style="width: <?php echo $this->crud_model->get_percentage_of_specific_rating($i, 'course', $course_id); ?>%"></div>
              </div>
              <div>
                <span class="rating" style="width:100%">
                  <?php for($j = 1; $j <= (5-$i); $j++): ?>
                    <i class="fas fa-star"></i>
                  <?php endfor; ?>
                  <?php for($j = 1; $j <= $i; $j++): ?>
                    <i class="fas fa-star filled"></i>
                  <?php endfor; ?>

                </span>
                <span><?php echo $this->crud_model->get_percentage_of_specific_rating($i, 'course', $course_id); ?>%</span>
              </div>
            </li>
          <?php endfor; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="reviews">
    <div class="reviews-title"><?php echo site_phrase('reviews'); ?></div>
    <ul>
      <?php
      $ratings = $this->crud_model->get_ratings( 'course', $course_id,$course_details['mode'])->result_array();
      foreach($ratings as $rating):
        ?>
        <li>
          <div class="row">
            <div class="col-lg-4">
                
          
              <div class="reviewer-details clearfix">
                <div class="reviewer-img float-left">
                  <img src="<?php echo $this->user_model->get_user_image_url($rating['user_id']); ?>" alt="">
                </div>
                <div class="review-time">
                  <div class="time">
                    <?php echo date('D, d-M-Y', $rating['date_added']); ?>
                  </div>
                  <div class="reviewer-name">
                    <?php
                    $user_details = $this->user_model->get_user($rating['user_id'])->row_array(); ?>
                    <a href="<?php echo site_url('..'); ?>/<?php  echo $user_details['username'];
                    ?>">
                   <?php  echo $user_details['first_name'].' '.$user_details['last_name'];   ?>
                     </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="review-details">
                <div class="rating">
                  <?php
                  for($i = 1; $i < 6; $i++):?>
                  <?php if ($i <= $rating['rating']): ?>
                    <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                  <?php else: ?>
                    <i class="fas fa-star" style="color: #abb0bb;"></i>
                  <?php endif; ?>
                <?php endfor; ?>
              </div>
              <div class="review-text">
                <?php echo $rating['review']; ?>
              </div>
            </div>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
</div>
</div>
<div class="col-lg-4 web">
    <?php 	if ($this->session->userdata('user_login')) { ?>
     <!--<div class="btn btn-default stat-item" style="margin-left:150px;margin-top:30px" title="share" onclick="Wo_SharePostOn(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
         <path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z"></path>
      </svg>-->
      <div class=" btn btn-default stat-item dropdown"  style="margin-left:150px;margin-top:30px">
      <div class=" " data-toggle="dropdown" role="button" aria-expanded="false" title="<?php echo 'share' ?>" >
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="animation: none;">
         <path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z"></path>
      </svg>
      </div>
     <ul class="dropdown-menu post-privacy-menu post-options" role="button">
     <!--<li>
       <div class="pointer"  onclick="Wo_SharePostOn(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')">share</div>
     </li>-->
     <li>
       <div class="pointer" onclick="Wo_ShareTimeline(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')"><?php //echo $wo['lang']['edit_offer'];?> share to Timeline</div>
     </li>
     <!--<li>
       <div class="pointer" onclick="Wo_ShareChat(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')"><?php //echo $wo['lang']['edit_offer'];?> share to chat</div>
     </li>
     <li>
       <div class="pointer" onclick="Wo_ShareGroupPage(<?php echo $course_details['id']; ?>,'group');"><?php //echo $wo['lang']['edit_offer'];?> share to group</div>
     </li>
     <li>
       <div class="pointer" onclick="Wo_ShareGroupPage(<?php echo $course_details['id']; ?>,'page');"><?php //echo $wo['lang']['edit_offer'];?> share to page</div>
     </li>-->
     <li>
       <div class="pointer" onclick="Wo_ShareCopylink('<?php echo site_url($controller.'/course_guided/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id'])//$course_details['url']; ?>');"><?php //echo $wo['lang']['edit_offer'];?> copy link</div>
     </li>
     </ul>
   </div>
   
   

    <?php } ?>
    
 <!-- <div class="course-sidebar natural">
    <?php if ($course_details['video_url'] != ""){ ?>
      <div class="preview-video-box">
        <a data-toggle="modal" data-target="#CoursePreviewModal">
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!-- suraj d to add listing on course -->
                     <?php if(!empty($course_details['listing'])){?>
                   <!--  <div class="topleft"><?php echo $course_details['listing']; ?>
                     <i class="fa fa-crown" style="font-size:16px;color:"></i>
                     </div>
                     <?php } ?>
      <!--    <span class="preview-text"><?php echo site_phrase('preview_this_course'); ?></span>
          <span class="play-btn"></span>
        </a>
      </div>
    <?php } else { ?>
    <div class="preview-video-boxx">
        
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!-- suraj d to add listing on course -->
                     <?php if(!empty($course_details['listing'])){?>
                    <!-- <div class="topleft"><?php echo $course_details['listing']; ?>
                     <i class="fa fa-crown" style="font-size:16px;color:"></i>
                     </div>
                     <?php } ?>
          <!--<span class="preview-text"><?php //echo site_phrase('preview_this_course'); ?></span>-->
         <!-- <span class="play-btn"></span>
       
      </div>-->
    <?php } ?>
    <div class="course-sidebar-text-box">
      <div class="price">
        <?php if ($course_details['is_free_course'] == 1): ?>
          <span class = "current-price"><span class="current-price"><?php echo site_phrase('free'); ?></span></span>
        <?php else: ?>
          <?php if ($course_details['discount_flag'] == 1): ?>
            <span class = "current-price"><span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span></span>
            <span class="original-price"><?php echo currency($course_details['price']) ?></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['discounted_price']); ?>">
          <?php else: ?>
            <span class = "current-price"><span class="current-price"><?php echo currency($course_details['price']); ?></span></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['price']); ?>">
          <?php endif; ?>
        <?php endif; ?>
      </div>

      <?php if(is_purchased($course_details['id'], $course_details['mode'])) :?>
        <div class="already_purchased">
          <a  href="<?php echo site_url($controller.'/my_courses'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
        </div>
         <!-- SEND MESSAGE MODAL by NK-->
        <div class="already_purchased">
            <a data-toggle="modal" data-target="#MsgOwnr"><?php echo site_phrase('message'); ?></a>
        </div>
         <!--end by NK -->
      <?php else: ?>
     
          <!-- WISHLIST BUTTON -->
         <!-- <div class="buy-btns">
              <button class="btn btn-add-wishlist <?php echo $this->crud_model->is_added_to_wishlist($course_details['id']."_".$course_details['mode']) ? 'active' : ''; ?>" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleAddToWishlist(this)">
                  <?php
                    if($this->crud_model->is_added_to_wishlist($course_details['id'])){?>
                    <i class="fa fa-bookmark" style="font-size:16px;color:#410d68"></i>
                    
                    <?php
                         echo "Bookmarked";
                       // echo site_phrase('added_to_wishlist');
                        
                    }  else{ ?>
                    <i class="far fa-bookmark" style"=font-size:16px;"></i>
                    <?php
                         echo "Bookmark";
                       // echo site_phrase('add_to_wishlist');
                      
                    }
                    ?>
              </button>
          </div>-->
          
        <div class="buy-btns">
              <button class="btn btn-add-wishlist <?php echo $this->crud_model->is_added_to_wishlist($course_details['id']."_".$course_details['mode']) ? 'active' : ''; ?>" type="button" id = "<?php echo $course_details['id']."_".$course_details['mode']; ?>" onclick="handleAddToWishlist(this)">
                  <?php
                    if($this->crud_model->is_added_to_wishlist($course_details['id']."_".$course_details['mode'])){
                         echo "Bookmarked";
                       // echo site_phrase('added_to_wishlist');
                        
                    }  else{
                         echo "Bookmark";
                       // echo site_phrase('add_to_wishlist');
                      
                    }
                    ?>
              </button>
          </div>

        <?php if ($course_details['is_free_course'] == 1): ?>
          <div class="buy-btns">
            <?php if ($this->session->userdata('user_login') != 1): ?>
              <a href = "#" class="btn btn-buy-now" onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
            <?php else: ?>
              <a href = "<?php echo site_url($controller.'/get_enrolled_to_free_course/'.$course_details['id'].'/'.$course_details['mode']); ?>" class="btn btn-buy-now"><?php echo site_phrase('get_enrolled'); ?></a>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div class="buy-btns">
            <a href = "javascript::" class="btn btn-buy-now" id = "course_<?php echo $course_details['id']; ?>" onclick="handleBuyNow(this, '<?php echo $course_details['mode']; ?>')"><?php echo site_phrase('buy_now'); ?></a>
            <?php if (in_array($course_details['id'], $this->session->userdata('cart_items'))): ?>
              <button class="btn btn-add-cart addedToCart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this, '<?php echo $course_details['mode']; ?>')"><i class="fas fa-shopping-cart"></i><?php echo " " . site_phrase('added_to_cart'); ?></button>
            <?php else: ?>
              <button class="btn btn-add-cart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this, '<?php echo $course_details['mode']; ?>')"><i class="fas fa-shopping-cart"></i><?php echo " " . site_phrase('add_to_cart'); ?></button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>


      <div class="includes">
        <div class="title"><b><?php echo site_phrase('includes'); ?>:</b></div>
        <ul>
            <?php
             $check = $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']);
            
            if( $check != "00:00:00 Hours" ){ ?>
          <li><i class="far fa-file-video"></i>
            <?php
            echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']).' '.site_phrase('on_demand_videos');
            ?>
          </li>
          <?php } ?>
          <?php if($this->crud_model->get_lessons('course', $course_details['id'], $course_details['mode'])->num_rows() != 0) { ?>
          <li><i class="far fa-file"></i><?php echo $this->crud_model->get_lessons('course', $course_details['id'], $course_details['mode'])->num_rows().' '.site_phrase('lessons'); ?></li>
          <?php } ?>
         <!-- <li><i class="far fa-compass"></i><?php echo site_phrase('full_lifetime_access'); ?></li> by bhargavi-->
          <!--<li><i class="fas fa-mobile-alt"></i><?php// echo site_phrase('access_on_mobile_and_tv'); ?></li>-->
        </ul>
      </div>
    </div>
  </div>
</div>
 </div>
</div>
</div>
</section>


<!-- Modal -->
<?php if ($course_details['video_url'] != ""):
  $provider = "";
  $video_details = array();
  if ($course_details['course_overview_provider'] == "html5") {
    $provider = 'html5';
  }else {
    $video_details = $this->video_model->getVideoDetails($course_details['video_url']);
    $provider = $video_details['provider'];
  }
  ?>
<div class="modal fade in" id="CoursePreviewModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content course-preview-modal">
        <div class="modal-header">
          <h5 class="modal-title"><span><?php //echo site_phrase('course_preview') ?>Course Preview:</span><?php echo $course_details['title']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" onclick="pausePreview()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="course-preview-video-wrap">
            <div class="embed-responsive embed-responsive-16by9">
              <?php if (strtolower(strtolower($provider)) == 'youtube'): ?>
                <!------------- PLYR.IO ------------>
                <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">

                <div class="plyr__video-embed" id="player">
                  <iframe height="500" src="<?php echo $course_details['video_url'];?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                </div>

                <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
                <script>const player = new Plyr('#player');</script>
                <!------------- PLYR.IO ------------>
              <?php elseif (strtolower($provider) == 'vimeo'): ?>
                <!------------- PLYR.IO ------------>
                <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">
                <div class="plyr__video-embed" id="player">
                  <iframe height="500" src="https://player.vimeo.com/video/<?php echo $video_details['video_id']; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
                </div>

                <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
                <script>const player = new Plyr('#player');</script>
                <!------------- PLYR.IO ------------>
              <?php else :?>
                <!------------- PLYR.IO ------------>
                <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">
                <video poster="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']);?>" id="player" playsinline controls>
                  <?php if (get_video_extension($course_details['video_url']) == 'mp4'): ?>
                    <source src="<?php echo $course_details['video_url']; ?>" type="video/mp4">
                    <?php elseif (get_video_extension($course_details['video_url']) == 'webm'): ?>
                      <source src="<?php echo $course_details['video_url']; ?>" type="video/webm">
                      <?php else: ?>
                        <h4><?php site_phrase('video_url_is_not_supported'); ?></h4>
                      <?php endif; ?>
                    </video>

                    <style media="screen">
                    .plyr__video-wrapper {
                      height: 450px;
                    }
                    </style>

                    <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
                    <script>const player = new Plyr('#player');</script>
                    <!------------- PLYR.IO ------------>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
<!--</section>   -->  
    
    <?php endif; ?>
 
    <!-- Modal -->
    <!-- COPY LINK MODAL-->
        <div class="modal fade in" id="copy_crse_link" role="dialog">
            <div class="modal-dialog">
            
              <div class="modal-content">
                <p style="text-align: center;padding: 30px 20px;font-family: Hind,Arial;font-size: 16px;">
                  <i class="fa fa-check" aria-hidden="true" style="color: green;"></i>      
                  Link successfully copied to clipboard.
                </p>
              </div>
              
            </div>
        </div>
    <!-- END TO COPY INK MODL--> 
    
    <!--message modal-->
    <!--message modal-->
    <div class="modal fade in" id="MsgOwnr" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content course-preview-modall">
        <div class="modal-header">
          <h5 class="modal-title"><span><?php echo site_phrase('course_preview') ?>: </span><?php echo $course_details['title']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="" action="<?php echo site_url($controller.'/my_messages/send_new');?>" method="post">
               <div class="message-body">
                   <div class="form-group">
                   <input type="hidden" name="receiver" class="form-control" value="<?php echo $course_details['user_id']; ?>">
                    </div>
                  <div class="form-group">
                      <textarea name="message" class="form-control" required></textarea>
                  </div>
                     <button type="submit" class="btn send-btn">Send</button>
                      <button type="button" class="close btn send-btn" data-dismiss="modal" style="border: 2px solid #410D68;">
                       <span aria-hidden="true">Close</span>
                     </button>
                  </div>
            </form>
          
         </div>
        </div>
       </div>
     </div>


    <style media="screen">
    .embed-responsive-16by9::before {
      padding-top : 0px;
    }
    </style>
    <script type="text/javascript">
    <?php $controller=$this->session->userdata('reg_type');
if($this->session->userdata('user_login')!=true)
$controller="home";
    ?>
    function handleCartItems(elem,mode) {
     <?php 	if ($this->session->userdata('user_login')) { ?>
      url1 = '<?php echo site_url($controller.'/handleCartItems');?>';
      url2 = '<?php echo site_url($controller.'/refreshWishList');?>';
      var course_id = '';
       //ny NK
    if(mode == 'guided')
      course_id=elem.id+',g';
     else if(mode == 'mentor')
      course_id=elem.id+',m';
      
      $.ajax({
        url: url1,
        type : 'POST',
        data : {course_id : course_id},
        success: function(response)
        {
          $('#cart_items').html(response);
          if ($(elem).hasClass('addedToCart')) {
            $(elem).removeClass('addedToCart')
            $(elem).html("<i class='fas fa-shopping-cart'></i><?php echo " " . site_phrase('add_to_cart'); ?>");
          }else {
            $(elem).addClass('addedToCart')
            $(elem).html("<i class='fas fa-shopping-cart'></i><?php echo " " . site_phrase('added_to_cart'); ?>");
          }
          $.ajax({
            url: url2,
            type : 'POST',
            success: function(response)
            {
              $('#wishlist_items').html(response);
            }
          });
        }
      });
      <?php } else { ?>
         urlToRedirect = '<?php echo site_url('..'); ?>';
                window.location.replace(urlToRedirect);
     <?php } ?>
    }

    function handleBuyNow(elem, mode) {
     <?php 	if ($this->session->userdata('user_login')) { ?>
      url1 = '<?php echo site_url($controller.'/handleCartItemForBuyNowButton');?>';
      url2 = '<?php echo site_url($controller.'/refreshWishList');?>';
      urlToRedirect = '<?php echo site_url($controller.'/shopping_cart'); ?>';
      var explodedArray = elem.id.split("_");
      var course_id = explodedArray[1];
    //ny NK
    if(mode == 'guided')
      course_id+=',g';
     else if(mode == 'mentor')
      course_id+=',m';
      
      $.ajax({
        url: url1,
        type : 'POST',
        data : {course_id : course_id},
        success: function(response)
        {
          $('#cart_items').html(response);
          $.ajax({
            url: url2,
            type : 'POST',
            success: function(response)
            {
              $('#wishlist_items').html(response);
              toastr.warning('<?php echo site_phrase('please_wait').'....'; ?>');
              setTimeout(
              function()
              {
                window.location.replace(urlToRedirect);
              }, 1500);
            }
          });
        }
      });
     <?php } else { ?>
         urlToRedirect = '<?php echo site_url('..'); ?>';
                window.location.replace(urlToRedirect);
     <?php } ?>
    }

    function handleEnrolledButton() {
     <?php 	if ($this->session->userdata('user_login')) { ?>
      $.ajax({
        url: '<?php echo site_url($controller.'/isLoggedIn');?>',
        success: function(response)
        {
          if (!response) {
            window.location.replace("<?php echo site_url('login'); ?>");
          }
        }
      });
      
      <?php } else { ?>
         urlToRedirect = '<?php echo site_url('..'); ?>';
                window.location.replace(urlToRedirect);
     <?php } ?>
    }

    function handleAddToWishlist(elem) {
         <?php 	if ($this->session->userdata('user_login')) { ?>
        $.ajax({
            url: '<?php echo site_url($controller.'/handleWishList');?>',
            type : 'POST',
            data : {course_id : elem.id},
            success: function(response)
            {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active');
                        $(elem).html("<i class='far fa-bookmark'></i><?php echo " " . "Bookmark"; ?>"); 
                        //site_phrase('add_to_wishlist');
                    }else {
                        $(elem).addClass('active');
                        $(elem).html("<i class='fa fa-bookmark' style='font-size:16px;color:#410d68'></i><?php echo " " . "Bookmarked"; ?>");
                        //site_phrase('added_to_wishlist');
                    }
                    $('#wishlist_items').html(response);
                }
            }
        });
        <?php } else { ?>
         urlToRedirect = '<?php echo site_url('..'); ?>';
                window.location.replace(urlToRedirect);
     <?php } ?>
    }

    function pausePreview() {
      player.pause();
    }
    
    
    function getAll(){
    <?php 	if ($this->session->userdata('user_login')) {
        if($course_details['mode'] == "guided" ){?>
        $(".allCrse").addClass('active');
         window.location.replace('<?php echo site_url($controller.'/guided_learning'); ?>');
         <?php } else { ?>
                 $(".allCrse").addClass('active');
              window.location.replace('<?php echo site_url($controller.'/mentor'); ?>');
            <?php } ?>
         
     <?php } else { ?>
         urlToRedirect = '<?php echo site_url('..'); ?>';
                window.location.replace(urlToRedirect);
     <?php } ?>
}

    function getEnrolled(){
    <?php 	if ($this->session->userdata('user_login')) { 
           if($course_details['mode'] == 'guided'){
        ?>
        window.location.replace('<?php echo site_url($controller.'/guided_learning?enrolled=1'); ?>');
        <?php } else { ?>
           window.location.replace('<?php echo site_url($controller.'/mentor?enrolled=1'); ?>');
     <?php } } else { ?>
         urlToRedirect = '<?php echo site_url('..'); ?>';
                window.location.replace(urlToRedirect);
     <?php } ?>
}

    function getUploaded(id){
        <?php 	if ($this->session->userdata('user_login')) { ?>
       
            if(id==0){
                 window.location.replace('<?php echo site_url('user'); ?>');
            }else{
               
                 window.location.replace('<?php echo site_url('user/courses'); ?>');
            }
         <?php } else { ?>
             urlToRedirect = '<?php echo site_url('..'); ?>';
                    window.location.replace(urlToRedirect);
         <?php } ?>
    }
    function Wo_SharePostOn(course_id, owner_id,type){

      if (!course_id) {
        return false;
      }
      
       $('#share_post_modal').modal('hide');
        //$('#share_post_modal').remove();
        
            $('#SearchForInputPostId').val(course_id);
            $('#SearchForInputTypeId').val(owner_id);
            $('#share_post_modal').modal('show');
          
        
    }
    
    
  
    
    function Wo_ShareTimeline(course_id,owner_id,type){
       //type = $('#SearchForInputType').val();
      post_id = course_id;
      type_id = owner_id;
       
      self = this;
      $(this).text('Please wait');
      $(this).attr('disabled', 'true');
        $.ajax({
          url:'<?php echo site_url('share/sharee'); ?>',
          type: 'GET',
          dataType: 'json',
          data: {f: 'share_post_on',s:type,ownr_id:type_id,course_id:post_id},
        })
        .done(function(data) {
            
          $(self).text('Share');
          $(self).removeAttr('disabled');
          if (data.status == 200) {
              $('#share_post_modal_alert').modal('show');
            
            setTimeout(function () {
                $('#share_post_modal_alert').modal('hide');
              
            },2000);
          }
          
        })
        .fail(function() {
        })
        .always(function() {
        });

    }
    
    //to show the modal
    function Wo_ShareGroupPage(id,type){
        $.ajax({
          url:'<?php echo site_url('share/share_groupPage'); ?>',
          type: 'GET',
          dataType: 'json',
          data: {s:type,id:id}
        })
        .done(function(data) {
          if (data.status == 200) {
             
              $('#userss-list').html(data.html);
              $('#postId').val(id);
              $('#shrtype').val(type);
              $('#share_to_grppag').modal('show');
          }
        })
        .fail(function() {
        })
        .always(function() {
        });
        
    } 
    
    /*by bhargavi*/
    function Wo_ShareCopylink(link){
       
        $("#copy_crse_link").modal('show');
      var text = link;
       
        var elem = document.createElement("textarea");
        document.body.appendChild(elem);
       
        elem.value = text;
        elem.select();
        elem.focus(); //SET FOCUS on the TEXTFIELD
        document.execCommand('copy');
       document.body.removeChild(elem);
   
    	setTimeout(function (argument) {
				$("#copy_crse_link").modal('hide');
			},1000);
    }
    
    </script></div>
    <?php 	if ($this->session->userdata('user_login')) { ?>
<?php include 'shareModal.php'; ?>
<?php include 'share/share_timeline.php'; ?>
<?php include 'share/share_grop.php'; ?>

<?php } ?>
