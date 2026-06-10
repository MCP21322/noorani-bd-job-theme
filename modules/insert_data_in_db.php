<?php

//insert data in database dynamic class

class noorani_insurt_data_in_database{
    private $noorani_table_name;
    public function __construct($suffix){
        global $wpdb;
        $this->noorani_table_name = $wpdb->prefix . $suffix;
    }
    //table name access methord
    public function get_noorani_table_nane(){
        return $this->noorani_table_name;
    }
    //insert data methord 
    public function noorani_data_insert(array $data){
        global $wpdb;
        $success = $wpdb->insert(
            $this->noorani_table_name,
            $data,
        );
       
        if($success){
            return $wpdb->insert_id;
        }
        return false;
    }
}






