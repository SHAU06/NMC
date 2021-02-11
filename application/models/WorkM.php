<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkM extends CI_Model
{

    //To return the row from table
    public function GetRow($tablename, $id)
    {
        $query = $this->db->where('id', $id)->get($tablename);
        // $query = $this->db->where('id', $id)->order_by('title', 'DESC')->get($tablename);
        $result = $query->result();
        return $result;
    }

    public function rollback_tra() // To rollback the transaction

    {
        $this->db->trans_rollback();

    }

    public function start_tra() //To Start transaction

    {
        $this->db->trans_start();
    }

    public function commit_tra() //To commit transaction

    {
        $this->db->trans_complete();
    }

    public function Change($tablename, $id) //to change value of active field of tables(called from Change page)

    {

        if ($this->db->set('active', 0)->update($tablename)) {
            if ($this->db->set('active', 1)->where_in('id', $id)->update($tablename)) {
                $logs = [
                    "username" => $this->session->username,
                    "userid" => $this->session->id,
                    "action" => "Changeing Active Operation",
                    "description" => "Changeing opreation by " . $this->session->username . " in " . $tablename . " Section.",
                ];
                $this->db->insert('logs', $logs);

                return true;
            } else {
                $this->session->set_flashdata('error', 'something went wrong');
                return false;
            }
        } else {
            $this->session->set_flashdata('error', 'something went wrong');
            return false;
        }
    }

    public function popup_status_off($status) //To set popup window as OFF

    {
        if ($this->db->set('active', 0)->update('popup_data'));
        if ($this->db->set('status', $status)->update('popup_status'));
        $logs = [
            "username" => $this->session->username,
            "userid" => $this->session->id,
            "action" => "Popup Diactived",
            "description" => "Popup Diactived by " . $this->session->username . " in " . $tablename . " Section.",
        ];
        $this->db->insert('logs', $logs);

    }

    public function popup_status_on($status, $id) // To set popup window as ON

    {
        if ($this->db->set('status', $status)->update('popup_status'));
        if ($this->db->set('active', 0)->update('popup_data')) {
            if ($this->db->set('active', 1)->where_in('id', $id)->update('popup_data')) {
                $logs = [
                    "username" => $this->session->username,
                    "userid" => $this->session->id,
                    "action" => "Popup Actived",
                    "description" => "Popup Actived by " . $this->session->username . " in " . $tablename . " Section.",
                ];
                $this->db->insert('logs', $logs);

                return true;
            } else {
                $this->session->set_flashdata('error', 'something went wrong');
                return false;
            }
        } else {
            $this->session->set_flashdata('error', 'something went wrong');
            return false;
        }
    }

    public function GetNumRow($table) //To retrive no. of rows

    {
        $query = $this->db->get($table);
        $result = $query->num_rows();
        return $result;
    }

    public function GetAll($cat, $limit, $offset = 0) //To retrive all data upto limit as per category

    {
        $query = $this->db->get_where('all_info_table', array('main_category' => $cat), $limit, $offset);
        $result = $query->result();
        return $result;
    }

    public function GetName($Name) //To retrive complete row of given name

    {
        $query = $this->db->like('name', $Name);
        $result = $query->get('all_info_table')->result();
        return $result;
    }

    public function related($Name) //

    {
        $query = $this->db->like('name', $Name);
        $result = $query->get('destpage')->result();
        $result += $query->like('name', $Name)->get('Culturepage')->result();
        $result[0]->id;
        return $result;
    }

    public function t_rows($tablename) // To retrive total no of rows from table

    {
        $no = $this->db->count_all($tablename);
        return $no;
    }

    public function Suggest($cat) // To retrive suggestions of same category

    {

        $query = $this->db->like('main_category', $cat)->order_by('rand()')->limit(3);
        $result = $query->get('all_info_table')->result();

        // $result += $query->like('category', $cat)->get('foodstuff')->result();
        // $result += $query->like('category', $cat)->get('culture')->result();
        // // $result[0]->id;
        return $result;

    }

    public function GetByCategory($cat) // To retrive data count as per same category

    {

        $query = $this->db->like('main_category', $cat);
        $result = $query->get('all_info_table')->result();
        $cnt = count($result);
        return $cnt;

    }

    public function Gets($tablename) //To retrive table data

    {
        $query = $this->db->get($tablename);
        $result = $query->result();
        return $result;
    }

    public function fetch_row($search) //To fetch search result

    {
        if ($search != '') {
            $query = $this->db->query("SELECT id,name,des,img from destination WHERE `name` LIKE '%" . $this->db->escape_like_str($search) . "%' union all SELECT id,name,des,img from foodstuff  WHERE `name` LIKE '%" . $this->db->escape_like_str($search) . "%' ESCAPE '!' ");
            return $query->num_rows();
        }
    }

    public function fetch_limit($search, $limit, $offset = 0) //To fetch search results limit for pagination of results.

    {
        if ($offset == "") {
            $offset = 0;
        }
        $query = "";
        $offset = (int) $this->db->escape($offset);

        if ($search != '') {

            $query = $this->db->query("SELECT id,name,des,img from destination WHERE `name` LIKE '%" .
                $this->db->escape_like_str($search) . "%' ESCAPE '!' UNION all SELECT id,name,des,img from foodstuff  WHERE `name` LIKE '%" .
                $this->db->escape_like_str($search) . "%' ESCAPE '!'  LIMIT $offset,$limit");
        } else {
            $query = $this->db->query("SELECT id,name,des,img from destination WHERE `name` LIKE '%%' ESCAPE '!' UNION all SELECT id,name,des,img from foodstuff  WHERE `name` LIKE '%%' ESCAPE '!'  LIMIT $offset,$limit");
        }

        return $query->result();
    }

    public function checkTables($k) //To check table exists or not

    {
        if ($this->db->table_exists($k)) {
            return true;
        } else {
            return false;
        }
    }

    public function InsertK($tablename, $data) // To insert data

    {
        if ($this->db->insert($tablename, $data)) {

            $logs = [
                "username" => $this->session->username,
                "userid" => $this->session->id,
                "action" => "Adding Data",
                "description" => "Adding opreation by " . $this->session->username . " in " . $tablename . " Section.",
            ];
            $this->db->insert('logs', $logs);
            // if ($this->db->insert('logs', $logs)) {
            //     // return true;
            // } else {
            //     // return false;
            // }
            if ($tablename == 'our_attractions' or $tablename == 'exploring_nashik_dest' or $tablename == 'exploring_nashik_dest' or $tablename == 'museums_dest' or $tablename == 'mountains_dest' or $tablename == 'waterfalls_dest' or $tablename == 'food-stuff_home' or $tablename == 'food-stuff_sec4' or $tablename == 'food-stuff_sec3' or $tablename == 'our_events_culture') {
                $id = $this->db->insert_id();
                $ref_id = $id . "_" . $tablename;
                $data['ref_id'] = $ref_id;
                $data['sub_category'] = $tablename;
                if ($this->db->insert('all_info_table', $data)) {

                    return true;
                } else {return false;}
            } else {return true;}
        } else {
            return false;
        }
    }

    public function DeleteK($tablename, $id) // To delete data

    {
        if ($this->db->where('id', $id)->delete($tablename)) {
            $logs = [
                "username" => $this->session->username,
                "userid" => $this->session->id,
                "action" => "Deleteing Data",
                "description" => "Delete opreation by " . $this->session->username . " in " . $tablename . " Section.",
            ];
            if ($this->db->insert('logs', $logs)) {
                return true;

            };

            return false;

        } else {
            return false;
        }
    }

    public function UpdateK($tablename, $id, $data) // To update data

    {

        $this->db->where('id', $id);
        if ($this->db->update($tablename, $data)) {
            if ($tablename == 'our_attractions' or $tablename == 'exploring_nashik_dest' or $tablename == 'exploring_nashik_dest' or $tablename == 'museums_dest' or $tablename == 'mountains_dest' or $tablename == 'waterfalls_dest' or $tablename == 'food-stuff_home' or $tablename == 'food-stuff_sec4' or $tablename == 'food-stuff_sec3' or $tablename == 'our_events_culture') {
                $ref_id = $id . "_" . $tablename;
                $this->db->where('ref_id', $ref_id);
                if ($this->db->update('all_info_table', $data)) {
                    $logs = [
                        "username" => $this->session->username,
                        "userid" => $this->session->id,
                        "action" => "Update Data",
                        "description" => "Edit opreation by " . $this->session->username . " in " . $tablename . " Section.",
                    ];
                    if ($this->db->insert('logs', $logs)) {
                        return true;
                    };

                    return false;

                } else {return false;}
            } else {return true;}
        } else {
            return false;
        }
    }

    public function CheckUserName($un, $pw) //To check valid user

    {
        $query = $this->db->where(['username' => $un])->get('users');
        $d = $query->result();
        if ($query->num_rows()) {
            if (password_verify($pw, $d[0]->password)) {
                $this->session->set_userdata('username', $d[0]->username);
                $this->session->set_userdata('id', $d[0]->id);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function GetUsernameByEmail($email) //To get email from username

    {
        $query = $this->db->where(['email' => $email])->get('users');
        $d = $query->result();
        if ($query->num_rows()) {
            return $d[0];
        } else {
            return false;
        }
    }

    public function GetUsername($username) // To retrive username

    {
        $query = $this->db->where(['username' => $username])->get('users');

        $d = $query->result();
        if ($query->num_rows()) {
            return $d[0];
        } else {
            return false;
        }

    }

}