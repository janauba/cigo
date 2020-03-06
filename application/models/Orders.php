<?php
class Orders extends CI_Model {
		
		public function getOrders() {
			$this->db->order_by("id", "desc");
			$query = $this->db->get('orders');
            return $query->result();
		}
		
		public function addOrder($data) {
			//$this->db->insert('orders', $data);	
			//return $this->db->insert_id();
			
			$this->db->trans_begin();
			$this->db->insert('orders',$data);

			$item_id = $this->db->insert_id();

			if( $this->db->trans_status() === FALSE )
			{
				$this->db->trans_rollback();
				return( 0 );
			}
			else
			{
				$this->db->trans_commit();
				return( $item_id );
			}
			
			//return 0;
		}
		
		public function updateOrder($id, $status) {
			$this->db->where('id', $id);
			$this->db->update('orders', array('status' => $status));
		}
		
		public function deleteOrder($id) {
			$this->db->delete('orders', array('id' => $id));
		}	
}