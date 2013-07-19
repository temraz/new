<?php

class sitead extends CI_Model {

    public function valid_employee_pass($user, $pass) {

        $this->db->select('id,username,pass');
        $this->db->from('employee');
        $this->db->where('username', $user);
        $this->db->where('pass', $pass);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row(0)->id;
        } else {
            return false;
        }
    }
    
    function addOffer($data){
        $this->db->insert('offers', $data);
    }

    public function update($data, $table, $where) {
        $this->db->where('id', $where);
        return $this->db->update($table, $data);
    }

    function approve_topic($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('topic', $data);
    }

    function getTopicDetails($id) {

        $this->db->from('topic');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function valid_user_pass($user, $pass) {

        $this->db->select('id,username,pass');
        $this->db->from('civou');
        $this->db->where('username', $user);
        $this->db->where('pass', $pass);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row(0)->id;
        } else {
            return false;
        }
    }

    function valid_user_pin($user, $pin) {
        $this->db->select('id,username,pincode');
        $this->db->from('sitead');
        $this->db->where('username', $user);
        $this->db->where('pincode', $pin);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row(0)->id;
        } else {
            return false;
        }
    }

    function addcategory($categoryname) {
        $data = array("name" => $categoryname);
        $insert = $this->db->insert('category', $data);
        return $insert;
    }

    function addbcategory($categoryname) {
        $data = array("name" => $categoryname);
        $insert = $this->db->insert('blog_category', $data);
        return $insert;
    }

    function SelectbCategory() {
        $query = $this->db->get('blog_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function select_category() {
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function addsubcategory($categoryname, $categoryid) {
        $data = array("name" => $categoryname, "c_id" => $categoryid);
        $insert = $this->db->insert('sub_categ', $data);
        return $insert;
    }

    function addbsubcategory($categoryname, $categoryid) {
        $data = array("name" => $categoryname, "b_c_id" => $categoryid);
        $insert = $this->db->insert('blog_sub_categ', $data);
        return $insert;
    }

    function do_upload() {
        $gallery_path = realpath(APPPATH . '../imagesService/');
        $config = array(
            'allowed_types' => 'jpg|png|jpeg|gif',
            'upload_path' => $gallery_path,
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        //***********************************
        $image_data = $this->upload->data(); //get image data

        $config = array(
            'source_image' => $image_data['full_path'], //get original image
            'new_image' => $gallery_path . '/thumb', //save as new image //need to create thumbs first
            'maintain_ratio' => true,
            'width' => 300,
            'height' => 160
        );

        $this->load->library('image_lib', $config); //load library
        $this->image_lib->resize(); //do whatever specified in config
        $pic_name = $image_data['file_name'];
        return $pic_name;
    }

    function addservice($data) {
        $insert = $this->db->insert('service', $data);
        return $insert;
    }

    function addemployee($data) {
        $insert = $this->db->insert('employee', $data);
        return $insert;
    }

    function addadmin($data) {
        $insert = $this->db->insert('civou', $data);
        return $insert;
    }

    function selectAllService() {
        $query = $this->db->get('service');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function selectSercive_by_C($c_id) {
        $this->db->from('service');
        $this->db->from('c_id', $c_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function delete($id, $tablename) {
        $this->db->where('id', $id);
        return $this->db->delete($tablename);
    }

    function vaild_amount_point($user_id) {
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $rows = $query->result();
            foreach ($rows as $row) {
                
            }
        }
        return $row->amount_point;
    }

    function get_amount_money($user_id) {
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $rows = $query->result();
            foreach ($rows as $row) {
                
            }
        }
        return $row->amount_money;
    }

    /////////////////
    function do_buy_process($user_id, $order_id, $order_point, $amount, $c_id, $sc_id, $duration) {

        if ($order_point > $amount) {
            //amount_money
            $amount_money = $this->get_amount_money($user_id);
            if ($amount_money > 0) {
                $data = array(
                    'title' => 'خطاء',
                    'mesg' => 'خطاء أثناء  العملية الرصيد لا يكفى
                                <a href="'. base_url() .'payment/convertFromCreditToShelinat">أذهب الى صفحة تحويل  رصيد من دولرات الى شلنات من هنا </a>
                                '
                );
            } else {
                $data = array(
                    'title' => 'خطاء',
                    'mesg' => 'خطاء أثناء  العملية الرصيد لا يكفى ولا يوجد لديك دولارات 
                                <a href="'. base_url() .'payment/addCreditPage"> يمكنك تحويل رصيد من خلال هذا الرابط </a>
                        '
                );
            }

            $this->load->view('message', $data);
        } else {
//            echo 'Amount : ' . $amount;
//            echo 'Order Amount : ' . $order_point;
            $amount-=$order_point;
//            echo 'Amount : ' . $amount;
            //transaction to commet tow sql statement
            $this->db->trans_start();
//            $date = date_create(date("Y-m-d"));
//            $date =date_add(date_create(date("Y-m-d")), date_interval_create_from_date_string('5 days'));
//            $time = strtotime($date);
//            $date = Date('Y:m:d', strtotime("+" . $duration . " days"));
            $this->db->insert('order', array('s_id' => $order_id, 'u_id' => $user_id, 'c_id' => $c_id, 'sc_id' => $sc_id, 'duration' => $duration));//, 'end' => $date)
            $this->db->where('id', $user_id);
            $this->db->update('user', array('amount_point' => $amount));
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                //redirect
                $data = array(
                    'title' => 'خطاء',
                    'mesg' => 'خطاء أثناء  العملية'
                );
                $this->load->view('message', $data);
//            echo 'Error';
            } else {
                //get user_id
                $this->load->model('notifications');
                $this->notifications->add($user_id, 'تمت عملية شراء الخدمة' . 'مقابل' . $order_id . ' شلن' . '', 'user/profile', 'user', 'user', 'الخدمة');
                //
                //redirect
//            echo 'Goooooooooooooood';
                $data = array(
                    'title' => 'تم بنجاح',
                    'mesg' => 'تمت عملية الشراء بنجاح'
                );

                $this->load->view('message', $data);
            }
        }
    }

//--------------------------------------------/
    ///////////////////////////////
    function add($data, $table) {
        $insert = $this->db->insert($table, $data);
        return $insert;
    }

    ///////////////////////////////
    function active($id, $active) {
        $this->db->where('id', $id);
        return $this->db->update('news', array('active' => $active));
    }

    function activeStatue($id, $active, $table) {
        $this->db->where('id', $id);
        return $this->db->update($table, array('statue' => $active));
    }

    function update_amount($id, $amount) {
        //UPDATE `user` SET `amount_point`=(`user`.`amount_point` +90) WHERE `id`=2
//        $this->db->where('id', $id);
        $sql = "UPDATE `user` SET `amount_point`=(`user`.`amount_point` +$amount) WHERE `id`=$id";
//        return $this->db->update('user',$data);
        return $this->db->query($sql);
    }

    function update_num_service($id) {
        $sql = "UPDATE `service` SET `order_num`=(`service`.`order_num` +1) WHERE `id`=$id";
        return $this->db->query($sql);
    }

    function update_num_blog($id) {
        $sql = "UPDATE `topic` SET `num_seen`=(`topic`.`num_seen` +1) WHERE `id`=$id";
        return $this->db->query($sql);
    }

    //
    function update_block($data, $name) {
        $this->db->where('name', $name);
        return $this->db->update('block', $data);
    }

    function get_user_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('topic');
        if ($query->num_rows() > 0) {
            $rows = $query->result();

            foreach ($rows as $row) {
                return $row->user_id;
            }
        }
    }

}

?>
