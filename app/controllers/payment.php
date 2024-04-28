<?php

class Payment extends Controller
{
    public function index()
    {

        $data['title'] = 'Payment details';
        $this->view('payment_details', $data);
    }
}
