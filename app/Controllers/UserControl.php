<?php

namespace App\Controllers;

class UserControl extends BaseController
{
    public function showUserAuth()
    {
        if ($this->session->get('userLogged')) {
            return redirect()->to(base_url('/'));
        }

        $this->renderGlobalView('user/auth', []);
    }

    public function validateUserSignin()
    {
        if (!$this->validate([
            "email_id" => [
                "label" => "Email",
                "rules" => "required|valid_email",
            ],
            "password" => [
                "label" => "Password",
                "rules" => "required|min_length[6]",
            ]
        ])) {
            $response = ['type' => 0, 'msg' => $this->validator->listErrors(),];
        } else {
            $email_id = $this->request->getVar('email_id');
            $password = $this->request->getVar('password');

            if ($data = $this->usr->where('email_id', $email_id)->first()) {
                if (password_verify($password, $data['password'])) {
                    $this->session->set(['email_id' => $data['email_id'], 'userLogged' => TRUE]);
                    $response = ['type' => 1, 'url' => base_url('/')];
                } else {
                    $response = ['type' => 0, 'msg' => 'Wrong password entered.'];
                }
            } else {
                $response = ['type' => 0, 'msg' => 'No user exist with this email.'];
            }
        }
        return $this->response->setJSON($response);
    }

    public function validateUserSignup()
    {
        if (!$this->validate([
            "email_id" => [
                "label" => "Email",
                "rules" => "required|valid_email",
            ],
            "phone_number" => [
                "label" => "Phone No",
                "rules" => "required|is_natural|exact_length[10]",
            ],
            "password" => [
                "label" => "Password",
                "rules" => "required|min_length[6]",
            ]
        ])) {
            $response = ['type' => 0, 'msg' => $this->validator->listErrors(),];
        } else {
            $email_id = $this->request->getVar('email_id');
            $phone_number = $this->request->getVar('phone_number');
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

            if ($this->usr->where('email_id', $email_id)->first()) {
                $response = ['type' => 0, 'msg' => 'This email is already registered.',];
            } else if ($this->usr->where('phone_number', $phone_number)->first()) {
                $response = ['type' => 0, 'msg' => 'This phone no is already registered.',];
            } else {
                $data = [
                    'email_id' => $email_id,
                    'phone_number' => $phone_number,
                    'password' => $password,
                ];

                $this->usr->save($data);

                $response = ['type' => 1, 'msg' => 'Registration Successful! Please login to your dashboard.'];
            }
        }

        return $this->response->setJSON($response);
    }

    public function viewDashboard()
    {
        $data = [
            'centerData' => $this->ctr->findAll(),
        ];

        $this->renderGlobalView('user/dashboard', $data);
    }

    public function fetchCenterDetails()
    {
        return $this->response->setJSON($this->ctr->where('cid', $this->request->getVar('cid'))->first());
    }

    public function bookWashing()
    {
        if (!$this->validate([
            "workers_name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Please select a worker.",
                ],
            ],
        ])) {
            $response = ['type' => 0, 'msg' => $this->validator->listErrors(),];
        } else {
            $cdata = $this->ctr->where('cid', $this->request->getVar('cid'))->first();
            $data = [
                'email_id' => $this->session->get('email_id'),
                'center_name' => $cdata['center_name'],
                'center_address' => $cdata['center_address'],
                'phone_no' => $cdata['phone_no'],
                'washing_price' => $cdata['washing_price'],
                'workers_name' => $this->request->getVar('workers_name'),
            ];

            $this->srv->save($data);
            $response = ['type' => 1, 'msg' => 'Your request has been successfully booked.'];
        }
        return $this->response->setJSON($response);
    }

    public function logout()
    {
        $this->session->remove(['email_id', 'userLogged']);
        return redirect()->to(base_url('/'));
    }
}
