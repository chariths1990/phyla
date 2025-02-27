<?php
include_once 'Dbcon.class.php';
include_once 'Image.class.php';
include_once 'Error.class.php';
include_once 'Teacher.class.php';
class Video{
    
    /*upload function needs to
        save video details to video table

        save details to teacher_class_videos
        sample code createExam

        return examid,teacher_class_examid as array


        table relationship -> teacher_class_videos : video 
        remove sample in sample_teacher_class_videos table
        remove sample in sample_videos table

    */
   
    public function createExam($tid,$lid,$exam_name,$examcategoryid,$examtype,$start_datetime,$end_datetime,$subjectlistid,$subjectid,$lessontopicid,$classid){
		$obj1=new Dbcon();
        $conn=$obj1->connect();
		//create an array to return examid and teacher_class_examid
        $eid_tceid_arr=array();
        $approved=1;
        $sharedStatus=1;
        //get teacher country to make teachers country time
        $obj_teacher=new Teacher();
		$teacher_country=$obj_teacher->getTeacherCountry($tid);
        $create_time=dateFindFromCountry($teacher_country);
        //$create_time = date('Y-m-d H:i:s');
        //create unique id for lesson id
        $examid=md5(uniqid($tid,true));
        $stmt1 = $conn->prepare("INSERT INTO exam (eid, examtypeid, examname, create_time, approved, examcategoryid, subjectlistid, subjectid, lessonid, lessontopicid, classid, tid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("ssssisssssss", $examid, $examtype, $exam_name, $create_time, $approved, $examcategoryid, $subjectlistid, $subjectid, $lid, $lessontopicid, $classid, $tid);
        $stmt1->execute();
        $stmt1->close();
                
        $approved_teacher_class_exam=0;
        $trashed=0;
        //create unique id for teacher_class_examid
        $teacher_class_examid=md5(uniqid($classid,true));
        $stmt2 = $conn->prepare("INSERT INTO teacher_class_exams (teacher_class_examid, classid, examid, starting_time, ending_time, approved, tid, lessonid, lessontopicid, sharedStatus, original_classid, trashed, create_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("sssssssssisis", $teacher_class_examid, $classid, $examid, $start_datetime, $end_datetime, $approved_teacher_class_exam, $tid, $lid, $lessontopicid, $sharedStatus, $classid, $trashed, $create_time);
        // set parameters and execute
        //$teacher_class_lessonid = $teacher_class_lessonid;
        //$cid = $cid;
        //$tid = $tid;
        //$lid = $lessonid;
        //$approved_teacher_class_exam = $approved_teacher_class_exam;
        $stmt2->execute();



        $stmt2->close();
        
        $conn->close();
        $eid_tceid_arr[0]=$examid;
        $eid_tceid_arr[1]=$teacher_class_examid;
        return $eid_tceid_arr;
        
        
        //header("Location: teacher-class-lesson-subtopic-create.php?cid=".$cid."&lid=".$lessonid);
		
    }
    
    
    public function editVideoTopicOnly($vid,$tid,$vt){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
		$sql = "UPDATE videos SET videotopic=? WHERE videoid=? AND tid=?"; // SQL with parameters
		$stmt = $conn->prepare($sql); 
		$stmt->bind_param("sss", $vt, $vid, $tid);
		$stmt->execute();
		//header("Location: teacher-classes-lesson-subtopic-result.php?cid=".$cid."&lid=".$lid."&ltid=".$lessontopicid);
		
	}
    public function editVideoDescOnly($vid,$tid,$vd){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
		$sql = "UPDATE videos SET video_desc=? WHERE videoid=? AND tid=?"; // SQL with parameters
		$stmt = $conn->prepare($sql); 
		$stmt->bind_param("sss", $vd, $vid, $tid);
		$stmt->execute();
		//header("Location: teacher-classes-lesson-subtopic-result.php?cid=".$cid."&lid=".$lid."&ltid=".$lessontopicid);
		
	}


    public function getVideoIDListFromVid($vid){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
		$find_videoid="select * from videos where videoid='$vid'";
		$result_video_list = $conn->query($find_videoid);
        return $result_video_list;
		
    }
   
    //get exams of teacher->class->lesson
    //call from teacher-lesson-exams.php
    public function getLessonVideoIDList($tid,$cid,$lid){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
		$find_videoid="select * from teacher_class_videos where tid='$tid' AND classid='$cid' AND lessonid='$lid' AND lessontopicid is null order by create_time DESC";
		$result_videoid = $conn->query($find_videoid);
        return $result_videoid;
		
    }
    //get exams of teacher->class->lesson
    //call from teacher-lesson-exams.php
    public function getLessonTopicVideoIDList($tid,$cid,$lid,$lstid){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
		$find_videoid="select * from teacher_class_videos where tid='$tid' AND classid='$cid' AND lessonid='$lid' AND lessontopicid='$lstid' order by create_time DESC";
		$result_videoid = $conn->query($find_videoid);
        return $result_videoid;
		
    }
    public function getClassVideoIDList($tid,$cid){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
		$find_videoid="select * from teacher_class_videos where tid='$tid' AND classid='$cid' AND lessonid IS NULL AND lessontopicid IS NULL order by create_time DESC";
		$result_videoid = $conn->query($find_videoid);
        return $result_videoid;
		
    }
    
    public function getSharedStatus($vid,$cid){
        $obj_shareVideo=new Dbcon();
        $conn=$obj_shareVideo->connect();
        
        $find_count="select * from teacher_class_videos where videoid='$vid' AND classid='$cid' ";
        $result_count = $conn->query($find_count);
		$count_exam=mysqli_num_rows($result_count);
        if($count_exam>0){
            $row = mysqli_fetch_assoc($result_count);
		    return $row['sharedStatus'];
        }else{
            return null;
        }
        
    }

   
    
    
    //call from teacher-lessonlist.php, teacher-lessons-exams.php
    public function getLessonVideoCount($cid,$lid){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
        //$lessontopicid=NULL;
		$find_lessonVideoCount="select * from teacher_class_videos where classid='$cid' AND lessonid='$lid' AND lessontopicid IS NULL ";
        $result_lessonVideoCount = $conn->query($find_lessonVideoCount);
		$count_lessonVideo=mysqli_num_rows($result_lessonVideoCount);
		return $count_lessonVideo;
		
    }
    //call from teacher-lessonlist.php, teacher-lessons-exams.php
    public function getLessonTopicVideoCount($cid,$lid,$lstid){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
        //$lessontopicid=NULL;
		$find_lessonVideoCount="select * from teacher_class_videos where classid='$cid' AND lessonid='$lid' AND lessontopicid='$lstid' ";
        $result_lessonVideoCount = $conn->query($find_lessonVideoCount);
		$count_lessonVideo=mysqli_num_rows($result_lessonVideoCount);
		return $count_lessonVideo;
		
    }
    //call from teacher-lessonlist.php, teacher-lessons-exams.php
    public function getClassVideoCount($cid){
		$obj_conn=new Dbcon();
        $conn=$obj_conn->connect();
        //$lessontopicid=NULL;
		$find_videoCount="select * from teacher_class_videos where classid='$cid' AND lessonid IS NULL AND lessontopicid IS NULL";
        $result_videoCount = $conn->query($find_videoCount);
		$count_video=mysqli_num_rows($result_videoCount);
		return $count_video;
		
    }

    
   



    
}

?>