<?php
class PlaygroundController extends baseController
{
 
  public function indexAction() {
    
    $this->display();
  }
  
  public function joinAction() {
    
    if($_GET["app"]!="footprint")
      header("location:/playground/");
    
    $this->_mainContent->assign("app",$_GET["app"]);
    $this->display();
  }
  
  public function saverequestAction() {
    
    // $db = new PlaygroundModel();
    // $db->save($_POST);
    //header("location:/playground/joinok/");
  }
  
  public function joinokAction() {
    
    $this->display();
  }
  
  public function feedbackAction() {
    
    $data = $_POST["feedback"];
    $data = ToolModel::getRealIpAddr() . "/" . $data . "/". time();
    $feedback = explode("/",$data);
    $db = new PlaygroundModel();
    $sql = "INSERT INTO `playground_feedback` (`ip`,`uuid`,`foursquare`,`instagram`,`feedback`,`createtime`) VALUES('$feedback[0]','$feedback[1]','$feedback[2]','$feedback[3]','$feedback[4]','$feedback[5]');";
    $db->run($sql);
    echo "done";
  }
}


