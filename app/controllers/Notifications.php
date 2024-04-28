<?php

class Notifications extends Controller
{
    public function index()
    {
        
        
        $data = [];
        $notification = new Notification();
        
        if(isset($_POST['key']) && ($_POST['key']== '123')){
            
            $notifications = $notification->show_notifications();
            
            $n_number = $notification->active_notifications();
            $data['total'] = $n_number;
            $data['notifications'] = $notifications;

            
            echo json_encode($data);
        }
        
        if(isset($_POST['key']) && ($_POST['key']== '1234')){
            $data[] = $notification->inactive_notifications();
                 
        }

        if(!isset($_POST['key']) && empty($_POST['key'])){
           echo 'API error';
        }

        
        
    }

    public function seenNotification($id=null)
    {
        // $data = [];
        $notification = new Notification();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        if($id){
            $notification->notificationSeen($id); 
            $notifications = $notification->getNotificationById(['id'=> $id]); 
            $data['notifications'] = $notifications[0];
        } 
       
       
        $this->view($data['notifications']->url, $data);
    }

}   