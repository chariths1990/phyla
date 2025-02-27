<?php
//include_once 'classes/Dbcon.class.php';
//include_once 'classes/Subject.class.php';
//include_once 'classes/Teacher.class.php';
include_once 'classes/Video.class.php';

if (isset($_POST['submit'])) {
    $tid=$_POST['tid'];
    $cid=$_POST['cid'];
    $slid=$_POST['slid'];
    $sid=$_POST['sid'];
    $video_topic=$_POST['video_topic'];
    $video_desc=$_POST['video_desc'];
    //pass null values
    $subjectlistid=$slid;
    //echo $subjectlistid;
    $subjectid=$sid;
    
    $obj_video=new Video();
    //*****- function call */
    $vid=$obj_video->*****($tid,$lid,$subjectlistid,$subjectid,$cid);
    //echo $eid;
    
   
    
}
?>