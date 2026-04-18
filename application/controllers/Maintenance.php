<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Common_model', 'common');

		if (!$this->input->is_cli_request()) {
			show_404();
		}
	}

	public function normalize_user_names()
	{
		$fields = array('first_name', 'middle_name', 'last_name', 'father_husband_name', 'ref_name');
		$this->db->select('id, first_name, middle_name, last_name, father_husband_name, ref_name');
		$this->db->from('users');
		$query = $this->db->get();

		$checked = 0;
		$updated = 0;

		foreach ($query->result_array() as $row) {
			$checked++;
			$sanitized = sanitize_member_identity_fields($row);
			$changes = array();

			foreach ($fields as $field) {
				$original = isset($row[$field]) ? (string) $row[$field] : '';
				$cleaned = isset($sanitized[$field]) ? (string) $sanitized[$field] : '';

				if ($original !== $cleaned) {
					$changes[$field] = $cleaned;
				}
			}

			if (!empty($changes)) {
				$this->common->update($row['id'], $changes, 'users');
				$updated++;
			}
		}

		echo 'Checked users: ' . $checked . PHP_EOL;
		echo 'Updated users: ' . $updated . PHP_EOL;
	}
}