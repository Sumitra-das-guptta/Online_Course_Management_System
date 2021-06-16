<?php
include_once 'session.php';
include 'database.php';
class user
{
	private $db;
	
	function __construct()
	{
	$this->db=new database();	
	}
	public function userregistration($data){
		$name      =$data['name'];
		$username  =$data['username'];
		$email     =$data['email'];
		//$id        =$data['id'];
		$department=$data['department'];
		$semester     =$data['semester'];
		$registration_no     =$data['registration_no'];
		$password  =md5($data['password']);
		$chk_email = $this->emailCheck($email);
		if ($name=="" OR $username=="" OR $email=="" OR $department=="" OR $semester=="" OR $password=="" OR $registration_no=="" ) {

			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		if (strlen($username)<3) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>User name is too short! </div>";
			return $msg;
		}elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Username must only contain alphanumerical,dashes and underscores ! </div>";
			return $msg;
		}
		/*if (strlen($password)<6) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>password is too short! </div>";
		}*/
		if (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Email Address is not valid! </div>";
			return $msg;

		}
		if ($chk_email==true) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email address already exist ! </div>";
			return $msg;
		}
$sql="INSERT INTO tbl_user(name,username,email,department,semester,registration_no,password,usertype) VALUES(:name,:username,:email,:department,:semester,:registration_no,:password,'student')";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':department',$department);
		$query->bindValue(':semester',$semester);
		$query->bindValue(':registration_no',$registration_no);
		$query->bindValue(':password',$password);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank you,you have been registered ! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem inserting your details. ! </div>";
			return $msg;
		}

	}
	public function emailCheck($email){
		$sql = "SELECT email FROM tbl_user WHERE email= :email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}else{
			return false;
		}

	}
	public function emailCheckteacher($email){
		$sql = "SELECT email FROM tbl_user WHERE email= :email AND usertype= 'teacher'";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}else{
			return false;
		}

	}
	public function emailCheckadmin($email){
		$sql = "SELECT email FROM tbl_user WHERE email= :email AND usertype= 'admin'";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}else{
			return false;
		}

	}
	public function tidCheck($tid){
		$sql = "SELECT tid FROM tbl_user WHERE tid= :tid";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':tid',$tid);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}else{
			return false;
		}

	}
	public function courseCheck($coursecode){
		$sql = "SELECT coursecode FROM course WHERE coursecode= :coursecode";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':coursecode',$coursecode);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}else{
			return false;
		}

	}
	public function getloginuser($email,$password){

		$sql = "SELECT * FROM tbl_user WHERE email= :email AND password=:password LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;

	}
	public function getloginadmin($email,$password){

		$sql = "SELECT * FROM tbl_user WHERE email= :email AND password=:password LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;

	}
	public function getloginteacher($email,$password){

		$sql = "SELECT * FROM teacher WHERE email= :email AND password=:password LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;

	}
	public function userlogin($data){

		
		$email     =$data['email'];
		$password  =md5($data['password']);
		$chk_email = $this->emailCheck($email);

		if ($email=="" OR $password=="" ) {

			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		if (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Email Address is not valid! </div>";
			return $msg;

		}
		if ($chk_email==false) {
			$chk_email = $this->emailCheckteacher($email);
			if($chk_email==false){
			$chk_email = $this->emailCheckadmin($email);
			if($chk_email==false){	
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email address not exist ! </div>";
			return $msg;
		}
		else{
		$result=$this->getloginadmin($email,$password);
		if ($result) {
			session::init();
			session::set("login",true);
			session::set("id",$result->id);
			session::set("name",$result->name);
			session::set("username",$result->username);
			
			session::set("username",$result->username);
			session::set("department",$result->department);
			session::set("usertype",$result->usertype);
			session::set("loginmsg","<div class='alert alert-success'><strong>Success !</strong>You are logged in ! </div>");
			header("Location: index.php");
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Data not found ! </div>";
			return $msg;
		}	
		}
	}
		else{
		$result=$this->getloginteacher($email,$password);
		if ($result) {
			session::init();
			session::set("login",true);
			session::set("tid",$result->tid);
			session::set("name",$result->name);
			session::set("username",$result->username);
			session::set("usertype",$result->usertype);
			session::set("department",$result->department);
			session::set("loginmsg","<div class='alert alert-success'><strong>Success !</strong>You are logged in ! </div>");
			header("Location: index.php");
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Data not found ! </div>";
			return $msg;
		}	
		}
		}
		$result=$this->getloginuser($email,$password);
		if ($result) {
			session::init();
			session::set("login",true);
			session::set("id",$result->id);
			session::set("name",$result->name);
			session::set("username",$result->username);
			session::set("semester",$result->semester);
			session::set("department",$result->department);
			session::set("usertype",$result->usertype);
			session::set("loginmsg","<div class='alert alert-success'><strong>Success !</strong>You are logged in ! </div>");
			header("Location: index.php");
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Data not found ! </div>";
			return $msg;
		}
	}
	public function getuserdata(){
		$sql = "SELECT * FROM tbl_user WHERE usertype='student' ORDER BY id DESC";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
		}
		public function getteacherdata(){
		$sql = "SELECT * FROM tbl_user WHERE usertype='teacher' ORDER BY id DESC";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
		}

		public function getUserById($id){
		$sql = "SELECT * FROM tbl_user WHERE id=:id LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;

}
public function getTeacherByname($name){
		$sql = "SELECT * FROM tbl_user WHERE name=:name AND usertype='teacher' LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;
		
}
public function updateteacherdata($id,$data){
	    $name      =$data['name'];
		$username  =$data['username'];
		$email     =$data['email'];
		$department=$data['department'];
		$tid     =$data['tid'];
		$contactno     =$data['contactno'];
		$credittake     =$data['credittake'];
		$designation     =$data['designation'];
		
		if ($name=="" OR $username=="" OR $email=="" OR $department=="" OR $tid=="" OR $contactno=="" OR $credittake=="" OR $designation=="") {


			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		
$sql="UPDATE tbl_user set
          name=:name,
           username=:username,
            email=:email,
             department=:department,
             id=:id,
              tid=:tid,
              credittake=:credittake,
              designation=:designation,
              contactno=:contactno
             WHERE id=:id;
          ";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':department',$department);
		$query->bindValue(':id',$id);
		$query->bindValue(':tid',$tid);
		$query->bindValue(':credittake',$credittake);
		$query->bindValue(':designation',$designation);
		$query->bindValue(':contactno',$contactno);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>User data updated successfully ! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem updating your details. ! </div>";
			return $msg;
		}


}
public function updateuserdata($id,$data){
	    $name      =$data['name'];
		$username  =$data['username'];
		$email     =$data['email'];
		$department=$data['department'];
		$semester     =$data['semester'];
		
		
		if ($name=="" OR $username=="" OR $email=="" OR $department=="" OR $semester=="") {


			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		
$sql="UPDATE tbl_user set
          name=:name,
           username=:username,
            email=:email,
             department=:department,
             semester=:semester,
             id=:id
             WHERE id=:id;
          ";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':department',$department);
		$query->bindValue(':semester',$semester);
		$query->bindValue(':id',$id);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>User data updated successfully ! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem updating your details. ! </div>";
			return $msg;
		}


}

public function updatecoursedata($coursecode,$data){
	   // $coursecode      =$data['coursecode'];
		$coursetitle  =$data['coursetitle'];
		$assignto     =$data['assignto'];
		$credit=$data['credit'];
		$semester     =$data['semester'];
		$reference_book=$data['reference_book'];
		
		if ($reference_book=="" OR $coursetitle=="" OR $credit=="" OR $semester=="") {


			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		
$sql="UPDATE course set
          coursecode=:coursecode,
           coursetitle=:coursetitle,
            assignto=:assignto,
             credit=:credit,
             semester=:semester,
             reference_book=:reference_book

             WHERE coursecode=:coursecode;
          ";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':coursecode',$coursecode);
		$query->bindValue(':coursetitle',$coursetitle);
		$query->bindValue(':assignto',$assignto);
		$query->bindValue(':credit',$credit);
		$query->bindValue(':semester',$semester);
		$query->bindValue(':reference_book',$reference_book);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>Course data updated successfully ! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem updating course details. ! </div>";
			return $msg;
		}


}

private function checkpassword($id,$old_pass){
	$password=md5($old_pass);
	$sql = "SELECT password FROM tbl_user WHERE id=:id AND password= :password ";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->bindValue(':password',$password);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}else{
			return false;
		}
}
public function updateuserpassword($id,$data){
$old_pass=$data['old_pass'];
$new_pass=$data['password'];
$chk_pass=$this->checkpassword($id,$old_pass);
if ($old_pass == "" OR $new_pass == "") {
	$msg = "<div class= 'alert alert_danger'><strong>Error!</strong>Field must not be empty !</div>";
	return $msg;
}

if ($chk_pass==false) {
	$msg = "<div class= 'alert alert_danger'><strong>Error!</strong>old password not exist!</div>";
	return $msg;
	
}
if (strlen($new_pass)<6) {
	$msg = "<div class= 'alert alert_danger'><strong>Error!</strong> password is too small!</div>";
	return $msg;
}
$password=md5($new_pass);
$sql="UPDATE tbl_user set
        password=:password;
             WHERE id=:id;
          ";
$query = $this->db->pdo->prepare($sql);
		
	
	
		$query->bindValue(':password',$password);
		$query->bindValue(':id',$id);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>Password updated successfully ! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Password not updated! </div>";
			return $msg;
		}
}
public function courseregistration($data){
		$coursecode      =$data['coursecode'];
		$coursetitle  =$data['coursetitle'];
		$semester     =$data['semester'];
		$credit     =$data['credit'];
		//$assignto     =$data['assignto'];
		$chk_course = $this->courseCheck($coursecode);
		if ($coursecode=="" OR $coursetitle=="" OR $semester=="" OR $credit=="") {

			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		if (strlen($coursetitle)<3) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Course title is too short! </div>";
			return $msg;
		}
		if ($chk_course==true) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>The course already exist ! </div>";
			return $msg;
		}
		/*if (strlen($password)<6) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>password is too short! </div>";
		}*/
		
$sql="INSERT INTO course(coursecode,coursetitle,semester,credit) VALUES(:coursecode,:coursetitle,:semester,:credit)";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':coursecode',$coursecode);
		$query->bindValue(':coursetitle',$coursetitle);
		$query->bindValue(':semester',$semester);
		$query->bindValue(':credit',$credit);
		//$query->bindValue(':assignto',$assignto);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank you,course has been saved successfully! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem inserting your details. ! </div>";
			return $msg;
		}

	}
	public function assignteacher($data){
		$coursecode      =$data['coursecode'];
		$assignto     =$data['assignto'];
		$chk_teacher=$this->getcoursebycode($coursecode);
		$assign=$chk_teacher->assignto;
		$credit=$chk_teacher->credit;
     $chk_remcredit=$this->getTeacherByname($assignto);
     $remcredit=$chk_remcredit->remainingcredit;
		if($assign =="" AND $credit<=$remcredit){
$sql="UPDATE tbl_user set
             remainingcredit=:remainingcredit
             WHERE name=:name;
          ";
$query = $this->db->pdo->prepare($sql);
		 $newcredit=($remcredit-$credit); 
		$query->bindValue(':name',$assignto);
		$query->bindValue(':remainingcredit',$newcredit);
		$result1= $query->execute();
		$sql="UPDATE course set
             coursecode=:coursecode,
             assignto=:assignto
             WHERE coursecode=:coursecode;
          ";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':coursecode',$coursecode);
		$query->bindValue(':assignto',$assignto);
		$result= $query->execute();
		if ($result) {
			if($result1){
		$msg = "<div class='alert alert-success'><strong>Success !</strong>Course assigned successfully ! </div>";
			return $msg;
			}	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem updating your details. ! </div>";
			return $msg;
		}

		}
		else{
		if($assign!=""){
		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,this course has already been assigned ! </div>";
			return $msg;	
		}
		else{
		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,the teacher has not enough credit remaining ! </div>";
			return $msg;
		}
		}

	}
	public function getcoursebycode($coursecode){
		$sql = "SELECT * FROM course WHERE coursecode=:coursecode LIMIT 1" ;
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':coursecode',$coursecode);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;
		}
	public function getcoursedata(){
		$sql = "SELECT * FROM course ORDER BY coursecode DESC";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
		}
		public function unassigncourse($coursecode){
		
		$getdata=$this->getcoursebycode($coursecode);
		$semester   =$getdata->semester;
		$credit     =$getdata->credit;
		$assignto   =$getdata->assignto;
		$rcredit=$this->getTeacherByname($assignto);
     $remcredit=$rcredit->remainingcredit;
     $tid=$rcredit->tid;
     if($assignto!=''){
$sql="UPDATE course set
        assignto=:assignto
             WHERE coursecode=:coursecode AND semester=:semester;
          ";
$query = $this->db->pdo->prepare($sql);
		
	
	
		$query->bindValue(':assignto',NULL);
		$query->bindValue(':coursecode',$coursecode);
		$query->bindValue(':semester',$semester);
		$result= $query->execute();


		$sql="UPDATE tbl_user set
        remainingcredit=:remainingcredit
             WHERE name=:name AND tid=:tid;
          ";
$query = $this->db->pdo->prepare($sql);
		
	
	$newrcredit=($remcredit+$credit);
		$query->bindValue(':remainingcredit',$newrcredit);
		$query->bindValue(':name',$assignto);
		$query->bindValue(':tid',$tid);
		$result1= $query->execute();

		if ($result) {
			if($result1){
		$msg = "<div class='alert alert-success'><strong>Success !</strong>unassign successfully ! </div>";
			return $msg;	
		}}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Failed to unassign course! </div>";
			return $msg;
		}
	}
	}
		public function teacherregistration($data){
		$name      =$data['name'];
		$username  =$data['username'];
		$email     =$data['email'];
		$tid        =$data['tid'];
		$contactno=$data['contactno'];
		$credittake     =$data['credittake'];
		$designation     =$data['designation'];
		$department     =$data['department'];
		$password  =md5($data['password']);
		$chk_email = $this->emailCheck($email);
		$chk_tid = $this->tidCheck($tid);
		//$chk_emailteacher = $this->emailCheckteacher($email);
		if ($name=="" OR $username=="" OR $email=="" OR $tid ==""  OR $credittake=="" OR $designation=="" OR $department=="" OR $password=="" ) {

			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		if (strlen($username)<3) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>User name is too short! </div>";
			return $msg;
		}elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Username must only contain alphanumerical,dashes and underscores ! </div>";
			return $msg;
		}
		/*if (strlen($password)<6) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>password is too short! </div>";
		}*/
		if (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Email Address is not valid! </div>";
			return $msg;

		}
		if ($chk_email==true) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email address already exist ! </div>";
			return $msg;
		}
		if ($chk_tid==true) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>The TID already exist ! </div>";
			return $msg;
		}
		
$sql="INSERT INTO tbl_user(name,username,email,tid,contactno,credittake,designation,department,password,usertype) VALUES(:name,:username,:email,:tid,:contactno,:credittake,:designation,:department,:password,'teacher')";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':tid',$tid);
		$query->bindValue(':contactno',$contactno);
		$query->bindValue(':credittake',$credittake);
		$query->bindValue(':designation',$designation);
		$query->bindValue(':department',$department);
		$query->bindValue(':password',$password);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank you,teacher have been registered ! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem inserting your details. ! </div>";
			return $msg;
		}

	}
		public function adminregistration($data){
		$name      =$data['name'];
		$username  =$data['username'];
		$email     =$data['email'];
		$tid        =$data['tid'];
		$contactno=$data['contactno'];
		$credittake     =$data['credittake'];
		$designation     =$data['designation'];
		$department     =$data['department'];
		$password  =md5($data['password']);
		$chk_email = $this->emailCheck($email);
		$chk_tid = $this->tidCheck($tid);
		//$chk_emailteacher = $this->emailCheckteacher($email);
		if ($name=="" OR $username=="" OR $email=="" OR $tid ==""  OR $credittake=="" OR $designation=="" OR $department=="" OR $password=="" ) {

			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be Empty</div>";
			return $msg;
		}
		if (strlen($username)<3) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>User name is too short! </div>";
			return $msg;
		}elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Username must only contain alphanumerical,dashes and underscores ! </div>";
			return $msg;
		}
		/*if (strlen($password)<6) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>password is too short! </div>";
		}*/
		if (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Email Address is not valid! </div>";
			return $msg;

		}
		if ($chk_email==true) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email address already exist ! </div>";
			return $msg;
		}
		if ($chk_tid==true) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>The TID already exist ! </div>";
			return $msg;
		}
		
$sql="INSERT INTO tbl_user(name,username,email,tid,contactno,credittake,designation,department,password,usertype) VALUES(:name,:username,:email,:tid,:contactno,:credittake,:designation,:department,:password,'admin')";
$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':tid',$tid);
		$query->bindValue(':contactno',$contactno);
		$query->bindValue(':credittake',$credittake);
		$query->bindValue(':designation',$designation);
		$query->bindValue(':department',$department);
		$query->bindValue(':password',$password);
		$result= $query->execute();
		if ($result) {
		$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank you,another admin have been registered ! </div>";
			return $msg;	
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry,there has been problem inserting your details. ! </div>";
			return $msg;
		}

	}

}
?>