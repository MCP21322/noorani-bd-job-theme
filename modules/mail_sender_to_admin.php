<?php
// mail sender to admin dynamic class

class noorani_mail_sender_engine{
    private $noorani_table_name;

    public function __construct($suffix){
        global $wpdb;
        $this->noorani_table_name = $wpdb->prefix . $suffix;
    }
    //mail sender methord
    public function noorani_send_mail_to_admin($target_mail){
        global $wpdb;

        $result = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM {$this->noorani_table_name} WHERE status = %s ORDER BY id DESC",
                'pending',
            ),
            ARRAY_A,    
        );
        if(empty($result)){
            return 'নতুন কোনো পেন্ডিং মেসেজ নেই।';
        }
        $mail_body = "নোরানি জবস পোর্টাল থেকে নতুন পেন্ডিং মেসেজ তালিকা:\n";
        $mail_body .= "----------------------------------------\n";

        $processed_ids = [];
        
        foreach($result as $row){
          $mail_body .= "মেইল বডি" . $row['id'] . "/n";
          if(isset($row['user_name'])){
            $mail_body = "নাম: " . $row['user_name'] . "\n";
          }
          if(isset($row['user_email'])){
            $mail_body .= "ইমেইল: " . $row['user_email'] . "\n";
          }
          $mail_body .= "মেসেজ: " . $row['message'] . "\n";
          $mail_body .= "সময়: " . $row['created_at'] . "\n";
          $mail_body .= "----------------------------------------\n";
           $processed_ids[] = $row['id'];
        };
       

        //logic of sending mail to admin
        $subject = "নোরানি জবস পোর্টাল থেকে নতুন পেন্ডিং মেসেজ";
        $headers = array('Content-Type: text/plain; charset=UTF-8');
        $mail_sent = wp_mail($target_mail, $subject, $mail_body, $headers);

        if($mail_sent && !empty($processed_ids)){
            foreach($processed_ids as $id){
                $wpdb->update(
                    $this->noorani_table_name,
                    array('status' => 'sent'),
                    array('id' => $id),
                    array('%s'),    
                    array('%d'),
                )
                return true;

        }
        return false;
    }

}



$mail_engine = new noorani_mail_sender_engine("noorani_user_message");
$target_receiver_email = "mdmahady9988@gmail.com"; 

$send_status = $mail_engine->noorani_send_mail_to_admin($target_receiver_email);

if ( $send_status === true ) {
    echo "পেন্ডিং মেইলগুলো সফলভাবে পাঠানো হয়েছে এবং ডাটাবেজে স্ট্যাটাস আপডেট করা হয়েছে!";
} else {
    echo "স্ট্যাটাস: " . $send_status;
}




