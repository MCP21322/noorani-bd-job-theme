<?php 

//create a database 
class noorani_database_init{
    private $table_name;
    private $columns = [];
    private $indexing = [];

    public function __construct($suffix){
        global $wpdb;
        $this->table_name = $wpdb->prefix . $suffix;
    }

    public function noorani_add_columns($name, $type){
        $this->columns[] = "$name $type NOT NULL";
        return $this;
    }

    public function noorani_indexing($idx_name, $col_name){
        $this->indexing[] = "KEY $idx_name ($col_name)";
        return $this;
    }
    
    public function noorani_table_create(){
        global $wpdb;

        $all_parts = array_merge(
            ["id mediumint(9) NOT NULL AUTO_INCREMENT"],
            ["created_at datetime DEFAULT CURRENT_TIMESTAMP"],
            $this->columns,
            ["PRIMARY KEY (id)"],
            $this->indexing,
        );
       $sql = "CREATE TABLE {$this->table_name} (\n" . 
       implode(",\n", $all_parts) . 
       "\n) " . $wpdb->get_charset_collate() . ";";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }


}

$db = new noorani_database_init('contact_messages');
$db->noorani_add_columns('user_name', 'varchar(100)')    
   ->noorani_add_columns('user_email', 'varchar(100)')   
   ->noorani_add_columns('user_message', 'longtext')      
   ->noorani_add_columns('status', 'varchar(20)')         
   ->noorani_indexing('email_idx', 'user_email')          
   ->noorani_table_create();







