<?php
$options = array(
    'delete_type' => 'POST',
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name' => 'socceri',
    'db_table' => 'files'
);

//$link = mysqli_connect("localhost", "starrDb1234", "starrDb1234", "starrDb");

/*$options = array(
    'delete_type' => 'POST',
    'db_host' => 'localhost',
    'db_user' => 'socce_tbd',
    'db_pass' => 'wRul2$27',
    'db_name' => 'soccerin_tbd',
    'db_table' => 'files'
);*/

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

class CustomUploadHandler extends UploadHandler {

    protected function initialize() {
        $this->db = new mysqli(
            $this->options['db_host'],
            $this->options['db_user'],
            $this->options['db_pass'],
            $this->options['db_name']
        );
        parent::initialize();
        $this->db->close();
    }

    protected function handle_form_data($file, $index) {
		$file->title = @$_REQUEST['title'][$index];
        $file->description = @$_REQUEST['description'][$index];	
		$file->catid = $_REQUEST['catid'][$index];
		$file->subcatid = $_REQUEST['subcatid'][$index];
		$file->status = '1';
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        if (empty($file->error)) {
            $sql = 'INSERT INTO `'.$this->options['db_table']
                .'` (`name`, `size`, `type`, `title`, `description`,`catid`,`subcatid`,`status`)'
                .' VALUES (?, ?, ?, ?, ?,?,?,?)';
            $query = $this->db->prepare($sql);
            $query->bind_param(
                'sissssss',
				$file->name,
                $file->size,
                $file->type,
                $file->title,
                $file->description,
				$file->catid,
				$file->subcatid,
				$file->status
            );
            $query->execute();
            $file->id = $this->db->insert_id;
        }
        return $file;
    }

    protected function set_additional_file_properties($file) {
        parent::set_additional_file_properties($file);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $sql = 'SELECT `id`, `type`, `title`, `description` FROM `'
                .$this->options['db_table'].'` WHERE `name`=?';
            $query = $this->db->prepare($sql);
            $query->bind_param('s', $file->name);
            $query->execute();
            $query->bind_result(
                $id,
                $type,
                $title,
                $description
            );
            while ($query->fetch()) {
                $file->id = $id;
                $file->type = $type;
                $file->title = $title;
                $file->description = $description;
            }
        }
    }

    public function delete($print_response = true) {
        $response = parent::delete(false);
        foreach ($response as $name => $deleted) {
            if ($deleted) {
                $sql = 'DELETE FROM `'
                    .$this->options['db_table'].'` WHERE `name`=?';
                $query = $this->db->prepare($sql);
                $query->bind_param('s', $name);
                $query->execute();
            }
        } 
        return $this->generate_response($response, $print_response);
    }

}

$upload_handler = new CustomUploadHandler($options);
