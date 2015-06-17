<?php
/**
 * MY_Model.php
 *
 * Model MY_Model.
 *
 * This model is a collection of generic methods to retrieve and save data to the database.
 *
 * @author Evaldo Junior <junior@casoft.info>
 * @subpackage  core
 * @version 1.0 beta
 *
 * Copyright 2011 CaSoft Tecnologia e Desenvolvimento. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 *  1. Redistributions of source code must retain the above copyright notice, this list of
 *     conditions and the following disclaimer.
 *
 *  2. Redistributions in binary form must reproduce the above copyright notice, this list
 *     of conditions and the following disclaimer in the documentation and/or other materials
 *     provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY CASOFT _AS IS_ AND ANY EXPRESS OR IMPLIED
 * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND
 * FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL CASOFT OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
 * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are those of the
 * authors and should not be interpreted as representing official policies, either expressed
 * or implied, of CaSoft Tecnologia e Desenvolvimento.'
 */
/**
 * MY_Model
 *
 * @property    CI_DB_active_record     $db
 */
class MY_Model2 extends CI_Model {
    /**
     * table
     *
     * The database table of the model
     *
     * When extending this class, you should set the table name in the constructor
     *
     * @var string
     * @access protected
     */
    protected $table;
    /**
     * primary_key
     *
     * The primary key of the model's table.
     *
     * When extending this class you may want to change it to fit your tables' primary key field.
     *
     * @var string
     * @access protected
     */
    protected $primary_key = 'id';
    /**
     * return_type
     *
     * Which type of data methods should return.
     * Options are:
     *   - 'array' (Default)
     *   - 'object'
     *
     * If you want methods to return objects, change this value
     * in your Models' constructors.
     *
     * @var mixed
     * @access protected
     */
    protected $return_type = 'array';
    /**
     * constructor method
     */
    public function  __construct() {
        parent::__construct();
    }
    /**
     * get
     *
     * Method to retrieve data from database
     * This method tries to return just one record, but if it finds
     * more records, it will return all of them in an array, just like
     * the 'filter' method.
     * Useful when you want just one row. For many rows 'filter' is
     * the best option.
     *
     * Examples:
     *
     * $where :
     *      'id = 1'
     *      or
     *      array('id' => 1, 'other_id' => 2)
     *
     *
     * @param array $where      Can be an array or a string
     * @param array $fields     Can be an array or an string
     * @access public
     * @return void
     */
    public function get($where = '', $fields = '') {
        $results = $this->filter($where, $fields);
        if (count($results) == 1) {
            return $results[0];
        }
        return $results;
    }
    /**
     * save
     *
     * Method to save data to the database.
     *
     * To update data you must have an {$this->primary_key} element in the given array.
     *
     * This method returns the row id (inserted or updated)
     *
     * @param array $data
     * @access public
     * @return mixed
     */
    public function save($data) {
        if (isset($data[$this->primary_key]) AND $data[$this->primary_key] != 0) {
            $this->db->where($this->primary_key, $data[$this->primary_key]);
            $this->db->update($this->table, $data);
        }
        else {
            $this->db->insert($this->table, $data);
            $data[$this->primary_key] = $this->db->insert_id();
        }
        return ($this->db->affected_rows() > 0) ? $data[$this->primary_key] : FALSE;
    }
    /**
     * filter
     *
     * Method to retrieve data from database.
     * This method will always return an array of results,
     * even if it's just one row.
     *
     * @param array $where      Can be an array or a string
     * @param array $fields     Can be an array or a string
     * @access public
     * @return array
     */
    public function filter($where = '', $fields = '') {
        $this->db->from($this->table);
        if (is_array($where)) {
            foreach ($where as $f => $w){
                $this->db->where($f, $w);
            }
        }
        elseif (strlen($where) > 0) {
            $this->db->where($where);
        }
        if (is_array($fields)) {
            foreach ($fields as $field) {
                $this->db->select($field);
            }
        }
        elseif (strlen($fields) > 0) {
            $this->db->select($fields);
        }
        $query = $this->db->get();
        if ($this->return_type == 'array') {
            $results = $query->result_array();
        }
        else {
            $results = $query->result();
        }
        return $results;
    }
    /**
     * delete
     *
     * removes a row from database
     *
     * @param integer $id
     * @access public
     * @return booelan
     */
    public function delete($id) {
        if (! is_numeric($id)) {
            return FALSE;
        }
        else {
            $this->db->where($this->primary_key, $id);
            $this->db->delete($this->table);
            return TRUE;
        }
    }
    /**
     * count_results
     *
     * Count the number of rows in a table
     *
     * @param array $where
     * @access public
     * @return void
     */
    public function count_results($where = '') {
        if (is_array($where)) {
            foreach ($where as $f => $w){
                $this->db->where($f, $w);
            }
        }
        elseif (strlen($where) > 0) {
            $this->db->where($where);
        }
        return $this->db->count_all_results($this->table);
    }
    /**
     * paginate
     *
     * Function to paginate results from the database. It only retrieve the needed rows
     *
     * @param int $offset
     * @param int $quantity
     * @param array $where          Can be an array or a string
     * @access public
     * @return array
     */
    public function paginate($offset, $rows = 10, $where = '', $fields = '') {
        if (is_array($where)) {
            foreach ($where as $f => $w){
                $this->db->where($f, $w);
            }
        }
        elseif (strlen($where) > 0) {
            $this->db->where($where);
        }
        if (is_array($fields)) {
            foreach ($fields as $field) {
                $this->db->select($field);
            }
        }
        elseif (strlen($fields) > 0) {
            $this->db->select($fields);
        }
        $this->db->limit($quantity, $offset);
        $this->db->get($this->table);
        if ($this->return_type == 'array') {
            $results = $query->result_array();
        }
        else {
            $results = $query->result();
        }
        return $results;
    }
    /**
     * count
     *
     * Returns the number of results
     *
     * @access public
     * @return integer
     */
    public function count() {
        return $this->db->count_all_results($this->table);
    }
}
/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */