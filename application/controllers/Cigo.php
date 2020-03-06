<?php
class Cigo extends CI_Controller {

        public function index()
        {
				$this->load->model('orders');
				$data['orders'] = $this->orders->getOrders();
				$this->load->view('cigo', $data);
        }
		
        public function addOrder()
        {
				
				$this->load->model('orders');
				$id = $this->orders->addOrder($this->input->post());
				$input['firstName'] = $this->input->post('firstName');
				$input['lastName'] = $this->input->post('lastName');
				$input['scheduledDate'] = $this->input->post('scheduledDate');
				$input['id'] = $id;
				$input['status'] = 'Pending';
				echo $this->load->view('order', $input, TRUE);
        }
		
		public function updateOrder($id, $status)
        {
				$this->load->model('orders');
				$this->orders->updateOrder($id, urldecode($status));
		}
		
		public function deleteOrder($id) {
				$this->load->model('orders');
				$this->orders->deleteOrder($id);
		}
}
