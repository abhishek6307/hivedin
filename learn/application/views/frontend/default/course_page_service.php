<?php
 //echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; exit;
$course_details = $this->crud_model->get_course_by_id_services($course_id)->row_array();

//echo "<pre>";
//var_dump($course_details);
//exit;
$plans=$course_details['plansFeatures'];
$planss=explode (",", $plans);
//arjun
$pros=$course_details['pros_and_cons'];
$pross=explode (",", $pros);

//echo "<pre>";
//var_dump($planss);
//exit;

$keyword = $course_details['meta_keywords'];
$keywords = explode (",", $keyword); 
$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
$institute = json_decode($course_details['service_institute']);
$position = json_decode($course_details['position']);
$experience = json_decode($course_details['experience']);
$controller=$this->session->userdata('reg_type');
if($this->session->userdata('user_login')!=true)
$controller="home";
$data1= $this->crud_model->config_details();
$wo['config'] = array();
foreach($data1 as $val){
     $wo['config'][$val['name']]  = $val['value'];
}

?>

<!-- style added by suraj-->
<style>

/*<!--arjun-->*/
.course-preview-modal{
    max-width:60%;
}
.hiddenimgs{
    display:none;
}
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
  border-radius:5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
h2
{
    color:#410d68;
    font-size:22px;
    font-weight:700;
}
/*arjun*/
#images{
    display:block;
    background-color:#EFE8DE!important;
}
#commonFeatures {
    /*arjun*/
    width:100%;
    float:left;
    padding-top: 3em;
    margin-top: 1rem;
    margin-bottom:1rem;
}
.sumo-details-list li:before, #plans, #plans ul, #plans ul li {
    font-size: 16px;
    margin: 0;
    padding: 0;
    list-style: none!important;
    position: unset;
    background: none!important;
    position: relative;
    z-index: 99;
   
}
#plans ul li #feature_top div p {
    padding-left: 2em;
    text-indent: -.15em;
    line-height: 1.5em;
    padding-bottom: .5em;
    padding-right: 1em;
}
/*rohan*/
@media(max-width:600px){
    #plans{
        width:100%;
    }
    #commonFeatures{
        padding-top: 0em; 
     margin-top: 0rem;
    }
    .content-container{
        margin-top:-33px !important;
    }
}
/*suhail*/
#copy_crse_link{
        width:35%; 
        margin-left:500px;
    }
@media (max-width: 480px) {
    
    #copy_crse_link {
   
     width:95%;
      margin-left:2.5%;
}
}
/*suhail*/

.panel-heading.collapsed .fa-chevron-down, .panel-heading .fa-chevron-up {
    display: inline-block;
    cursor: pointer;
    color: #410d68;
    font-size: 15px;
    top: 25%;
    margin-bottom: -2px;
}
.featureCheck {
    border: none;
    float: left;
    margin: .15em .5em 0 .5em;
}
img {
    vertical-align: middle;
    border-style: none;
}
.fa, .fas {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}
.fa-fw {
    text-align: center;
    width: 1.25em;
}
.fa, .fab, .fad, .fal, .far, .fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
}

.panel-heading.collapsed .fa-chevron-up, .panel-heading .fa-chevron-down {
    display: none;
    cursor: pointer;
    color: #410d68;
    font-size: 22px;
    margin-bottom: -3px;
}
.planContainer .options li span p {
    margin: .5em 0 .5em 0;
}
.planContainer .options {
    margin-top: 10em;
}
.pt-2, .py-2 {
    padding-top: .5rem!important;
}
 b
 {
     color: #410d68;
 }
.text-overflow {
     /*width:250px;*/
     height:220px;
      display:block; 
      overflow:hidden;
      word-break: break-word;
      word-wrap: break-word;
  }

  .btn-overflow {
    display: none;
    text-decoration: none; 
  }

.sumo-section-tldr>.row p:before {
    font-family: Font Awesome\ 5 Free;
    content: "\f00c";
    display: inline-block;
    position: absolute;
    top: .4em;
    width: 15px;
    height: 15px;
    flex-basis: 15px;
    flex-grow: 0;
    flex-shrink: 0;
    margin-right: 15px;
    font-weight: 900;
    -webkit-font-smoothing: antialiased;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
    color: #a1a7b3;
    font-size: 14px;
    left: 0;
}
@media (min-width: 576px)
{
.sumo-section-tldr .row>*:nth-child(4n+1), .sumo-section-tldr .row>*:nth-child(4n+2), .sumo-section-tldr .row>*:nth-child(4n+3), .sumo-section-tldr .row>*:nth-child(4n+4) {
    background-color: #efe8de;
}
.sumo-section-tldr .row>* {
    padding-top: 1.2rem;
    padding-bottom: 1rem;}
}
.sumo-border-b
{
  border-bottom: 1px solid #ddd;  
}
.sumo-section
{
  padding-top: 2.7rem;
  padding-bottom: 2.7rem;  
}
.sumo-section-tldr>.row {
    margin-left: 0;
    margin-right: 0;
}
.sumo-section-tldr>.row p {
    position: relative;
    display: inline-block;
    margin-bottom: 0;
}
.d-flex {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important;
}
.appsumo-product-tag
{
    margin: auto 15px auto 0;
    font-size:1.0rem;
    padding: 0 5px;
    border-radius: 3px;
    border: 1px solid #eeeeee;
    background-color: #f5ede0;
    font-weight: 600;
    line-height: 150%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden; 
}
.description-content-wrap
{
background-color: rgb(239, 232, 222);
    padding-left: 10px;
}

/*by arjun*/
.title{
    text-transform:capitalize;
}
/*border radius of buttons by arjun*/
.btn-add-wishlist, .btn-add-cart, .btn-buy-now, .already_purchased{
    border-radius:8px!important;
}
/*size of course image fixed by arjun*/
.img-fluid{
    max-height:400px;
   max-width:400px;
    height:100%;
    width:100%;
}
@media (max-width: 700px)
{
.modal-dialog button {
    padding: 10px 11px!important;
    margin-top: 10px;
}
}
html, body {
    max-width: 100%;
    overflow-x: hidden!important;
}
@media (max-width: 768px)
{
.btn {
    padding-top: 10px !important;
}
}
.requirements-box
{
    /*arjun*/
    width:100%;
    float:left;
    margin-top:0px!important;
}
.tab button {

   border: 1px solid #ccc;

 
}
.tablink {
  background-color: white;
  color: black;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 0px;
  font-weight: 400;
  width: 25%;
}
.tab button:hover {
  background-color: #FDE7A2;
  display:block;
}


/* Create an active/current tablink class */
.tab button.active {
  background-color: #FDE7A2 !important;
}



/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  float:left;
  color: black;
  background-color:#f9f9f9!important;
  display: none;
  padding: 15px;
   border: 1px solid #ccc;
  height: 22%;
}
.active, .dot:hover {
    background-color: #FDE7A2 !important;
}
* {
  box-sizing: border-box;
}
.columnn {
    height:150px;
  float: left;
   width: 25%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.roww::after {
  content: "";
  clear: both;
  display: table;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: black;
    background-color: #FDE7A2!important;
}
.outer-grid {
   display: flex;
   flex-wrap: wrap;
   padding: 0 4px;
}
.inner-grid {
   flex: 25%;
   max-width: 25%;
   padding: 0 4px;
}
.inner-grid img {
   margin-top: 8px;
   width: 100%;
   padding: 10px;
}
@media screen and (max-width: 800px) {
   .inner-grid {
      flex: 50%;
      max-width: 50%;
   }
}
@media screen and (max-width: 600px) {
   .inner-grid {
      flex: 100%;
      max-width: 100%;
   }
}
/* suraj d for label tag on course*/
.topleft {
position: absolute;
top:0px;
left:0px;
    box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);
    font-size: 15px;
    font-weight:700;
     border-bottom-right-radius: 8px;
   /* border-radius: 50px;*/
   /* border-radius: 50px;*/
    background: #f4c150 !important;
   
    padding: 3px 15px;
    width: auto;
    height: 30px;
    color: black !important;
    margin-bottom: 5px;
        
    
}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: #410d68;
  color: white !important;
}


/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
} 


.second-footer{ /* for footer*/

    /*display: none;*/
}

.newsec {

     background-color:white;
         width: 100%;
}

/*rohan*/

@media(max-width:600px){
    .newsec{
         margin-left:6px;
    }
}

.mb-3, .my-3 {
    margin-bottom: 1rem!important;
    padding-left: -10px;
    margin-left: -2%;
    
}

 .already_purchased a {
     border-radius:8px;
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
   position: relative;
   background: #fff;
   border: 0.1px solid #410d68;
   border-radius: 8px;
   overflow: hidden;
}

.course_edit {
     margin-top: 21px;
}

/*rohan*/
@media(max-width:600px){
.course_edit{
    margin-top:0px;
}
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
    /*arjun*/
    width:100%;
    float:left;
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
.includes .include-title {
    font-size: 22px;
    font-weight: 700;
    margin: 0 0 10px;
    color:#410d68;
}
.phys{
    margin-bottom: 20px;
    margin-top:1rem;
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
.post-options li > a:hover, .post-options li > div:hover, .post-privacy-options li > div:hover {
    color: #000;
    background: #FDE7A2;
}
/*by kavya*/
@media (max-width: 414px)
{
    
.appsumo-product-tag
{
    font-size:0.8rem;
}
.feedback-rating{
    margin:5px;
}
.dropdown-menu.post-privacy-menu{
    position: absolute;
    transform: translate3d(-50px, 41px, 0px) !important;
    top: 0px;
    left: 0px;
    will-change: transform;
}

.description-content-wrap
{
   margin-right:-23px;
}
/*rohan*/
@media(max-width:600px){
    .description-content-wrap
{
   margin-right:-12px;
}
}

.what-you-get-box{
   margin-right:-23px; 
}
/*rohan*/
@media(max-width:600px){
.what-you-get-box{
   margin-right:-12px; 
   margin-top: 0px !important;
}
}
.review-alignment{
   margin-left: 10px !important; 
}

}

/*rohan*/
@media(min-width:411px){
   .course-service{
       width: 380px;
  }
}
/*rohan*/
@media(max-width:600px){
   .course-service{
   width:368px;
  }
}
/*rohan*/
@media (max-width: 375px){
.course-service {
    width: 328px;
}
}
/*rohan*/
@media (max-width: 360px){
.course-service {
    width: 318px;
}
}
/*rohan*/
@media (max-width: 320px){
.course-service {
    width: 276px;
}
}

@media (max-width: 600px){
.sumo-section {
   padding-top: 0rem; 
     padding-bottom: 0rem;
}

.hashtags{
    margin:3px; 
}
</style>
<div class="content-container container" style="width:100%; max-width:93.5%;">
<div class="row chagn">
<!--<div class="col-md-3 side" style="float:left;background-color: #f5ede0;margin-top:20px;margin-left: 3%;">-->
<!--<div class="col-md-12 side" style="float:left;background-color: #f5ede0;margin-top:0px;position:fixed">
    <?php	//if ($this->session->userdata('user_login')) { ?>
    <div>
      <?php include 'left_sidebar_learn.php'; ?>
    </div>
    <?php //} ?>
</div>-->

<!--<div class="col-md-9 padd" style="margin-left:1%;margin-right:2%">-->
<div class="col-md-12 padd" style="padding-left:0; float:left;background-color: #ffffff;margin-top:0px;margin-left:auto">
    <div class="col-lg-12 filter-area">
                <div class="course_type_filter mb-3">
                    <!--<button type="button" class="btn btn-sm allcourses btnbg allCrse <?php if($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all' && $enrolled == 0) echo 'active' ?>" onclick="getAll()">
                                All Services
                    </button>
                    
                     <button type="button" class="btn btn-sm allcourses btnbg enr <?php if($enrolled == 1) echo 'active' ?>" onclick="getEnrolled() ">
                                Enrolled
                    </button>-->
                    <?php if($user_details['is_guided_learning'] == 0 && $user_details['is_instructor'] == 0 && $user_details['is_mentor'] == 0){ ?>
                   <!-- <button type="button" class="btn btn-sm allcourses apply_to_id" id="<?php echo ($user_details['is_service'])?"1":"0"?>" onclick="getUploaded(this.id)">
                              <?php if($user_details['is_service']) echo "Uploaded Courses"; else  echo "+ Add a Service";  ?>  
                    </button>-->
                    <?php } ?>
                </div>
     </div>            
    
<!-- <section class="newsec">  -->
    
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
            $total_rating =  $this->crud_model->get_ratings('course', $course_details['id'],$course_details['mode'], true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings('course', $course_details['id'],$course_details['mode'])->num_rows();
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
            <a href="<?php echo site_url($controller.'/instructor_page/'.$course_details['user_id']."/services"); ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
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


<section class="course-content-area"  style="width:100%; max-width:100%;">
  <div class="container" style="width:100%;  padding-left:0px; max-width:98%;">
    <div class="">
        <div class="newsec">
      <div class="col-lg-8" style="padding-left:0;">
    <!--below lines are added by bhargavi-->
         <div class="course_edit">

         <!-- by kavya -->
         <!--by rohan-->
         <style>
        .hastag_rohan{    
            margin-left: 19px;
        }
        
        @media(max-width:600px){
            .hastag_rohan{
                margin-left:0px;
            }
        }
         </style>
             <div class="hastag_rohan">
                 <?php $length = count($keywords);
                 $i = 0; while($length > 0){ ?>
                <div class="row hashtags">
                <span class="appsumo-product-tag"><?php  echo $keywords[$i]; ?></span>
                <span class="appsumo-product-tag"><?php  echo $keywords[++$i]; ?></span>
                </div>
                <?php $length = $length - 2; ++$i; } ?>
            </div>

           <!--  <div class="d-flex">
                <?php //foreach($keywords as $tag):?>
                <span class="appsumo-product-tag"><?php //echo $tag;?></span>
                <?php //endforeach;?>
            </div>-->
            
          <h1 class="title"><?php echo $course_details['title']; ?>
           <div style="padding-left:12px!important" class=" btn btn-default stat-item dropdown">      <div class=" " data-toggle="dropdown" role="button" aria-expanded="false" title="<?php echo 'share' ?>" >
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
       <div class="pointer" onclick="Wo_ShareCopylink('<?php echo site_url($controller.'/course_service/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id'])//$course_details['url']; ?>');"><?php //echo $wo['lang']['edit_offer'];?> copy link</div>
     </li>
     </ul>
   </div>
          </h1>
          <p class="subtitle"><?php echo $course_details['short_description']; ?></p>
          <div class="rating-row">
            <!--<span class="course-badge best-seller"><?php echo ucfirst($course_details['level']); ?> <?php  echo " "; ?> </span>-->
            <?php
            $total_rating =  $this->crud_model->get_ratings('course', $course_details['id'], $course_details['mode'],true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings('course', $course_details['id'],$course_details['mode'])->num_rows();
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
          <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span><span><?php echo " "; ?>(<?php echo $number_of_ratings.' '.site_phrase('ratings'); ?>)</span>
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
            //$number_of_enrolments = $this->crud_model->enrol_history($course_details['id'],$course_details['mode'])->num_rows();
            //echo $number_of_enrolments.' '.site_phrase('learners_enrolled');
            ?>
          </span>
          
          </div>
          <div>
             <span class="created-by" style="margin-right: 15px;">
            <?php echo site_phrase('created_by'); ?>
            <?php 	if ($this->session->userdata('user_login')) { ?>
            <a href="<?php echo site_url($controller.'/instructor_page/'.$course_details['user_id']."/services"); ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
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
      </div>
      
      <!--img by bhargavi-->
      <?php/*
      $multiple_img = json_decode($course_details['multiple_img']);
      
      if(count($multiple_img) > 0){ ?>
      <div>
      <div class="slideshow-container" style="margin-top:20px;">
        <?php foreach($multiple_img as $value){
                    $url = $this->crud_model->get_service_img_url($course_details['id'],"course_thumbnail",$value);
                ?>
        
        <div class="mySlides" style="text-align: center;">
             
         <img src = '<?php echo $url; ?>' style="width:80%" >
         
      </div>
      <?php } ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

      
      </div>
      <div style="text-align:center">
        <?php for($j=0; $j< count($multiple_img);$j++){ ?>  
       <span class="dot" onclick="currentSlide(<?php echo $j; ?>)"></span>
       <?php } ?>
      </div>
      
      </div>
      <?php } */?>
      
      <!--for mobile-->
      <div class="col-lg-4 mob course-service">
    <?php 	if ($this->session->userdata('user_login')) { ?>
     <!--<div class="btn btn-default stat-item" style="margin-left:150px;margin-top:30px" title="share" onclick="Wo_SharePostOn(<?php echo $course_details['id']; ?>,<?php echo $course_details['user_id']; ?>,'timeline')">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
         <path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z"></path>
      </svg>-->
      <div class=" btn btn-default stat-item dropdown"  style="display:none!important;margin-left:150px;margin-top:30px">
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
       <div class="pointer" onclick="Wo_ShareCopylink('<?php echo site_url($controller.'/course_service/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id'])//$course_details['url']; ?>');"><?php //echo $wo['lang']['edit_offer'];?> copy link</div>
     </li>
     </ul>
   </div>
   
   

    <?php } ?>
    
  <div class="course-sidebar natural">
    <?php if ($course_details['video_url'] != ""){ ?>
      <div class="preview-video-box">
        <a data-toggle="modal" data-target="#CoursePreviewModal">
          <img  onerror='this.src = "<?= base_url() ?>uploads/book.png"' src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <span class="preview-text"><?php echo site_phrase('preview_this_course'); ?></span>
          <span class="play-btn"></span>
        </a>
      </div>
    <?php } else { ?>
    <div class="preview-video-boxx">
        
          <img  onerror='this.src = "<?= base_url() ?>uploads/book.png"' src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!--<span class="preview-text"><?php //echo site_phrase('preview_this_course'); ?></span>-->
          <span class="play-btn"></span>
       
      </div>
    <?php } ?>
    <div class="course-sidebar-text-box">
      <div class="price">
        <?php if ($course_details['is_free_course'] == 1): ?>
         <!-- <span class = "current-price"><span class="current-price"><?php echo site_phrase('free'); ?></span></span>-->
        <?php else: ?>
          <?php if ($course_details['discount_flag'] == 1): ?>
            <!--<span class = "current-price"><span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span></span>
            <span class="original-price"><?php echo currency($course_details['price']) ?></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['discounted_price']); ?>">-->
          <?php else: ?>
            <!--<span class = "current-price"><span class="current-price"><?php echo currency($course_details['price']); ?></span></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['price']); ?>">-->
          <?php endif; ?>
        <?php endif; ?>
        <!--by NK-->
        <span class = "current-price"><span class="current-price"><?php echo currency($course_details['service_price']); ?></span></span>
        <br>
        <?php if($course_details['service_price_type'] == 'entry'){ ?>
            <span class = "current-pricee"><span class="current-pricee"><?php echo 'per entry /usage'; ?></span></span>
        <?php } elseif($course_details['service_price_type'] == 'package'){ ?>
            <span class = "current-pricee"><span class="current-pricee"><?php echo 'per entire package'; ?></span></span>
        <?php } ?>
      </div>

      <?php if(is_purchased($course_details['id'], 'services')) :?>
        <div class="already_purchased">
          <a  href="<?php echo site_url($controller.'/my_courses'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
        </div>
         <!-- SEND MESSAGE MODAL by NK-->
        <div class="already_purchased">
            <a data-toggle="modal" data-target="#MsgOwnr"><?php echo site_phrase('connect'); ?></a>
        </div>
         <!--end by NK -->
      <?php else: ?>
     
          <!-- WISHLIST BUTTON -->
          <!--<div class="buy-btns">
              <button class="btn btn-add-wishlist <?php echo $this->crud_model->is_added_to_wishlist($course_details['id']."_".$course_details['mode']) ? 'active' : ''; ?>" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleAddToWishlist(this)">
                  <?php
                    if($this->crud_model->is_added_to_wishlist($course_details['id'])){ ?>
                        <i class="fa fa-bookmark" style="font-size:16px;color:#410d68"></i>
                        <?php  echo "Bookmarked";
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
              <a href = "#" class="btn btn-buy-now" onclick="handleMessageButton()"><?php echo site_phrase('message'); ?></a>
            <?php else: ?>
                <div class="already_purchased">
                   <a data-toggle="modal" data-target="#MsgOwnr"><?php echo site_phrase('connect'); ?></a>
                </div>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div class="buy-btns">
            <a href = "javascript::" class="btn btn-buy-now" id = "course_<?php echo $course_details['id']; ?>" onclick="handleBuyNow(this)"><?php echo site_phrase('connect'); ?></a>
            <?php if (in_array($course_details['id'], $this->session->userdata('cart_items'))): ?>
              <button class="btn btn-add-cart addedToCart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><i class="fas fa-shopping-cart"></i><?php echo " " . site_phrase('added_to_cart'); ?></button>
            <?php else: ?>
              <button class="btn btn-add-cart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><i class="fas fa-shopping-cart"></i><?php echo  " " . site_phrase('add_to_cart'); ?></button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>

     <div class="phys">
        <div class="title"><b><?php echo "Type of service" ?>:</b>
            <?php
            
            $types =  $this->crud_model->get_category_details_by_id_services($course_details['sub_category_id']);
            //  print_r($types);
             echo $types['name'];
            ?>
            
        </div>
        
      <div class="title"><b><?php echo "Physical Spaces" ?>:</b>
          
        <?php if($course_details['physical_spaces'] == 'physical_serv'){
           echo "Physical Services";
        }else if($course_details['physical_spaces'] == 'virtual_serv'){
            echo "Virtual Services";
        }else if($course_details['physical_spaces'] == 'innovation'){
            echo "Incubation/Innovation Centers";
        }else if($course_details['physical_spaces'] == 'reskilling'){
            echo "Reskilling Centers";
        }else if($course_details['physical_spaces'] == 'taining_service'){
            echo "Training Services";
        }else{
            if($course_details['physical_spaces'] == 'need_meetup'){ 
            echo "Need Meetup";
        }
            
        }?>
        </div>
        
        <div class="title"><b><?php echo "Lead Time" ?>:</b>
         <?php echo $course_details['lead_time'];  ?>
        </div>
        
    </div>
    
     <div class="includes">
        <div class="title"><b><?php echo site_phrase('includes'); ?>:</b></div>
        <ul>
          <li><i class="far fa-clock"></i>
            <?php
            echo date('h:i:s A', $course_details['start_time']).' to '.date('h:i:s A', $course_details['end_time']); //$this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']).' '.site_phrase('on_demand_videos');
            ?>
          </li>
          <li><i class="fa fa-map-marker"></i><?php echo $course_details['Location'] ?></li>
          <li><i class="far fa-compass"></i><?php echo $course_details['website']; ?></li>
          <li><i class="far fa-compass"></i><?php echo $course_details['contact_name']; ?></li>
          <li><i class="far fa-compass"></i><?php echo "Capacity ".$course_details['capacity']; ?></li>
          <!--<li><i class="fas fa-mobile-alt"></i><?php// echo site_phrase('access_on_mobile_and_tv'); ?></li>-->
        </ul>
      </div>
    </div>
  </div>
</div>
      
       <!-- <div class="description-box view-more-parent"> bhargavi-->
    <div class="description-box ">
      <!--<div class="view-more" onclick="viewMore(this,'hide')">+ <?php echo site_phrase('view_more'); ?></div>-->
      <div class="description-title"><?php echo site_phrase('description'); ?></div>
     <!-- <a href="#" class="show_hide" data-content="toggle-text">+ Read More</a>-->
      <div class="description-content-wrap">
          <!--rohan-->
        <div class="text-overflow" style="height:50px;">
          <?php echo $course_details['description']; ?>
        </div>
     <a class="btn-overflow" href="javascript:void(0)">Read more</a>
      </div>
    </div>
    <!-- pros and cons-->
    <section class="sumo-section sumo-section-tldr sumo-border-b">
          <h2>Pros</h2>
          <div class="row py-3">
              
              <?php foreach($pross as $pro):?>
                            
                               <div class="col-sm-6">
                <p class="d-flex align-items-center"><span class="ml-4 mb-3">
                    
                    <?php $feature=preg_replace('/[^A-Za-z0-9\-]/', ' ', $pro);?>
                                           <?php echo ucfirst($feature);?>
                                        
                    
                </span></p>
              </div>
                                
                            <?endforeach;?>  
          </div>
    </section>
     <!-- suraj d -->
        <div class="what-you-get-box">
          <div class="what-you-get-title"><?php //echo site_phrase('what_will_i_learn'); ?>What will I get?</div>
          <ul class="what-you-get__items">
            <?php foreach (json_decode($course_details['outcomes']) as $outcome): ?>
              <?php if ($outcome != ""): ?>
                <li><?php echo $outcome; ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <br>
    <?php /*?><div class="phys">
        <div class="title"><b><?php echo "Type of service" ?>:</b>
            <?php
            
            $types =  $this->crud_model->get_category_details_by_id_services($course_details['sub_category_id']);
            //  print_r($types);
             echo $types['name'];
            ?>
            
        </div>
        
      <div class="title"><b><?php echo "Physical Spaces" ?>:</b>
          
        <?php if($course_details['physical_spaces'] == 'physical_serv'){
           echo "Physical Services";
        }else if($course_details['physical_spaces'] == 'virtual_serv'){
            echo "Virtual Services";
        }else if($course_details['physical_spaces'] == 'innovation'){
            echo "Incubation/Innovation Centers";
        }else if($course_details['physical_spaces'] == 'reskilling'){
            echo "Reskilling Centers";
        }else if($course_details['physical_spaces'] == 'taining_service'){
            echo "Training Services";
        }else{
            if($course_details['physical_spaces'] == 'need_meetup'){ 
            echo "Need Meetup";
        }
            
        }?>
        </div>
        
        <div class="title"><b><?php echo "Lead Time" ?>:</b>
         <?php echo $course_details['lead_time'];  ?>
        </div>
        
    </div>
    <div class="includes">
         <div class="include-title"> Includes:</div>
        <div class="title"><b><?php echo "Time" ?>:</b>
          
         <i class="far fa-clock"></i>
            <?php
            echo date('h:i:s A', $course_details['start_time']).' to '.date('h:i:s A', $course_details['end_time']); //$this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']).' '.site_phrase('on_demand_videos');
            ?>
        </div>
        <div class="title"><b><?php echo "Location" ?>:</b>
          
        <i class="fa fa-map-marker"></i><?php echo " " . $course_details['Location'] ?>
        </div>
         <div class="title"><b><?php echo "Website" ?>:</b>
          
       <i class="far fa-compass"></i><a href="<?php echo $course_details['website']; ?>" target="_blank"><?php echo " " . $course_details['website']; ?></a>
        </div>
        <div class="title"><b><?php echo "Contact Name" ?>:</b>
          
       <i class="far fa-compass"></i><?php echo " " . $course_details['contact_name']; ?>
        </div>
        <div class="title"><b><?php echo "Capacity" ?>:</b>
          
       <i class="far fa-compass"></i><?php echo " " . $course_details['capacity']; ?>
        </div>
       <!-- <ul>
          <li><i class="far fa-clock"></i>
            <?php
            echo date('h:i:s A', $course_details['start_time']).' to '.date('h:i:s A', $course_details['end_time']); //$this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']).' '.site_phrase('on_demand_videos');
            ?>
          </li>
          <li><i class="fa fa-map-marker"></i><?php echo " " . $course_details['Location'] ?></li>
          <li><i class="far fa-compass"></i><?php echo " " . $course_details['website']; ?></li>
          <li><i class="far fa-compass"></i><?php echo " " . $course_details['contact_name']; ?></li>
          <li><i class="far fa-compass"></i><?php echo " " . "Capacity ".$course_details['capacity']; ?></li>-->
          <!--<li><i class="fas fa-mobile-alt"></i><?php// echo site_phrase('access_on_mobile_and_tv'); ?></li>-->
        <!--</ul>-->
        
        
        
        
      </div><?php */?>
      <!--rohan images -->
       <style>
              @media(max-width:600px){
                  .tablink{
                      width:33%;
                  }
              }
              
        

          </style>
          
          
      
              <!--rohan images -->
               
         <!--rohan-->
       <style>
              @media(max-width:600px){
                  .tablink{
                      width:33%;
                       margin-left: 2%;
                  }
                  
                  .line{
                      display:flex;
                      /*margin-bottom:12px;*/
                  }
                  #images{
                      display:none;
                  }
              }
              
              .mobile{
                  display:none;
              }
              @media(max-width:600px){
                  .mobile{
                      display:block;
                  }
                  .mobile2{
                      margin-left:5px;
                  }
              }
          </style>
      <!-- Tabs navs -->
      <div class="tab line">
          <!--rohan-->
          <!--onclick="openPage('images', this, '')"-->
<button class="tablink" >Images<span><?php $multiple_img = json_decode($course_details['multiple_img']);?><?php echo "("; print count($multiple_img); echo ")";?></span></button>
<!--<button class="tablink" onclick="openPage('News', this, '')" id="defaultOpen">News</button>-->
<!--<button class="tablink" onclick="openPage('Contact', this, '')">Contact</button>-->
<!--<button class="tablink" onclick="openPage('About', this, '')">About</button>-->
</div> 




   <div class="row mobile">
             
             <div class="col mobile2" >
                 
                 <style>
                     /*@media(max-width:600px){*/
                        .course-carousel .slick-prev, .course-carousel .slick-next{
                            box-shadow: 0 0 0px 0px rgb(20 23 28 / 0%), 0 0px 0px 0 rgb(20 23 28 / 0%);
                            height: 0px;
                            margin-right: -20px;
                            margin-left: 16px;
                         }
                     /*}*/
                     
                     
                     .course-box{
                         margin-left:15px;
                     }
                           .carousel-control-prev-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

 .carousel-control-next-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")
}
                 </style>
                 
<div id="demo" class="carousel slide" >

  <!-- Indicators -->
  <ul class="carousel-indicators">
       <?php
                    $multiple_img = json_decode($course_details['multiple_img']);
                    
                 
                  //  echo "<pre>";
                //    var_dump($top_courses);
                 //   exit;
                 $i=0;
                    foreach ($multiple_img as $value):?>
                    <?php if($i==0){ ?>
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                   <?php }  ?>
     <?php if($i!=0){ ?>
                   <li data-target="#demo" data-slide-to="<?= $i ?>"></li>
                   <?php }  ?>
   
    
     <?php $i++; ?>
   <?php endforeach; ?>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
       <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 210px;
  }
  </style>
                    <?php
                    $multiple_img = json_decode($course_details['multiple_img']);
                    
                 
                  //  echo "<pre>";
                //    var_dump($top_courses);
                 //   exit;
                 $i=1;
                    foreach ($multiple_img as $value):?>
    <div style="" class="carousel-item <?php if($i==1){ echo('active'); }  ?>">
        <?php $url = $this->crud_model->get_service_img_url($course_details['id'],"course_thumbnail",$value);?>
      <img style="width:100%;" src="<?php echo $url ?>" onerror='this.src = "<?= base_url() ?>uploads/book.png"' alt="Los Angeles" >
    </div>
    <?php $i++; ?>
   <?php endforeach; ?>
    
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

        
             </div>             
         </div>

<!--rohan images end -->
<?php  
//arjun
$multiple_img = json_decode($course_details['multiple_img']);
   
       if(count($multiple_img) > 0){ ?>
<div  style="height:auto;float:left;"  id="images" class="tabcontent">
    <!--div by arjun-->
  <div>
  <div class="form-grozup">
   
   
   
   
   
   
   
      <div>
       <?php $i=1;$class="";
       foreach($multiple_img as $value){
       if($i>8){$class="hiddenimgs";}?>
       <div class="columnn <?php echo $class; ?>">
          <?php $url = $this->crud_model->get_service_img_url($course_details['id'],"course_thumbnail",$value);?>
       <img src='<?php echo $url; ?>'  alt="Snow" onerror='this.src = "<?= base_url() ?>uploads/book.png"' style="width:100%;height:140px;">
       </div>
    <?php $i++; } ?>
       
      </div>
  
    </div>
    </div>
    <!--div by arjun-->
    <div class="row" style="height:40px;width:100%"></div>
    <div class="row" style="padding-top:5px;width:100%">
    <button type="button" style=" margin-left: auto;  margin-right: auto;" class="btn btn-sm btn-sign-in"  id="viewBtn" data-target="#myModal" onclick="viewMoreImages()">View More</button>
  </div>
</div>
    <?php }  ?>

<div id="News" class="tabcontent">
  <h3>News</h3>
  <p>Some news this fine day!</p> 
</div>

<div id="Contact" class="tabcontent">
  <h3>Contact</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="About" class="tabcontent">
  <h3>About</h3>
  <p>Who we are and what we do.</p>
</div>
<!--<div class="filter_mode filter-class" style="width:759px; float:left;">
        <ul class="nav  nav-pills nav-justified form-wizard-header" role="tablist">
          <li class="active nav-item clk"><a id="agan" href="#images" role="tab" data-toggle="tab" class=nav-link rounded-0 pt-1 pb-1 <?php if($check_first == 0) echo 'active';?>><span class="d-none d-sm-inline">Images</span></a></li>
          <li class="active nav-item clk"><a href="#lessons" role="tab" data-toggle="tab" class=nav-link rounded-0 pt-1 pb-1<?php if($check_first == 0) echo 'active'; ?>> <span class="d-none d-sm-inline">Lessons</span></a></li>
          <li class="active nav-item clk"><a href="#messages" role="tab" data-toggle="tab" class=nav-link rounded-0 pt-1 pb-1 <?php if($check_first == 0) echo 'active';?>> <span class="d-none d-sm-inline">Messages</span></a></li>
        </ul>

<div class="tab-content">
  <div class="tab-pane active" id="images">
    <div class="form-group">
      <?php  $multiple_img = json_decode($course_details['multiple_img']);
       if(count($multiple_img) > 0){ ?>
      <div>
       <?php foreach($multiple_img as $value){?>
       <div class="columnn">
          <?php $url = $this->crud_model->get_service_img_url($course_details['id'],"course_thumbnail",$value);?>
       <img src='<?php echo $url; ?>' alt="Snow" style="width:100%">
       </div>
    <?php } ?>
       
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="tab-pane" id="lessons">
   
   Profile Content
  </div>
  <div class="tab-pane" id="messages">
   
    Messages Content
  </div>

</div>
</div>-->
 <!-- Modal for instrcutor --> 
 <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
            <div class="modal-body" >
                <div class="row">
                    <div class="col-sm-6">
                          <h6> Categories</h6>
                                 <?php $categories = $this->crud_model->get_categories()->result_array();
                                 ?>
                                 
                                <ul> <?php foreach ($categories as $category): ?>
                               <?php  if($category['name']=="Other"){
                                     $other=$category['name'];
                                 }else{
                                ?>
                                    <li class="nav-item" style="margin-top:10px; margin-left:-40px;">
                                       <a href="#" mode="instructor"><?php echo $category['name'];?></a>
                                    </li>
                                    <?php }?>
                                    
                               <?php endforeach; ?>
                                <li class="nav-item" style="margin-top:10px; margin-left:-40px;">
                                       <a href="#" mode="instructor"><?php echo $other;?></a>
                                    </li>                 
                    </div>
                    
                    </div>
                  
                </div>
               
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
    </div>
    </div>
    </div>
      
<br>      
<!-- by suraj d-->
<br>
<section id="commonFeatures">
        <ul id="plans">
            <li class="plan">
                <ul class="planContainer">
                        <li class="price"><h2>Plans and Features</h2></li>
                        <!-- Deal terms section -->
                        <li>
                            <span style="cursor:pointer;" class="panel-heading collapsed" data-toggle="collapse" data-target="#termsCollapse-<appsumo.deals.views.DealDetailView object at 0x7fcc706575f8>" id="#toggle" aria-expanded="true">
                                <b>Deal Terms</b>
                                <span class="panel-heading collapsed" data-toggle="collapse" data-target="#termsCollapse-<appsumo.deals.views.DealDetailView object at 0x7fcc706575f8>"  id="#toggle" aria-expanded="true">
                                <i class="fa fa-fw fa-chevron-up"></i>
                                <i class="fa fa-fw fa-chevron-down"></i>
                                </span>
                            </span>
                        </li>
                        <li class="collapse show" id="termsCollapse-<appsumo.deals.views.DealDetailView object at 0x7fcc706575f8>" style="">
                            <!--arjun-->
                            <ul class="options pt-2">
                            <?php foreach($planss as $plan):?>
                            
                                
                                <li id="feature_top">
                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5" id="variable-plan-image-1-3574">
                                        <div><?php $feature=preg_replace('/[^A-Za-z0-9\-]/', ' ', $plan);?>
                                            <span><p><?php echo ucfirst($feature);?></p></span>
                                        </div>
                                </li>
                                
                            <?endforeach;?>  
                            </ul>
</li>
                       <?php /*?> <li>
<span style="cursor:pointer;" class="panel-heading collapsed" data-toggle="collapse" data-target="#commonFeaturesCollapse-<appsumo.deals.views.DealDetailView object at 0x7fcc706575f8>" aria-expanded="false">
<b>Features Included in All Plans</b>
<span class="panel-heading collapsed" data-toggle="collapse" data-target="#commonFeaturesCollapse-<appsumo.deals.views.DealDetailView object at 0x7fcc706575f8>" aria-expanded="false">
        <i class="fa fa-fw fa-chevron-up"></i>
    <i class="fa fa-fw fa-chevron-down"></i>
</span>
</span>
                            </li>
                        <li class="collapse" id="commonFeaturesCollapse-<appsumo.deals.views.DealDetailView object at 0x7fcc706575f8>" style="">
                                                        <ul class="options pt-2">
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Unlimited shows/streams</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Up to 8 hours/stream</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Custom branding (custom logo, background, overlay, themes, and brand colors)</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Live broadcasts recorded (while online only)</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>4 guests on screen</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Sign up with Facebook or YouTube (no account transfer)</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Host screen share</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Host audio only (great for podcasts)</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Split screen (12 screen layouts)</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Schedule broadcast</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>HD video download</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>On-screen elements</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Show comment on the screen</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Mobile streaming app (iOS beta)</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Facebook Live, YouTube Live, and LinkedIn Live</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Simulcast</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>Background removal—460p,  low resolution</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                                <li id="feature_top">
                                                                    <img class="featureCheck" src="https://appsumo2.b-cdn.net/static/images/discussions/as-check.svg" width="15" height="11.5">
                                                                    <div>
                                                                    <span><p>30-day storage</p></span>
                                                                    </div>
                                                                </li>
                                                            
                                                        </ul>
                            </li><?php */?>
                </ul>
            </li>
        </ul>
</section>
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
                <a href="<?php echo site_url('home/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><img src="<?php $this->crud_model->get_course_thumbnail_url($other_realted_course['id']); ?>" alt="" class="img-fluid"></a>
                <div class="item-duration"><b><?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($other_realted_course['id']); ?></b></div>
              </div>
              <div class="item-title float-left">
                <div class="title"><a href="<?php echo site_url('home/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><?php echo $other_realted_course['title']; ?></a></div>
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
                  $total_rating =  $this->crud_model->get_ratings('course', $other_realted_course['id'],$other_realted_course['mode'], true)->row()->rating;
                  $number_of_ratings = $this->crud_model->get_ratings('course', $other_realted_course['id'],$other_realted_course['mode'])->num_rows();
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
                <a href="<?php echo site_url('home/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><img src="<?php $this->crud_model->get_course_thumbnail_url($other_realted_course['id']); ?>" alt="" class="img-fluid"></a>
                <div class="item-duration"><b><?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($other_realted_course['id']); ?></b></div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>-->

 <?php /* ?><div class="about-instructor-box">
    <div class="about-instructor-title">
      <?php echo site_phrase('about_the_service_provider'); ?>
    </div>
    <div class="row">
         
      <div class="col-lg-4">
          
          
        <div class="about-instructor-image">
          <img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" class="img-fluid">
          <ul>
            <!-- <li><i class="fas fa-star"></i><b>4.4</b> Average Rating</li> -->
            <li><i class="fas fa-comment"></i><b>
              <?php //echo $this->crud_model->get_instructor_wise_course_ratings($instructor_details['id'], 'course_service')->num_rows(); ?>
            </b> <?php echo site_phrase('reviews'); ?></li>
           <?php /* <li><i class="fas fa-user"></i><b>
              <?php
              $course_ids = $this->crud_model->get_instructor_wise_courses($instructor_details['id'], 'simple_array');
              $this->db->select('user_id');
              $this->db->distinct();
              $this->db->where_in('course_id', $course_ids);
              $this->db->where_in('mode', 'services');
              echo $this->db->get('enrol')->num_rows();
              ?>
            </b> <?php echo site_phrase('learners') ?></li>
            <li><i class="fas fa-play-circle"></i><b>
              <?php //echo $this->crud_model->get_instructor_wise_courses($instructor_details['id'])->num_rows(); ?>
            </b> <?php echo site_phrase('courses'); ?></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-8">
    <!--<div class="about-instructor-details view-more-parent">-->
        <div class="about-instructor-details">
          <!--<div class="view-more" onclick="viewMore(this)">+ <?php echo site_phrase('view_more'); ?></div>-->
          <div class="instructor-name">
             <?php 	if ($this->session->userdata('user_login')) { ?>
            <a href="<?php echo site_url('home/instructor_page/'.$course_details['user_id']); ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
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
  </div><?php */?>
  
  <!--<div class="about-instructor-box">
     <div class="about-instructor-title">
      <?php echo site_phrase('service_Experience'); ?>
    </div>
     <?php if (count(json_decode($course_details['service_institute'])) > 0 || count(json_decode($course_details['experience'])) > 0 || count(json_decode($course_details['position'])) > 0 ):
      foreach (json_decode($course_details['service_institute']) as $index => $value ):
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
  </div>-->

  <div class="student-feedback-box">
    <div class="student-feedback-title">
      <!--<?php //echo site_phrase('student_feedback'); ?>   commented by bhargavi -->
       Feedback
    </div>
    <div class="row feedback-rating">
      <div class="col-lg-3">
        <div class="average-rating">
          <div class="num">
            <?php
            $total_rating =  $this->crud_model->get_ratings('course', $course_details['id'],$course_details['mode'], true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings('course', $course_details['id'],$course_details['mode'])->num_rows();
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
    <ul class="review-alignment">
      <?php
      $ratings = $this->crud_model->get_ratings('course', $course_id,$course_details['mode'])->result_array();
      foreach($ratings as $rating):
        ?>
        <li>
          <div class="row">
            <div class="col-lg-4">
              <div class="reviewer-details clearfix">
                <div class="reviewer-img float-left">
                  <img onerror='this.src = "<?= base_url() ?>uploads/book.png"' src="<?php echo $this->user_model->get_user_image_url($rating['user_id']); ?>" alt="">
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
 
     
 
   

    <?php } ?>
    
  <div class="course-sidebar natural">
    <?php if ($course_details['video_url'] != ""){ ?>
      <div class="preview-video-box">
        <a data-toggle="modal" data-target="#CoursePreviewModal">
          <img onerror='this.src = "<?= base_url() ?>uploads/book.png"' src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!-- suraj d to add listing on course -->
                     <?php if(!empty($course_details['listing'])){?>
                     <div class="topleft"><?php echo $course_details['listing']; ?>
                    
                     </div>
                     <?php } ?>
          <span class="preview-text"><?php echo site_phrase('preview_this_course'); ?></span>
          <span class="play-btn"></span>
        </a>
      </div>
    <?php } else { ?>
    <div class="preview-video-boxx">
        
          <img onerror='this.src = "<?= base_url() ?>uploads/book.png"' src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'], "course_thumbnail", $course_details['mode']); ?>" alt="" class="img-fluid">
          <!-- suraj d to add listing on course -->
                     <?php if(!empty($course_details['listing'])){?>
                     <div class="topleft"><?php echo $course_details['listing']; ?>
                   
                     </div>
                     <?php } ?>
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
            <!--<span class = "current-price"><span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span></span>
            <span class="original-price"><?php echo currency($course_details['price']) ?></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['discounted_price']); ?>">-->
          <?php else: ?>
            <!--<span class = "current-price"><span class="current-price"><?php echo currency($course_details['price']); ?></span></span>
            <input type="hidden" id = "total_price_of_checking_out" value="<?php echo currency($course_details['price']); ?>">-->
          <?php endif; ?>
          <span class = "current-price"><span class="current-price"><?php echo currency($course_details['service_price']); ?></span></span>
        <br>
        <?php if($course_details['service_price_type'] == 'entry'){ ?>
            <span class = "current-pricee"><span class="current-pricee"><?php echo 'per entry /usage'; ?></span></span>
        <?php } elseif($course_details['service_price_type'] == 'package'){ ?>
            <span class = "current-pricee"><span class="current-pricee"><?php echo 'per entire package'; ?></span></span>
        <?php } ?>
        <?php endif; ?>
        <!--by NK-->
        
      </div>

      <?php if(is_purchased($course_details['id'], 'services')) :?>
        <div class="already_purchased">
          <a  href="<?php echo site_url($controller.'/my_courses'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
        </div>
         <!-- SEND MESSAGE MODAL by NK-->
        <div class="already_purchased">
            <a data-toggle="modal" data-target="#MsgOwnr"><?php echo site_phrase('connect'); ?></a>
        </div>
         <!--end by NK -->
      <?php else: ?>
     
          <!-- WISHLIST BUTTON -->
          <!--<div class="buy-btns">
              <button class="btn btn-add-wishlist <?php echo $this->crud_model->is_added_to_wishlist($course_details['id']) ? 'active' : ''; ?>" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleAddToWishlist(this)">
                  <?php
                    if($this->crud_model->is_added_to_wishlist($course_details['id'])){ ?>
                        <i class="fa fa-bookmark" style="font-size:16px;color:#410d68"></i>
                        <?php  echo "Bookmarked";
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
              <a href = "#" class="btn btn-buy-now" onclick="handleMessageButton()"><?php echo site_phrase('message'); ?></a>
            <?php else: ?>
                <div class="already_purchased">
                   <a data-toggle="modal" data-target="#MsgOwnr"><?php echo site_phrase('connect'); ?></a>
                </div>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div class="buy-btns">
            <a href = "javascript::" class="btn btn-buy-now" id = "course_<?php echo $course_details['id']; ?>" onclick="handleBuyNow(this)"><?php echo site_phrase('connect'); ?></a>
            <?php if (in_array($course_details['id'], $this->session->userdata('cart_items'))): ?>
              <button class="btn btn-add-cart addedToCart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><i class="fas fa-shopping-cart"></i><?php echo " " . site_phrase('added_to_cart'); ?></button>
            <?php else: ?>
              <button class="btn btn-add-cart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><i class="fas fa-shopping-cart"></i><?php echo  " " . site_phrase('add_to_cart'); ?></button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>

     <div class="phys">
        <div class="title"><b><?php echo "Type of service" ?>:</b>
            <?php
            
            $types =  $this->crud_model->get_category_details_by_id_services($course_details['sub_category_id']);
            //  print_r($types);
             echo $types['name'];
            ?>
            
        </div>
        
      <div class="title"><b><?php echo "Physical Spaces" ?>:</b>
          
        <?php if($course_details['physical_spaces'] == 'physical_serv'){
           echo "Physical Services";
        }else if($course_details['physical_spaces'] == 'virtual_serv'){
            echo "Virtual Services";
        }else if($course_details['physical_spaces'] == 'innovation'){
            echo "Incubation/Innovation Centers";
        }else if($course_details['physical_spaces'] == 'reskilling'){
            echo "Reskilling Centers";
        }else if($course_details['physical_spaces'] == 'taining_service'){
            echo "Training Services";
        }else{
            if($course_details['physical_spaces'] == 'need_meetup'){ 
            echo "Need Meetup";
        }
            
        }?>
        </div>
        
        <div class="title"><b><?php echo "Lead Time" ?>:</b>
         <?php echo $course_details['lead_time'];  ?>
        </div>
        
    </div>
    
     <div class="includes">
        <div class="title"><b><?php echo site_phrase('includes'); ?>:</b></div>
        <ul>
          <li><i class="far fa-clock"></i>
            <?php
            echo date('h:i:s A', $course_details['start_time']).' to '.date('h:i:s A', $course_details['end_time']); //$this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']).' '.site_phrase('on_demand_videos');
            ?>
          </li>
          <li><i class="fa fa-map-marker"></i><?php echo $course_details['Location'] ?></li>
          <li><i class="far fa-compass"></i><?php echo $course_details['website']; ?></li>
          <li><i class="far fa-compass"></i><?php echo $course_details['contact_name']; ?></li>
          <li><i class="far fa-compass"></i><?php echo "Capacity ".$course_details['capacity']; ?></li>
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
  <!-- COPY LINK MODAL-->
        <div class="modal fade in" id="copy_crse_link" role="dialog">
            <div class="modal-dialog">
            
              <div class="modal-content">
                <p style="text-align: center;padding: 10px 0px 5px 0px;font-family: Hind,Arial;font-size: 18px;">
                  <i class="fa fa-check" aria-hidden="true" style="color: green;"></i>      
                  Link successfully copied to clipboard.
                </p>
              </div>
              
            </div>
        </div>
    <!-- END TO COPY INK MODL--> 
  <div class="modal fade in" id="CoursePreviewModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <center>
            <!--rohan-->
            <style>
                @media(max-width:600px){
                    .modal-content{
                        max-width:100%;
                    }
                }
            </style>
      <div class="modal-content course-preview-modal" >
        <div class="modal-header">
          <h5 class="modal-title"><span><?php echo site_phrase('course_preview') ?>:</span><?php echo $course_details['title']; ?></h5>
          <!--rohan-->
          <button type="button" style="color: #410d68;" class="close" data-dismiss="modal" onclick="pausePreview()">
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
          </center>
        </div>
      </div>
      
    </div>
<!--</section>-->     
    
    <?php endif; ?>
 
    <!-- Modal -->
    
    <!--message modal-->
    <!--message modal-->
    <!--<div class="modal fade in" id="MsgOwnr" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content course-preview-modall">
        <div class="modal-header">
          <h5 class="modal-title"><span><?php echo site_phrase('course_preview') ?>: </span><?php echo $course_details['title']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="" action="<?php echo site_url('home/my_messages/send_new');?>" method="post">
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
     </div>-->
      <!--message modal-->

    <div class="modal fade in "  id="MsgOwnr" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" style="width:100%;" role="document">
        
        <div style="float:left;margin:0;padding:0;" class="col-sm-4"></div>
      <div style="float:left;margin:0;padding:0;" class="col-sm-4  modal-content course-preview-modall">
        <div class="modal-header">
          <h5 class="modal-title"><span><?php echo site_phrase('course_preview') ?>: </span><?php echo $course_details['title']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="" action="<?php echo site_url($controller.'/my_messages/send_new/');?>" method="post">
               <div class="message-body">
                   <div class="form-group">
                   <input type="hidden" name="receiver" class="form-control" value="<?php echo $course_details['user_id']; ?>">
                    </div>
                    <div class="form-group">
                   <input type="hidden" name="course_id" class="form-control" value="<?php echo $course_details['id']; ?>">
                   <input type="hidden" name="title" class="form-control" value="<?php echo $course_details['title']; ?>">
                    </div>
                  <div class="form-group">
                      <label for="message">Message <span style="color:red">*</span></label>
                      <textarea name="message" id="message" class="form-control" required></textarea>
                  </div>
                  <?php //echo site_url('home/services?enrolled=1'); ?>
                  <?php // echo site_url($controller.'/my_messages/send_new');?>
                  <?php 
                  // phone number by arjun

                  $username=$this->session->userdata('usrname');
                  $flag=0;
                  if(!$this->crud_model->checkPhoneExists($username)[0]["phone_number"]){
                      $flag=1;
                  ?>
                   <div class="form-group">
                       <label for="phone_num_ex">Phone <span style="color:red">*</span></label>
                      <input class="form-control" type="text" id="phone_num_ex" name="phone_num_ex" required>
                  </div>
                  <?php 
                  //end arjun
                  } ?>
                     <button type="submit" id="submit" class="btn send-btn">Send</button>
                      <button type="button" class="close btn send-btn" data-dismiss="modal" style="border: 2px solid #410D68;">
                       <span aria-hidden="true">Close</span>
                     </button>
                  </div>
            </form>
          
         </div>
        </div>
       <div style="float:left;margin:0;padding:0;" class="col-sm-4"></div>
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
    function handleCartItems(elem) {
      
     <?php 	if ($this->session->userdata('user_login')) { ?>
      url1 = '<?php echo site_url($controller.'/handleCartItems');?>';
      url2 = '<?php echo site_url($controller.'/refreshWishList');?>';
       //ny NK
     var course_id=elem.id+',s';
      $.ajax({
        url: url1,
        type : 'POST',
        data : {course_id : course_id},
        success: function(response)
        {
          $('#cart_itemss').html(response);
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

    function handleBuyNow(elem) {
     <?php 	if ($this->session->userdata('user_login')) { ?>
      url1 = '<?php echo site_url($controller.'/handleCartItemForBuyNowButton');?>';
      url2 = '<?php echo site_url($controller.'/refreshWishList');?>';
      urlToRedirect = '<?php echo site_url($controller.'/shopping_cart'); ?>';
      var explodedArray = elem.id.split("_");
      var course_id = explodedArray[1];
      //ny NK
      course_id+=',s';

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

    function handleMessageButton() {
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
         urlToRedirect = 'https://www.notifyx.site/hivedin10/userlogin';
                window.location.replace(urlToRedirect);
     <?php } ?>
    }

    function handleAddToWishlist(elem) {
         <?php 	if ($this->session->userdata('user_login')) { ?>
        $.ajax({
            url: '<?php echo site_url('home/handleWishList');?>',
            type : 'POST',
            data : {course_id : elem.id},
            success: function(response)
            {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active');
                        $(elem).html("<i class='far fa-bookmark' style='font-size:16px;'></i><?php echo " " . "Bookmark"; ?>"); 
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
         urlToRedirect = 'https://www.notifyx.site/hivedin10/userlogin';
                window.location.replace(urlToRedirect);
     <?php } ?>
    }

    function pausePreview() {
      player.pause();
    }
    
    
    function getAll(){
    <?php 	if ($this->session->userdata('user_login')) { ?>
        $(".allCrse").addClass('active');
         window.location.replace('<?php echo site_url('home/services'); ?>');
     <?php } else { ?>
         urlToRedirect = '<?php echo site_url('..'); ?>';
                window.location.replace(urlToRedirect);
     <?php } ?>
}

    function getEnrolled(){
    <?php 	if ($this->session->userdata('user_login')) { ?>
        window.location.replace('<?php echo site_url('home/services?enrolled=1'); ?>');
     <?php } else { ?>
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
    //   rohan
      types = "_service"
      self = this;
      $(this).text('Please wait');
      $(this).attr('disabled', 'true');
        $.ajax({
          url:'<?php echo site_url('share/sharee'); ?>',
          type: 'GET',
          dataType: 'json',
           //   rohan
          data: {f: 'share_post_on',ownr_id:type_id,course_id:post_id, types:types},
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
    
    var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
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
    $('#sbmt').on('click', function (e) {
    e.preventDefault();
    var $li = $('.nav-tabs').find('li'),
        i = $li.siblings('.active').index(),
        max = $li.length;

    if (i < max) {
      $li.find('[role="tab"]').eq(i+1).tab('show');
    }
});
    function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(pageName).style.display = "block";
  evt.currentTarget.className += " active";
  $('first tab selector').click()
    }
$('#viewBtn').click(function() {
   $('#myModal').modal('show');
});

    </script>
    </div>
    <?php 	if ($this->session->userdata('user_login')) { ?>
<?php include 'shareModal.php'; ?>
<?php include 'share/share_timeline.php'; ?>
<?php include 'share/share_grop.php'; ?>

<?php } ?>
<script>
    //by arjun
$('#phone_num_ex').keypress(function (event) {
    var keycode = event.which;
    if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
        event.preventDefault();
    }
    if($('#phone_num_ex').val().length>=10){
                event.preventDefault();
    }
    
});

<?php if($flag==1){?>
$("#submit").prop("disabled",false);    

$('#phone_num_ex').keyup(function () {
   
    if($('#phone_num_ex').val().length==10){
$("#submit").prop("disabled",false);    }

 if($('#phone_num_ex').val().length<10){
$("#submit").prop("disabled",true);    }   

});
<?php } ?>
//by suraj d
// by rohan sharma
var text = $('.text-overflow'),
     btn = $('.btn-overflow'),
       h = text[0].scrollHeight; 
 
if(h > 220) {
	btn.addClass('less');
	btn.css('display', 'block');
	 $('.text-overflow').css("height", 220);
}else if(h!=0){
    $('.text-overflow').css("height", h);
}

btn.click(function(e) 
{
  e.stopPropagation();

  if (btn.hasClass('less')) {
      btn.removeClass('less');
      btn.addClass('more');
      btn.text('Read less');

      text.animate({'height': h});
  } else {
      btn.addClass('less');
      btn.removeClass('more');
      btn.text('Read more');
      text.animate({'height': '220px'});
  }  
});//arjun
var x=0;
function viewMoreImages(){
    if(x==0){
       $("#images").css("overflow-y","scroll");
       $("#images").css("overflow-x","hidden");

        $(".hiddenimgs").css("display","block");
        $("#viewBtn").html("View Less");
   x=1;
    }
    else{
         $("#images").css("overflow-y","hidden");
       $("#images").css("overflow-x","hidden");

   $(".hiddenimgs").css("display","none");
           $("#viewBtn").html("View More");
   x=0;
    }
}
$(document).ready(function(){
  $(".toggle").next("div").show();
});


// rohan stopping the autoplay of carousel
window.onload = (event) => {
  console.log('page is fully loaded');
  
 setInterval(function(){$('.carousel').carousel('pause'); }, 1000);
};
</script>
