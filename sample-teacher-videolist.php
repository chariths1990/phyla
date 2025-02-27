
<html>
    <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
<body>
    <?php
        $session_teacher_id='e5b532beee928df137ac793386cc7f3b';
        $videolist_classid='033ee9424b92ce268fd42c4d2300f7b2';
        $subjectListID='19';
        $subjectid='8ad80f0e2bb2973c38bc43496da386c8';
    ?>
<a title="Upload new video" href="#" onclick="document.getElementById('insert_newVideo').style.display='block'"> 
    Upload 
    <i class="fa fa-keyboard-o" aria-hidden="true" style="font-size:16px;color:teal"></i> <!--<span class="tooltiptext">Insert new exam</span>-->
</a>


<div id="insert_newVideo" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
	<header class="w3-container w3-teal">
		<span onclick="document.getElementById('insert_newVideo').style.display='none'"
		class="w3-button w3-display-topright">&times;</span>
		<h4>Upload New Video </h4>
	</header>
        
	<form method="post" id="upload_lesson_video" action="sample-teacher-upload-class-video.php" class="w3-container">
        <p></p>
        <input name="tid" type="hidden" class="w3-input w3-border w3-margin-bottom" value="<?php echo $session_teacher_id; ?>" required>
        <input name="cid" type="hidden" class="w3-input w3-border w3-margin-bottom" value="<?php echo $videolist_classid; ?>" required>
        <input name="slid" type="hidden" class="w3-input w3-border w3-margin-bottom" value="<?php echo $subjectListID; ?>" required>
		<input name="sid" type="hidden" class="w3-input w3-border w3-margin-bottom" value="<?php echo $subjectid; ?>" required>
		
        <input class="w3-input w3-border" type="text" placeholder="Video Topic" required name="video_topic">
        <textarea maxlength="50000" name="video_desc" placeholder="Video Description(Max 50000 characters)" rows="5" cols="50" id="subtopic" required></textarea><br>
        <input type="file" id="myFile" name="filename">            
        
		<p><button class="w3-btn w3-teal" type="submit" name="submit">UPLOAD VIDEO</button></p>
		  
	</form>
    </div>
</div>	  	  	
<!-- this page redirects to  'sample-teacher-upload-class-video.php' page when upload video-->

</body>
</html>
